# Cloudinary Intro using PHP #

https://cloudinary.com/documentation/sdks/php/Cloudinary/Cloudinary.html


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

## not sure if the following do anything
use \Cloudinary\Configuration\Configuration;
use \Cloudinary\Transformation\Resize;
use \Cloudinary\Transformation\Effect;
use Cloudinary\Asset\DeliveryType;  //for fetch
```

There are 2 ways you can make the credentials available.

```php
$cloudinary = new \Cloudinary\Cloudinary('cloudinary://API_KEY:API_SECRET@CLOUD_NAME');
print_r($cloudinary->configuration);
print_r($cloudinary->configuration->account->cloudName);
```

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


```php
// try instance
// can't get instance to work
use Cloudinary\Configuration\Configuration;
\Cloudinary\Configuration\Configuration::instance(['account' => ['cloud_name' => 'CLOUD_NAME', 'key' => 'API_KEY', 'secret' => 'API_SECRET']]);

// $cld_config = new \Cloudinary\Configuration\Configuration;
// require_once('Cloudinary\Configuration\Configuration');



\Cloudinary\Configuration\Configuration::instance(['account' => ['cloud_name' => 'CLOUD_NAME', 'key' => 'API_KEY', 'secret' => 'API_SECRET']]);


```







## Exercises
You will see that the images and video to be used in the exercises are in the `assets` directory.
And we will be using `echo` or `print_r` to display the return value or array.

## Upload

### default
Upload an image and supply a public id of 20 random characters

```php
#alias the upload API
$uploader = $cloudinary->uploadApi();
#alias the admin API
$api = $cloudinary->adminApi();
```


```php
# alias the upload API

print_r($uploader->upload('./assets/cheesecake.jpg'));
#or
print_r($cloudinary->uploadApi()->upload('./assets/cheesecake.jpg'));

```

### video
```php
print_r($cloudinary->uploadApi()->upload('./assets/video.mp4',['resource_type'=>'video']));
```

### raw
```php
print_r($cloudinary->uploadApi()->upload('./assets/BLKCHCRY.TTF',['resource_type'=>'raw']));
```

### auto
```php
print_r($cloudinary->uploadApi()->upload('./assets/video.mp4',['resource_type'=>'auto']));
```

### upload options
#### Assign public_id
```php
print_r($cloudinary->uploadApi()->upload('./assets/face.jpg',['public_id'=>'face']));
```

#### Use filename, unique
```php
print_r($cloudinary->uploadApi()->upload('./assets/cheesecake.jpg',['use_filename'=>true,'unique_filename'=>true]));
```

#### Use filename, not unique
```php
print_r($cloudinary->uploadApi()->upload('./assets/cheesecake.jpg',['use_filename'=>true,'unique_filename'=>false]));
```

#### Specify folder name
```php
print_r($cloudinary->uploadApi()->upload('./assets/cheesecake.jpg',['folder'=>'food/my_favorite/']));
```

#### Let Cloudinary create folder on the fly from public id
```php
print_r($cloudinary->uploadApi()->upload('./assets/dog.jpg',['folder'=>'pets/my_favorite/dog']));
```

### Remote asset upload from remote (https)
```php
print_r($cloudinary->uploadApi()->upload('https://cdn.pixabay.com/photo/2015/03/26/09/39/cupcakes-690040__480.jpg'));
```

## Preset

You can create these manually in the DAM or using script.

### Unsigned Preset
You can use this for front end widgets and API calls.  You don't need to hide secrets.  You would usually use this in an app hosted on a secured web page.  It can't be used to upload in Media Library. Before you can use unsigned presets you need to click on a link in setting in the DAM.

#### Create a new Admin API object:
```php
$api = $cloudinary->adminApi();

```

#### Create Un-Signed Preset
We're adding a tag and limiting formats that can be uploaded.
```php

print_r($api->createUploadPreset([
    'name'              => 'unsigned-name',
    'unsigned'          => true,
    'tags'              => 'unsigned',
    'allowed_formats'   => 'jpg,png',
]));
// print_r($api->create_upload_preset([
//     'name'              => 'unsigned-name',
//     'unsigned'          => true,
//     'tags'              => 'unsigned',
//     'allowed_formats'   => 'jpg,png',
// ]));
```

#### Use Un-Signed Preset in Upload
```php
print_r($cloudinary->uploadApi()->unsignedUpload('./assets/logo.png','unsigned-name'));

