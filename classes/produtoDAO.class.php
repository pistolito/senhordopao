<?php
namespace padaria\dao;

require '../classes/BaseDAO.class.php';

use PDOException;
define('TABLENAME', 'produto');

class ProdutoDAO extends BaseDAO
{

    // Adiciona novo produto
    public function adicionarProduto($dados)
    {
        try {
            $sql = $this->conexao->prepare("insert into " . TABLENAME . " (nom, peso, preco, datcad) values (?, ?, ?, current_timestamp)");
            $sql->execute($dados);
        } catch (PDOException $e) {
            echo "Erro inserir: " . $e->getMessage();
        }
    }

    // Exclui Produto pelo cod
    public function excluir($codigo)
    {
        try {
            $sql = $this->conexao->prepare("update " . TABLENAME . " set datex = current_timestamp, exc = 1 where cod = (?)");
            $sql->execute($codigo);
        } catch (PDOException $e) {
            echo "Erro excluir: " . $e->getMessage();
        }
    }

    // atualiza nome do produto
    public function atualizarNomeProduto($dados)
    {
        try {
            $sql = $this->conexao->prepare("update " . TABLENAME . " set nom = (?) where cod = (?)");
            $sql->execute($dados);
        } catch (PDOException $e) {
            echo "Erro atualizar: " . $e->getMessage();
        }
    }

    // Atualiza Peso
    public function atualizarPesoProduto($dados)
    {
        try {
            $sql = $this->conexao->prepare("update " . TABLENAME . " set peso = (?) where cod = (?)");
            $sql->execute($dados);
        } catch (PDOException $e) {
            echo "Erro atualizar: " . $e->getMessage();
        }
    }

    // Atualiza preco
    public function atualizarPrecoProduto($dados)
    {
        try {
            $sql = $this->conexao->prepare("update " . TABLENAME . " set preco = (?) where cod = (?)");
            $sql->execute($dados);
        } catch (PDOException $e) {
            echo "Erro atualizar: " . $e->getMessage();
        }
    }

    // Busca produto pelo cod
    public function buscarProdutoCod($codigo)
    {
        try {
            $sql = $this->conexao->prepare("select * from " . TABLENAME . " where cod = (?)");
            $resultado = $sql->execute($codigo);
            $produto = $resultado->fetch();
            return $produto;
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

    // Busca produto pelo nome
    public function buscarProdutoNome($dados)
    {
        try {
            $sql = $this->conexao->prepare("select * from " . TABLENAME . " where nom like = '(?)'");
            $resultado = $sql->execute($dados);
            $produto = $resultado->fetch();
            return $produto;
        } catch (PDOException $e) {
            echo "Erro inserir: " . $e->getMessage();
        }
    }

    // Retorna todos os produtos ativos
    public function buscarTodos() {
        try {
            $resultado = $this->conexao->query(
                "select * from " . TABLENAME . " order by nom"
                );
            $pessoa = $resultado->fetchAll();
            return $pessoa;
        } catch (PDOException $e) {
            echo "Erro no buscarTodos: " . $e->getMessage();
        }
    }
    
    
    // Retorna todos os produtos excluidos
    public function getProdutosExcluidos()
    {
        try {
            $sql = $this->conexao->prepare("select * from " . TABLENAME . " where exc = 1");
            $resultado = $sql->query();
            $produto = $resultado->fetchAll();
            return $produto;
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
}