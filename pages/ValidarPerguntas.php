
<?php
require_once('../bd/conexão.php');

class ValidarPerguntas extends Conexao
{   
    private $titulo;
    private $texto;
    private $idProva;
    private $areaConhecimento;
    private $imagem;
    public function __construct($titulo, $texto, $idProva, $areaConhecimento, $imagem)
    {
        $this->titulo = $titulo;
        $this->texto = $texto;
        $this->idProva = $idProva;
        $this->areaConhecimento = $areaConhecimento;
        $this->imagem = $imagem;
    }
    public function __get($name)
    {
        return $this->$name;
    }


    public function cadastroPerguntas()
    {
        $banco = $this->conectar();

        if (!empty($this->titulo) and !empty($this->texto) and !empty($this->idProva) and !empty($this->areaConhecimento)) {
            if (!empty($this->imagem)) {
                $img = $this->__get('imagem');
                $nomeImagem = time() .'-'. $img['name'];
                $dir = '../images/upload/' . $nomeImagem;
                if (move_uploaded_file($img['tmp_name'], $dir)) {
                    $query = "INSERT INTO perguntas (titulo, texto, idProva, areaConhecimento, imagem) VALUES (:titulo, :texto, :idProva, :areaConhecimento, :imagem)";

                    $result = $banco->prepare($query);
                    $result->bindParam(':titulo', $this->__get('titulo'));
                    $result->bindParam(':texto', $this->__get('texto'));
                    $result->bindParam(':idProva', $this->__get('idProva'));
                    $result->bindParam(':areaConhecimento', $this->__get('areaConhecimento'));
                    $result->bindParam(':imagem', $nomeImagem);
                    if ($result->execute()) {
                        return true;
                    }
                }
            } else {
                $query = "INSERT INTO perguntas (titulo, texto, idProva, areaConhecimento) VALUES (:titulo, :texto, :idProva, :areaConhecimento)";

                $result = $banco->prepare($query);
                $result->bindParam(':titulo', $this->__get('titulo'));
                $result->bindParam(':texto', $this->__get('texto'));
                $result->bindParam(':idProva', $this->__get('idProva'));
                $result->bindParam(':areaConhecimento', $this->__get('areaConhecimento'));
                if ($result->execute()) {
                    return true;
                }
            }
        }
        return false;
    }
}

$titulo = filter_input(INPUT_POST, 'titulo', FILTER_UNSAFE_RAW);
$texto = filter_input(INPUT_POST, 'texto', FILTER_UNSAFE_RAW);
$idProva = filter_input(INPUT_POST, 'idProva', FILTER_UNSAFE_RAW);
$areaConhecimento = filter_input(INPUT_POST, 'areaConhecimento', FILTER_UNSAFE_RAW);
$imagem = $_FILES['imagem'];

$cadastro = new ValidarPerguntas($titulo, $texto, $idProva, $areaConhecimento, $imagem);

if ($cadastro->cadastroPerguntas()) {
    header('Location: ../home.php');
} else {
    header('Location: ../home.php');
}
