<?php
require 'vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\Exception\AwsException;

$s3Client = new S3Client([
    'version' => 'latest',
    'region' => 'ap-south-1',
    'credentials' => [
        'key'    => 'add your key here',
        'secret' => 'add your key here'
    ]
]); 
?>
