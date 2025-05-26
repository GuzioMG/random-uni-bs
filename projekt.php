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
            
            echo "<h2>Użytkownicy:</h2><table style=\"border: 2px\"><tbody><tr>";
            $wynik = pg_query($dbh,"SELECT * FROM users;") or die("</tr></tbody></table>Nie można wczytać danych. :&lt;</body></html>");
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
            
            echo "<h2>Mody:</h2><table style=\"border: 2px\"><tbody><tr>";
            $wynik = pg_query($dbh,"SELECT * FROM mods;") or die("</tr></tbody></table>Nie można wczytać danych. :&lt;</body></html>");
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
            
            echo "<h2>Feedback (wersja bezpośrednia):</h2><table style=\"border: 2px\"><tbody><tr>";
            $wynik = pg_query($dbh,"SELECT * FROM feedbacks;") or die("</tr></tbody></table>Nie można wczytać danych. :&lt;</body></html>");
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
            
            echo "<h2>Dependencje (wersja bezpośrednia):</h2><table style=\"border: 2px\"><tbody><tr>";
            $wynik = pg_query($dbh,"SELECT * FROM dependencies;") or die("</tr></tbody></table>Nie można wczytać danych. :&lt;</body></html>");
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
            
            echo "<h2>Feedback (wersja wygodna dla człowieka):</h2><table style=\"border: 2px\"><tbody><tr>";
            $wynik = pg_query($dbh,"SELECT * FROM readable_feedbacks;") or die("</tr></tbody></table>Nie można wczytać danych. :&lt;</body></html>");
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
            
            echo "<h2>Mody (wersja wygodna dla człowieka):</h2><table style=\"border: 2px\"><tbody><tr>";
            $wynik = pg_query($dbh,"SELECT * FROM readable_mods;") or die("</tr></tbody></table>Nie można wczytać danych. :&lt;</body></html>");
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
            
            echo "<h2>Dependencje (wersja wygodna dla człowieka):</h2><table style=\"border: 2px\"><tbody><tr>";
            echo "</tr></tbody></table>Brak takowej :&lt;<br>";
            pg_close($dbh);
        ?>
    </body>
</html>