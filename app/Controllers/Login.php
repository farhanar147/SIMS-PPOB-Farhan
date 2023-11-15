<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\API\ResponseTrait;

class Login extends Controller
{
    use ResponseTrait;

    public function index()
    {
        helper('form');
        return view('login_form');
    }

    public function __construct()
    {
        $this->session = \Config\Services::session();
    }


    public function processLogin()
    {
        // Validasi format email
        $email = filter_var($this->request->getPost('email'), FILTER_VALIDATE_EMAIL);
        if (!$email) {
            return $this->respond(['error' => 'Invalid email format'], 400);
        }

        // Validasi panjang password
        $password = $this->request->getPost('password');
        if (strlen($password) < 8) {
            return $this->respond(['error' => 'Password must be at least 8 characters long'], 400);
        }

        $data = [
            'email'    => $email,
            'password' => $password,
        ];

        $jsonData = json_encode($data);

        $ch = curl_init('https://take-home-test-api.nutech-integrasi.app/login');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Accept: application/json',
        ]);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            return $this->respond(['error' => 'Curl error: ' . curl_error($ch)], 500);
        }

        curl_close($ch);

        $responseData = json_decode($response, true);

        if (isset($responseData['data']['token'])) {
            
            session()->set('jwt_token', $responseData['data']['token']);

            return redirect()->to(base_url('home'));
            
        } else {
            return $this->respond(['error' => 'Invalid email or password'], 401);
        }
    }
}
