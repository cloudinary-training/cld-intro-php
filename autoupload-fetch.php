<?php
require_once __DIR__ . '/vendor/autoload.php';

use Cloudinary\Cloudinary;
use Cloudinary\Asset\DeliveryType;
use Cloudinary\Transformation\Resize;
use Cloudinary\Asset;


// Constructor
$cloudinary = new Cloudinary();
echo $cloudinary->configuration->account->cloudName . "\n";

// Alias the upload API
$uploader = $cloudinary->uploadApi();

// Fetch
// echo $cloudinary->image('https://cdn.pixabay.com/photo/2015/03/26/09/39/cupcakes-690040__480.jpg')
//   ->deliveryType(DeliveryType::FETCH) . "\n";

// map "remote-media" to "https://cloudinary-training.github.io/cld-advanced-concepts/assets/"
// Auto-upload Image with cropping
// echo $cloudinary->image('remote-media/images/dolphin') . "\n";

// Auto-upload Video with cropping
// echo $cloudinary->video('remote-media/video/snowboarding') . "\n";

// Auto-upload Raw no transformations on raw
// echo $cloudinary->raw('remote-media/raw/data.json') . "\n";
