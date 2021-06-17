<?php
require_once __DIR__ . '/vendor/autoload.php';

use Cloudinary\Cloudinary;

// Config with Constructor

// Provide credentials in script
// $cloudinary = new Cloudinary(
//   [
//       'cloud' => [
//         'cloud_name' => 'CLOUD_NAME', 
//         'api_key' => 'API_KEY', 
//         'api_secret' => 'API_SECRET'
//       ],
//       'url' => [
//         'secure' => true //default
//       ]
//   ]
// );

// export credentials
$cloudinary = new Cloudinary();
$cloudinary->configuration->url->analytics(false);
echo $cloudinary->configuration->cloud->cloudName . "\n";

# Reference the upload API
$uploader = $cloudinary->uploadApi();

# Upload

// Upload an image and supply a public id of 20 random characters
// image is the default
// echo json_encode($uploader->upload('./assets/cheesecake.jpg'), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "\n";

// Video
// echo json_encode($uploader->upload('./assets/earth.mp4', ['resource_type' => 'video']), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "\n";

// Raw
// echo json_encode($uploader->upload('./assets/BLKCHCRY.TTF', ['resource_type' => 'raw']), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "\n";


// auto
// echo json_encode($uploader->upload('./assets/earth.mp4', ['resource_type' => 'auto']), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "\n";


// Use filename, unique
// echo json_encode($uploader->upload('./assets/cheesecake.jpg', ['use_filename' => true, 'unique_filename' => true]), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "\n";


// Use filename, not unique
// echo json_encode($uploader->upload('./assets/cheesecake.jpg', ['use_filename' => true, 'unique_filename' => false]), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "\n";


// Assign public_id
// echo json_encode($uploader->upload('./assets/cheesecake.jpg', ['public_id' => 'yum']), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "\n";

// Specify folder name
// echo json_encode($uploader->upload('./assets/cheesecake.jpg', ['folder' => 'food/my_favorite/']), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "\n";


// Let Cloudinary create folder on the fly from public id
// echo json_encode($uploader->upload('./assets/dog.jpg', ['folder' => 'pets/my_favorite/dog']), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "\n";

// Remote asset upload from remote (https)
// echo json_encode($uploader->upload('https://cdn.pixabay.com/photo/2015/03/26/09/39/cupcakes-690040__480.jpg'), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "\n";
