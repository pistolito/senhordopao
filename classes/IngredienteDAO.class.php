<?php
namespace padaria\dao;

require 'BaseDAO.php';

use PDOException;
define('TABLENAME', 'ingrediente');

class IngredienteDAO extends BaseDAO
{

    // Cadastra novos ingredientes
    public function novoIngrediente($dados)
    {
        try {
            $sql = $this->conexao->prepare("insert into " . TABLENAME . " (peso, custo, nom, quant, datcad) values (?, ?, ?, ?, current_timestamp)");
            $sql->execute($dados);
        } catch (PDOException $e) {
            echo "Erro inserir: " . $e->getMessage();
        }
    }

    // Atualiza informacoes sobre ingredientes
    public function updateIngrediente($dados)
    {
        try {
            $sql = $this->conexao->prepare("update " . TABLENAME . " peso = (?), custo = (?), nom = (?) where cod = (?)");
            $sql->execute($dados);
        } catch (PDOException $e) {
            echo "Erro inserir: " . $e->getMessage();
        }
    }

    // Adiciona ingredientes ao estoque, quant/cod
    public function addIngrediente($dados)
    {
        try {
            $sql = $this->conexao->prepare("update " . TABLENAME . " quant = quant + (?), datcad = current_timestamp where cod = (?)");
            $sql->execute($dados);
        } catch (PDOException $e) {
            echo "Erro inserir: " . $e->getMessage();
        }
    }

    // Busca ingrediente pelo cod
    public function buscarIngredienteCod($dados)
    {
        try {
            $sql = $this->conexao->prepare("select * from " . TABLENAME . " where cod = (?) and exc = 0");
            $resultado = $sql->execute($dados);
            $ingrediente = $resultado->fetch();
            return $ingrediente;
        } catch (PDOException $e) {
            echo "Erro inserir: " . $e->getMessage();
        }
    }
    
    public function buscarIngredienteCodExcluido($dados)
    {
        try {
            $sql = $this->conexao->prepare("select * from " . TABLENAME . " where cod = (?) and exc = 1");
            $resultado = $sql->execute($dados);
            $ingrediente = $resultado->fetch();
            return $ingrediente;
        } catch (PDOException $e) {
            echo "Erro inserir: " . $e->getMessage();
        }
    }

    // Busca ingrediente pelo nome
    public function buscarIngredienteNome($dados)
    {
        try {
            $sql = $this->conexao->prepare("select * from " . TABLENAME . " where nom like (?) and exc = 0");
            $resultado = $sql->execute($dados);
            $ingrediente = $resultado->fetch();
            return $ingrediente;
        } catch (PDOException $e) {
            echo "Erro inserir: " . $e->getMessage();
        }
    }
    
    public function buscarIngredienteNomeExcluido($dados)
    {
        try {
            $sql = $this->conexao->prepare("select * from " . TABLENAME . " where nom like (?) and exc = 1");
            $resultado = $sql->execute($dados);
            $ingrediente = $resultado->fetch();
            return $ingrediente;
        } catch (PDOException $e) {
            echo "Erro inserir: " . $e->getMessage();
        }
    }

    // Retorna todos os ingredientes, tratar para nao retornar os ingredientes excuidos
    public function getIngredientes()
    {
        try {
            $sql = $this->conexao->prepare("select * from " . TABLENAME . " where exc = 0");
            $resultado = $sql->query();
            $ingrediente = $resultado->fetchAll();
            return $ingrediente;
        } catch (PDOException $e) {
            echo "Erro atualizar: " . $e->getMessage();
        }
    }
    
    public function getIngredientesExcluidos()
    {
        try {
            $sql = $this->conexao->prepare("select * from " . TABLENAME . " where exc = 1");
            $resultado = $sql->query();
            $ingrediente = $resultado->fetchAll();
            return $ingrediente;
        } catch (PDOException $e) {
            echo "Erro atualizar: " . $e->getMessage();
        }
    }

    // Excluir ingrediente basta passar o cod do imgrediente
    public function excluirIngrediente($codigo)
    {
        try {
            $sql = $this->conexao->prepare("update " . TABLENAME . " set datex = current_timestamp, exc = 1 where cod = (?)");
            $sql->execute($codigo);
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
} 

