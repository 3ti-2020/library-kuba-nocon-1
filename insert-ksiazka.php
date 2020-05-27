<?php
    $conn = new mysqli('localhost','root','','library');

    $sql = "INSERT INTO `ksiazki`(`id`, `id_autor`, `id_tytul`) VALUES (NULL , '".$_POST['wybrany-autor']."', '".$_POST['wybrany-tytul']."')";

    mysqli_query($conn, $sql);

    header("Location:index.php");
?>