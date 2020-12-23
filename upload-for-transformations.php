<?php
require_once __DIR__ . '/vendor/autoload.php';

use Cloudinary\Cloudinary;

// Config Constructor
$cloudinary = new Cloudinary();

echo $cloudinary->configuration->account->cloudName  . "\n";

# Reference the upload API
$uploader = $cloudinary->uploadApi();

# Upload files to be used in transformation exercises

echo $uploader->upload('./assets/blackberry.jpg',['public_id'=>'blackberry'])["public_id"] . "\n";
echo $uploader->upload('./assets/cheesecake.jpg',['public_id'=>'cheesecake'])["public_id"] . "\n";
echo $uploader->upload('./assets/dog.jpg',['public_id'=>'dog'])["public_id"] . "\n";
echo $uploader->upload('./assets/face.jpg',['public_id'=>'face'])["public_id"] . "\n";
echo $uploader->upload('./assets/faces.jpg',['public_id'=>'faces'])["public_id"] . "\n";
echo $uploader->upload('./assets/grapes.png',['public_id'=>'grapes'])["public_id"] . "\n";
echo $uploader->upload('./assets/lake.jpg',['public_id'=>'lake'])["public_id"] . "\n";
echo $uploader->upload('./assets/logo.png',['public_id'=>'logo'])["public_id"] . "\n";
echo $uploader->upload('./assets/video.mp4',['public_id'=>'video','resource_type'=>'video'])["public_id"] . "\n";
echo $uploader->upload('./assets/shirt_only.png',['public_id'=>'shirt_only'])["public_id"] . "\n";
echo $uploader->upload('./assets/cookies.jpg',['public_id'=>'cookies'])["public_id"] . "\n";
echo $uploader->upload('./assets/working.jpg',['public_id'=>'working'])["public_id"] . "\n";
echo $uploader->upload('./assets/living-room.webp',['public_id'=>'living-room'])["public_id"] . "\n";
?>