
<?php
require_once('../bd/conexão.php');

class ValidarPerguntas extends Conexao
{   
    private $id;
    private $titulo;
    private $texto;
    private $idProvas;
    private $areaConhecimento;
    private $imagem;

    public function __construct($id, $titulo, $texto, $idProvas, $areaConhecimento, $imagem)
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->texto = $texto;
        $this->idProvas = $idProvas;
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

        if (!empty($this->id) and !empty($this->titulo) and !empty($this->texto) and !empty($this->idProvas) and !empty($this->areaConhecimento)) {
            if (!empty($this->imagem)) {
                $img = $this->__get('imagem');
                $nomeImagem = time() .'-'. $img['name'];
                $dir = '../images/upload/' . $nomeImagem;
                if (move_uploaded_file($img['tmp_name'], $dir)) {
                    $query = "INSERT INTO perguntas (id, titulo, texto, idProvas, areaConhecimento, imagem) VALUES (:id, :titulo, :texto, :idProvas, :areaConhecimento, :imagem)";

                    $result = $banco->prepare($query);
                    $result->bindParam(':id', $this->__get('id'));
                    $result->bindParam(':titulo', $this->__get('titulo'));
                    $result->bindParam(':texto', $this->__get('texto'));
                    $result->bindParam(':idProvas', $this->__get('idProvas'));
                    $result->bindParam(':areaConhecimento', $this->__get('areaConhecimento'));
                    $result->bindParam(':imagem', $nomeImagem);
                    if ($result->execute()) {
                        return true;
                    }
                }
            } else {
                $query = "INSERT INTO perguntas (id, titulo, texto, idProvas, areaConhecimento) VALUES (:id, :titulo, :texto, :idProvas, :areaConhecimento)";

                $result = $banco->prepare($query);
                $result->bindParam(':id', $this->__get('id'));
                $result->bindParam(':titulo', $this->__get('titulo'));
                $result->bindParam(':texto', $this->__get('texto'));
                $result->bindParam(':idProvas', $this->__get('idProvas'));
                $result->bindParam(':areaConhecimento', $this->__get('areaConhecimento'));
                if ($result->execute()) {
                    return true;
                }
            }
        }
        return false;
    }
}
$id = filter_input(INPUT_POST, 'id', FILTER_UNSAFE_RAW);
$titulo = filter_input(INPUT_POST, 'titulo', FILTER_UNSAFE_RAW);
$texto = filter_input(INPUT_POST, 'texto', FILTER_UNSAFE_RAW);
$idProvas = filter_input(INPUT_POST, 'idProvas', FILTER_UNSAFE_RAW);
$areaConhecimento = filter_input(INPUT_POST, 'areaConhecimento', FILTER_UNSAFE_RAW);
$imagem = $_FILES['imagem'];

$cadastro = new ValidarPerguntas($id, $titulo, $texto, $idProvas, $areaConhecimento, $imagem);

if ($cadastro->cadastroPerguntas()) {
    header('Location: ../addAlternativas.php');
} else {
    header('Location: ../addAlternativas.php');
}
