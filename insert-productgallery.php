<?php
include '../includes/header.php';
?>
<div class="inner-block">
<form action="" method="post" enctype="multipart/form-data">
<input type="file" name="gallery[]" multiple />
<input type="submit" name="submit" value="Upload">  
</form>

<?php

if(isset($_POST['submit']))
  {
        
         $fname=$_FILES['gallery']['name'];
         $ftmp=$_FILES['gallery']['tmp_name'];
         
         $temp="";        

         $total = count($_FILES['gallery']['name']); 
    // Loop through each file
      for($i=0; $i<$total; $i++) {
      //Get the temp file path
      $tmpFilePath = $_FILES['gallery']['tmp_name'][$i];

      //Make sure we have a filepath
      if ($tmpFilePath != ""){
        //Setup our new file path
        $newFilePath = "../Photos/" . $_FILES['gallery']['name'][$i];

        //Upload the file into the temp dir
        if(move_uploaded_file($tmpFilePath, $newFilePath)) {
          move_uploaded_file($tmpFilePath, $newFilePath);
          //Handle other code here
          //echo "uploaded";
          $temp .= '/admin/Photos/'.$_FILES['gallery']['name'][$i].',';
        }
      }
    }
    // $temp = '/admin/media/'.$_FILES['files']['name'];
          // $prdgallery= implode(",",$temp);
           $productgallery= $temp;
           echo $temp;
           //exit;
          $savepath='/admin/Photos/'.$fname;
          $fullpath='../Photos/'.$fname;   

      $query="insert into productgallery(productgallery) values('$productgallery')";
         move_uploaded_file($ftmp,$fullpath);
          $ex=mysqli_query($conn,$query);



          if($ex>0)
            { ?>
               <script>
                alert('Product added sucsessfull');
           </script> 
           <?php }
        else
        {
            echo "<p> Something Worng </p>";
        }

}
?>

</div>
<?php
include '../includes/aside.php';
include '../includes/footer.php'; 
?>