<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"> 
    <title>Document</title>
</head>
<body>
<form method="post" class="formstyle">
    <label for="cod">Código:</label>
    <input type="text" name="cod"><br>

    <label for="modelo">Modelo:</label>
    <input type="text" name="modelo"><br>

    <label for="fabricante">Fabricante:</label>
    <input type="text" name="fabricante"><br>

    <label for="opcionais">Opcionais:</label>
    <input type="text" name="opcionais"><br>

    <label for="cor">Cor:</label>
    <input type="text" name="cor"><br>

    <input type="submit" name="submit" value="Cadastrar">
    <input type="button" onclick="location.href='index.php'" value="Voltar a Lista">
    
    <?php
require_once('Bicicletas.php');

if(isset($_POST['submit'])) {
    $cod = $_POST['cod'];
    $modelo = $_POST['modelo'];
    $fabricante = $_POST['fabricante'];
    $opcionais = $_POST['opcionais'];
    $cor = $_POST['cor'];

    $bicicleta = new Bicicletas($cod, $modelo, $fabricante, $opcionais, $cor);
    if($bicicleta->insert()) {
        echo "<br>Bicicleta cadastrada com sucesso!";
    } else {
        echo "<br>Erro ao cadastrar bicicleta!";
    }
}
?>
</form>
</body>
</html>
