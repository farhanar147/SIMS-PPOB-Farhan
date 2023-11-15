<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\API\ResponseTrait;

class Home extends Controller
{

    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    use ResponseTrait;

    public function index()
    {
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
        return view('home', [
            'profile'  => $profile,
            'balance'  => $balance,
            'services' => $services,
            'banner'   => $banner,
        ]);
    }

    
}