// print_r(\Cloudinary\Uploader::unsigned_upload('./assets/logo.png','unsigned-name'));
```

### Signed Preset
Use the signed preset for backend scripts with access to API_SECRET credentials.  If you want to use a preset in the DAM it must be signed.


#### Create Signed Preset
We're adding a tag and limiting formats that can be uploaded.
```php
print_r($api->createUploadPreset([
    'name'              => 'signed-name',
    'unsigned'          => false,
    'tags'              => 'signed',
    'allowed_formats'   => 'jpg,png',
]));
```

#### Use Signed Preset 
```php
print_r($cloudinary->uploadApi()->upload('./assets/lake.jpg',['upload_preset'=>'signed-name']));

// print_r(\Cloudinary\Uploader::upload('./assets/lake.jpg',['upload_preset'=>'signed-name']));
```

## Auto-upload and Fetch

Fetch and Auto-upload are techniques for moving assets from remote locations into your cloud.  While the Upload API allows you to load from remote locations, these techniques are good for loading assets into the cloud only when they are requested by the user.

Instead of using API calls to upload and cache assets, we'll create URLs and then when we request the URL in the browser, the asset will get loaded and cached.

### Fetch
Fetch lets you load an asset by specifying the remote URL with a "fetch" delivery type.  When using the Upload API we were using the "upload" delivery type and we didn't specify it because it was the default.  You saw the term `upload` in the URLs in the Upload API response.  In order to use fetch, we'll specify "fetch" when we create a URL.

```php 
// pattern
// echo $cloudinary->image(…)->deliveryType(DeliveryType::FETCH)
 
echo $cloudinary->image('https://cdn.pixabay.com/photo/2015/03/26/09/39/cupcakes-690040__480.jpg')->deliveryType(\Cloudinary\Asset\DeliveryType::FETCH);

//old way
// echo cloudinary_url('https://cdn.pixabay.com/photo/2015/03/26/09/39/cupcakes-690040__480.jpg',['type'=>'fetch']);
```

### Auto-upload
In order to use Auto-Upload you need to go to the DAM settings upload tab.  Add a mapping between a directory in your cloud and a remote path.  For this exercise, create a mapping between `remote-media` and `https://cloudinary-training.github.io/cld-advanced-concepts/assets/`.  Notice we are specifying a specific asset, but a path.

Fetch can only be used for images, but Auto upload can be used for all asset types.

We use the URL helper in the Ruby SDK to create a URL.

#### Auto-upload Video

```php
# 1st param is width 2nd height
echo $cloudinary->video('remote-media/video/snowboarding')->scale(300);
echo $cloudinary->image('cheesecake')->scale(300);

# using resize and effect
use \Cloudinary\Transformation\Resize;
use \Cloudinary\Transformation\Effect;
print_r($cloudinary->image('cheesecake') -> resize(\Cloudinary\Transformation\Resize::scale(200, 200))->effect(\Cloudinary\Transformation\Effect::sepia()));

echo $cloudinary->image('cheesecake') 
-> resize(\Cloudinary\Transformation\Resize::scale()->height(200))
-> effect(\Cloudinary\Transformation\Effect::sepia())->toUrl();

// echo cloudinary_url('remote-media/video/snowboarding',['resource_type'=>'video','transformation'=>['width'=>300,'crop'=>'scale']]);
```

#### Auto-upload Image

```php

echo cloudinary_url('remote-media/images/dolphin',['transformation'=>['width'=>300,'crop'=>'scale']]);
```

#### Auto-upload Raw

```php
echo $cloudinary->raw('remote-media/raw/data.json');
echo cloudinary_url('remote-media/raw/data.json',['resource_type'=>'raw']);
```

## Manage

