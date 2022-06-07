<?php
class GetAcertos extends Conexao
{

    public function alternativas($id)
    {
        $banco = $this->conectar();
        $query = "SELECT * FROM alternativas WHERE pergunta_id = :id";
        $stmt = $banco->prepare($query);
        $stmt->bindValue(":id", $id);
        if($stmt->execute()){
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        return false;
    }
    public function perguntas($id)
    {
        $banco = $this->conectar();
        $query = "SELECT * FROM perguntas WHERE id = :id";
        $stmt = $banco->prepare($query);
        $stmt->bindValue(":id", $id);
        if($stmt->execute()){
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        return false;
    }
}
