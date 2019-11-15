<?php
namespace padaria\dao;

require '../classes/BaseDAO.class.php';

use PDOException;
define('TABLENAME', 'receita');

class ReceitaDAO extends BaseDAO
{
    //Cria nova receita
    public function novaReceita($dados)
    {
        try {
            $sql = $this->conexao->prepare("insert into " . TABLENAME . " (procod, ingrcod, qnt, custo) values (?, ?, ?, ?)");
            $sql->execute($dados);
        } catch (PDOException $e) {
            echo "Erro inserir: " . $e->getMessage();
        }
    }
    
    //Altera ingredientes 
    public function atualizarFuncao($dados)
    {
        try {
            $sql = $this->conexao->prepare("update " . TABLENAME . " set codingr = (?) where procod = (?)");
            $sql->execute($dados);
        } catch (PDOException $e) {
            echo "Erro atualizar: " . $e->getMessage();
        }
    }
    
    //Busca receita pelo cod do produto
    public function buscarReceitaCodProduto($dados)
    {
        try {
            $sql = $this->conexao->prepare("select * from " . TABLENAME . " where procod = (?)");
            $resultado = $sql->execute($dados);
            $receita = $resultado->fetch();
            return $receita;
        } catch (PDOException $e) {
            echo "Erro inserir: " . $e->getMessage();
        }
    }
    //Busca receita pelo cod do ingrediente
    public function buscarReceitaCodIngrediente($dados)
    {
        try {
            $sql = $this->conexao->prepare("select * from " . TABLENAME . " where procod = (?)");
            $resultado = $sql->execute($dados);
            $receita = $resultado->fetch();
            return $receita;
        } catch (PDOException $e) {
            echo "Erro inserir: " . $e->getMessage();
        }
    }
    
    // Exclui Produto pelo cod
    public function excluir($codigo)
    {
        try {
            $sql = $this->conexao->prepare("update " . TABLENAME . " set datex = current_timestamp, exc = 1 where procod = (?)");
            $sql->execute($codigo);
        } catch (PDOException $e) {
            echo "Erro excluir: " . $e->getMessage();
        }
    }
    
    // Retorna todos os produtos ativos
    public function getReceita()
    {
        try {
            $sql = $this->conexao->prepare("select * from " . TABLENAME . " where exc = 0");
            $resultado = $sql->query();
            $receita = $resultado->fetchAll();
            return $receita;
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
    
   
    public function buscarTodos() {
        try {
            $resultado = $this->conexao->query(
                "select * from " . TABLENAME . " order by procod"
                );
            $pessoa = $resultado->fetchAll();
            return $pessoa;
        } catch (PDOException $e) {
            echo "Erro no buscarTodos: " . $e->getMessage();
        }
    }
    
}