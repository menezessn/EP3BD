<?php 

class Conexao {
    private $dsn = 'mysql:host=localhost;dbname=db_filmes'; 
    private $usuario = 'root';
    private $senha = '';

    public function conectar(){
        try{

            $conexao = new PDO(
                $this->dsn, 
                $this->usuario, 
                $this->senha
            );

            return $conexao;

        }catch(PDOException $e){
            echo '<p>' . $e->getMessage() . '</p>';
        }
    }

}

?>