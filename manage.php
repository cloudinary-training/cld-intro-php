<?php

require_once __DIR__ . '/vendor/autoload.php';

use Cloudinary\Cloudinary;
// use Cloudinary\Asset\DeliveryType;
// use Cloudinary\Transformation\Resize;


// Constructor
$cloudinary = new Cloudinary('cloudinary://API_KEY:API_SECRET@CLOUD_NAME');
// print_r($cloudinary->configuration->account->cloudName);
// echo "\n";

# Alias the upload API
$uploader = $cloudinary->uploadApi();
#alias the admin API
$api = $cloudinary->adminApi();

# List all assets (default is 10)

// print_r($api->resources()) . "/n";

# List up to 500 assets

// print_r($api->resources(['max_results'=>500])) . "/n";

# Search by prefix (public id "starts with")

// print_r($api->resources(['type'=>'upload','prefix'=>'sample']));

# Rename an asset, default overwrite is false

// print_r($uploader->upload('./assets/cheesecake.jpg',['public_id'=>'cheesecake']));
// print_r($uploader->rename('cheesecake','my_cheesecake',['overwrite'=>true]));

# Remove an asset

# Upload API: destroy
// print_r($uploader->upload('./assets/lake.jpg',['public_id'=>'lake']));
// print_r($uploader->destroy('lake',['invalidate'=>true]));

# Admin API: delete_resource
# upload 2 assets and them remove them
// print_r($uploader->upload('./assets/dog.jpg',['public_id'=>'dog']));
// print_r($uploader->upload('./assets/lake.jpg',['public_id'=>'lake']));
// print_r($api->deleteResources(['dog','lake'],['invalidate'=>true]));


# Tag on Upload

// print_r($uploader->upload('./assets/blackberry.jpg',['public_id'=>'blackberry','tags'=>['fruit','berries']]));
# by string with comma-separated
// print_r($uploader->upload('./assets/blackberry.jpg',['public_id'=>'blackberry','tags'=>'fruit,berries']));
// print_r($api->resourcesByTag('berries',['tags'=>true]));

# Tag after Upload

// print_r($uploader->upload('./assets/lake.jpg',['public_id'=>'lake']));
// print_r($uploader->addTag('water','lake'));
// print_r($api->resourcesByTag('water',['tags'=>true]));

# Remove a single tag by name; search by removed tag and unremoved tag

// print_r($uploader->removeTag('berries','blackberry'));
// print_r($api->resourcesByTag('berries',['tags'=>true]));
// print_r($api->resourcesByTag('fruit',['tags'=>true]));

# Remove all tags list of public ids to remove tags
// print_r($uploader->removeAllTags(['blackberry','lake']));
// print_r($api->resourcesByTag('fruit',['tags'=>true]));
// print_r($api->resourcesByTag('water',['tags'=>true]));

