<?php

// https://cloudinary.com/documentation/sdk2_migration

require_once __DIR__ . '/vendor/autoload.php';

use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;
use Cloudinary\Asset\Media;
use Cloudinary\Api\Admin\AdminApi;
use Cloudinary\Tag\ImageTag;
use Cloudinary\Tag\VideoThumbnailTag;
use Cloudinary\Tag\VideoTag;



// Config

// Singleton - can't use for aliasing
// $config = Configuration::instance(['account' => ['cloud_name' => 'CLOUD_NAME', 'api_key' => 'API_KEY', 'api_secret' => 'API_SECRET']]);

// or 
// in terminal export CLOUDINARY_URL=""
$config = Configuration::instance();

// verify config
print_r($config->account->cloudName);
echo "\n";


// use variable reference
$upload = new UploadApi();
$api = new AdminApi();

# Upload an image and supply a public id of 20 random characters
# image is the default
// print_r((new UploadApi())->upload('./assets/cheesecake.jpg'));
// or
// print_r($upload->upload('./assets/cheesecake.jpg'));

// Admin API
// print_r((new UploadApi())->upload('./assets/cheesecake.jpg',['public_id'=>'cheesecake']));
// // print_r((new AdminApi())->resource("cheesecake")); 
// // or
// print_r($api->resource("cheesecake"));

// Transformation
// can use array keyword or symbol
// echo (Media::fromParams("lake", array("transformation"=>array(
//   array("effect"=>"cartoonify"),
//   array("radius"=>"max"),
//   array("background"=>"lightblue"),
//   array("height"=>300, "crop"=>"scale")
//   )))->toUrl()) . "\n";

// echo (Media::fromParams("lake", 
// ["transformation"=>
//   [
//     "effect"=>"cartoonify",
//     "radius"=>"max",
//     "background"=>"lightblue",
//     "height"=>300, "crop"=>"scale"
//   ]
// ]) . "\n");

// echo (ImageTag::fromParams("lake", 
// ["transformation"=>
//   [
//     ["effect"=>"cartoonify"],
//     ["radius"=>"max"],
//     ["background"=>"lightblue"],
//     ["height"=>300, "crop"=>"scale"]
//   ]
// ]) . "\n");

// echo (VideoThumbnailTag::fromParams("video.jpg", 
//   [
//     "start_offset"=>"1", 
//     "width"=>350, 
//     "height"=>350,
//     "border"=>"5px_solid_white", 
//     "crop"=>"thumb", 
//     "resource_type"=>"video"
//   ]
// ) . "\n");

// echo (VideoTag::fromParams("video.jpg", 
//   [
//     "start_offset"=>"1", 
//     "width"=>350, 
//     "height"=>350,
//     "border"=>"5px_solid_white", 
//     "crop"=>"thumb", 
//     "resource_type"=>"video"
//   ]
// ) . "\n");

// compare to php sdk1

// this works in php1
// echo cloudinary_url('lake', 
// ['transformation' => [
//       'width'     => 300,
//       'crop'      => 'scale',
//       'radius'    => 'max',
//       'background' => 'lightblue'
//   ],
// ]);

// this works in php2
// for URL you'd replace cloudinary-url with Media::from Params with singleton config
// echo (Media::fromParams("lake", 
// ["transformation"=>
//   [
//     "height"=>300, 
//     "crop"=>"scale",
//     "radius"=>"max",
//     "background"=>"lightblue",
//     "height"=>300, "crop"=>"scale"
//   ]
// ]) . "\n");