### Create a new Admin API object:
```php
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
# Reupload cheesecake if needed 
```php
print_r(\Cloudinary\Uploader::upload('./assets/cheesecake.jpg',['public_id'=>'cheesecake']));
print_r(\Cloudinary\Uploader::rename('cheesecake','my_cheesecake',['overwrite'=>true]));
```

### Remove an asset

Deleting from a CDN is different that deleting from a database.  It can take time for the asset to be fully removed.  After you've removed an asset, when you got to your browser to check that its not available, remember that your browser can cache so be sure that browser caching is disabled when you test.

#### Upload API: `destroy`
Use `invalide:true` to remove from CDN.  May take some time depending on CDN.  You remove only 1 asset at a time with the Upload API.

#### load a file to delete, invalidate is false by default, doesn't remove derived
```php
print_r(\Cloudinary\Uploader::upload('./assets/lake.jpg',['public_id'=>'lake']));
print_r(\Cloudinary\Uploader::destroy('lake',['invalidate'=>true]));
```

#### Admin API: `delete_resource`
You can remove multiple assets at a time with the Admin API.  There is a daily quota.

```php
# upload 2 assets and them remove them
print_r(\Cloudinary\Uploader::upload('./assets/dog.jpg',['public_id'=>'dog']));
print_r(\Cloudinary\Uploader::upload('./assets/lake.jpg',['public_id'=>'lake']));
print_r($api->delete_resources(['dog','lake'],['invalidate'=>true]));
```

### Tag on Upload
You can supply tags and other metadata like Context on upload.  You can then find assets by tag.
```php
// by array
print_r(\Cloudinary\Uploader::upload('./assets/blackberry.jpg',['public_id'=>'blackberry','tags'=>['fruit','berries']]));

