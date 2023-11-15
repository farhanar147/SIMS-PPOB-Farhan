<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\API\ResponseTrait;

class Home extends Controller
{

    use ResponseTrait;


    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    use ResponseTrait;

    public function index()
    {
        
        // Pastikan token sudah diset saat login
        $token = $this->session->get('jwt_token');

        if (!isset($token)) {
            helper('form');
            return view('login_form');
        }

        // Fungsi untuk mengambil data dari API dengan token
        $getDataFromApi = function ($url) use ($token) {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Accept: application/json',
                'Authorization: Bearer ' . $token,
            ]);

            $response = curl_exec($ch);
            curl_close($ch);

            return json_decode($response, true);
        };

        // Ambil data dari API profile
        $profile = $getDataFromApi('https://take-home-test-api.nutech-integrasi.app/profile');

        // Ambil data dari API balance
        $balance = $getDataFromApi('https://take-home-test-api.nutech-integrasi.app/balance');

        // Ambil data dari API services
        $services = $getDataFromApi('https://take-home-test-api.nutech-integrasi.app/services');

        // Ambil data dari API banner
        $banner = $getDataFromApi('https://take-home-test-api.nutech-integrasi.app/banner');

       
        // Tampilkan data di view
        return view('home', [
            'profile'  => $profile,
            'balance'  => $balance,
            'services' => $services,
            'banner'   => $banner,
        ]);
    }

    public function formTopup(){
        // Pastikan token sudah diset saat login
        $token = $this->session->get('jwt_token');

        // Fungsi untuk mengambil data dari API dengan token
        $getDataFromApi = function ($url) use ($token) {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Accept: application/json',
                'Authorization: Bearer ' . $token,
            ]);

            $response = curl_exec($ch);
            curl_close($ch);

            return json_decode($response, true);
        };

        // Ambil data dari API profile
        $profile = $getDataFromApi('https://take-home-test-api.nutech-integrasi.app/profile');

        // Ambil data dari API balance
        $balance = $getDataFromApi('https://take-home-test-api.nutech-integrasi.app/balance');

        // Ambil data dari API services
        $services = $getDataFromApi('https://take-home-test-api.nutech-integrasi.app/services');

        // Ambil data dari API banner
        $banner = $getDataFromApi('https://take-home-test-api.nutech-integrasi.app/banner');

       
        // Tampilkan data di view
        $alertMessage = $this->session->getFlashdata('alert_message');
        helper('form');
        return view('topup_form', [
            'profile'  => $profile,
            'balance'  => $balance,
            'alertMessage' => $alertMessage,
        ]);
        
    }

    public function processTopup()
    {
       
        helper('form');
        // Ambil jumlah top up dari formulir
        $amount = $this->request->getPost('top_up_amount');

        // Validasi jumlah top up
        if (!is_numeric($amount) || $amount <= 0) {
            // Tampilkan pesan kesalahan jika jumlah tidak valid
            return view('topup_form', ['error' => 'Jumlah Top Up tidak valid']);
        }

        // Kirim permintaan ke API dengan Bearer Token JWT
        $apiUrl = 'https://take-home-test-api.nutech-integrasi.app/topup';
        $token = $this->session->get('jwt_token');; // Isi dengan Bearer Token JWT yang diperoleh dari otentikasi

        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['top_up_amount' => $amount]));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Accept: application/json',
            'Authorization: Bearer ' . $token,
        ]);

        $response = curl_exec($ch);

        // Handle response
        $responseData = json_decode($response, true);
        if ($responseData['status'] == 0) {
            $this->session->setFlashdata('alert_message', 'Top Up berhasil');

            // Redirect ke function lain
            return redirect()->to('home/formTopup');
        }else{
            $this->session->setFlashdata('alert_message', 'Gagal Top Up');

            // Redirect ke function lain
            return redirect()->to('home/formTopup');
        }
        
    }

}
