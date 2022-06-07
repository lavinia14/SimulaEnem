
<?php
require_once('../bd/conexão.php');

class ValidarCadastro extends Conexao
{
    private $nome;
    private $email;
    private $senha;
    public function __construct($nome, $email, $senha)
    {
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
    }



    public function cadastro()
    {
        $banco = $this->conectar();

        if (!empty($this->nome) and !empty($this->email) and !empty($this->senha)) {
            $query = "INSERT INTO usuario (nome, email, senha) VALUES (:nome, :email, :senha)";

            $result = $banco->prepare($query);
            $result->bindParam(':nome', $this->nome);
            $result->bindParam(':email', $this->email);
            $result->bindParam(':senha', $this->senha);
            if ($result->execute()) {
                return true;
            }
        }
        return false;
    }
}

$nome = filter_input(INPUT_POST, 'nome', FILTER_UNSAFE_RAW);
$email = filter_input(INPUT_POST, 'email', FILTER_UNSAFE_RAW);
$senha = filter_input(INPUT_POST, 'senha', FILTER_UNSAFE_RAW);

$cadastro = new ValidarCadastro($nome, $email, $senha);

if ($cadastro->cadastro()) {
    header("Location: ../login.php");
} else {
    header("Location: ../cadastro.php");
}
