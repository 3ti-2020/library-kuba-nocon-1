<?php
    $conn = new mysqli('localhost','root','','library');

    $sql = "INSERT INTO `autorzy`(`id_autor`, `imie`, `nazwisko`) VALUES (NULL , '".$_POST['imie']."', '".$_POST['nazwisko']."') ";

    mysqli_query($conn, $sql);

    header("Location:index.php");
    
?>

