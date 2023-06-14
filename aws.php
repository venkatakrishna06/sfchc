<?php
require 'vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\Exception\AwsException;

$s3Client = new S3Client([
    'version' => 'latest',
    'region' => 'ap-south-1',
    'credentials' => [
        'key'    => 'AKIAYNYUU42ITTFTCEE6',
        'secret' => '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'
    ]
]); 
?>