
<?php
class GetProvas extends Conexao
{
    private $id;

    public function __construct($id){
        $this->id = $id;
    }
    public function provas()
    {
        $banco = $this->conectar();

            $query = "SELECT * FROM provas WHERE anoProva = :id";

            $result = $banco->prepare($query);
            $result->bindValue(':id', $this->id);
            if ($result->execute()) {
                $dados = $result->fetchAll(PDO::FETCH_ASSOC);
                return $dados;
            }
        return false;
    }
    public function pergunta($id)
    {
        $banco = $this->conectar();

            $query = "SELECT * FROM perguntas WHERE id = :id";

            $result = $banco->prepare($query);
            $result->bindValue(':id', $id);
            if ($result->execute()) {
                $dados = $result->fetchAll(PDO::FETCH_ASSOC);
                return $dados[0];
            }
        return [];
    }
    
}
