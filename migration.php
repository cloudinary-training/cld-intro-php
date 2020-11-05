<?php


require_once __DIR__ . '/vendor/autoload.php';

use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;
use Cloudinary\Asset\Media;

// Config

// Singleton - can't use for aliasing
// $cloudinary = Configuration::instance(['account' => ['cloud_name' => 'CLOUD_NAME', 'api_key' => 'API_KEY', 'api_secret' => 'API_SECRET']]);
$config = Configuration::instance(['account' => ['cloud_name' => 'sep-2020-test', 'api_key' => '892275429346483', 'api_secret' => 'TqPTlL652atsfH4CWGv8ot7PAdg']]);
print_r($config->account->cloudName);
echo "\n";

// Upload an image and supply a public id of 20 random characters
// image is the default
// print_r(upload('./assets/cheesecake.jpg'));
// print_r((new UploadApi())->upload('./assets/cheesecake.jpg'));

// Admin API


// Transformation
// can use array keyword or symbol
// echo (Media::fromParams("lake", array("transformation"=>array(
//   array("effect"=>"cartoonify"),
//   array("radius"=>"max"),
//   array("effect"=>"outline:100", "color"=>"lightblue"),
//   array("background"=>"lightblue"),
//   array("height"=>300, "crop"=>"scale")
//   )))->toUrl()) . "\n";

echo (Media::fromParams("lake", 
["transformation"=>
  [
    ["effect"=>"cartoonify"],
    ["radius"=>"max"],
    ["effect"=>"outline:100", "color"=>"lightblue"],
    ["background"=>"lightblue"],
    ["height"=>300, "crop"=>"scale"]
  ]
])->toUrl()). "\n";

