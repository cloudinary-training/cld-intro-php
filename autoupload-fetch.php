<?php


require_once __DIR__ . '/vendor/autoload.php';

use Cloudinary\Cloudinary;
use Cloudinary\Asset\DeliveryType;
use Cloudinary\Transformation\Resize;


// Constructor
$cloudinary = new \Cloudinary\Cloudinary('cloudinary://892275429346483:TqPTlL652atsfH4CWGv8ot7PAdg@sep-2020-test');
// print_r($cloudinary->configuration->account->cloudName);
// echo "\n";

// Alias the upload API
$uploader = $cloudinary->uploadApi();

// Fetch
// echo $cloudinary->image('https://cdn.pixabay.com/photo/2015/03/26/09/39/cupcakes-690040__480.jpg')
//   ->deliveryType(\Cloudinary\Asset\DeliveryType::FETCH) . "\n";


// Auto-upload Image with cropping
// echo $cloudinary->image('remote-media/images/dolphin')
//   ->resize(Resize::scale()->width(300)) . "\n";

// Auto-upload Video with cropping
// echo $cloudinary->video('remote-media/video/snowboarding')
//   ->resize(Resize::scale()->width(300)) . "\n";

// Auto-upload Raw no transformations on raw
echo $cloudinary->raw('remote-media/raw/data.json') . "\n";
