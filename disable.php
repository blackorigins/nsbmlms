<?php

$available = $_POST['avilability'];

$lesson=$_POST['lesson'];

$host='localhost';

$connect=mysqli_connect($host,'root','','computing');


$sql = "UPDATE yearonecprogramming SET avilability='$available' WHERE lessonName='$lesson'";

$query = mysqli_query($connect, $sql);

echo "display";

 ?>