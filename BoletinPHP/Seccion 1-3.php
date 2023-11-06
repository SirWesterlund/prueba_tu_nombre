<!DOCTYPE html>
<html lang="en">
<head>
    <title>Conversión de Euros a Pesetas</title>
    <style>
        table {
            border-collapse: collapse;
        }
        table, th, td {
            border: none;
        }
        th {
            background-color: #FFEECC;
        }
        tr:nth-child(even) {
            background-color: #CCEEFF;
        }
        tr:nth-child(odd) {
            background-color: #CCCCCC;
        }
    </style>
</head>
<body>
    <h1>Conversión euros/pesetas</h1>
    <table>
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
