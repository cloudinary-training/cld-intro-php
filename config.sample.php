<?php

use Cloudinary\Configuration\Configuration;

Configuration::instance(
    [
        "cloud" =>
            [
                'cloud_name' => 'CLOUD_NAME',
                'api_key'    => 'API_KEY',
                'api_secret' => 'API_SECRET',
            ],
    ]
);
