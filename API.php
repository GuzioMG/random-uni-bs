<!DOCTYPE html>
<html>
    <head>
        <title>Dodaj osobę</title>
    </head>
    <body>
        <h1> Dodaję osobę </h1>
        <?php
        $rq_type = $_POST['request_type'];
        $dbh = pg_connect("dbname=lab4_guzio user=guzio password=Tf0jaStara;) host=localhost")
        or die("Nie mogę połączyć się z bazą danych!");
        
        if ($rq_type == "add") {
            //po pierwsze – odbierzmy parametry dla skryptu przekazane metodą POST 
            $im = $_POST['imie'];
            $na = $_POST['nazw'];
            $te = $_POST['tel'];
            // tu powinno byc polaczenie
            // wykonajmy zapytanie
            $query = "INSERT INTO klient(imie,nazwisko,tel) VALUES ('$im','$na','$te');";
            $wynik = pg_query($dbh,$query) or die("Query failed.");
            // sprawdzmy ile wierszy podmieniono
            $lz = pg_affected_rows($wynik);
            echo " Dodano $ls osob <br /> \n";
            // zapewnijmy powrot do strony poprzedniej
        }
        else{
            die("Zły typ formularza!");
        }
        pg_close($dbh);
        ?>
        
        <form action=dbtest.php method=post>
            <input type=submit name=Ok value=OK>
            </form>
    </body>
</html>