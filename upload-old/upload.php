<!DOCTYPE html>
<html>
<head>
  <title>File Upload</title>
 <style>

 </style>
</head>
<body>
	

	
	
<form enctype="multipart/form-data" action="upload.php" method="POST">
<p>File Upload</p>
<input type="file" name="uploaded_file" class="hidden"></input><br />
<input type="submit" value="Upload"></input>
</form>


<?php

  if(!empty($_FILES['uploaded_file']))
  {
    $path = "files/";
    $path = $path . basename( $_FILES['uploaded_file']['name']);
    $filename = basename( $_FILES['uploaded_file']['name']);
	//pass the file name as
	echo ("<hr />");
    echo "File name : ".$filename."<hr /><b></b>mime type</b></b> <br />";
    echo mime_content_type($_FILES['uploaded_file']['tmp_name']) ."</br><br />"; 
    //
    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
      echo "The file ".  basename( $_FILES['uploaded_file']['name']). 
      " has been uploaded";
    } else{
        echo "There was an error uploading the file, please try again!";
    }
  }
?>

<hr />
<pre>
A media type (also known as a Multipurpose Internet Mail Extensions or MIME type) 
is a standard that indicates the nature and format of a document, 
file, or assortment of bytes. It is defined and standardized in IETF's RFC 6838.
OSI Layer 6, the Presentation Layer

</pre>

</body>
</html>
