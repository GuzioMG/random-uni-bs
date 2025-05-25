<html>
    <head>
        <title>testdb</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
        <hr>
            <h1> TEST </h1>
        </hr>
        <?php
            // tu umieszczamy kod skryptu
            // Połączmy się z bazą danych i rozłączmy się z nią
            $dbh = pg_connect("dbname=lab4_guzio user=guzio password=Tf0jaStara;) host=localhost")
            or die("Nie mogę połączyć się z bazą danych!");
            $wynik = pg_query($dbh,"SELECT * FROM klient;") or die("Nie można wczytać danych. :<");
            // tu powinno byc polaczenie
            echo "Jest połączenie z bazą! Wynik: ";
            echo $wynik;
            echo "<br>";
            // teraz wyświetlmy dane
            echo "<h2>Dane:</h2><table style=\"border: 2px\"><tbody><tr>";
            $liczba_kolumn = pg_num_fields($wynik);
            $liczba_wierszy = pg_num_rows($wynik);
            for($k =0;$k<$liczba_kolumn;$k++) {
                echo "<td>";
                echo pg_field_name($wynik,$k);
                echo "</td>";
            }
            echo "</tr>";
            for($w =0;$w<$liczba_wierszy;$w++) {
                echo "<tr>";
                for($k =0;$k<$liczba_kolumn;$k++) {
                    echo "<td>";
                    echo pg_fetch_result($wynik,$w,$k);
                    echo "</td>";
                }
                echo "</tr>";
            }
            echo "</tbody></table>";
            pg_close($dbh);
        ?>
        <form action="API.php" method="POST">
            <h2> Dodaj osobę: </h2>
            Imię: <input type="text" name="imie">
            <br>
            Nazwisko: <input type="text" name="nazw">
            <br>
            Numer dowodu: <input type="text" name="tel">
            <br>
            <input type="hidden" name="request_type" value="add">
            <input type="submit" name="Dodaj" value="Dodaj">
        </form>
    </body>
</html>