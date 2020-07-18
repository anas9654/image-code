<?php 
 require('connection.inc.php');
$countfiles = count($_FILES['files']['name']);
 $upload_location = "image/";
 $files_arr = array();
 for($index = 0;$index < $countfiles;$index++){
     $filename = $_FILES['files']['name'][$index];
     $ext = pathinfo($filename, PATHINFO_EXTENSION);
     $valid_ext = array("png","jpeg","jpg");
     if(in_array($ext, $valid_ext)){
        $path = $upload_location.$filename;
            if(move_uploaded_file($_FILES['files']['tmp_name'][$index],$path)){
                mysqli_query($con,"insert into image(image1)values('$path')");
            $files_arr[] = $path;
		}
    }
			   	
}

echo json_encode($files_arr);
die;