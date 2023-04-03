<?php
require_once('Bicicletas.php');

if(isset($_POST['cod'])) {
    $codigo = $_POST['cod'];
    $bicicletas = new Bicicletas(null, null, null, null, null);
    $bicicleta = $bicicletas->selectById($codigo);
} else {
    header('Location: index.php');
}

if(isset($_POST['alterar'])) {
    $bicicleta = new Bicicletas($_POST['cod'], $_POST['modelo'], $_POST['fabricante'], $_POST['opcionais'], $_POST['cor']);
    $bicicleta->update();
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Alterar bicicleta</title>
</head>
<body>
    <form method="POST" class="formstyle">
        <h2>Alterar bicicleta</h2>
        <input type="hidden" name="cod" value="<?php echo $bicicleta['cod']; ?>">
        <label for="modelo">Modelo:</label>
        <input type="text" name="modelo" value="<?php echo $bicicleta['modelo']; ?>" required><br>

        <label for="fabricante">Fabricante:</label>
        <input type="text" name="fabricante" value="<?php echo $bicicleta['fabricante']; ?>" required><br>

        <label for="opcionais">Opcionais:</label>
        <input type="text" name="opcionais" value="<?php echo $bicicleta['opcionais']; ?>"><br>

        <label for="cor">Cor:</label>
        <input type="text" name="cor" value="<?php echo $bicicleta['cor']; ?>" required><br>

        <input type="submit" name="alterar" value="Alterar">
    </form>
</body>
</html>

