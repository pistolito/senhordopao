<?php
namespace padaria\dao;

require '../classes/BaseDAO.class.php';

use PDOException;
define('TABLENAME', 'fornecedor');

class FornecedorDAO extends BaseDAO
{

    // Adiciona novo fornecedor ao banco, cnpj/nom/endereco/datfun
    public function novoFornecedor($dados)
    {
        try {
            $sql = $this->conexao->prepare("insert into " . TABLENAME . " (cnpj, nom, rua, bairro, endnum, cep, endref, datcad, datfun) values (?, ?, ?, ?, ?, ?, ?, current_timestamp, ?)");
            $sql->execute($dados);
        } catch (PDOException $e) {
            echo "Erro inserir: " . $e->getMessage();
        }
    }

    // Altera cnpj de banco com base no cnpj antigo, novo cnpj/cnpj antigo
    public function alterarCNPJ($dados)
    {
        try {
            $sql = $this->conexao->prepare("update " . TABLENAME . " set cnpj = (?) where cnpj = (?)");
            $sql->execute($dados);
        } catch (PDOException $e) {
            echo "Erro inserir: " . $e->getMessage();
        }
    }

    // altera nome da empresa, novo nome/cnpj pra pesquisa
    public function alterarNome($dados)
    {
        try {
            $sql = $this->conexao->prepare("update " . TABLENAME . " set nom = (?) where cnpj = (?)");
            $sql->execute($dados);
        } catch (PDOException $e) {
            echo "Erro inserir: " . $e->getMessage();
        }
    }

    // Alterar endereco, novo endereco/cnpj
    public function alteraEndereco($dados)
    {
        try {
            $sql = $this->conexao->prepare("update " . TABLENAME . " set rua = (?), bairro = (?), endnum = (?), cep = (?) where cnpj = (?);");
            $sql->execute($dados);
        } catch (PDOException $e) {
            echo "Erro inserir: " . $e->getMessage();
        }
    }

    // Tratar essa funcao para nao retornar os fronecedores excluidos
    public function getFornecedores()
    {
        try {
            $sql = $this->conexao->prepare("select * from " . TABLENAME . " where exc = 0");
            $resultado = $sql->query();
            $fornecedor = $resultado->fetchAll();
            return $fornecedor;
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
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
    
    
    // Retorna apenas os fernecedores excluidos
    public function getFornecedoresExcluidos()
    {
        try {
            $sql = $this->conexao->prepare("select * from " . TABLENAME . " where exc = 1");
            $resultado = $sql->query();
            $fornecedor = $resultado->fetchAll();
            return $fornecedor;
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

    // tratar essa funcao para nao retornar os fronecedores excluidos
    public function buscarFornecedor($codigo)
    {
        try {
            $sql = $this->conexao->prepare("select * from " . TABLENAME . " where cnpj = (?) and exc = 0");
            $resultado = $sql->execute($codigo);
            $fornecedor = $resultado->fetch();
            return $fornecedor;
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
    
    public function buscarFornecedorExcluido($codigo)
    {
        try {
            $sql = $this->conexao->prepare("select * from " . TABLENAME . " where cnpj = (?) and exc = 1");
            $resultado = $sql->execute($codigo);
            $fornecedor = $resultado->fetch();
            return $fornecedor;
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

    // exclui fornecedor pelo cnpj
    public function excluirFornecedor($codigo)
    {
        try {
            $sql = $this->conexao->prepare("update " . TABLENAME . " set datex = current_timestamp, exc = 1 where cnpj = (?)");
            $sql->execute($codigo);
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
}