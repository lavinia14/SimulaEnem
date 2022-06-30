
<?php
session_start();
require_once('../bd/conexão.php');

class ValidarAlternativas extends Conexao
{   
    private $resposta;
    private $pergunta_id;
    private $val_resposta;
    public function __construct($resposta, $pergunta_id, $val_resposta)
    {
        $this->resposta = $resposta;
        $this->pergunta_id = $pergunta_id;
        $this->val_resposta = $val_resposta;
    }
    public function __get($name)
    {
        return $this->$name;
    }


    public function cadastroAlternativas()
    {
        $banco = $this->conectar();

        if (!empty($this->resposta) and !empty($this->pergunta_id) and !empty($this->val_resposta)) {
            
            $query = "INSERT INTO alternativas (id, resposta, pergunta_id, val_resposta) VALUES (:id, :resposta, :pergunta_id, :val_resposta)";

            $result = $banco->prepare($query);
            $result->bindParam(':id', $this->__get('id'));
            $result->bindParam(':resposta', $this->__get('resposta'));
            $result->bindParam(':pergunta_id', $this->__get('pergunta_id'));
            $result->bindParam(':val_resposta', $this->__get('val_resposta'));
            if ($result->execute()) {
                return true;
            }
        
        }
    }

}
$resposta = filter_input(INPUT_POST, 'resposta', FILTER_UNSAFE_RAW);
$pergunta_id = filter_input(INPUT_POST, 'pergunta_id', FILTER_UNSAFE_RAW);
$val_resposta = filter_input(INPUT_POST, 'val_resposta', FILTER_UNSAFE_RAW);

$cadastro = new ValidarAlternativas($resposta, $pergunta_id, $val_resposta);
if(!$_SESSION['time']){
    $_SESSION['time'] = 0;
}
if ($_SESSION['time'] <= 3 ){ 
    $_SESSION['time']++;
    if ($cadastro->cadastroAlternativas()) {
        header('Location: ../addAlternativas.php');
    } else {
        header('Location: ../home.php');
    }
} else {
    $_SESSION['time'] = 0;
    if ($cadastro->cadastroAlternativas()) {
        header('Location: ../home.php');
    } else {
        header('Location: ../home.php');
    }
}



?>