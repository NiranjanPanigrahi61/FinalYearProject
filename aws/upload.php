<?php
require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

// AWS Information
$bucketName = 'bakeybucket';
$IAM_KEY = $_ENV['AWS_ACCESS_KEY'];
$IAM_SECRET = $_ENV['AWS_SECRET_KEY'];

// Connect to AWS
try {
    $s3 = S3Client::factory(
        array(
            'credentials' => array(
                'key' => $IAM_KEY,
                'secret' => $IAM_SECRET
            ),
            'version' => 'latest',
            'region' => 'ap-south-1'
        )
    );
} catch (Exception $e) {

    die("Error: " . $e->getMessage());
}

$keyName = 'test_example/' . basename($_FILES["image"]['tmp_name']);
$pathInS3 = 'https://'.$bucketName.'.s3.ap-south-1.amazonaws.com/'. $keyName;

// Add it to S3
try {
    // Uploaded:
    $file = $_FILES["image"]['tmp_name'];

    $s3->putObject(
        array(
            'Bucket' => $bucketName,
            'Key' => $keyName,
            'SourceFile' => $file,
            'StorageClass' => 'REDUCED_REDUNDANCY'
        )
    );

} catch (S3Exception $e) {
    die('Error:' . $e->getMessage());
} catch (Exception $e) {
    die('Error:' . $e->getMessage());
}

echo 'Done';
?>