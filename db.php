<?php
class ClasseDB {

    /* Dados do banco */
    protected string  $servidor;
    protected string  $nome_usuario;
    protected string  $senha;
    protected string  $nome_banco;

    public function __construct()
    {

        $this->servidor = "sql10.freemysqlhosting.net"; 
        $this->nome_usuario = "sql10624840";
        $this->senha = "tIreMQAlwg";
        $this->nome_banco = "sql10624840";

        $this->criar_conexao();
    }

    protected function criar_conexao()
    {
        $this->conecta = new mysqli($this->servidor, $this->nome_usuario, $this->senha, $this->nome_banco);

    }

    function query( $query ) 
    {
        try{
            if (!$this->conecta || !$this->conecta->ping()) {
                $this->criar_conexao();
            }
            if ($this->conecta->connect_error) {
                die("Conexão falhou: " . $this->conecta->connect_error . "<br>");
            }
    
            $resultado = $this->conecta->query($query);
    
            return  $resultado;
        } catch (Exception $e) {
            throw new Exception(e);
        }
    }

    function transformar_array( $resultado )
    {
            return $resultado->fetch_all( MYSQLI_ASSOC );
    }

    function close() 
        {
            $this->conecta->close();

        }

}
?>