<?php
class Conexao extends PDO {
    private $host = "localhost";
    private $dbname = "EXERCICIOS";
    private $user = "postgres";
    private $password = "thiago9243";
    private $sgdb = "pgsql";
    private $port = 5432;
    private $status;

    public function __construct()
    {
        try {
            parent::__construct("{$this->sgdb}:host={$this->host};dbname={$this->dbname};port={$this->port}", $this->user, $this->password);
            $this->status = "Conectado";
        } catch (PDOException $e) {
            $this->status = 'Erro na conexão: ' . $e->getMessage();
        }
    }

    public function statusConexao() {
        return $this->status;
    }
}
?>
