<?php
require_once('Bicicletas.php');

if(isset($_POST['cod'])) {
    $cod = $_POST['cod'];

    $bicicleta = new Bicicletas($cod, '', '', '', '');
    $bicicleta->delete();
}

header('Location: index.php');
exit();
?>
