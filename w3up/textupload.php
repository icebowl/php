<?php
/*
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>


    $target_dir = "uploads/" - specifies the directory where the file is going to be placed
    $target_file specifies the path of the file to be uploaded
    $uploadOk=1 is not used yet (will be used later)
    $imageFileType holds the file extension of the file (in lower case)
    Next, check if the image file is an actual image or a fake image
    
 $_FILES is a two dimensional associative global array of items which are being uploaded by via HTTP POST method and holds the attributes of files such as:
Attribute 	Description
[name] 	Name of file which is uploading
[size] 	Size of the file
[type] 	Type of the file (like .pdf, .zip, .jpeg…..etc)
[tmp_name] 	A temporary address where the file is located before processing the upload request
[error] 	Types of error occurred when the file is uploading

 getimagesize ( string $filename [, array &$imageinfo ] ) : array

*/
?>

<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
//$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
echo "<br /><br /> theSize * * * *<br />";
//$theSize =  getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//print_r ($theSize);
echo"<br /><br /> * * * *<br /><br />";

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
