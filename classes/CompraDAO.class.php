<?php
namespace padaria\dao;

require 'BaseDAO.php';

use PDOException;
define('TABLENAME', 'compra');

class CompraDAO extends BaseDAO
{

    // Cria nova compra
    public function novaComprar($dados)
    {
        try {
            $sql = $this->conexao->prepare("insert into " . TABLENAME . " (cnpj, datcom, valor) values (?,?,?)");
            $sql->execute($dados);
        } catch (PDOException $e) {
            echo "Erro inserir: " . $e->getMessage();
        }
    }

    // Altera os valores da compra caso algum erro, deve se passar todos os parametros cnpj/ datcom / valor / codcom (cod da compra que sera alterada)
    public function alteraCompras($dados)
    {
        try {
            $sql = $this->conexao->prepare("update " . TABLENAME . " set cnpj = (?), datcom = (?), valor = (?) where codcom = (?)");
            $sql->execute($dados);
        } catch (PDOException $e) {
            echo "Erro inserir: " . $e->getMessage();
        }
    }

    // Verificar como devolver os valores para o banco quando a compra for cancelada
    public function cancelarCompra($codigo)
    {
        try {
            $sql = $this->conexao->prepare("delete from " . TABLENAME . " where codcom = (?)");
            $sql->execute($codigo);
        } catch (PDOException $e) {
            echo "Erro excluir: " . $e->getMessage();
        }
    }

    // Busca compra pelo codigo
    public function buscarCompraCod($codigo)
    {
        try {
            $sql = $this->conexao->prepare("select * from " . TABLENAME . " where codcom = (?)");
            $resultado = $sql->execute($codigo);
            $genero = $resultado->fetch();
            return $genero;
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

    // Busca compra pelo cnpj do vendedor
    public function buscarCompraCNPJ($codigo)
    {
        try {
            $sql = $this->conexao->prepare("select * from " . TABLENAME . " where cnpj = (?)");
            $resultado = $sql->execute($codigo);
            $genero = $resultado->fetch();
            return $genero;
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

    // Retorna todas as compras
    public function getCompras()
    {
        try {
            $sql = $this->conexao->prepare("select * from " . TABLENAME);
            $resultado = $sql->query();
            $generos = $resultado->fetchAll();
            return $generos;
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
}