// by string with comma-separated
print_r(\Cloudinary\Uploader::upload('./assets/blackberry.jpg',['public_id'=>'blackberry','tags'=>'fruit,berries']));
print_r($api->resources_by_tag('berries',['tags'=>true]));
```

### Tag after upload 
You can add tags to assets that are already in the Media Library.  You can also include an option, `tags:true` to show all tags per asset found in the result.
```php
print_r(\Cloudinary\Uploader::upload('./assets/lake.jpg',['public_id'=>'lake']));
print_r(\Cloudinary\Uploader::add_tag('water','lake'));
print_r($api->resources_by_tag('water',['tags'=>true]));
```

### Remove a single tag by name; search by removed tag and unremoved tag
```php
print_r(\Cloudinary\Uploader::remove_tag('berries','blackberry'));
print_r($api->resources_by_tag('berries',['tags'=>true]));
print_r($api->resources_by_tag('fruit',['tags'=>true]));
```

### Remove all tags list of public ids to remove tags
```php
print_r(\Cloudinary\Uploader::remove_all_tags(['blackberry','lake']));
print_r($api->resources_by_tag('fruit',['tags'=>true]));
print_r($api->resources_by_tag('water',['tags'=>true]));
```

## Upload for Transformations
In order to have a set of assets available for delivery scripts, please run the following:

```php
print_r(\Cloudinary\Uploader::upload('./assets/blackberry.jpg',['public_id'=>'blackberry']));
print_r(\Cloudinary\Uploader::upload('./assets/BLKCHCRY.TTF','resource_type'=>'raw']));
print_r(\Cloudinary\Uploader::upload('./assets/cheesecake.jpg',['public_id'=>'cheesecake']));
print_r(\Cloudinary\Uploader::upload('./assets/dog.jpg',['public_id'=>'dog']));
print_r(\Cloudinary\Uploader::upload('./assets/face.jpg',['public_id'=>'face']));
print_r(\Cloudinary\Uploader::upload('./assets/faces.jpg',['public_id'=>'faces']));
print_r(\Cloudinary\Uploader::upload('./assets/lake.jpg',['public_id'=>'lake']));
print_r(\Cloudinary\Uploader::upload('./assets/logo.png',['public_id'=>'logo']));
print_r(\Cloudinary\Uploader::upload('./assets/video.mp4',['public_id'=>'video','resource_type'=>'raw']));
print_r(\Cloudinary\Uploader::upload('./assets/demo-cloudinary-logo.png',['public_id'=>'demo/cloudinary_logo']));
print_r(\Cloudinary\Uploader::upload('./assets/heather_texture.png',['public_id'=>'demo/heather_texture']));
print_r(\Cloudinary\Uploader::upload('./assets/model2.png',['public_id'=>'demo/model2']));
print_r(\Cloudinary\Uploader::upload('./assets/shirt_only.png',['public_id'=>'demo/shirt_only']));
print_r(\Cloudinary\Uploader::upload('./assets/shirt_only.png',['public_id'=>'demo/shirt_displace']));
print_r(\Cloudinary\Uploader::upload('https://images.pexels.com/photos/230325/pexels-photo-230325.jpeg',['public_id'=>'cookies']));
print_r(\Cloudinary\Uploader::upload('./assets/working.jpg',['public_id'=>'working']));
```

## Optimization Transformations
Look at cropping, compression and optimal browser formats.  Cropping modes (scale, crop, thumb, fit, fill, and more) have different use cases and different options available.

### Cropping

#### scale: Default copping mode with 1 dimension is scale
```php
echo cloudinary_url('cheesecake',['transformation'=>['width'=>300,'crop'=>'scale']]);
```
If you add a second dimension with the `scale` crop mode, it may skew the image depending the image's original aspect ratio.
```php
echo cloudinary_url('cheesecake',['transformation'=>['width'=>300,'height'=>300,'crop'=>'scale']]);
```

#### fit: Applying 2 dimensions to a crop mode without skew
You can use the `fit` mode to guarantee that the image will render without skew within the boundaries defined by the `width` and `height` options.  However, the dimensions of the image may not match the `width` and `height` when you use `fit`.
```php
echo cloudinary_url('cheesecake',['transformation'=>['width'=>300,'height'=>300,'crop'=>'fit']]);
```

#### pad: Apply 2 dimensions with no skew 
```php
echo cloudinary_url('cheesecake',['transformation'=>['width'=>300,'height'=>300,'crop'=>'pad']]);
```

#### crop: Intro to Gravity
Gravity provides focus.  You can apply compass point gravity or let Cloudinary find the focus using `gravity: auto`.  You can only use gravity with the `crop`, `fill`, `fill_pad` (auto only), and `thumb` crop modes.

#### Crop mode without gravity
Without gravity, all you see is a chunk of dog fur.
```php
echo cloudinary_url('dog',['transformation'=>['width'=>300,'height'=>300,'crop'=>'crop']]);
```

#### Crop mode with gravity
In these examples you see the effect of gravity working with the `thumb` mode.
```php
echo cloudinary_url('dog',['transformation'=>['width'=>300,'height'=>300,'crop'=>'thumb','gravity'=>'auto']]);
echo cloudinary_url('cheesecake',['transformation'=>['width'=>300,'height'=>300,'crop'=>'thumb','gravity'=>'auto']]);
```

#### Crop with gravity:auto, fill vs thumb
Not all crop types can use gravity, only: `crop`, `fill`, `lfill`, `fill_pad` or `thumb`
```php
echo cloudinary_url('face',['transformation'=>['width'=>300,'height'=>300,'crop'=>'fill','gravity'=>'auto']]);
echo cloudinary_url('face',['transformation'=>['width'=>300,'height'=>300,'crop'=>'thumb','gravity'=>'auto']]);
```

#### debug gravity auto
Generate a URL with gravity auto and debug to better understand how the AI that detects objects is working.  The `gravity:auto` option appears in the URL as `g_auto`.
# TODO, is it ok to share?

#### gravity:face
Cloudinary can detect faces.  Specify gravity for the face.
```php
echo cloudinary_url('working',['transformation'=>['width'=>300,'height'=>300,'crop'=>'crop','gravity'=>'face']]);
echo cloudinary_url('working',['transformation'=>['width'=>300,'height'=>300,'crop'=>'thumb','gravity'=>'face']]);
```

#### Branding and Watermarking using cropping
```php
echo cloudinary_url('logo',['transformation'=>['width'=>100,'height'=>100,'crop'=>'thumb']]);
echo cloudinary_url('cloudinary-logo',['transformation'=>['width'=>100,'crop'=>'scale']]);
```

### Compression

Compression is provided with the `quality` option.  You can specify a numeric value form 0-100 with 100 being the highest quality and the least compression.  You can also let Cloudinary determine the best quality with the least size by using `quality: auto`.  The is a recommended best practice.

Use Cloudinary Media Inspector in the browser to compare file size in the following images.
```php
echo cloudinary_url('cookies');
echo cloudinary_url('cookies',['transformation'=>['quality'=>'auto']]);
```

### Browser file formats
Different browsers can render different file formats.  Formats provide optimization in terms of size. and quality.

Use `fetch_format: auto` which translates to `f_auto` to let Cloudinary return an image container that is optimized for the requesting browser.

Format optimization handled at the CDN layer.

* webp: chrome, firefox, edge
* ogg: safari
* jpg: all browsers

In the example below we generate "auto everything"
```php
// without auto format
echo cloudinary_url('lake',['transformation'=>['height'=>400,'crop'=>'fill','gravity'=>'auto','quality'=>'auto']]);

