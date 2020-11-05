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

use Cloudinary\Transformation\Adjust;
use Cloudinary\Tag\ImageTag;
use Cloudinary\Transformation\Argument\Text\FontWeight;
use Cloudinary\Transformation\Cartoonify;


use Cloudinary\Transformation\Overlay;
use Cloudinary\Transformation\Source;
use Cloudinary\Transformation\Position;
use Cloudinary\Transformation\LayerSource;

# Config

# Singleton - can't use for aliasing
# $cloudinary = Configuration::instance(['account' => ['cloud_name' => 'CLOUD_NAME', 'api_key' => 'API_KEY', 'api_secret' => 'API_SECRET']]);

// print_r($cloudinary);

# Constructor

# $cloudinary = new Cloudinary('cloudinary://API_KEY:API_SECRET@CLOUD_NAME');
$cloudinary = new Cloudinary('cloudinary://892275429346483:TqPTlL652atsfH4CWGv8ot7PAdg@sep-2020-test');


print_r($cloudinary->configuration->account->cloudName);

echo "\n";

#alias the admin API
$api = $cloudinary->adminApi();

# Create a named transformation from a string

// print_r($api->createTransformation('standard','w_150,h_150,c_thumb,g_auto'));

# Use named transformation

// echo $cloudinary->image('cheesecake')
// ->namedTransformation('standard') 
// ->toUrl() . "\n";

# using named transform with f_auto: chain
// echo $cloudinary->image('cheesecake')
// ->namedTransformation('standard') 
// ->format(Format::auto())
// ->toUrl() . "\n";

# a complex chained transformation
echo $cloudinary->image('demo/shirt_only.png')
->adjust(Adjust::opacity(0))
  ->overlay(
    Source::image('demo:cloudinary_logo')
      ->resize(Resize::scale(324))
      ->adjust(Adjust::brightness(-21)),
    Position::center()->x(-5)->y(-200)  
  )
  ->overlay(
    Source::text('Hello Jon')
      ->fontFamily('Coustard')
      ->fontSize(100)
      ->fontWeight(FontWeight::BOLD) 
      ->resize(Resize::scale(365))
      ->adjust(Adjust::opacity(70))
      ->effect(Effect::colorize()->color(Color::rgb('#999999'))
  ),
    Position::center()->y(0),
  )
  ->overlay(
    Source::image('demo:shirt_displace'),
      //  ->effect(Effect::displace),
    // Position::center()->x(10)->y(10)  
  )
  ->overlay(
    Source::image('demo:shirt_only')
      ->effect(Effect::colorize()->color(Color::RED,-50))
  )
  ->underlay(
    Source::image('demo:model2')
  )
  ->overlay(
    Source::image('demo:heather_texture')
      ->adjust(Adjust::opacity(29))
  ) 
->format(Format::auto())
->toUrl() . "\n";





