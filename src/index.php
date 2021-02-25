<?php

use App\App;
use Domain\Vendor\HardcodedVendorDataSource;

require __DIR__.'/../vendor/autoload.php';

// Endpoints middleware
$middleware = [
    'search' => [
        // Add relevant middleware for the "search" endpoint
    ],
];

$dataSource = new HardcodedVendorDataSource();

$app = new App($middleware, $dataSource);

$output = $app->run($argv[1], array_slice($argv, 2));

echo $output;
