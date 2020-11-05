<?php


require_once __DIR__ . '/vendor/autoload.php';

use Cloudinary\Cloudinary;
use Cloudinary\Configuration\Configuration;


// Config


// Constructor
$cloudinary = new Cloudinary('cloudinary://API_KEY:API_SECRET@CLOUD_NAME');


print_r($cloudinary->configuration->account->cloudName);
echo "\n";


use Cloudinary\Api\Upload\UploadApi;
# Alias the upload API
$uploader = $cloudinary->uploadApi();
#alias the admin API
$api = $cloudinary->adminApi();


# Upload

// Upload an image and supply a public id of 20 random characters
// image is the default
print_r($uploader->upload('./assets/cheesecake.jpg'));

// Video
// print_r($uploader->upload('./assets/video.mp4',['resource_type'=>'video']));
// echo "\n";

// Raw
// print_r($uploader->upload('./assets/BLKCHCRY.TTF',['resource_type'=>'raw']));
// echo "\n";

// auto
// print_r($uploader->upload('./assets/video.mp4',['resource_type'=>'auto']));
// echo "\n";

// Assign public_id
// print_r($uploader->upload('./assets/face.jpg',['public_id'=>'face']));
// echo "\n";

// Use filename, unique
// print_r($uploader->upload('./assets/cheesecake.jpg',['use_filename'=>true,'unique_filename'=>true]));
// echo "\n";

// Use filename, not unique
// print_r($uploader->upload('./assets/cheesecake.jpg',['use_filename'=>true,'unique_filename'=>false]));
// echo "\n";

// Specify folder name
// print_r($uploader->upload('./assets/cheesecake.jpg',['folder'=>'food/my_favorite/']));
// echo "\n";

// Let Cloudinary create folder on the fly from public id
print_r($uploader->upload('./assets/dog.jpg',['folder'=>'pets/my_favorite/dog']));
echo "\n";

// Remote asset upload from remote (https)
// print_r($uploader->upload('https://cdn.pixabay.com/photo/2015/03/26/09/39/cupcakes-690040__480.jpg'));
// echo "\n";



