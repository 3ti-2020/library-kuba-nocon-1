<?php
    $conn = new mysqli('localhost','root','','library');

    $isbn = rand(100,999);

    $sql = "INSERT INTO `tytuly`(`id_tytul`, `tytuł`, `ISBN`) VALUES (NULL, '".$_POST['tytul']."', $isbn)";

    mysqli_query($conn, $sql);

    header("Location:index.php");
    
?>