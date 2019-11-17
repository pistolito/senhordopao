<?php
namespace padaria\dao;

require 'BaseDAO.php';

use PDOException;
define('TABLENAME', 'venda_produto');

class VendaProdutoDAO extends BaseDAO
{

    // Nova venda
    public function novaVenda($dados)
    {
        try {
            $sql = $this->conexao->prepare("insert into " . TABLENAME . " (vendacodven, produtocod, qnt, valorprod) values (?, ?, ?, ?)");
            $sql->execute($dados);
        } catch (PDOException $e) {
            echo "Erro inserir: " . $e->getMessage();
        }
    }

    // Retorna todas as vendas
    public function getVenda()
    {
        try {
            $sql = $this->conexao->prepare("select * from " . TABLENAME);
            $resultado = $sql->query();
            $vendaprod = $resultado->fetchAll();
            return $vendaprod;
        } catch (PDOException $e) {
            echo "Erro inserir: " . $e->getMessage();
        }
    }

    // Busca venda pelo vendacodven
    public function buscarVendaProdutoCod($codigo)
    {
        try {
            $sql = $this->conexao->prepare("select * from " . TABLENAME . " where vendacodven = (?)");
            $resultado = $sql->execute($codigo);
            $vendaprod = $resultado->fetch();
            return $vendaprod;
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

    // Busca venda pelo produtocod
    public function buscarVendaProdutoCod($codigo)
    {
        try {
            $sql = $this->conexao->prepare("select * from " . TABLENAME . " where produtcod = (?)");
            $resultado = $sql->execute($codigo);
            $vendaprod = $resultado->fetch();
            return $vendaprod;
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
}