// with auto format
echo cloudinary_url('lake',['transformation'=>['height'=>400,'crop'=>'fill','gravity'=>'auto','quality'=>'auto','fetch_format'=>'auto']]);
```

## Aesthetic Transformations
Use aesthetic options to achieve results and styling similar to what you find with CSS or Photoshop.

### radius
Similar to CSS radius.  The `radius: max` will generate a circle for a 1:1 aspect ratio.
```php
// radius rounded corners and transparent background
echo cloudinary_url('dog', [
    'transformation' => [
        'width'         => 300,
        'height'        => 300,
        'crop'          => 'thumb',
        'gravity'       => 'auto',
        'fetch_format'  => 'png',
        'quality'       => 'auto',
        'radius'        => 'max',
    ],
]);
```

### borders
Add borders with a syntax similar to CSS.  You can use HTML Color names, rgb, or rgba.
```php
echo cloudinary_url('blackberry', [
    'transformation' => [
        'border'    => '10px_solid_rgb:bde4fb',
        'width'     => 300,
        'height'    => 300,
        'crop'      => 'thumb',
        'gravity'   => 'auto',
        'fetch_format'=> 'auto',
        'quality'   => 'auto',
        'radius'    => 'max',
    ],
]);
```

### Add background when there is padding
```php
// crop pad to capture full image with padding to prevent skew
// change AR vertical to horizontal 
echo cloudinary_url('face', [
    'transformation' => [
        'width'         => 300,
        'height'        => 200,
        'crop'          => 'pad',
        'fetch_format'  => 'auto',
        'quality'       => 'auto',
        'background'    => 'red',
    ],
]);
```

### Effect option

#### Outline transparent images
Use the `effect` option. Set the width of the outline in pixels. 
```php
echo cloudinary_url('blackberry', [
    'transformation' => [
        'width'         => 300,
        'height'        => 300,
        'crop'          => 'thumb',
        'gravity'       => 'auto',
        'quality'       => 'auto',
        'effect'        => 'outline:15',
        'color'         => 'orange',
        'fetch_format'  => 'png'
    ],
]);
```

#### Improve color, contrast and light
```php
echo cloudinary_url('lake', [
    'transformation' => [
        'width'     => 300,
        'height'    => 300,
        'crop'      => 'thumb',
        'gravity'   => 'auto',
        'fetch_format'=> 'auto',
        'quality'   => 'auto',
        'effect'    => 'improve',
    ],
]);
```

#### Art filters

##### "zorro" is one of many
```php
echo cloudinary_url('lake', [
    'transformation' => [
        'width'         => 300,
        'height'        => 300,
        'crop'          => 'thumb',
        'gravity'       => 'auto',
        'fetch_format'  => 'auto',
        'quality'       => 'auto',
        'effect'        => 'art:zorro',
    ],
]);
```

##### "cartoonify"
```php
echo cloudinary_url('face', [
    'transformation' => [
        'width'         => 300,
        'height'        => 300,
        'crop'          => 'thumb',
        'gravity'       => 'face',
        'fetch_format'  => 'auto',
        'quality'       => 'auto',
        'effect'        => 'cartoonify',
    ],
]);

##### "tint": try different colors and intensities
```php
echo cloudinary_url('face', [
    'transformation' => [
        'width'         => 300,
        'height'        => 300,
        'crop'          => 'thumb',
        'gravity'       => 'face',
        'fetch_format'  => 'auto',
        'quality'       => 'auto',
        'effect'        => 'tint:40:magenta',
    ],
]);
```

##### "duotone"
This is a chained transformation.  It instructs Cloudinary to run transformations in sequence.  First a grayscale is set and then the grayscale is tinted. It's coded as an array of transformation objects.  In the URL, you'll see the transformations separated by `/`.
```php
echo cloudinary_url('face', [
    'transformation' => [
       [ 
            'width'         => 300,
            'height'        => 300,
            'crop'          => 'thumb',
            'gravity'       => 'face',
            'effect'        => 'grayscale',
        ],[
            'effect'        => 'tint:40:magenta',
        ],[
            'fetch_format'  => 'auto',
            'quality'       => 'auto',
        ],
    ],
]);
```

### Overlays
* Text can be laid over images or video
* Images can be laid over images or video
* Video can be laid over images or video

#### Text over image
Required options are font_family, font_size, and text.
```php
echo cloudinary_url('faces', [
    'transformation' => [
        [ 
            'width'         => 300,
            'height'        => 300,
            'crop'          => 'thumb',
        ],[
            'overlay'       => [
                'font_family'   => 'Arial',
                'font_size'     => 30,
                'text'          => 'Tutoring',
            ],
            'background'    => 'white',
            'color'         => 'blue',
            'gravity'       => 'north_west',
            'y'             => 10,
            'x'             => 10,
        ],
    ],
]);
```

