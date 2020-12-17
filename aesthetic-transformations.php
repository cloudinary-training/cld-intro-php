<?php
require_once __DIR__ . '/vendor/autoload.php';

use Cloudinary\Cloudinary;
use Cloudinary\Asset\Video;
use Cloudinary\Transformation\Resize;
use Cloudinary\Transformation\Gravity;
use Cloudinary\Transformation\Quality;
use Cloudinary\Transformation\Format;
use Cloudinary\Transformation\CornerRadius;
use Cloudinary\Transformation\Border;
use Cloudinary\Transformation\Background;
use Cloudinary\Transformation\Argument\Color;
use Cloudinary\Transformation\Effect;
use Cloudinary\Transformation\Improve;
use Cloudinary\Transformation\ArtisticFilter;
use Cloudinary\Transformation\Adjust;
use Cloudinary\Transformation\Argument\Text\FontWeight;
use Cloudinary\Transformation\Cartoonify;
use Cloudinary\Transformation\Overlay;
use Cloudinary\Transformation\Source;
use Cloudinary\Transformation\Position;

# Config


# Constructor
# $cloudinary = new Cloudinary('cloudinary://API_KEY:API_SECRET@CLOUD_NAME');
$cloudinary = new Cloudinary();
echo $cloudinary->configuration->account->cloudName  . "\n";


# Radius - generate a cirucle for 1:1 aspect ratio and png format

// echo $cloudinary->image('dog')
//   ->resize(Resize::thumbnail(300,300,Gravity::auto()))
//   ->roundCorners(CornerRadius::max())
//   ->format(Format::png())
//   ->quality(Quality::auto()) . "\n";

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
//   ->resize(Resize::pad(300,200,Background::auto())
//   ->border(Border::solid()->width(10)->color(Color::WHITE))
//   ->quality(Quality::auto())
//   ->format(Format::auto()) . "\n");

# Effect
# Outline transparent

// echo ($cloudinary->image('grapes')
//   ->resize(Resize::scale(300))
//   ->effect(Effect::outline(15) -> color(Color::ORANGE))
//   ->quality(Quality::auto())
//   ->format(Format::png()) . "\n");


# tint
// echo ($cloudinary->image('face')
//   ->resize(Resize::thumbnail(300,300,Gravity::auto()))
//   ->adjust(Adjust::tint(40, Color::MAGENTA))
//   ->quality(Quality::auto())
//   ->format(Format::auto()) . "\n");

# grayscale
// echo ($cloudinary->image('face')
//   ->resize(Resize::thumbnail(300,300,Gravity::auto()))
//   ->effect(Effect::grayscale())
//   ->quality(Quality::auto())
//   ->format(Format::auto()) . "\n");

# duotone = grayscale + tint in chained transformation
# experiment with color and amount
// echo ($cloudinary->image('face')
//   ->resize(Resize::thumbnail(300,300,Gravity::auto()))
//   ->effect(Effect::grayscale())
//   ->adjust(Adjust::tint(20, Color::MAGENTA))
//   ->quality(Quality::auto())
//   ->format(Format::auto()) . "\n");

# Improve color, contrast, light

// echo ($cloudinary->image('blackberry')
//   ->resize(Resize::thumbnail(300,300,Gravity::auto()))
//   ->adjust(Adjust::improve())
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

// echo $cloudinary->image('face') 
// -> effect(Effect::cartoonify())
// -> roundCorners(CornerRadius::max())
// -> effect(Effect::outline(100) -> color(Color::orange()))
// -> background(Color::lightblue())
// -> resize(Resize::scale() -> height(300)) . "\n";


# Overlays

# Text over image

// echo ($cloudinary->image('faces')
//   ->resize(Resize::thumbnail(300,300,Gravity::faces()))
//   ->overlay(
//     Source::text('Tutoring')
//       ->fontFamily('Arial')
//       ->fontSize(30)
//       ->fontWeight(FontWeight::BOLD) //weight is optional
//       ->effect(Effect::colorize()->color(Color::YELLOW))
//       ->effect(Effect::outline(5) -> color(Color::ORANGE)
//   ),
//     Position::northWest()->x(10)->y(10)
//   )
//   ->roundCorners(30)
//   ->format(Format::auto()) . "\n");

# Image over image

// echo ($cloudinary->image('working')
//   ->resize(Resize::scale(400))
//   ->overlay(
//     Source::image('logo')
//       ->resize(Resize::thumbnail(50, 50))
//       ->adjust(Adjust::opacity(30))
//     ,
//     Position::northEast()->x(10)->y(10)
//   )
// ). "\n";



# Text over video

// echo ($cloudinary->video('video')
//   ->resize(Resize::scale(300))
//   ->overlay(
//     Source::text('Earth')
//       ->fontFamily('Arial')
//       ->fontSize(30)
//       ->fontWeight(FontWeight::BOLD) //weight is optional
//       ->effect(Effect::colorize()->color(Color::BLUE))
//       ->effect(Effect::outline(5) -> color(Color::GREEN))
//     ,
//     Position::northWest()->x(10)->y(10)
//   )
// ). "\n";

# Image over Video

// echo ($cloudinary->video('video')
//   ->resize(Resize::scale(400))
//   ->overlay(
//     Source::image('logo')
//       ->resize(Resize::thumbnail(50, 50))
//       ->adjust(Adjust::opacity(30))
//     ,
//     Position::northEast()->x(10)->y(10)
//   )
// ). "\n";
?>