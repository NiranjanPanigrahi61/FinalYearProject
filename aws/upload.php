<?php
require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

function uploadtoS3($folder, $tempName, $imgName){
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
    
    // $new_name = time() . "-" . $image['name'];
    $fileName = $folder.'/'. basename($imgName);
    // $pathInS3 = 'https://'.$bucketName.'.s3.ap-south-1.amazonaws.com/'. $keyName;
    
    // Add it to S3
    try {
        // Uploaded:
    
        $result=$s3->putObject(
            array(
                'Bucket' => $bucketName,
                'Key' => $fileName,
                'SourceFile' => $tempName,
                'StorageClass' => 'REDUCED_REDUNDANCY'
            )
        );
        return $result['ObjectURL'];
    } catch (S3Exception $e) {
        return false;
    } catch (Exception $e) {
        return false;
    }
}
?>