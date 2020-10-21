<?php


require_once __DIR__ . '/vendor/autoload.php';

use Cloudinary\Asset\Video;
use Cloudinary\Cloudinary;
use Cloudinary\Configuration\Configuration;
use Cloudinary\Transformation\Resize;
use Cloudinary\Transformation\Gravity;
use Cloudinary\Transformation\Crop;
use Cloudinary\Transformation\Quality;
use Cloudinary\Transformation\Format;
use Cloudinary\Transformation\CornerRadius;
use Cloudinary\Transformation\Border;
use Cloudinary\Transformation\Background;
use Cloudinary\Transformation\Argument;
use Cloudinary\Transformation\Argument\Color;
use Cloudinary\Transformation\Effect;
use Cloudinary\Transformation\Improve;
use Cloudinary\Transformation\ArtisticFilter;
// use Cloudinary\Media;
use Cloudinary\Transformation\Adjust;
use Cloudinary\Tag\ImageTag;
use Cloudinary\Transformation\Cartoonify;

use function Cloudinary\Samples\groupToString;

# Config

# Singleton - can't use for aliasing
# $cloudinary = Configuration::instance(['account' => ['cloud_name' => 'CLOUD_NAME', 'api_key' => 'API_KEY', 'api_secret' => 'API_SECRET']]);

// print_r($cloudinary);

# Constructor

# $cloudinary = new Cloudinary('cloudinary://API_KEY:API_SECRET@CLOUD_NAME');
print_r($cloudinary->configuration->account->cloudName);

echo "\n";



# Radius - generate a cirucle for 1:1 aspect ratio and png format

// echo ($cloudinary->image('dog')
//   ->resize(Resize::thumbnail(300,300,Gravity::auto()))
//   ->roundCorners(CornerRadius::max())
//   ->format(Format::png())
//   ->quality(Quality::auto()) . "\n");

# Borders
# '10px_solid_rgb:bde4fb'
// echo ($cloudinary->image('blackberry')
//   ->resize(Resize::thumbnail(300,300,Gravity::auto()))
//   ->border(Border::solid()->width(10)->color(Color::rgb('#bde4fb')))
//   ->format(Format::png())
//   ->quality(Quality::auto()) . "\n");

# Background for padding
# can't use gravity auto with pad but you can direct the location of the padding

// echo ($cloudinary->image('face')
//   ->resize(Resize::pad(300,200,Background::auto())->gravity(Gravity::south()))
//   ->quality(Quality::auto())
//   ->format(Format::auto()) . "\n");

// echo ($cloudinary->image('face')
//   ->resize(Resize::pad(300,200,Background::color(Color::RED))->gravity(Gravity::south()))
//   ->quality(Quality::auto())
//   ->format(Format::auto()) . "\n");

// echo ($cloudinary->image('face')
//   ->resize(Resize::pad(300,200,Background::color(Color::RED))->gravity(Gravity::east()))
//   ->quality(Quality::auto())
//   ->format(Format::auto()) . "\n");

# Effect

# Outline transparent
// echo ($cloudinary->image('blackberry')
//   ->resize(Resize::thumbnail(300,300,Gravity::auto()))
//   ->effect(Effect::outline(15) -> color(Color::ORANGE))
//   ->quality(Quality::auto())
//   ->format(Format::png()) . "\n");


# Improve color, contrast, light
// echo ($cloudinary->image('blackberry')
//   ->resize(Resize::thumbnail(300,300,Gravity::auto()))
//   ->effect(Improve::OUTDOOR())
//   ->quality(Quality::auto())
//   ->format(Format::auto()) . "\n");


# Art filters
# zorro

// echo ($cloudinary->image('lake')
//   ->resize(Resize::thumbnail(300,300,Gravity::auto()))
//   ->effect(ArtisticFilter::zorro())
//   ->quality(Quality::auto())
//   ->format(Format::auto()) . "\n");

# cartoonify
# use Cloudinary\Transformation\MiscEffectTrait;

// echo ($cloudinary->image('face')
//   ->resize(Resize::thumbnail(300,300,Gravity::auto()))
//   ->effect(Effect::cartoonify())
//   ->quality(Quality::auto())
//   ->format(Format::auto()) . "\n");

# tint
// use Cloudinary\Transformation\ImageAdjustmentTrait;

// echo ($cloudinary->image('face')
//   ->resize(Resize::thumbnail(300,300,Gravity::auto()))
//   ->effect(Effect::grayscale())
//   ->quality(Quality::auto())
//   ->format(Format::auto()) . "\n");

// echo ($cloudinary->image('face')
//   ->resize(Resize::thumbnail(300,300,Gravity::auto()))
//   ->adjust(Adjust::tint(40, Color::MAGENTA))
//   ->quality(Quality::auto())
//   ->format(Format::auto()) . "\n");

# try different colors and intensities


# duotone
# experiment with color and amount
// echo ($cloudinary->image('face')
//   ->resize(Resize::thumbnail(300,300,Gravity::auto()))
//   ->effect(Effect::grayscale())
//   ->adjust(Adjust::tint(20, Color::MAGENTA))
//   ->quality(Quality::auto())
//   ->format(Format::auto()) . "\n");



# Overlays

#Text over image


# Image over video

# Text over video


# migration example not working
print_r(ImageTag::fromParams("lake", 
array("transformation"=>array(
// Media::fromParams("lake", array("transformation"=>array(
  array("effect"=>"cartoonify"),
  array("radius"=>"max"),
  array("effect"=>"outline:100", "color"=>"lightblue"),
  array("background"=>"lightblue"),
  array("height"=>300, "crop"=>"scale")
  ))));
  





