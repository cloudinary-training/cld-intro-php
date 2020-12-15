<?php
require_once __DIR__ . '/vendor/autoload.php';

use Cloudinary\Cloudinary;

// Constructor
$cloudinary = new Cloudinary();
echo $cloudinary->configuration->account->cloudName . "\n";

# Reference the upload API
$uploader = $cloudinary->uploadApi();
# Reference the admin API
$api = $cloudinary->adminApi();

# List all assets (default is 10)

// echo json_encode($api->resources(),JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES)) . "\n";

# List up to 500 assets
// echo json_encode($api->resources(['max_results'=>500]),JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES)) . "\n";

# Search by prefix (public id "starts with")

// echo json_encode($api->resources(['type'=>'upload','prefix'=>'sample']),JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES))  . "\n";

# Rename an asset, default overwrite is false

// echo json_encode($uploader->upload('./assets/cheesecake.jpg',['public_id'=>'cheesecake']),JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES)) . "\n";
// echo json_encode($uploader->rename('cheesecake','my_cheesecake',['overwrite'=>true]),JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES)) . "\n";

# Remove an asset

# Upload API: destroy
// echo json_encode($uploader->upload('./assets/lake.jpg',['public_id'=>'lake']),JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES)) . "\n";
// echo json_encode($uploader->destroy('lake',['invalidate'=>true]),JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES)) . "\n";

# Admin API: delete_resource
# upload 2 assets and them remove them

// echo json_encode($uploader->upload('./assets/dog.jpg',['public_id'=>'dog']),JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES))  . "\n";
// echo json_encode($uploader->upload('./assets/lake.jpg',['public_id'=>'lake']),JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES))  . "\n";
// echo json_encode($api->deleteResources(['dog','lake'],['invalidate'=>true]),JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES))  . "\n";


# Tag on Upload
# by string with comma-separated tags
//  echo json_encode($uploader->upload('./assets/blackberry.jpg', [
//         'public_id' => 'blackberry',
//         'tags'      => 'fruit,berries'
//      ]),JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES))  . "\n";
//  echo json_encode($api->resourcesByTag('berries',['tags'=>true]),JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES))  . "\n";

# Tag after Upload

// echo json_encode($uploader->upload('./assets/lake.jpg',['public_id'=>'lake']),JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES))  . "\n";
// echo json_encode($uploader->addTag('water','lake'),JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES))  . "\n";
// echo json_encode($api->resourcesByTag('water',['tags'=>true]),JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES))  . "\n";

# Remove a single tag by name; search by removed tag and unremoved tag

// echo json_encode($uploader->removeTag('berries','blackberry'),JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES))  . "\n";
// echo json_encode($api->resourcesByTag('berries',['tags'=>true]),JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES))  . "\n";
# other tag still finds resource
// echo json_encode($api->resourcesByTag('fruit',['tags'=>true]),JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES))  . "\n";

# Remove all tags list of public ids to remove tags
// echo json_encode($uploader->removeAllTags('blackberry'),JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES))  . "\n";
// echo json_encode($api->resourcesByTag('fruit',['tags'=>true]),JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES))  . "\n";
?>