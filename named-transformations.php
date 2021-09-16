<?php
require_once __DIR__ . '/vendor/autoload.php';

use Cloudinary\Cloudinary;
use Cloudinary\Transformation\Adjust;
use Cloudinary\Transformation\Effect;
use Cloudinary\Transformation\Format;
use Cloudinary\Transformation\Resize;
use Cloudinary\Transformation\Source;
use Cloudinary\Transformation\Gravity;
use Cloudinary\Transformation\Overlay;
use Cloudinary\Transformation\Position;
use Cloudinary\Transformation\CornerRadius;
use Cloudinary\Transformation\Argument\Color;
use Cloudinary\Transformation\Transformation;
use Cloudinary\Transformation\ImageTransformation;
use Cloudinary\Transformation\Argument\Text\FontWeight;

# Config
# Constructor

$cloudinary = new Cloudinary();
$cloudinary->configuration->url->analytics(false);
echo $cloudinary->configuration->cloud->cloudName . "\n";

#alias the admin API
$api = $cloudinary->adminApi();

# Create a simple named transformation from a string
// echo json_encode(
//   $api->createTransformation("standard", (new Transformation())->resize(Resize::thumbnail(150, 150, Gravity::auto())))
// ,JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES) . "\n";

# Use named transformation standard
// echo $cloudinary->image('cheesecake')
//   ->namedTransformation('standard') . "\n";

# using named transform with f_auto: chain
// echo $cloudinary->image('cheesecake')
//  ->namedTransformation('standard')
//  ->format(Format::auto()) . "\n";

# build out the transformation in code

# code without a variable
// echo $cloudinary->image('face')
//     ->resize(Resize::thumbnail(300, 300, Gravity::auto()))
//     ->effect(Effect::grayscale())
//     ->adjust(Adjust::tint(20, Color::MAGENTA)) . "\n";

# create a transformation variable

// $transformation = new ImageTransformation();
// $transformation
//  ->resize(Resize::thumbnail(300, 300, Gravity::auto()))
//  ->effect(Effect::grayscale())
//  ->adjust(Adjust::tint(20, Color::MAGENTA));

# add the transformation to an image
// echo ($cloudinary->image('face') -> addTransformation($transformation)) . "\n";

# create a named transformation for duotone
// echo json_encode($api->createTransformation('duotone', $transformation), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "\n";

# use the named transformation
// echo $cloudinary->image('face')
//  ->namedTransformation('duotone') . "\n";

# here's a complex transformation
// echo $cloudinary->image('shirt_only.png')
//  ->overlay(
//   Overlay::source(
//    Source::image('logo')
//     ->resize(Resize::scale(300))
//     ->adjust(Adjust::brightness(-21))
//     ->roundCorners(CornerRadius::max())
//   )->position((new Position())->offsetX(10)->offsetY(-200))
//  )
//  ->overlay(
//   Overlay::source(
//    Source::text('Hello Jon')
//     ->fontFamily('Coustard')
//     ->fontSize(100)
//     ->fontWeight(FontWeight::BOLD)
//     ->resize(Resize::scale(365))
//     ->adjust(Adjust::opacity(70))
//     ->effect(
//      Effect::colorize()->color(Color::rgb('#999999'))
//     )
//   )->position((new Position())->offsetX(-10))
//  ) . "\n";

# create a named transformation for the complex transformation
// echo json_encode($api->createTransformation('tshirt',
// 'l_logo/c_scale,w_300/e_brightness:-21/r_max/fl_layer_apply,x_10,y_-200/l_text:Coustard_100_bold:Hello Jon/c_scale,w_365/o_70/co_rgb:999999,e_colorize/fl_layer_apply,x_-10')) . "\n";

# using named transform with f_auto: chain
// echo $cloudinary->image('shirt_only')
//  ->namedTransformation('tshirt')
//  ->format(Format::auto()) . "\n";
