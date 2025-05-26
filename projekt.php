<!DOCTYPE html>
<html>
    <head>
        <title>Phantom</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
        <h1> PHANTOM </h1>
        Witamy w systemie PHANTOM! <br>
        Tutaj miała znajdować się strona logowania, ale z powodu „cięć budżetowych” nie udało nam się tego zaimplementować. Ponieważ nie ma żadnego systemu autoryzacji dostępu, strona została ograniczona do statycznego wyświetlania tabel z naszej bazy danych, żeby żaden griefer nie przyszedł i nie popsuł. <br>
        Życzymy miłego pobytu! <br>
        <?php
            // tu umieszczamy kod skryptu
            // Połączmy się z bazą danych i rozłączmy się z nią
            $dbh = pg_connect("dbname=projekt_guzio user=guzio password=Tf0jaStara;) host=localhost")
            or die("Nie mogę połączyć się z bazą danych!</body></html>");
            echo "<h2>Dane:</h2><table style=\"border: 2px\"><tbody><tr>";
            $wynik = pg_query($dbh,"SELECT * FROM klient;") or die("</tr></tbody></table>Nie można wczytać danych. :< </body></html>");
        ?>
    </body>
</html>