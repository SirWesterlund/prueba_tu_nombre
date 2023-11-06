<!DOCTYPE html>
<html lang="en">
<body>
    <h1>Conversión euros/pesetas</h1>
    <table border="1">
        <tr>
            <th>Euros</th>
            <th>Pesetas</th>
        </tr>
        <?php

        $conversion_rate = 166.386;

        for ($euros = 1; $euros <= 10; $euros++) {
            $pesetas = $euros * $conversion_rate;
            echo "<tr><td>$euros</td><td>$pesetas</td></tr>";
        }
        ?>
    </table>
</body>
</html>
