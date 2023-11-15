<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\API\ResponseTrait;

class Registration extends Controller
{
    use ResponseTrait;

    public function index()
    {
        helper('form');
        return view('registration_form');
    }

   
    public function processRegistration()
    {
        $apiUrl = 'https://take-home-test-api.nutech-integrasi.app/registration';

        $data = [
            'email'            => $this->request->getPost('email'),
            'first_name'       => $this->request->getPost('first_name'),
            'last_name'        => $this->request->getPost('last_name'),
            'password'         => $this->request->getPost('password'),
            'confirm_password' => $this->request->getPost('confirm_password'),
        ];

        if (empty($data['email']) || empty($data['first_name']) || empty($data['last_name']) || empty($data['password']) || empty($data['confirm_password'])) {
            $data['message'] = 'All fields are required.';
            return view('registration_form', $data);
        }

        if ($data['password'] !== $data['confirm_password']) {
            $data['message'] = 'Password and Confirm Password do not match.';
            return view('registration_form', $data);
        }

        $response = $this->sendRequest($apiUrl, $data);

        if ($response) {
            $data['message'] = 'Registration successful.';
        } else {
            $data['message'] = 'Registration failed.';
        }
        helper('form');
        return view('registration_form', $data);
    }

    private function sendRequest($url, $data)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL            => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => '',
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => 'POST',
            CURLOPT_POSTFIELDS     => json_encode($data),
            CURLOPT_HTTPHEADER     => array(
                'Accept: application/json',
                'Content-Type: application/json',
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return $response;
    }
}
