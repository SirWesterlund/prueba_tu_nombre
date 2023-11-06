<!DOCTYPE html>
<html lang="en">
<body>
    <h1>Conversor de Monedas</h1>

    <?php
    $conversion_rates = [
        "Pesetas" => 166.386,
        "Dólares USA" => 1.325,
        "Libras Esterlinas" => 0.927,
        "Yenes Japoneses" => 118.232,
        "Francos Suizos" => 1.515
    ];

    if (isset($_POST['cantidad']) && is_numeric($_POST['cantidad'])) {
        $cantidad = floatval($_POST['cantidad']);
        $moneda_destino = $_POST['moneda_destino'];

        if (array_key_exists($moneda_destino, $conversion_rates)) {
            $resultado = $cantidad * $conversion_rates[$moneda_destino];
            echo "<p>$cantidad € es igual a $resultado $moneda_destino</p>";
        } else {
            echo "<p>Seleccione una moneda válida para la conversión.</p>";
        }
    }
    ?>

    <form method="POST">
        <label for="cantidad">Cantidad en euros:</label>
        <input type="text" name="cantidad" id="cantidad" placeholder="Ingrese la cantidad en euros" required>
        <label for="moneda_destino">Convertir a:</label>
        <select name="moneda_destino" id="moneda_destino">
            <option value="Pesetas">Pesetas</option>
            <option value="Dólares USA">Dólares USA</option>
            <option value="Libras Esterlinas">Libras Esterlinas</option>
            <option value="Yenes Japoneses">Yenes Japoneses</option>
            <option value="Francos Suizos">Francos Suizos</option>
        </select>
        <button type="submit">Convertir</button>
    </form>
</body>
</html>
