<?php
namespace padaria\dao;

require 'BaseDAO.php';

use PDOException;
define('TABLENAME', 'venda');

class VendaDAO extends BaseDAO
{

    // Adiciona nova venda
    public function vender($dados)
    {
        try {
            $sql = $this->conexao->prepare("insert into " . TABLENAME . " (pessoacod, datven, valor) values (?, ?, ?)");
            $sql->execute($dados);
        } catch (PDOException $e) {
            echo "Erro inserir: " . $e->getMessage();
        }
    }

    // Busca venda pelo codigo da venda
    public function buscarVenda($dados)
    {
        try {
            $sql = $this->conexao->prepare("select * from " . TABLENAME . " where codven  = (?)");
            $resultado = $sql->query();
            $venda = $resultado->fetchAll();
            return $venda;
        } catch (PDOException $e) {
            echo "Erro inserir: " . $e->getMessage();
        }
    }

    // Retorna todas as vendas
    public function getVendas()
    {
        try {
            $sql = $this->conexao->prepare("select * from " . TABLENAME);
            $resultado = $sql->query();
            $venda = $resultado->fetchAll();
            return $venda;
        } catch (PDOException $e) {
            echo "Erro atualizar: " . $e->getMessage();
        }
    }

    // Exclui uma venda
    public function excluirVenda($codigo)
    {
        try {
            $sql = $this->conexao->prepare("delete from " . TABLENAME . " where codven = (?)");
            $sql->execute($codigo);
        } catch (PDOException $e) {
            echo "Erro excluir: " . $e->getMessage();
        }
    }
}
