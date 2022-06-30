<?php
require_once('../bd/conexão.php');

class ValidarProva extends Conexao
{   
    private $ano;
    
    public function __construct($ano)
    {
        $this->ano = $ano;
       
    }


    public function cadastroProva()
    {
        $banco = $this->conectar();

        if (!empty($this->ano)) {
            $query = "INSERT INTO prova (ano) VALUES (:ano)";

            $result = $banco->prepare($query);
            $result->bindParam(':ano', $this->ano);
            if ($result->execute()) {
                return true;
            }
        }
        return false;
    }
}

$ano = filter_input(INPUT_POST, 'ano', FILTER_UNSAFE_RAW);

$cadastro = new ValidarProva($ano);

if ($cadastro->cadastroProva()) {
    header('Location: ../adminPage.php');
} else {
    header('Location: ../addProva.php');
}