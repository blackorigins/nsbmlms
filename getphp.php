
 


<?php 
 
 $number=$_POST['number'];
 $connect=mysqli_connect('localhost','root','','computing');
 $sql = mysqli_query($connect,"SELECT avilability FROM yearonecprogramming WHERE id='$number'");
 $row=mysqli_fetch_array($sql);
 $available=$row['avilability'];
 

 
?>