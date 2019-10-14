<!DOCTYPE html>
<html>
<head>
  <title>TextFileUpload</title>
</head>
<body>
<form enctype="multipart/form-data" action="uploadtext.php" method="POST">
<input type="file" name="uploadfile" id="img" style="display:none;"/>
<label for="img">Click me to upload image</label>
</form>
	
  <form enctype="multipart/form-data" action="uploadtext.php" method="POST">
    <p>Text File Upload</p>
    <input type="file" name="uploaded_file" class="hidden"></input><br />
    <input type="submit" value="Upload"></input>
  </form>


</body>
</html>
<?php

  if(!empty($_FILES['uploaded_file']))
  {
    $path = "files/";
    $path = $path . basename( $_FILES['uploaded_file']['name']);
    $filename = $path . basename( $_FILES['uploaded_file']['name']);
    	//pass the file name as
	echo ("* * * * * <br /> <br /><br />");
    echo " $filename ".$filename;
    echo ("* * * * * <br /> <br /><br />");
    echo mime_content_type($_FILES['uploaded_file']['tmp_name']) ."</br>"; 
		echo ("* * * * * <br /> <br /><br />");
    
    //
    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
      echo "The file ".  basename( $_FILES['uploaded_file']['name']). 
      " has been uploaded";
    } else{
        echo "There was an error uploading the file, please try again!";
    }
  }
?>
