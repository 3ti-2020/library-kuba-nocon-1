<?php
    $conn = new mysqli('localhost','root','','library');

    $sql = "DELETE FROM `tytuly` WHERE id_tytul=".$_POST['id_tytul']." "; 

    mysqli_query($conn, $sql);

    header("Location:index.php");

?>