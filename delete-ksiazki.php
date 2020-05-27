<?php
    $conn = new mysqli('localhost','root','','library');

    $sql = "DELETE FROM `ksiazki` WHERE id=".$_POST['id']." "; 

    mysqli_query($conn, $sql);

    header("Location:index.php");

?>