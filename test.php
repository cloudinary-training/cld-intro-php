<?php

/**
 * This file is part of the Cloudinary PHP package.
 *
 * (c) Cloudinary
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

// namespace Cloudinary\Samples;

require_once __DIR__ . '/vendor/autoload.php';


use Cloudinary\ClassUtils;
use Cloudinary\Configuration\Configuration;
use Cloudinary\Transformation\Adjust;
use Cloudinary\Transformation\Argument\Gradient;
use Cloudinary\Transformation\Argument\GradientDirection;
use Cloudinary\Transformation\Argument\NamedColor;
use Cloudinary\Transformation\Argument\ColorValue;
use Cloudinary\Transformation\Argument\Text\FontFamily;
use Cloudinary\Transformation\Argument\Text\FontStyle;
use Cloudinary\Transformation\Argument\Text\FontWeight;
use Cloudinary\Transformation\Argument\Text\TextDecoration;
use Cloudinary\Transformation\AudioCodec;
use Cloudinary\Transformation\AudioFrequency;
use Cloudinary\Transformation\AutoBackground;
use Cloudinary\Transformation\Background;
use Cloudinary\Transformation\Chroma;
use Cloudinary\Transformation\Codec\VideoCodecLevel;
use Cloudinary\Transformation\Codec\VideoCodecProfile;
use Cloudinary\Transformation\Color;
use Cloudinary\Transformation\CompassGravity;
use Cloudinary\Transformation\CornerRadius;
use Cloudinary\Transformation\CornerRadiusTrait;
use Cloudinary\Transformation\Crop;
use Cloudinary\Transformation\Effect;
use Cloudinary\Transformation\Expression\PVar;
use Cloudinary\Transformation\Fill;
use Cloudinary\Transformation\FocalGravity;
use Cloudinary\Transformation\Format;
use Cloudinary\Transformation\Gravity;
use Cloudinary\Transformation\Layer;
use Cloudinary\Transformation\Outline;
use Cloudinary\Transformation\Pad;
use Cloudinary\Transformation\Parameter;
use Cloudinary\Transformation\Parameter\VideoRange\VideoRange;
use Cloudinary\Transformation\Position;
use Cloudinary\Transformation\Quality;
use Cloudinary\Transformation\Resize;
use Cloudinary\Transformation\RoundCorners;
use Cloudinary\Transformation\Scale;
use Cloudinary\Transformation\Transformation;
use Cloudinary\Transformation\VideoCodec;
// Config

// Singleton
// Configuration::instance(['account' => ['cloud_name' => 'CLOUD_NEM', 'key' => 'API_KEY', 'secret' => 'API_SECRET']]);

// Constructor
$cloudinary = new Cloudinary('cloudinary://API_KEY:API_SECRET@CLOUD_NAME');
// print_r($cloudinary->configuration->account->cloudName);
// echo "\n";

# Alias the upload API
$uploader = $cloudinary->uploadApi();
#alias the admin API
$api = $cloudinary->adminApi();


# Upload

// Upload an image and supply a public id of 20 random characters
// image is the default
// print_r($uploader->upload('./assets/cheesecake.jpg'));

// Video
// print_r($uploader->upload('./assets/video.mp4',['resource_type'=>'video']));
// echo "\n";

// Raw
// print_r($uploader->upload('./assets/BLKCHCRY.TTF',['resource_type'=>'raw']));
// echo "\n";

// auto
print_r($uploader->upload('./assets/video.mp4',['resource_type'=>'auto']));
echo "\n";

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
print_r($uploader->upload('https://cdn.pixabay.com/photo/2015/03/26/09/39/cupcakes-690040__480.jpg'));
echo "\n";
