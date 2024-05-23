<?php

/** This file is being used to write custom PHP functions for this application **/

// testing udpates

// Function to encrypt the data
if (!function_exists('encryptData')) {
    function encryptData($data)
    {
        $key = env('SERVER_ENCRYPTION_KEY', 'ZDb2MEELzCcWJnFbM4lyvBVIkA0zcUJJvtvntVqANYY');
        $key = substr(hash('sha256', $key, true), 0, 16); // Ensure the key is exactly 16 bytes
        $iv = openssl_random_pseudo_bytes(16); // Generate a random 16-byte IV
        $encryptedData = openssl_encrypt($data, 'AES-128-CBC', $key, 0, $iv);
        return base64_encode($iv . $encryptedData); // Combine IV with encrypted data and encode it
    }
}

// Function to decrypt the data
if (!function_exists('decryptData')) {
    function decryptData($data)
    {
        $key = env('SERVER_ENCRYPTION_KEY', 'ZDb2MEELzCcWJnFbM4lyvBVIkA0zcUJJvtvntVqANYY');
        $key = substr(hash('sha256', $key, true), 0, 16); // Ensure the key is exactly 16 bytes
        $data = base64_decode($data); // Decode the base64 encoded data
        $iv = substr($data, 0, 16); // Extract the 16-byte IV
        $encryptedData = substr($data, 16); // Extract the encrypted data
        $decryptedData = openssl_decrypt($encryptedData, 'AES-128-CBC', $key, 0, $iv);
        return $decryptedData;
    }
}

// Function to generate a random string
if (!function_exists('randString')) {
    function randString($length = 10, $uppercase = true, $lowercase = true, $numbers = true)
    {
        $characters = '';
        $characters .= $uppercase ? 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' : '';
        $characters .= $lowercase ? 'abcdefghijklmnopqrstuvwxyz' : '';
        $characters .= $numbers ? '0123456789' : '';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
