<?php


require_once __DIR__ . '/vendor/autoload.php';

use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;
use Cloudinary\Asset\Media;
use Cloudinary\Api\Admin\AdminApi;

// Config

// Singleton - can't use for aliasing
$cloudinary = Configuration::instance(['account' => ['cloud_name' => 'CLOUD_NAME', 'api_key' => 'API_KEY', 'api_secret' => 'API_SECRET']]);

// use variable reference
$upload = new UploadApi();
$api = new AdminApi();

print_r($config->account->cloudName);
echo "\n";

// Upload an image and supply a public id of 20 random characters
// image is the default
// print_r(upload('./assets/cheesecake.jpg'));
// print_r((new UploadApi())->upload('./assets/cheesecake.jpg'));
// or
// print_r($upload->upload('./assets/cheesecake.jpg'));

// Admin API
// print_r((new UploadApi())->upload('./assets/cheesecake.jpg',['public_id'=>'cheesecake']));
// print_r((new AdminApi())->resource("cheesecake")); 
// or
// print_r($api->resource("cheesecake"));

// Transformation
// can use array keyword or symbol
// echo (Media::fromParams("lake", array("transformation"=>array(
//   array("effect"=>"cartoonify"),
//   array("radius"=>"max"),
//   array("background"=>"lightblue"),
//   array("height"=>300, "crop"=>"scale")
//   )))->toUrl()) . "\n";

echo (Media::fromParams("lake", 
["transformation"=>
  [
    ["effect"=>"cartoonify"],
    ["radius"=>"max"],
    ["background"=>"lightblue"],
    ["height"=>300, "crop"=>"scale"]
  ]
])->toUrl()). "\n";

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

// this does not work in php1
// echo cloudinary_url('lake', 
// ['transformation' => [
//       ['width'     => 300],
//       ['crop'      => 'scale'],
//       ['radius'    => 'max]',
//       ['background' => 'lightblue']
//   ],
// ]]);

