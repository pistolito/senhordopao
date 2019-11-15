<?php
namespace padaria\dao;

require 'Conexao.class.php';
use padaria\db\Conexao;

class BaseDAO {
    protected $conexao = null;
    public function __construct() {
        $this->conexao = Conexao::conectar();
    }
}
