<?php
$url = "https://open.er-api.com/v6/latest/USD";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
$response = curl_exec($ch);
curl_close($ch);
$data = json_decode($response, true);
$valor=$data['rates']['MXN'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $cantidad = floatval($_POST['cantidad']);
    $convertido = $cantidad * $valor;
    echo "<h2>Resultado de la conversion:</h2>";
    echo "<p>$" . number_format($cantidad, 2) . " USD son $" . number_format($convertido, 2) . " MXN</p>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Conversion de moneda</title>
</head>
<body>
    <h1>TODO BIEN </h1>
    <h2> Tipo de cambio de USD a otras monedas:</h2>
    <form method= "post" action="">
        <label> Cantidad:</label>
        <input type="number" name="cantidad" required>
        <br>
        <button type= "submit">Convertir</button>
    </form>
</body>
</html>