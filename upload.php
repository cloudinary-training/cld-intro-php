<?php
require_once __DIR__ . '/vendor/autoload.php';

use Cloudinary\Cloudinary;

// Config with Constructor
$cloudinary = new Cloudinary();
echo $cloudinary->configuration->account->cloudName . "\n";

# Reference the upload API
$uploader = $cloudinary->uploadApi();

# Upload

// Upload an image and supply a public id of 20 random characters
// image is the default
// echo json_encode($uploader->upload('./assets/cheesecake.jpg'),JSON_PRETTY_PRINT) . "\n";

// Video
// echo json_encode($uploader->upload('./assets/video.mp4',['resource_type'=>'video']),JSON_PRETTY_PRINT). "\n";

// Raw
// echo json_encode($uploader->upload('./assets/BLKCHCRY.TTF',['resource_type'=>'raw']),JSON_PRETTY_PRINT). "\n";


// auto
// echo json_encode($uploader->upload('./assets/video.mp4',['resource_type'=>'auto']),JSON_PRETTY_PRINT). "\n";


// Assign public_id
// echo json_encode($uploader->upload('./assets/face.jpg',['public_id'=>'face']),JSON_PRETTY_PRINT) . "\n";


// Use filename, unique
// echo json_encode($uploader->upload('./assets/cheesecake.jpg',['use_filename'=>true,'unique_filename'=>true]),JSON_PRETTY_PRINT) . "\n";


// Use filename, not unique
// echo json_encode($uploader->upload('./assets/cheesecake.jpg',['use_filename'=>true,'unique_filename'=>false]),JSON_PRETTY_PRINT) . "\n";


// Specify folder name
// echo json_encode($uploader->upload('./assets/cheesecake.jpg',['folder'=>'food/my_favorite/']),JSON_PRETTY_PRINT) . "\n";


// Let Cloudinary create folder on the fly from public id
// echo json_encode($uploader->upload('./assets/dog.jpg',['folder'=>'pets/my_favorite/dog']),JSON_PRETTY_PRINT) . "\n";

// Remote asset upload from remote (https)
// echo json_encode($uploader->upload('https://cdn.pixabay.com/photo/2015/03/26/09/39/cupcakes-690040__480.jpg'),JSON_PRETTY_PRINT) . "\n";
?>