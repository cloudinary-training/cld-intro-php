<?php


require_once __DIR__ . '/vendor/autoload.php';

use Cloudinary\Cloudinary;
use Cloudinary\Transformation\Resize;
use Cloudinary\Transformation\Gravity;
use Cloudinary\Transformation\Crop;
use Cloudinary\Transformation\Quality;
use Cloudinary\Transformation\Format;


# Config
# Constructor

$cloudinary = new Cloudinary();
echo $cloudinary->configuration->account->cloudName . "\n";

# Cropping

# scale is default - accepts 2 ints and first is width, second is height
# scale default cropping mode with 1 dimension is scale

// echo ($cloudinary->image('cheesecake')->resize(Resize::scale(300)) . "\n");

# scale with 2 dimensions may skew 

// echo ($cloudinary->image('cheesecake')->resize(Resize::scale(300,400)) . "\n");
// echo ($cloudinary->image('cheesecake')->resize(Resize::scale()->width(300)->height(400)) . "\n");

# fit: applying 2 dimensins without skew
# media info shows width 300 and height adjusted to prevent skew
// echo ($cloudinary->image('cheesecake')->resize(Resize::fit()->width(300)->height(400)) . "\n");

# pad: applying 2 dimensions without skew
# media info shows a 300 x 400 image
// echo ($cloudinary->image('cheesecake')->resize(Resize::pad()->width(300)->height(400)) . "\n");

# Use crop mode classes need to add use Cloudinary\Transformation\... to pick up the 

# crop: Intro to Gravity
# using the Crop function and the Resize produce same string
# no gravity just a chunk of dog fur
// echo ($cloudinary->image('dog')->resize(Resize::crop()->width(300)->height(300)) . "\n");

# crop mode with Gravity using Resize:thumbnail mode
// echo ($cloudinary->image('dog')->resize(Resize::thumbnail(300,300,Gravity::auto())) . "\n");

# crop modes that use gravity: fill, lfill, fill_pad, and thumbnail
// echo ($cloudinary->image('working')->resize(Resize::fill(400,400,Gravity::auto())) . "\n");

# fill_pad 
// echo ($cloudinary->image('working')->resize(Resize::fillPad(400,400,Gravity::auto())) . "\n");


# gravity can also take on compass positions compare north and south
// echo ($cloudinary->image('face')->resize(Resize::thumbnail(300,300,Gravity::south())) . "\n");
// echo ($cloudinary->image('face')->resize(Resize::thumbnail(300,300,Gravity::north())) . "\n");

# gravity: auto compare fill vs thumb
// echo ($cloudinary->image('face')->resize(Resize::fill(300,300,Gravity::auto())) . "\n");
// echo ($cloudinary->image('face')->resize(Resize::thumbnail(300,300,Gravity::auto())) . "\n");

# gravity:face
# change to face and remove gravity altogether to see the difference
// echo ($cloudinary->image('working')->resize(Resize::thumbnail(300,300,Gravity::face())) . "\n");
// echo ($cloudinary->image('working')->resize(Resize::thumbnail(300,300)) . "\n");

# Branding and Watermarking using cropping 
# 2 different syntax to specify width and height with same result

// echo ($cloudinary->image('logo')->resize(Resize::thumbnail()->width(100)->height(100)) . "\n");
// echo ($cloudinary->image('logo')->resize(Resize::thumbnail(100,100)) . "\n");


# Compression using quality
// echo ($cloudinary->image('cookies') . "\n");
// echo ($cloudinary->image('cookies')->quality(Quality::auto()). "\n");
// echo ($cloudinary->image('cookies')->quality(Quality::auto())->format(Format::auto()) . "\n");


# Auto everything: quality, format and gravity
# We use chaining for every action but there is no cost for each transformation


// echo ($cloudinary->image('working')
  // ->resize(Resize::fill(300,400,Gravity::auto()))
  // ->quality(Quality::auto())
  // ->format(Format::auto()) . "\n");





