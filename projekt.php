<html>
    <head>
        <title>Phantom</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
        <hr>
            <h1> PHANTOM </h1>
        </hr>
        <?php
            // tu umieszczamy kod skryptu
            // Połączmy się z bazą danych i rozłączmy się z nią
            $dbh = pg_connect("dbname=projekt_guzio user=guzio password=Tf0jaStara;) host=localhost")
            or die("Nie mogę połączyć się z bazą danych!");
            echo "Jest połączenie z bazą!";
        ?>
    </body>
</html>