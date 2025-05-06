<?php
require 'vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

function deleteFromS3($folder, $imgName) {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    $bucketName = 'bakeybucket';
    $IAM_KEY = $_ENV['AWS_ACCESS_KEY'];
    $IAM_SECRET = $_ENV['AWS_SECRET_KEY'];

    try {
        $s3 = new S3Client([
            'version' => 'latest',
            'region'  => 'ap-south-1',
            'credentials' => [
                'key' => $IAM_KEY,
                'secret' => $IAM_SECRET,
            ]
        ]);

        $fileName = $folder . '/' . basename($imgName);

        $s3->deleteObject([
            'Bucket' => $bucketName,
            'Key'    => $fileName
        ]);

        return true;
    } catch (S3Exception $e) {
        echo "AWS Delete Error: " . $e->getAwsErrorMessage();
        return false;
    }
    catch (Exception $e) {
        echo "General Error: " . $e->getMessage();
        return false;
    }
    
}
?>
