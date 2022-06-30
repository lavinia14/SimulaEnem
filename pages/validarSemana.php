<?php
require_once('../bd/conexão.php');

class ValidarSemana extends Conexao
{   
    private $id;
    private $anoProva;
    private $semana;
    
    public function __construct($id, $anoProva, $semana)
    {
        $this->id = $id;
        $this->anoProva = $anoProva;
        $this->semana = $semana;
       
    }


    public function cadastroSemana()
    {
        $banco = $this->conectar();

        if (!empty($this->id) and !empty($this->anoProva) and !empty($this->semana)) {
            $query = "INSERT INTO provas (id, anoProva, semana) VALUES (:id, :anoProva, :semana)";

            $result = $banco->prepare($query);
            $result->bindParam(':id', $this->id);
            $result->bindParam(':anoProva', $this->anoProva);
            $result->bindParam(':semana', $this->semana);
            if ($result->execute()) {
                return true;
            }
        }
        return false;
    }
}

$id = filter_input(INPUT_POST, 'id', FILTER_UNSAFE_RAW);
$anoProva = filter_input(INPUT_POST, 'anoProva', FILTER_UNSAFE_RAW);
$semana = filter_input(INPUT_POST, 'semana', FILTER_UNSAFE_RAW);

$cadastro = new ValidarSemana($id, $anoProva, $semana);


if ($cadastro->cadastroSemana()) {
    header('Location: ../adminPage.php');
} else {
    header('Location: ../addDiaSemana.php');
}