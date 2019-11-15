<?php
namespace padaria\dao;

require 'BaseDAO.class.php';

use PDOException;
define('TABLENAME', 'cargo');

class CargoDAO extends BaseDAO
{

    public function incerirCargo($dados)
    {
        try {
            $sql = $this->conexao->prepare("insert into " . TABLENAME . " (func, salario) values (?, ?)");
            $sql->execute($dados);
        } catch (PDOException $e) {
            echo "Erro inserir: " . $e->getMessage();
        }
    }

    public function atualizarCargos($dados)
    {
        try {
            $sql = $this->conexao->prepare("update " . TABLENAME . " set func = (?), salario = (?) where cod = (?)");
            $sql->execute($dados);
        } catch (PDOException $e) {
            echo "Erro atualizar: " . $e->getMessage();
        }
    }

    public function atualizarSalario($dados)
    {
        try {
            $sql = $this->conexao->prepare("update " . TABLENAME . " set salario = (?) where cod = (?)");
            $sql->execute($dados);
        } catch (PDOException $e) {
            echo "Erro atualizar: " . $e->getMessage();
        }
    }

    public function atualizarFuncao($dados)
    {
        try {
            $sql = $this->conexao->prepare("update " . TABLENAME . " set func = (?) where cod = (?)");
            $sql->execute($dados);
        } catch (PDOException $e) {
            echo "Erro atualizar: " . $e->getMessage();
        }
    }

    public function getCargos()
    {
        try {
            $sql = $this->conexao->prepare("select * from " . TABLENAME);
            $resultado = $sql->query();
            $cargo = $resultado->fetchAll();
            return $cargo;
        } catch (PDOException $e) {
            echo "Erro atualizar: " . $e->getMessage();
        }
    }

    // Busca cargo pelo codigo
    public function buscarCargoCod($dados)
    {
        try {
            $sql = $this->conexao->prepare("select * from " . TABLENAME . " where cod = (?)");
            $resultado = $sql->execute($dados);
            $cargo = $resultado->fetch();
            return $cargo;
        } catch (PDOException $e) {
            echo "Erro inserir: " . $e->getMessage();
        }
    }

    // Busca cargo pela funcao ou parte do nome da funcao
    public function buscarCargofunc($dados)
    {
        try {
            $sql = $this->conexao->prepare("select * from " . TABLENAME . " where func like '(?)'");
            $resultado = $sql->execute($dados);
            $cargo = $resultado->fetch();
            return $cargo;
        } catch (PDOException $e) {
            echo "Erro inserir: " . $e->getMessage();
        }
    }

    public function excluirCargo($codigo)
    {
        try {
            $sql = $this->conexao->prepare("delete from " . TABLENAME . " where cod = (?)");
            $sql->execute($codigo);
        } catch (PDOException $e) {
            echo "Erro excluir: " . $e->getMessage();
        }
    }
}