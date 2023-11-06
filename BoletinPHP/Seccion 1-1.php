<!DOCTYPE html>
<html lang="en">
<body>
    <h1>Conversión euros/pesetas</h1>
    <table>
        <?php
     
        $conversion_rate = 166.386;

        for ($euros = 1; $euros <= 10; $euros++) {
            $pesetas = $euros * $conversion_rate;
            echo "<tr><td>1€ = $pesetas pts</td></tr>";
        }
        ?>
    </table>
</body>
</html>
