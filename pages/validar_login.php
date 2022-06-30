
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
                return $dados[0]['permissao'];
            }
        }
        return false;
    }
}

$email = filter_input(INPUT_POST, 'email', FILTER_UNSAFE_RAW);
$senha = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);

$login = new ValidarLogin($email, $senha);
$loginAcesso = $login->login();
if ($loginAcesso) {
    if($loginAcesso == 1){
        header("Location: ../home.php");
    }else{
        header("Location: ../adminPage.php");
    }
} else {
    header("Location: ../login.php");
}

