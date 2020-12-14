<?php
require_once __DIR__ . '/vendor/autoload.php';

use Cloudinary\Cloudinary;

// Config
// Constructor
$cloudinary = new Cloudinary();
echo $cloudinary->configuration->account->cloudName . "\n";

// Preset

# Alias the upload API
$uploader = $cloudinary->uploadApi();
# Alias the admin API
$api = $cloudinary->adminApi();

// Unsigned Preset

// echo json_encode($api->createUploadPreset([
//   'name'              => 'unsigned-preset',
//   'unsigned'          => true,
//   'tags'              => 'unsigned',
//   'allowed_formats'   => 'jpg,png',
// ]),JSON_PRETTY_PRINT) . "\n";

// Use unsigned preset in upload

// echo json_encode($uploader->upload('./assets/logo.png',
//   ['upload_preset'=>'unsigned-preset']), JSON_PRETTY_PRINT) . "\n";

// Create signed preset

// echo json_encode($api->createUploadPreset([
//   'name'              => 'signed-preset',
//   'unsigned'          => false,
//   'tags'              => 'signed',
//   'allowed_formats'   => 'jpg,png',
// ]),JSON_PRETTY_PRINT) . "\n";

// Use signed preset in upload (you can use this in DAM upload)
// echo json_encode($uploader->upload('./assets/lake.jpg',
//   ['upload_preset'=>'signed-preset']),
//   JSON_PRETTY_PRINT) . "\n";
?>