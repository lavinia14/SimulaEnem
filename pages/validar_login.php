
<?php
require_once('../bd/conexão.php');
class ValidarLogin extends Conexao
{
    private $email;
    private $senha;
    public function __construct($email, $senha)
    {
        $this->email = $email;
        $this->senha = $senha;
    }



    public function login()
    {
        $banco = $this->conectar();

        if (!empty($this->email) and !empty($this->senha)) {
            $query = "SELECT * FROM usuario WHERE email = :email and senha = :senha";

            $result = $banco->prepare($query);
            $result->bindParam(':email', $this->email);
            $result->bindParam(':senha', $this->senha);
            if ($result->execute()) {
                $dados = $result->fetchAll(PDO::FETCH_ASSOC);
                if($dados[0]['email'] == $this->email AND $dados[0]['senha'] == $this->senha){
                    return true;
                }
            }
        }
        return false;
    }
}

$email = filter_input(INPUT_POST, 'email', FILTER_UNSAFE_RAW);
$senha = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);

$login = new ValidarLogin($email, $senha);

if ($login->login()) {
    header("Location: ../home.php");
} else {
    header("Location: ../login.php");
}
