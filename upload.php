<?php
include_once 'database.php';
if(isset($_POST['upload']))
{   
     
 $file = rand(1000,100000)."-".$_FILES['file']['name'];
 $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $file_disposition=$_FILES['file']['disposition'];
 $file_cache=$_FILES['file']['cache'];
 $file_pragma=$_FILES['file']['pragma'];
 $folder="upload/";
 
 /* new file size in KB */
 $new_size = $file_size/1024;  
 /* new file size in KB */
 
 /* make file name in lower case */
 $new_file_name = strtolower($file);
 /* make file name in lower case */
 
 $final_file=str_replace(' ','-',$new_file_name);
 
 if(move_uploaded_file($file_loc,$folder.$final_file))
 {
  $sql="INSERT INTO file(file_name,type,size,disposition,cache,pragma) VALUES('$final_file','$file_type','$new_size','$file_disposition','$file_cache','$file_pragma')";
  mysqli_query($conn,$sql);
  
 
  echo "File sucessfully upload";
        
  
 }
 else
 {
  
  echo "Error.Please try again";
		
		}
	}
?>