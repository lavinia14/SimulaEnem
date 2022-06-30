<?php
require_once('../bd/conexão.php');

class EditarPergunta extends Conexao
{   
    private $id;
    private $titulo;
    private $texto;
    private $idProvas;
    private $areaConhecimento;
    private $imagem;
    public function __construct($titulo, $texto, $idProvas, $areaConhecimento, $imagem, $id)
    {
        $this->titulo = $titulo;
        $this->texto = $texto;
        $this->idProvas = $idProvas;
        $this->areaConhecimento = $areaConhecimento;
        $this->imagem = $imagem;
        $this->id = $id;
    }
    public function __get($name)
    {
        return $this->$name;
    }


    public function cadastroPerguntas()
    {
        $banco = $this->conectar();

        if (!empty($this->titulo) and !empty($this->texto) and !empty($this->idProvas) and !empty($this->areaConhecimento)) {
            if (!empty($this->imagem)) {
                $img = $this->__get('imagem');
                $nomeImagem = time() .'-'. $img['name'];
                $dir = '../images/upload/' . $nomeImagem;
                if (move_uploaded_file($img['tmp_name'], $dir)) {
                    $query = "UPDATE perguntas SET titulo = :titulo, texto = :texto, idProvas = :idProvas, areaConhecimento = :areaConhecimento, imagem = :imagem WHERE id = :id";

                    $result = $banco->prepare($query);
                    $result->bindParam(':titulo', $this->__get('titulo'));
                    $result->bindParam(':texto', $this->__get('texto'));
                    $result->bindParam(':idProvas', $this->__get('idProvas'));
                    $result->bindParam(':areaConhecimento', $this->__get('areaConhecimento'));
                    $result->bindParam(':imagem', $nomeImagem);
                    $result->bindParam(':id', $this->__get('id'));
                    if ($result->execute()) {
                        return true;
                    }
                }
            } else {
                $query = "UPDATE perguntas SET titulo = :titulo, texto = :texto, idProvas = :idProvas, areaConhecimento = :areaConhecimento WHERE id = :id";

                $result = $banco->prepare($query);
                $result->bindParam(':titulo', $this->__get('titulo'));
                $result->bindParam(':texto', $this->__get('texto'));
                $result->bindParam(':idProvas', $this->__get('idProvas'));
                $result->bindParam(':areaConhecimento', $this->__get('areaConhecimento'));
                $result->bindParam(':id', $this->__get('id'));
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
$idProvas = filter_input(INPUT_POST, 'idProvas', FILTER_UNSAFE_RAW);
$areaConhecimento = filter_input(INPUT_POST, 'areaConhecimento', FILTER_UNSAFE_RAW);
$id = filter_input(INPUT_POST, 'id', FILTER_UNSAFE_RAW);
$imagem = $_FILES['imagem'];

$cadastro = new EditarPergunta($titulo, $texto, $idProvas, $areaConhecimento, $imagem, $id);

if ($cadastro->cadastroPerguntas()) {
    header('Location: ../home.php');
} else {
    header('Location: ../home.php');
}