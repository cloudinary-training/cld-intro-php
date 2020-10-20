<?php


require_once __DIR__ . '/vendor/autoload.php';

use Cloudinary\Cloudinary;
use Cloudinary\Configuration\Configuration;

// Config Constructor
// $cloudinary = new Cloudinary('cloudinary://API_KEY:API_SECRET@CLOUD_NAME');

$cloudinary = new Cloudinary('cloudinary://892275429346483:TqPTlL652atsfH4CWGv8ot7PAdg@sep-2020-test');
print_r($cloudinary->configuration->account->cloudName);
echo "\n";

# Alias the upload API
$uploader = $cloudinary->uploadApi();



# Upload files to be used in transformation exercises

print_r($uploader->upload('./assets/blackberry.jpg',['public_id'=>'blackberry'])["public_id"]);
echo "\n";
print_r($uploader->upload('./assets/BLKCHCRY.TTF',['resource_type'=>'raw'])["public_id"]);
echo "\n";
print_r($uploader->upload('./assets/cheesecake.jpg',['public_id'=>'cheesecake'])["public_id"]);
echo "\n";
print_r($uploader->upload('./assets/dog.jpg',['public_id'=>'dog'])["public_id"]);
echo "\n";
print_r($uploader->upload('./assets/face.jpg',['public_id'=>'face'])["public_id"]);
echo "\n";
print_r($uploader->upload('./assets/faces.jpg',['public_id'=>'faces'])["public_id"]);
echo "\n";
print_r($uploader->upload('./assets/lake.jpg',['public_id'=>'lake'])["public_id"]);
echo "\n";
print_r($uploader->upload('./assets/logo.png',['public_id'=>'logo'])["public_id"]);
echo "\n";
print_r($uploader->upload('./assets/video.mp4',['public_id'=>'video','resource_type'=>'raw'])["public_id"]);
echo "\n";
print_r($uploader->upload('./assets/demo-cloudinary-logo.png',['public_id'=>'demo/cloudinary_logo'])["public_id"]);
echo "\n";
print_r($uploader->upload('./assets/heather_texture.png',['public_id'=>'demo/heather_texture'])["public_id"]);
echo "\n";
print_r($uploader->upload('./assets/model2.png',['public_id'=>'demo/model2'])["public_id"]);
echo "\n";
print_r($uploader->upload('./assets/shirt_only.png',['public_id'=>'demo/shirt_only'])["public_id"]);
echo "\n";
print_r($uploader->upload('./assets/shirt_only.png',['public_id'=>'demo/shirt_displace'])["public_id"]);
echo "\n";
print_r($uploader->upload('https://images.pexels.com/photos/230325/pexels-photo-230325.jpeg',['public_id'=>'cookies'])["public_id"]);
echo "\n";
print_r($uploader->upload('./assets/working.jpg',['public_id'=>'working'])["public_id"]);
echo "\n";