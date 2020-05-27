<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Strona PHP - Relacja wiele do wielu</h1>
    </div>
    <div class="sidebar">
                                <h1>Dodaj Autora:</h1>
                                <form action="insert-autor.php" method="post" class="wybor">
                                    <input type="text" name="imie" placeholder="Imie">
                                    <input type="text" name="nazwisko" placeholder="Nazwisko">
                                    <input type="submit" value="Dodaj">
                                </form>
                                        <h1>Dodaj Tytuł:</h1>
                                        <form action="insert-tytul.php" method="post" class="wybor">
                                            <input type="text" name="tytul" placeholder="Tytuł">
                                            <input type="submit" value="Dodaj">
                                        </form>
                                                    <h2>Wybierz autora i Tytuł:</h2>
                                                    <?php
                                                        $conn = new mysqli('localhost','root','','library');

                                                        $result2 = $conn->query("SELECT * FROM autorzy");

                                                        echo("<form action='insert-ksiazka.php' method='POST'  class='wybor'>");
                                                        echo("<select name='wybrany-autor'>");
                                                        while($row=$result2->fetch_assoc() ){
                                                            echo("<option value='".$row['id_autor']."'>".$row['imie']." ".$row['nazwisko']."</option>");
                                                        }
                                                        echo("</select>");

                                                        $result3 = $conn->query("SELECT * FROM tytuly");

                                                        echo("<select name='wybrany-tytul'>");
                                                        while($row=$result3->fetch_assoc() ){
                                                            echo("<option value='".$row['id_tytul']."'>".$row['tytuł']."</option>");
                                                        }
                                                        echo("</select>");

                                                        echo("<input type='submit' value='Dodaj'>");
                                                        echo("</form>");
                                                    ?>
                                                                    <?php

                                                                    $conn = new mysqli('localhost','root','','library');

                                                                    $result1 = $conn->query("SELECT * FROM autorzy");

                                                                    echo("<h1>Usuń autora:</h1>");
                                                                    echo("<form action='delete-autor.php' method='POST'  class='wybor'>");
                                                                    echo("<select name='id_autor'>");
                                                                    while($row=$result1->fetch_assoc() ){
                                                                        echo("<option value='".$row['id_autor']."'>".$row['imie']." ".$row['nazwisko']."</option>");
                                                                    }
                                                                    echo("</select>");

                                                                    echo("<input type='submit' value='Usuń'>");
                                                                    echo("</form>");

                                                                    $result2 = $conn->query("SELECT * FROM tytuly");

                                                                    echo("<h1>Usuń tytuł:</h1>");
                                                                    echo("<form action='delete-tytul.php' method='POST'  class='wybor'>");
                                                                    echo("<select name='id_tytul'>");
                                                                    while($row=$result2->fetch_assoc() ){
                                                                        echo("<option value='".$row['id_tytul']."'>".$row['tytuł']."</option>");
                                                                    }
                                                                    echo("</select>");

                                                                    echo("<input type='submit' value='Delete'>");
                                                                    echo("</form>");

                                                                    ?>
    </div>
    <div class="main">
                                <?php
                                    $conn = new mysqli('localhost','root','','library');

                                    $result = $conn->query("SELECT id, imie, nazwisko, tytuł, isbn FROM ksiazki, autorzy, tytuly WHERE ksiazki.id_autor=autorzy.id_autor AND ksiazki.id_tytul=tytuly.id_tytul");

                                    echo("<table border=1 class='tabelka'");
                                    echo("<tr>
                                    <th>ID Książki</th>
                                    <th>Imię</th>
                                    <th>Nazwisko</th>
                                    <th>Tytuł</th>
                                    <th>ISBN</th>
                                    <th>DEL</th>
                                    </tr>");

                                    while($row=$result->fetch_assoc()){
                                        echo("<tr>");
                                        echo("<td>".$row['id']."</td>");
                                        echo("<td>".$row['imie']."</td>");
                                        echo("<td>".$row['nazwisko']."</td>");
                                        echo("<td>".$row['tytuł']."</td>");
                                        echo("<td>".$row['isbn']."</td>");
                                        echo("<td>
                                                <form action='delete-ksiazki.php' method='post'>
                                                    <input type='hidden' name='id' value='".$row['id']."'>
                                                    <input type='submit' value='usuń'>
                                                </form>
                                             </td>");
                                                echo("</tr>");
                                            }
                                            echo("</table>");
                                        ?>
    </div>
    <div class="footer">
        <h2>Kuba Nocoń</h2>
    </div> 
</div>
</body>
</html>