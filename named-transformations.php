<?php
require_once __DIR__ . '/vendor/autoload.php';

use Cloudinary\Cloudinary;
use Cloudinary\Transformation\Resize;
use Cloudinary\Transformation\Format;
use Cloudinary\Transformation\CornerRadius;
use Cloudinary\Transformation\Argument\Color;
use Cloudinary\Transformation\Effect;
use Cloudinary\Transformation\Adjust;
use Cloudinary\Transformation\Argument\Text\FontWeight;
use Cloudinary\Transformation\Source;
use Cloudinary\Transformation\Position;
use Cloudinary\Transformation\Gravity;

use Cloudinary\Transformation\Transformation;

# Config
# Constructor

$cloudinary = new Cloudinary();
print_r($cloudinary->configuration->account->cloudName);

echo "\n";

#alias the admin API
$api = $cloudinary->adminApi();

# Create a simple named transformation from a string

// print_r($api->createTransformation('standard','w_150,h_150,c_thumb,g_auto'));




# Use named transformation
// echo $cloudinary->image('cheesecake')
// ->namedTransformation('standard') 
// ->toUrl() . "\n";

// # using named transform with f_auto: chain
// echo $cloudinary->image('cheesecake')
// ->namedTransformation('standard') 
// ->format(Format::auto())
// ->toUrl() . "\n";

# build out the transformation in code

// $tranformation = new Transformation();
// $tranformation
//   ->resize(Resize::thumbnail(300,300,Gravity::auto()))
//   ->effect(Effect::grayscale())
//   ->adjust(Adjust::tint(20, Color::MAGENTA));
//   print_r($api->createTransformation('duotone',$tranformation));

//   echo $cloudinary->image('face')
// ->namedTransformation('duotone') 
// ->toUrl() . "\n";


# here's a complex transformation
// echo $cloudinary->image('shirt_only.png')
//   ->overlay(
//     Source::image('logo')
//       ->resize(Resize::scale(300))
//       ->adjust(Adjust::brightness(-21))
//       ->roundCorners(CornerRadius::max()),
//     Position::center()->x(-10)->y(-200)  
//   )
//   ->overlay(
//     Source::text('Hello Jon')
//       ->fontFamily('Coustard')
//       ->fontSize(100)
//       ->fontWeight(FontWeight::BOLD) 
//       ->resize(Resize::scale(365))
//       ->adjust(Adjust::opacity(70))
//       ->effect(Effect::colorize()->color(Color::rgb('#999999'))
//   ),
//     Position::center()->x(-10),
//    ) 
// ->toUrl() . "\n";

# create a named transformation for the complex transformation
// print_r($api->createTransformation('tshirt','l_logo/c_scale,w_300/e_brightness:-21/r_max/fl_layer_apply,g_center,x_-10,y_-200/l_text:Coustard_100_bold:Hello Jon/c_scale,w_365/o_70/co_rgb:999999,e_colorize/fl_layer_apply,g_center,x_-10/f_auto'));

# using named transform with f_auto: chain
// echo $cloudinary->image('shirt_only.png')
// ->namedTransformation('tshirt') 
// ->format(Format::auto())
// ->toUrl() . "\n";



