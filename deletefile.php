<?php

	ob_start();

	include('session.php');
	include('connect.php');
  include('aws.php');

use Aws\S3\S3Client;
use Aws\Exception\AwsException;
      
  	$del_fname = $_SESSION['del_fname'];
    $trimFName= substr($del_fname, 0, -4);


    $bucketName = $_SESSION['reg_uname'].'sfchc';

    $filesToDelete = [
     $del_fname.'/'.$trimFName.'_Encrypted_1.txt',
   $del_fname.'/'.$trimFName.'_Encrypted_2.txt',
   $del_fname.'/'.$trimFName.'_Encrypted_3.txt'
];

// Delete multiple files from S3 bucket
foreach ($filesToDelete as $objectKey) {
    try {
        $result = $s3Client->deleteObject([
            'Bucket' => $bucketName,
            'Key' => $objectKey
        ]);
        echo 'File deleted successfully: ' . $objectKey . '<br>';
        

    } catch (AwsException $e) {
        echo 'Error deleting file: ' . $e->getMessage() . '<br>';
    }
}































    $result1 = mysqli_query($conn,"DELETE FROM files_encrypted WHERE file_name = '$del_fname' and uname = '$uname'");
    $result4 = mysqli_query($conn,"DELETE FROM encrypted_pass WHERE file_name = '$del_fname' and uname = '$uname'");
    $result5 = mysqli_query($conn,"DELETE FROM encrypted_files_joined WHERE file_name = '$del_fname' and uname = '$uname'");
    $result7 = mysqli_query($conn,"DELETE FROM requests WHERE file_name = '$del_fname' and to_user = '$uname'");
    $result8 = mysqli_query($conn,"DELETE FROM requests WHERE file_name = '$del_fname' and from_user = '$uname'");
    
    header('Location: myfiles.php');


?>