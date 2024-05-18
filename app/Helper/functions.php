<?php
/** This file is being used to write custom PHP functions for this application **/

// write two functions to encrypt and decrypt the data that could be sent to the other PHP server and decrypt the data that is received from the other PHP server.

// Function to encrypt the data
function encryptData($data) {
    $key = "This is a secret key";
    $key = substr(hash('sha256', $key, true), 0, 16); // Ensure the key is exactly 16 bytes
    $iv = openssl_random_pseudo_bytes(16); // Generate a random 16-byte IV
    $encryptedData = openssl_encrypt($data, 'AES-128-CBC', $key, 0, $iv);
    return base64_encode($iv . $encryptedData); // Combine IV with encrypted data and encode it
}

// Function to decrypt the data
function decryptData($data) {
    $key = "This is a secret key";
    $key = substr(hash('sha256', $key, true), 0, 16); // Ensure the key is exactly 16 bytes
    $data = base64_decode($data); // Decode the base64 encoded data
    $iv = substr($data, 0, 16); // Extract the 16-byte IV
    $encryptedData = substr($data, 16); // Extract the encrypted data
    $decryptedData = openssl_decrypt($encryptedData, 'AES-128-CBC', $key, 0, $iv);
    return $decryptedData;
}
