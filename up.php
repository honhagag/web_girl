<?php
include'header.php';
// Check if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if file was uploaded without errors
    if(isset($_FILES["anyfile"]) && $_FILES["anyfile"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["anyfile"]["name"];
        $filetype = $_FILES["anyfile"]["type"];
        $filesize = $_FILES["anyfile"]["size"];
    
        // Validate file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Validate file size - 10MB maximum
        $maxsize = 10 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Validate type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("upload/" . $filename)){
                echo $filename . " is already exists.";
            } else{
                if(move_uploaded_file($_FILES["anyfile"]["tmp_name"], "upload/" . $filename)){

                    $sql="INSERT INTO images(file,type,size) VALUES('$filename','$filetype','$filesize')";
                    
                    mysqli_query($conn,$sql);

                    echo "Your file was uploaded successfully.";
                }else{

                   echo "File is not uploaded";
                }
                
            } 
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else{
        echo "Error: " . $_FILES["anyfile"]["error"];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP File Upload Example - Tutsmake.com</title>
</head>
<body>
	<form action="upload.php" method="post" enctype="multipart/form-data">
	    <h2>PHP Upload File</h2>
	    <label for="file_name">Filename:</label>
	    <input type="file" name="anyfile" id="anyfile">
	    <input type="submit" name="submit" value="Upload">
	    <p><strong>Note:</strong> Only .jpg, .jpeg, .gif, .png formats allowed to a max size of 5 MB.</p>
	</form>
</body>
</html>