#### Image over video
```php
echo cloudinary_url('video', [
    'resource_type'  => 'video',
    'transformation' => [
        [ 
            'width'         => 400,
            'crop'          => 'scale',
        ],[
            'overlay'       => 'cloudinary-logo',
            'height'        => 25,
            'gravity'       => 'south_east',
        ],
    ],
]);
```

#### Text over video
```php
echo cloudinary_url('video', [
    'resource_type'  => 'video',
    'transformation' => [
        [ 
            'width'         => 300,
            'crop'          => 'scale',
        ],[
            'overlay'       => [
                'font_family'   => 'Arial',
                'font_size'     => 30,
                'text'          => 'Earth',
            ],
            'background'    => 'white',
            'color'         => 'blue',
            'gravity'       => 'north_west',
            'y'             => 10,
            'x'             => 10,
        ],
    ],
]);
```

## Named Transformations
You can create a transformation template by using named transformations.  They cleanup your URLs to make them better for SEO.  If you want to hide your transformations or underlying assets used in overlays, named transformations can help.

### Create a named transformation from a string

```php
// Create a new Admin API object:
$api = new \Cloudinary\Api();

print_r($api->create_transformation('standard','w_150,h_150,c_thumb,g_auto'));
```

### Use named transformation
Notice that the named you use to create the named transformation gets prefixed with a `t_` when you use it in URL.

```php
echo cloudinary_url('cheesecake',['transformation'=>['transformation'=>'standard']]);
```

### Use a named transformation with f_auto

You can't include `f_auto` in a named transformation because it is handled at the CDN and not by internal Cloudinary servers.  You can chain the `f_auto` to your named transformation as shown below.

If the named transformation already exists you'll get an error letting your know.

```php
echo cloudinary_url('cheesecake',['transformation'=>['transformation'=>'standard','fetch_format'=>'auto']]);
```

### A super complex chained transformation

#### The transformation

```php
echo cloudinary_url('demo/shirt_only.png', [
	'transformation'	=> [
		[
            'opacity'		=> 0,
		],[
            'overlay'       => 'demo:cloudinary_logo',
            'effect'        => 'brightness:-21',
            'x'             => -5,
            'y'             => -200,
            'width'         => 324,
		],[
            'overlay'       => [
                'font_family'   => 'Coustard',
                'font_size'     => 100,
                'color'         => 'rgb:999999',
                'font_weight'   => 'bold',
                'text'          => 'Hello Jon',
            ],
            'opacity'       => 70,
            'y'             => 0,
            'width'         => 365,
		],[
            'overlay'       => 'demo:shirt_displace',
            'effect'        => 'displace',
            'x'             => 10,
            'y'             => 10,
		],[
            'underlay'      => 'demo:shirt_only',
            'effect'        => 'red:-50',
		],[
            'underlay'      => 'demo:model2',
		],[
            'overlay'       => 'demo:heather_texture',
            'opacity'       => 29,
		],[
            'fetch_format'  => 'auto',
		],
	],
]);
```

#### make it a named transformation
Don't include `f_auto`

```php
// Create a new Admin API object if you haven't from the previous one:
$api = new \Cloudinary\Api();

print_r($api->create_transformation('complex', [
	'transformation'	=> [
		[
            'opacity'		=> 0,
		],[
            'overlay'       => 'demo:cloudinary_logo',
            'effect'        => 'brightness:-21',
            'x'             => -5,
            'y'             => -200,
            'width'         => 324,
		],[
            'overlay'       => [
                'font_family'   => 'Coustard',
                'font_size'     => 100,
                'color'         => 'rgb:999999',
                'font_weight'   => 'bold',
                'text'          => 'Hello Jon',
            ],
            'opacity'       => 70,
            'y'             => 0,
            'width'         => 365,
		],[
            'overlay'       => 'demo:shirt_displace',
            'effect'        => 'displace',
            'x'             => 10,
            'y'             => 10,
		],[
            'underlay'      => 'demo:shirt_only',
            'effect'        => 'red:-50',
		],[
            'underlay'      => 'demo:model2',
		],[
            'overlay'       => 'demo:heather_texture',
            'opacity'       => 29,
		],
	],
]));
```

### The complex transformation is now easier to use
We can add `f_auto` to it.

```php
echo cloudinary_url('demo/shirt_only.png',['transformation'=>['transformation'=>'complex','fetch_format'=>'auto']]);
```
