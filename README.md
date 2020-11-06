# Cloudinary Intro using PHP #

https://cloudinary.com/documentation/sdks/php/Cloudinary/Cloudinary.html

* Upload
* Presets
* Auto-upload-Fetch
* Manage
* Upload For Transformations
* Optimization Transformations
* Aesthetic Transformations
* Named Transformations


### Mac
Mac comes with PHP installed.
To install the latest version of PHP use HomeBrew.  You can [install Homebrew](https://brew.sh/) 

```bash
brew install php
php --version
```
### Windows

https://windows.php.net/

## Install Composer

```bash
curl -s https://getcomposer.org/installer | php sudo mv ./composer.phar /usr/local/bin/composer composer --version
```

## Setup to run scripts

Install Cloudinary via composer

```bash
composer require cloudinary/cloudinary_php
 ```
This will create a `composer.json` and `composer.lock`.  For example:

```js
{
    "require": {
        "cloudinary/cloudinary_php": "2.0.0-beta7"
    }
}
```

To enter PHP CLI:

```php
php -a
```
## PHP CLI

Add Cloudinary Library:

```php
require_once 'vendor/autoload.php';
```

There are 2 ways you can make the credentials available.  

## Constructor 

Use this for new PHP SDK2 code to create an instance of the Cloudinary object:

```php
$cloudinary = new \Cloudinary\Cloudinary('cloudinary://API_KEY:API_SECRET@CLOUD_NAME');
print_r($cloudinary->configuration);
print_r($cloudinary->configuration->account->cloudName);
```

or  

```php
$cloudinary = new Cloudinary(
    [
        'account' => [
            'cloud_name' => 'CLOUD_NAME',
            'key'        => 'API_KEY',
            'secret'     => 'API_SECRET',
        ],
    ]
);
```

### Singleton  

Use this for migrating code to PHP SDK2 to create a singleton that allows functionality similar to SDK1.  

```php
// only for migration
use Cloudinary\Configuration\Configuration;
Configuration::instance(['account' => ['cloud_name' => 'CLOUD_NAME', 'key' => 'API_KEY', 'secret' => 'API_SECRET']]);
```

## Exercises
You will see that the images and video to be used in the exercises are in the `assets` directory.
And we will be using `echo` or `print_r` to display the return value or array.

## Upload

### Classes to import for the exercise

```php
use Cloudinary\Cloudinary;
```

### Upload API

```php
#reference the upload API
$uploader = $cloudinary->uploadApi();
```

### default
Upload an image and supply a public id of 20 random characters

```php
print_r($uploader->upload('./assets/cheesecake.jpg'));
```

### video
```php
print_r($uploader->upload('./assets/video.mp4',['resource_type'=>'video']));
```

### raw
```php
print_r($uploader->upload('./assets/BLKCHCRY.TTF',['resource_type'=>'raw']));
```

### auto
```php
print_r($uploader->upload('./assets/video.mp4',['resource_type'=>'auto']));
```

### upload options
#### Assign public_id
```php
print_r($uploader->upload('./assets/face.jpg',['public_id'=>'face']));
```

#### Use filename, unique
```php
print_r($uploader->upload('./assets/cheesecake.jpg',['use_filename'=>true,'unique_filename'=>true]));
```

### Use filename, not unique
```php
print_r($cloudinary->uploadApi()->upload('./assets/cheesecake.jpg',['use_filename'=>true,'unique_filename'=>false]));
```

### Specify folder name
```php
print_r($uploader->upload('./assets/cheesecake.jpg',['folder'=>'food/my_favorite/']));
```

### Let Cloudinary create folder on the fly from public id
```php
print_r($uploader->upload('./assets/dog.jpg',['folder'=>'pets/my_favorite/dog']));
```

### Remote asset upload from remote (https)
```php
print_r($uploader->upload('https://cdn.pixabay.com/photo/2015/03/26/09/39/cupcakes-690040__480.jpg'));
```

## Preset

You can create these manually in the DAM or using script.

### Unsigned Preset
You can use this for front end widgets and API calls.  You don't need to hide secrets.  You would usually use this in an app hosted on a secured web page.  It can't be used to upload in Media Library. Before you can use unsigned presets you need to click on a link in setting in the DAM.

### Create a new Upload and Admin API references:
```php
$uploader = $cloudinary->uploadApi();
$api = $cloudinary->adminApi();
```

### Classes to import for the exercise

```php
use Cloudinary\Cloudinary;
```

#### Create Un-Signed Preset
We're adding a tag and limiting formats that can be uploaded.

```php
print_r($api->createUploadPreset([
  'name'              => 'unsigned-preset',
  'unsigned'          => true,
  'tags'              => 'unsigned',
  'allowed_formats'   => 'jpg,png',
]));
```

#### Use Un-Signed Preset in Upload
```php
print_r($uploader->upload('./assets/logo.png',['upload_preset'=>'unsigned-preset']));
```

### Signed Preset
Use the signed preset for backend scripts with access to API_SECRET credentials.  If you want to use a preset in the DAM it must be signed.

### Use the Preset in an HTML file (frontend)
Add your cloud name and preset name to the index.html and use the upload widget with the unsigned preset.

#### Create Signed Preset
We're adding a tag and limiting formats that can be uploaded.
```php
print_r($api->createUploadPreset([
    'name'              => 'signed-preset',
    'unsigned'          => false,
    'tags'              => 'signed',
    'allowed_formats'   => 'jpg,png',
]));
```

#### Use Signed Preset 

```php
print_r($uploader->upload('./assets/lake.jpg',['upload_preset'=>'signed-preset']));
```

## Auto-upload and Fetch

Fetch and Auto-upload are techniques for moving assets from remote locations into your cloud.  While the Upload API allows you to load from remote locations, these techniques are good for loading assets into the cloud only when they are requested by the user.

Instead of using API calls to upload and cache assets, we'll create URLs and then when we request the URL in the browser, the asset will get loaded and cached.

### Fetch
Fetch lets you load an asset by specifying the remote URL with a "fetch" delivery type.  When using the Upload API we were using the "upload" delivery type and we didn't specify it because it was the default.  You saw the term `upload` in the URLs in the Upload API response.  In order to use fetch, we'll specify "fetch" when we create a URL.

## Classes to use in the exercise

```php
use Cloudinary\Cloudinary;
use Cloudinary\Asset\DeliveryType;
use Cloudinary\Transformation\Resize;

```

```php 
// pattern
echo $cloudinary->image('https://cdn.pixabay.com/photo/2015/03/26/09/39/cupcakes-690040__480.jpg')
  ->deliveryType(\Cloudinary\Asset\DeliveryType::FETCH) . "\n";
```

### Auto-upload
In order to use Auto-Upload you need to go to the DAM settings upload tab.  Add a mapping between a directory in your cloud and a remote path.  For this exercise, create a mapping between `remote-media` and `https://cloudinary-training.github.io/cld-advanced-concepts/assets/`.  Notice we are specifying a specific asset, but a path.

Fetch can only be used for images, but Auto upload can be used for all asset types.

We use the URL helper in the Ruby SDK to create a URL.

### Auto-upload Image with Cropping

```php
echo $cloudinary->image('remote-media/images/dolphin')
  ->resize(Resize::scale()->width(300)) . "\n";
```
### Auto-upload Video with Cropping

```php
echo $cloudinary->video('remote-media/video/snowboarding')
  ->resize(Resize::scale()->width(300)) . "\n";
```

### Auto-upload Raw

```php
echo $cloudinary->raw('remote-media/raw/data.json') . "\n";
```

## Manage

### Classes to Import for Exercise

```php
use Cloudinary\Cloudinary;
```

### Create Upload and API references
```php
$uploader = $cloudinary->uploadApi();

$api = new \Cloudinary\Api();
```

### List all assets (default is 10)
```php
print_r($api->resources());
```

### List up to 500 assets
```php
print_r($api->resources(['max_results'=>500]));
```

###  Search by prefix (public id "starts with")
```php
print_r($api->resources(['type'=>'upload','prefix'=>'sample']));
```

### Rename an asset default overwrite is false
### Re-upload cheesecake if needed 

```php
print_r($uploader->upload('./assets/cheesecake.jpg',['public_id'=>'cheesecake']));
print_r($uploader->rename('cheesecake','my_cheesecake',['overwrite'=>true]));
// 
```

### Remove an asset

Deleting from a CDN is different that deleting from a database.  It can take time for the asset to be fully removed.  After you've removed an asset, when you got to your browser to check that its not available, remember that your browser can cache so be sure that browser caching is disabled when you test.

#### Upload API: `destroy`
Use `invalide:true` to remove from CDN.  May take some time depending on CDN.  You remove only 1 asset at a time with the Upload API.

#### load a file to delete, invalidate is false by default, doesn't remove derived

```php
print_r($uploader->upload('./assets/lake.jpg',['public_id'=>'lake']));
print_r($uploader->destroy('lake',['invalidate'=>true]));
```

#### Admin API: `delete_resource`
You can remove multiple assets at a time with the Admin API.  There is a daily quota.

```php
# upload 2 assets and them remove them
print_r($uploader->upload('./assets/dog.jpg',['public_id'=>'dog']));
print_r($uploader->upload('./assets/lake.jpg',['public_id'=>'lake']));
print_r($api->deleteResources(['dog','lake'],['invalidate'=>true]));
```

### Tag on Upload
You can supply tags and other metadata like Context on upload.  You can then find assets by tag.

```php
print_r($uploader->upload('./assets/blackberry.jpg',['public_id'=>'blackberry','tags'=>'fruit,berries']));

print_r($api->resourcesByTag('berries',['tags'=>true]));
```

### Tag after upload 
You can add tags to assets that are already in the Media Library.  You can also include an option, `tags:true` to show all tags per asset found in the result.

```php
print_r($uploader->upload('./assets/lake.jpg',['public_id'=>'lake']));
print_r($uploader->addTag('water','lake'));
print_r($api->resourcesByTag('water',['tags'=>true]));
```

### Remove a single tag by name; search by removed tag and un-removed tag

```php
print_r($uploader->removeTag('berries','blackberry'));
print_r($api->resourcesByTag('berries',['tags'=>true]));
print_r($api->resourcesByTag('fruit',['tags'=>true]));
```
### -------?????
### Remove all tags list of public ids to remove tags
```php
print_r($uploader->removeAllTags(['blackberry','lake']));
print_r($api->resourcesByTag('fruit',['tags'=>true]));
print_r($api->resourcesByTag('water',['tags'=>true]));
```

## Upload for Transformations
In order to have a set of assets available for delivery scripts, upload the following assets.

### Use these Classes

```php
use Cloudinary\Cloudinary;
```

```php
print_r($uploader->upload('./assets/blackberry.jpg',['public_id'=>'blackberry'])["public_id"]);

print_r($uploader->upload('./assets/cheesecake.jpg',['public_id'=>'cheesecake'])["public_id"]);

print_r($uploader->upload('./assets/dog.jpg',['public_id'=>'dog'])["public_id"]);

print_r($uploader->upload('./assets/face.jpg',['public_id'=>'face'])["public_id"]);

print_r($uploader->upload('./assets/faces.jpg',['public_id'=>'faces'])["public_id"]);

print_r($uploader->upload('./assets/lake.jpg',['public_id'=>'lake'])["public_id"]);

print_r($uploader->upload('./assets/logo.png',['public_id'=>'logo'])["public_id"]);

print_r($uploader->upload('./assets/video.mp4',['public_id'=>'video','resource_type'=>'raw'])["public_id"]);

print_r($uploader->upload('./assets/shirt_only.png',['public_id'=>'shirt_only'])["public_id"]);

print_r($uploader->upload('https://images.pexels.com/photos/230325/pexels-photo-230325.jpeg',['public_id'=>'cookies'])["public_id"]);

print_r($uploader->upload('./assets/working.jpg',['public_id'=>'working'])["public_id"]);

```

## Optimization Transformations
Look at cropping, compression and optimal browser formats.  Cropping modes (scale, crop, thumb, fit, fill, and more) have different use cases and different options available.

### Classes to use for exercise

```php
use Cloudinary\Cloudinary;
use Cloudinary\Transformation\Resize;
use Cloudinary\Transformation\Gravity;
use Cloudinary\Transformation\Crop;
use Cloudinary\Transformation\Quality;
use Cloudinary\Transformation\Format;
```

### Cropping

#### scale: Default copping mode with 1 dimension is scale
```php
echo ($cloudinary->image('cheesecake')->resize(Resize::scale(300)) . "\n");
```
If you add a second dimension with the `scale` crop mode, it may skew the image depending the image's original aspect ratio.
```php
echo cloudinary_url('cheesecake',['transformation'=>['width'=>300,'height'=>300,'crop'=>'scale']]);
```

#### fit: Applying 2 dimensions to a crop mode without skew
You can use the `fit` mode to guarantee that the image will render without skew within the boundaries defined by the `width` and `height` options.  However, the dimensions of the image may not match the `width` and `height` when you use `fit`.

```php
echo ($cloudinary->image('cheesecake')->resize(Resize::scale(300,400)) . "\n");
echo ($cloudinary->image('cheesecake')->resize(Resize::scale()->width(300)->height(400)) . "\n");

echo ($cloudinary->image('cheesecake')->resize(Resize::fit()->width(300)->height(400)) . "\n");

```

#### pad: Apply 2 dimensions with no skew 
```php
echo ($cloudinary->image('cheesecake')->resize(Resize::pad()->width(300)->height(400)) . "\n");
```

### crop: Intro to Gravity
Gravity provides focus.  You can apply compass point gravity or let Cloudinary find the focus using `gravity: auto`.  You can only use gravity with the `crop`, `fill`, `fill_pad` (auto only), and `thumb` crop modes.

#### Crop mode without gravity
Without gravity, all you see is a chunk of dog fur. 
```php
echo ($cloudinary->image('dog')->resize(Resize::crop()->width(300)->height(300)) . "\n");

```

#### Crop mode with gravity
In these examples you see the effect of gravity working with the `thumb` mode.
```php
echo ($cloudinary->image('dog')->resize(Resize::thumbnail(300,300,Gravity::auto())) . "\n");
```

#### Crop with gravity:auto, fill vs fill-pad
Not all crop types can use gravity, only: `crop`, `fill`, `lfill`, `fill_pad` or `thumb`
```php
echo ($cloudinary->image('working')->resize(Resize::fill(400,400,Gravity::auto())) . "\n");

echo ($cloudinary->image('working')->resize(Resize::fillPad(400,400,Gravity::auto())) . "\n");

```

#### Gravity with compass positions

```php
echo ($cloudinary->image('face')->resize(Resize::thumbnail(300,300,Gravity::south())) . "\n");
echo ($cloudinary->image('face')->resize(Resize::thumbnail(300,300,Gravity::north())) . "\n");
```
#### Gravity: Fill vs Thumb

```php
echo ($cloudinary->image('face')->resize(Resize::fill(300,300,Gravity::auto())) . "\n");
echo ($cloudinary->image('face')->resize(Resize::thumbnail(300,300,Gravity::auto())) . "\n");
```

#### gravity:face
Cloudinary can detect faces.  Specify gravity for the face.
```php
echo ($cloudinary->image('working')->resize(Resize::thumbnail(300,300,Gravity::face())) . "\n");

echo ($cloudinary->image('working')->resize(Resize::thumbnail(300,300)) . "\n");


```

#### Branding and Watermarking using cropping
 2 different ways to specify width and height
```php
echo ($cloudinary->image('logo')->resize(Resize::thumbnail()->width(100)->height(100)) . "\n");

echo ($cloudinary->image('logo')->resize(Resize::thumbnail(100,100)) . "\n");

```

### Compression

Compression is provided with the `quality` option.  You can specify a numeric value form 0-100 with 100 being the highest quality and the least compression.  You can also let Cloudinary determine the best quality with the least size by using `quality: auto`.  The is a recommended best practice.

Use Cloudinary Media Inspector in the browser to compare file size in the following images.
```php
echo ($cloudinary->image('cookies') . "\n");
echo ($cloudinary->image('cookies')->quality(Quality::auto()). "\n");
```

### Browser file formats
Image file formats provide standards for storing image data and can be compressed or uncompressed. Compressed formats can be lossy or non-lossy. Different devices and browsers can render different file formats. Cloudinary can optimize to provide the best format for the device or browser requesting the image.

Use format: auto which translates to f_auto to let Cloudinary return an image container that is optimized for the requesting browser. Format optimization handled at the CDN layer.

Support for file formats is constantly evolving. Some examples of common image and video formats are:

webp: Chrome, Edge, Firefox, Safari (image)
jpg: Chrome, Edge, Firefox, Internet Explorer, Opera, Safari (image)
webm: Chrome, Edge, Firefox (video)
ogv: Chrome, Edge, Firefox (video)

In the example below we generate "auto everything"

```php
// without auto format
echo cloudinary_url('lake',[
    'transformation'=>[
        'height'=>400,
        'crop'=>'fill',
        'gravity'=>'auto',
        'quality'=>'auto'
    ]
]);

// with auto format
echo cloudinary_url('lake',[
    'transformation'=>[
        'height'=>400,
        'crop'=>'fill',
        'gravity'=>'auto',
        'quality'=>'auto',
        'fetch_format'=>'auto'
    ]
]);
```

## Aesthetic Transformations
Use aesthetic options to achieve results and styling similar to what you find with CSS or Photoshop.

### Classes to use in exercise

```php
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
```

### radius
Similar to CSS radius.  The `radius: max` will generate a circle for a 1:1 aspect ratio.
```php
// radius rounded corners and transparent background
echo ($cloudinary->image('dog')
  ->resize(Resize::thumbnail(300,300,Gravity::auto()))
  ->roundCorners(CornerRadius::max())
  ->format(Format::png())
  ->quality(Quality::auto()) . "\n");
```

### borders
Add borders with a syntax similar to CSS.  You can use HTML Color names, rgb, or rgba.
```php
echo ($cloudinary->image('blackberry')
  ->resize(Resize::thumbnail(300,300,Gravity::auto()))
  ->border(Border::solid()->width(10)->color(Color::rgb('#bde4fb')))
  ->format(Format::png())
  ->quality(Quality::auto()) . "\n");
```

### Add background when there is padding
```php
// crop pad to capture full image with padding to prevent skew
// change AR vertical to horizontal 
// use a white border to see the auto padding
echo ($cloudinary->image('face')
  ->resize(Resize::pad(300,200,Background::auto())
  ->gravity(Gravity::south()))
  ->border(Border::solid()->width(10)->color(Color::WHITE))
  ->quality(Quality::auto())
  ->format(Format::auto()) . "\n");
```

### Effect option

#### Outline transparent images
Use the `effect` option. Set the width of the outline in pixels. 

```php
echo ($cloudinary->image('blackberry')
  ->resize(Resize::thumbnail(300,300,Gravity::auto()))
  ->effect(Effect::outline(15) -> color(Color::ORANGE))
  ->quality(Quality::auto())
  ->format(Format::png()) . "\n");
```

#### Improve color, contrast and light
Try commenting out the Improve effect to see the difference.

```php
echo ($cloudinary->image('blackberry')
  ->resize(Resize::thumbnail(300,300,Gravity::auto()))
  ->effect(Improve::OUTDOOR())
  ->quality(Quality::auto())
  ->format(Format::auto()) . "\n");
```

#### Art filters

##### "zorro" is one of many
```php
echo ($cloudinary->image('lake')
  ->resize(Resize::thumbnail(300,300,Gravity::auto()))
  ->effect(ArtisticFilter::zorro())
  ->quality(Quality::auto())
  
```

##### "cartoonify"
```php
echo ($cloudinary->image('face')
  ->resize(Resize::thumbnail(300,300,Gravity::auto()))
  ->effect(Effect::cartoonify())
  ->quality(Quality::auto())
  ->format(Format::auto()) . "\n");
```

##### "tint": try different colors and intensities
```php
echo ($cloudinary->image('face')
  ->resize(Resize::thumbnail(300,300,Gravity::auto()))
  ->effect(Effect::cartoonify())
  ->quality(Quality::auto())
  ->format(Format::auto()) . "\n");

echo ($cloudinary->image('face')
  ->resize(Resize::thumbnail(300,300,Gravity::auto()))
  ->adjust(Adjust::tint(40, Color::MAGENTA))
  ->quality(Quality::auto())
  ->format(Format::auto()) . "\n");
```

##### "duotone"
This is a chained transformation.  It instructs Cloudinary to run transformations in sequence.  First a grayscale is set and then the grayscale is tinted. It's coded as an array of transformation objects.  In the URL, you'll see the transformations separated by `/`.
```php
echo ($cloudinary->image('face')
  ->resize(Resize::thumbnail(300,300,Gravity::auto()))
  ->effect(Effect::grayscale())
  ->adjust(Adjust::tint(20, Color::MAGENTA))
  ->quality(Quality::auto())
  ->format(Format::auto()) . "\n");
```

### Overlays
* Text can be laid over images or video
* Images can be laid over images or video
* Video can be laid over images or video

#### Text over image
Required options are font_family, font_size, and text.
```php
https://res.cloudinary.com/sep-2020-test/image/upload/c_thumb,g_faces,h_300,w_300/l_text:Arial_30_bold:Tutoring/co_yellow,e_colorize/co_orange,e_outline:5/fl_layer_apply,g_north_west,x_10,y_10/r_30/f_auto/faces
```

#### Text over image

```php
echo ($cloudinary->image('faces')
  ->resize(Resize::thumbnail(300,300,Gravity::faces()))
  ->overlay(
    Source::text('Tutoring')
      ->fontFamily('Arial')
      ->fontSize(30)
      ->fontWeight(FontWeight::BOLD) //weight is optional
      ->effect(Effect::colorize()->color(Color::YELLOW))
      ->effect(Effect::outline(5) -> color(Color::ORANGE)
      //// ->background(Color::WHITE)//how to add background to text?
  ),
    Position::northWest()->x(10)->y(10)
  )
  ->roundCorners(30)
  ->format(Format::auto()) . "\n");
```

#### Image over Image

```php
echo ($cloudinary->image('working')
  ->resize(Resize::scale(400))
  ->overlay(
    Source::image('logo')
      ->resize(Resize::thumbnail(50, 50))
      ->adjust(Adjust::opacity(30))
    ,
    Position::northEast()->x(10)->y(10)
  )
). "\n";

```

#### Text over video
```php
echo ($cloudinary->video('video')
  ->resize(Resize::scale(400))
  ->overlay(
    Source::image('logo')
      ->resize(Resize::thumbnail(50, 50))
      ->adjust(Adjust::opacity(30))
    ,
    Position::northEast()->x(10)->y(10)
  )
). "\n";
```

## Named Transformations
You can create a transformation template by using named transformations.  They cleanup your URLs to make them better for SEO.  If you want to hide your transformations or underlying assets used in overlays, named transformations can help.

## Classes to import for the exercise

```php
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
```

### Create a named transformation from a string

```php
// Create a new Admin API object:
$api = $cloudinary->adminApi();

print_r($api->createTransformation('standard','w_150,h_150,c_thumb,g_auto'));
```

### Use named transformation
Notice that the named you use to create the named transformation gets prefixed with a `t_` when you use it in URL.

```php
echo $cloudinary->image('cheesecake')
    ->namedTransformation('standard') 
    ->toUrl();
```

### Use a named transformation with f_auto

You can't include `f_auto` in a named transformation because it is handled at the CDN and not by internal Cloudinary servers.  You can chain the `f_auto` to your named transformation as shown below.

If the named transformation already exists you'll get an error letting your know.

```php
 echo $cloudinary->image('cheesecake')
    ->namedTransformation('standard') 
    ->format(Format::auto())
    ->toUrl();
```

### A super complex chained transformation

#### The transformation

```php
echo $cloudinary->image('shirt_only.png')
  ->overlay(
    Source::image('logo')
      ->resize(Resize::scale(300))
      ->adjust(Adjust::brightness(-21))
      ->roundCorners(CornerRadius::max()),
    Position::center()->x(-10)->y(-200)  
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
    Position::center()->x(-10),
   ) 
->toUrl() . "\n";
```

#### make it a named transformation
Don't include `f_auto`

```php
// Create a new Admin API object if you haven't from the previous one:
$api = new \Cloudinary\Api();

print_r($api->createTransformation('tshirt','l_logo/c_scale,w_300/e_brightness:-21/r_max/fl_layer_apply,g_center,x_-10,y_-200/l_text:Coustard_100_bold:Hello Jon/c_scale,w_365/o_70/co_rgb:999999,e_colorize/fl_layer_apply,g_center,x_-10/f_auto'));

```

### The complex transformation is now easier to use
We can add `f_auto` to it.

```php
echo $cloudinary->image('shirt_only.png')
->namedTransformation('tshirt') 
->format(Format::auto())
->toUrl() 
```
### Singleton

