<?php
namespace padaria\dao;

require 'BaseDAO.php';

use PDOException;
define('TABLENAME', 'ingrediente_receita');

class IngredienteReceitaDAO extends BaseDAO
{
    //Adiciona um registro de que foi feita uma receita 
    public function novaReceita($dados)
    {
        try {
            $sql = $this->conexao->prepare("insert into " . TABLENAME . " (procod, nom, ingrcod, nomingr,  dat) values (?, ?, ?, ?, current_timestamp)");
            $sql->execute($dados);
        } catch (PDOException $e) {
            echo "Erro inserir: " . $e->getMessage();
        }
    }
    
    // Exclui ingrediente pelo cod
    public function excluir($codigo)
    {
        try {
            $sql = $this->conexao->prepare("delete from " . TABLENAME . " where ingrcod = (?)");
            $sql->execute($codigo);
        } catch (PDOException $e) {
            echo "Erro excluir: " . $e->getMessage();
        }
    }
}