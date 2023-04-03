<?php
require_once('Database.php');

class Bicicletas
{
    private $cod;
    private $modelo;
    private $fabricante;
    private $opcionais;
    private $cor;
    private $con;

    public function __construct($cod, $modelo, $fabricante, $opcionais, $cor)
    {
        $this->cod = $cod;
        $this->modelo = $modelo;
        $this->fabricante = $fabricante;
        $this->opcionais = $opcionais;
        $this->cor = $cor;
        $this->con = new Database('localhost', 'provap1', 'root', '');
    }
    public function getCod()
    {
        return $this->cod;
    }

    public function setCod($cod)
    {
        $this->cod = $cod;
    }

    public function getModelo()
    {
        return $this->modelo;
    }

    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    public function getFabricante()
    {
        return $this->fabricante;
    }

    public function setFabricante($fabricante)
    {
        $this->fabricante = $fabricante;
    }

    public function getOpcionais()
    {
        return $this->opcionais;
    }

    public function setOpcionais($opcionais)
    {
        $this->opcionais = $opcionais;
    }

    public function getCor()
    {
        return $this->cor;
    }

    public function setCor($cor)
    {
        $this->cor = $cor;
    }

    public function insert()
    {
        $sql = "INSERT INTO bicicletas (cod, modelo, fabricante, opcionais, cor) VALUES (:cod, :modelo, :fabricante, :opcionais, :cor)";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':cod', $this->cod);
        $stmt->bindParam(':modelo', $this->modelo);
        $stmt->bindParam(':fabricante', $this->fabricante);
        $stmt->bindParam(':opcionais', $this->opcionais);
        $stmt->bindParam(':cor', $this->cor);
        return $stmt->execute();
    }

    public function update()
    {
        $sql = "UPDATE bicicletas SET modelo = :modelo, fabricante = :fabricante, opcionais = :opcionais, cor = :cor WHERE cod = :cod";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':cod', $this->cod);
        $stmt->bindParam(':modelo', $this->modelo);
        $stmt->bindParam(':fabricante', $this->fabricante);
        $stmt->bindParam(':opcionais', $this->opcionais);
        $stmt->bindParam(':cor', $this->cor);
        return $stmt->execute();
    }

    public function delete()
    {
        $sql = "DELETE FROM bicicletas WHERE cod = :cod";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':cod', $this->cod);
        return $stmt->execute();
    }

    public function selectAll()
    {
        $sql = "SELECT * FROM bicicletas";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectById($id)
    {
        $sql = "SELECT * FROM bicicletas WHERE cod = :id";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function search($searchTerm)
    {
        $sql = "SELECT * FROM bicicletas WHERE cod LIKE :searchTerm OR modelo LIKE :searchTerm OR fabricante LIKE :searchTerm OR opcionais LIKE :searchTerm OR cor LIKE :searchTerm";
        $stmt = $this->con->prepare($sql);
        $stmt->bindValue(':searchTerm', '%' . $searchTerm . '%', PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>