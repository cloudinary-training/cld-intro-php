<?php
require_once __DIR__ . '/vendor/autoload.php';

use Cloudinary\Cloudinary;

// Config
// Constructor
$cloudinary = new Cloudinary('cloudinary://API_KEY:API_SECRET@CLOUD_NAME');
// print_r($cloudinary->configuration->account->cloudName);
// echo "\n";

// Preset

# Alias the upload API
$uploader = $cloudinary->uploadApi();
# Alias the admin API
$api = $cloudinary->adminApi();

// Unsigned Preset

// print_r($api->createUploadPreset([
//   'name'              => 'unsigned-preset',
//   'unsigned'          => true,
//   'tags'              => 'unsigned',
//   'allowed_formats'   => 'jpg,png',
// ]));
// echo "\n";

// Use unsigned preset in upload

// print_r($uploader->upload('./assets/logo.png',['upload_preset'=>'unsigned-preset']));
// echo "\n";

// Create signed preset

// print_r($api->createUploadPreset([
//   'name'              => 'signed-preset',
//   'unsigned'          => false,
//   'tags'              => 'signed',
//   'allowed_formats'   => 'jpg,png',
// ]));
// echo "\n";

// Use signed preset in upload (you can use this in DAM upload)
// print_r($uploader->upload('./assets/lake.jpg',['upload_preset'=>'signed-preset']));
// echo "\n";
