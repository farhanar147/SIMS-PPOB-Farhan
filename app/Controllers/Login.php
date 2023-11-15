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

        // Data to be sent in the request
        $data = [
            'email'    => $email,
            'password' => $password,
        ];

        // Convert data to JSON format
        $jsonData = json_encode($data);

        // cURL initialization
        $ch = curl_init('https://take-home-test-api.nutech-integrasi.app/login');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Accept: application/json',
        ]);

        // Execute cURL session and get the response
        $response = curl_exec($ch);

        // Check for cURL errors
        if (curl_errno($ch)) {
            return $this->respond(['error' => 'Curl error: ' . curl_error($ch)], 500);
        }

        // Close cURL session
        curl_close($ch);

        // Decode respons JSON
        $responseData = json_decode($response, true);

        // Cek jika respons berisi token
        if (isset($responseData['data']['token'])) {
            // Set cookie dengan nama 'jwt_token' dan nilai token
            setcookie('jwt_token', $responseData['data']['token'], time() + (12 * 60 * 60), '/'); // Cookie berlaku selama 12 jam
        }

        // Redirect ke halaman berikutnya
        return redirect()->to(base_url('home'));
    }
}
