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
use Cloudinary\Transformation\RoundCorners;
use Cloudinary\Transformation\Compass;
use Cloudinary\Transformation\VideoSource;


# Config


# Constructor
// # $cloudinary = new Cloudinary('cloudinary://API_KEY:API_SECRET@CLOUD_NAME');
$cloudinary = new Cloudinary();
$cloudinary->configuration->url->analytics(false);
echo $cloudinary->configuration -> cloud -> cloudName . "\n";
$cloudinary->configuration->url->analytics(false);



# Round Corners (think CSS radius) - generate a circle for 1:1 aspect ratio and png format

// echo $cloudinary->image('dog.png')
//   ->resize(Resize::thumbnail(300,300,Gravity::auto()))
//   ->roundCorners(CornerRadius::max())
//   ->quality(Quality::auto()) . "\n";

# Next 2 sample yield the same transformation
# with addQualifier - if there was a new qualifier this could give you early access ???? correct ???
// echo $cloudinary->image('blackberry')
//     ->resize(Resize::thumbnail(300, 300, Gravity::auto()))
//     ->roundCorners(RoundCorners::max()
//         ->addQualifier(Border::solid()
//             ->width(10)
//             ->color(Color::rgb('#bde4fb'))))
//     ->format(Format::png())
//     ->quality(Quality::auto())  . "\n";

# with border action 
// echo 
//     $cloudinary->image('blackberry')
//     ->resize(Resize::thumbnail()
//         ->height(300)
//         ->width(300)
//         ->gravity(Gravity::auto()))
//     ->border(Border::solid()->width(10)
//         ->color(Color::rgb('#bde4fb'))
//         ->roundCorners(RoundCorners::max()))
//     ->format(Format::png())
//     ->quality(Quality::auto())
//     . "\n";

# add generic using raw transformation
// echo $cloudinary->image('blackberry')
//     // ->addTransformation("some new transformation")
//     ->addTransformation("c_thumb,g_auto,h_300,w_300/bo_10px_solid_rgb:bde4fb,r_max/f_png/q_auto")
//     ->version(123) . "\n";


# Background for padding
# you don't need gravity with padding because you'll get the whole image
// echo ($cloudinary->image('face')
//   ->resize(Resize::pad(300,200,Background::auto()))
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

# in the next 3 we see that you can't add 2 effect in same action
# tint
// echo ($cloudinary->image('face')
//     ->resize(Resize::thumbnail(300, 300, Gravity::auto()))
//     ->adjust(Adjust::tint(40, Color::MAGENTA))
//     ->quality(Quality::auto())
//     ->format(Format::auto()) . "\n");

# grayscale
// echo ($cloudinary->image('face')
//     ->resize(Resize::thumbnail(300, 300, Gravity::auto()))
//     ->effect(Effect::grayscale())
//     ->quality(Quality::auto())
//     ->format(Format::auto()) . "\n");

# duotone = grayscale + tint in chained transformation
# experiment with color and amount
// echo ($cloudinary->image('face')
//     ->resize(Resize::thumbnail(300, 300, Gravity::auto()))
//     ->effect(Effect::grayscale())
//     ->adjust(Adjust::tint(20, Color::MAGENTA))
//     ->quality(Quality::auto())
//     ->format(Format::auto()) . "\n");

# Improve color, contrast, light

//  echo ($cloudinary->image('blackberry')
//    ->resize(Resize::thumbnail(300,300,Gravity::auto()))
//    ->adjust(Adjust::improve())
//    ->quality(Quality::auto())
//    ->format(Format::auto()) . "\n");

// echo ($cloudinary->image('living-room')
//    ->resize(Resize::thumbnail(300,300,Gravity::auto()))
//    ->adjust(Adjust::improve(30)->indoor())
//    ->quality(Quality::auto())
//    ->format(Format::auto()) . "\n");


# Art filters
# zorro

// echo ($cloudinary->image('lake')
//   ->resize(Resize::thumbnail(300,300,Gravity::auto()))
//   ->effect(Effect::artisticFilter(ArtisticFilter::zorro()))
//   . "\n");

