<?php
class BD
{

    private $conn;

    // Importação de Conexao
    public function __construct($pdo)
    {
        $this->conn = $pdo;
    }

    //lista todos demolays

    public function get_demolays()
    {
        return $this->conn->query("SELECT * FROM tbl_demolay")->fetchAll();

    }

    public function busca_demolay_nome($nome){
        try{
         return  $this->conn->query("SELECT * FROM tbl_demolay WHERE dem_nome LIKE '%",$nome,"%'");
        }catch(PDOException $erro){
            echo "<center><h3><stron>Erro!</stron></h3><br><h5>",$erro->getMessage(),"</h5></center>";
        }
    }



    public function update_demolay($id,$cid,$nome,$email,$estado,$cidade,$capitulo){
        try{
            $this->conn->query("UPDATE `tbl_demolay` SET `dem_cid` = '$cid', `dem_nome` = '$nome', `dem_email` = '$email', `dem_estado` = '$estado', `dem_cidade` = '$cidade', `dem_capitulo` = '$capitulo' WHERE `tbl_demolay`.`dem_id` = $id");
            echo "<center><font color='#228b22'>DeMolay Atualizado com sucesso!</font></center>";

        }catch(PDOException $erro){
            echo "<center><h3><stron>Erro!</stron></h3><br><h5>",$erro->getMessage(),"</h5></center>";

        }

    }


    public function get_demolay($id)
    {
        try {
            return $this->conn->query("SELECT * FROM tbl_demolay WHERE tbl_demolay.dem_id = $id");
        }catch(PDOException $erro){
            echo "<center><h3><stron>Erro!, DeMolay Não Encontrado!</stron></h3><br><h5>",$erro->getMessage(),"</h5></center>";
        }
    }

    public function apaga_demolay($id){
        try{
            $this->conn->query("DELETE FROM `tbl_demolay` WHERE `tbl_demolay`.`dem_id` = $id");
            echo "<center><font color='#228b22'>DeMolay Deletado com sucesso!</font></center>";
        }catch(PDOException $erro){
            echo "Erro: ",$erro->getMessage();
        }
    }

    public function insere_demolay($cid, $nome, $email, $estado, $cidade, $capitulo)
    {
        try {
            $stmt = $this->conn->prepare('INSERT INTO tbl_demolay VALUES(null,:cid,:nome,:email,:estado,:cidade,:capitulo)');
            $stmt->execute(array(
                ':cid' => $cid,
                ':nome' => $nome,
                ':email' => $email,
                ':estado' => $estado,
                ':cidade' => $cidade,
                ':capitulo' => $capitulo
            ));
            echo "<center><font color='#228b22'>DeMolay Cadastrado com sucesso!</font></center>";

        } catch (PDOException $erro) {
            echo "<center><h3><stron>Erro!, Talvez ja exista um DeMolay Com as mesmas Credenciais!</stron></h3><br><h5>",$erro->getMessage(),"</h5></center>";


        }
    }
}
?>