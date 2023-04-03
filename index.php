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
    <div class="container">
        <?php
        require_once('Bicicletas.php');

        $bicicletas = new Bicicletas(null, null, null, null, null); // Cria uma instância da classe Bicicletas
        $listaBicicletas = $bicicletas->selectAll(); // Chama a função selectAll() para buscar a lista de bicicletas  
        ?>

        <?php
        require_once('Bicicletas.php');

        $searchTerm = isset($_POST['search']) ? $_POST['search'] : '';

        $bicicletas = new Bicicletas(null, null, null, null, null);
        $listaBicicletas = $searchTerm ? $bicicletas->search($searchTerm) : $bicicletas->selectAll();
        ?>

        <form method="post">
            <input type="button" onclick="location.href='Cadastrar.php'" value="Cadastrar nova bicicleta">
            <label for="search">Buscar:</label>
            <input type="text" name="search" value="<?php echo $searchTerm; ?>">
            <input type="submit" value="Buscar">
            <input type="button" onclick="location.href='index.php'" value="Limpar Lista">
        </form>
        
        <table>
            <thead>
                <tr>
                    <th>Cod</th>
                    <th>Modelo</th>
                    <th>Fabricante</th>
                    <th>Opcionais</th>
                    <th>Cor</th>
                    <th>Ações</th> <!-- Adiciona a coluna de ações -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaBicicletas as $bicicleta): ?>
                    <tr>
                        <td>
                            <?php echo $bicicleta['cod']; ?>
                        </td>
                        <td>
                            <?php echo $bicicleta['modelo']; ?>
                        </td>
                        <td>
                            <?php echo $bicicleta['fabricante']; ?>
                        </td>
                        <td>
                            <?php echo $bicicleta['opcionais']; ?>
                        </td>
                        <td>
                            <?php echo $bicicleta['cor']; ?>
                        </td>
                        <td>
                            <!-- Adiciona o botão de alterar -->
                        <form action="Alterar.php" method="post">
                        <input type="hidden" name="cod" value="<?php echo $bicicleta['cod']; ?>">
                            <input type="submit" value="Alterar">
                        </form>
                            <form action="Excluir.php" method="post">
                                <input type="hidden" name="cod" value="<?php echo $bicicleta['cod']; ?>">
                                <input type="submit" value="Excluir">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>