# cartoonify
# notice the difference when you change the order of effect and crop
// echo ($cloudinary->image('face')
//   ->resize(Resize::thumbnail(300,300,Gravity::auto()))
//   ->effect(Effect::cartoonify())
//   ->quality(Quality::auto())
//   ->format(Format::auto()) . "\n");

// echo ($cloudinary->image('face')
//   ->effect(Effect::cartoonify())
//   ->resize(Resize::thumbnail(300,300,Gravity::auto()))
//   ->quality(Quality::auto())
//   ->format(Format::auto()) . "\n");

# more on order makes a difference: crop first vs crop last
// echo $cloudinary->image('face') 
// -> effect(Effect::cartoonify())
// -> roundCorners(CornerRadius::max())
// -> effect(Effect::outline(100) -> color(Color::orange()))
// -> background(Color::lightblue())
// -> resize(Resize::scale() -> height(300)) 
// . "\n";

// echo $cloudinary->image('face') 
// -> resize(Resize::scale() -> height(300)) 
// -> effect(Effect::cartoonify())
// -> roundCorners(CornerRadius::max())
// -> effect(Effect::outline(100) -> color(Color::orange()))
// -> background(Color::lightblue())
// . "\n";


# Overlays

# Text over image - lots of options but fontFamily, fontSize and Text are required
# default position is center

// echo ($cloudinary->image('faces')
//     ->resize(Resize::thumbnail(300, 300, Gravity::faces()))
//     ->overlay(
//         Overlay::source(Source::text('Tutoring')
//             ->fontFamily('Arial')
//             ->fontSize(30)
//             ->fontWeight(FontWeight::BOLD) 
//             ->effect(Effect::colorize()->color(Color::YELLOW))
//             ->effect(
//                 Effect::outline(5)->color(Color::ORANGE)
//             ))
//             ->position((new Position())
//                 ->gravity(Gravity::compass(Compass::northWest()))
//                 ->offsetX(10)->offsetY(10))
//     )
//     ->roundCorners(30)
//     ->format(Format::auto()) . "\n");

# Image over image
// echo ($cloudinary->image('working')
//     ->resize(Resize::scale(400))
//     ->overlay(
//         Overlay::source(
//             Source::image('logo')
//                 ->resize(Resize::thumbnail(50, 50))
//                 ->adjust(Adjust::opacity(50))
//         )
//         ->position((new Position())
//             ->gravity(Gravity::compass(Compass::northEast()))
//             ->offsetX(10)->offsetY(10))
//     )
// ) . "\n";


# Text over video

// echo ($cloudinary->video('video')
//   ->resize(Resize::scale(300))
//   ->overlay(
//     Overlay::VideoSource(VideoSource::text('Earth')
//             ->fontFamily('Arial')
//             ->fontSize(30)
//             ->fontWeight(FontWeight::BOLD) 
//             ->effect(Effect::colorize()->color(Color::BLUE))
//             ->effect(Effect::outline(5) -> color(Color::GREEN)
//     ))  
//     ->position((new Position())
//         ->gravity(Gravity::compass(Compass::northWest()))
//         ->offsetX(10)->offsetY(10)
//     )
//   )
// ) . "\n";

# from https://cloudinary.com/documentation/video_manipulation_and_delivery#adding_text_overlays
use Cloudinary\Tag\VideoTag;
use Cloudinary\Transformation\VideoTransformation;
use Cloudinary\Transformation\Timeline;
use Cloudinary\Transformation\TextStyle;


echo (new VideoTag('video'))
  ->overlay(Overlay::source(Source::text('Cool Video', (new TextStyle('arial', 60))))
  // ->effect(Effect::colorize()->color(Color::BLUE))
    ->position((new Position())
      ->gravity(Gravity::compass(Compass::south()))
      ->offsetY(80))
    ->timeline(Timeline::position()->startOffset(2)->endOffset(5)));
  


# Image over Video

// echo ($cloudinary->video('video')
//   ->resize(Resize::scale(400))
//   ->overlay(
//     Overlay::Source(VideoSource::image('logo')
//       ->resize(Resize::thumbnail(50, 50))
//       ->adjust(Adjust::opacity(30))
//   )
//   ->position((new Position())
//                 ->gravity(Gravity::compass(Compass::northWest()))
//                 ->offsetX(10)->offsetY(10))
//   )
// ). "\n";
