
<?php
class GetProvas extends Conexao
{

    public function provas()
    {
        $banco = $this->conectar();

            $query = "SELECT * FROM prova";

            $result = $banco->prepare($query);
            if ($result->execute()) {
                $dados = $result->fetchAll(PDO::FETCH_ASSOC);
                return $dados;
            }
        return false;
    }

}
