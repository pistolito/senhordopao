<?php
namespace padaria\dao;

require '../classes/BaseDAO.class.php';

use PDOException;
define('TABLENAME', 'pessoa');

class PessoaDAO extends BaseDAO
{

    public function adicionarPessoa($dados)
    {
        try {
            $sql = $this->conexao->prepare("insert into " . TABLENAME . " (nom, cpf, datnasc, datcad, cargocod) values (?, ?, ?, current_timestamp, ?)");
            $sql->execute($dados);
        } catch (PDOException $e) {
            echo "Erro inserir: " . $e->getMessage();
        }
    }

    // Altera nome pessoa busca pelo cod
    public function alteraNome($dados)
    {
        try {
            $sql = $this->conexao->prepare("update " . TABLENAME . " set nom = (?) where cod = (?)");
            $sql->execute($dados);
        } catch (PDOException $e) {
            echo "Erro atualizar: " . $e->getMessage();
        }
    }

    // Altera senha busca pelo cod
    public function alteraSenha($dados)
    {
        try {
            $sql = $this->conexao->prepare("update " . TABLENAME . " set senha = (?) where cod = (?)");
            $sql->execute($dados);
        } catch (PDOException $e) {
            echo "Erro atualizar: " . $e->getMessage();
        }
    }

    // Altera CPF
    public function alteraCpf($dados)
    {
        try {
            $sql = $this->conexao->prepare("update " . TABLENAME . " set cpf = (?) where cod = (?)");
            $sql->execute($dados);
        } catch (PDOException $e) {
            echo "Erro atualizar: " . $e->getMessage();
        }
    }

    // Altera data de nascimento
    public function alterarDataNascimento($dados)
    {
        try {
            $sql = $this->conexao->prepare("update " . TABLENAME . " set datnasc = (?) where cod = (?)");
            $sql->execute($dados);
        } catch (PDOException $e) {
            echo "Erro atualizar: " . $e->getMessage();
        }
    }

    // Altera Cargo
    public function alteraCargo($dados)
    {
        try {
            $sql = $this->conexao->prepare("update " . TABLENAME . " set cargocod = (?) where cod = (?)");
            $sql->execute($dados);
        } catch (PDOException $e) {
            echo "Erro atualizar: " . $e->getMessage();
        }
    }

    // Adicionar condicao que nao retorne pessoas excluidas
    public function getPessoas()
    {
        try {
            $sql = $this->conexao->prepare("select * from " . TABLENAME . " where exc = 0");
            $resultado = $sql->query();
            $pessoa = $resultado->fetchAll();
            return $pessoa;
        } catch (PDOException $e) {
            echo "Erro atualizar: " . $e->getMessage();
        }
    }
    
    public function getPessoasExcluidas()
    {
        try {
            $sql = $this->conexao->prepare("select * from " . TABLENAME . " where exc = 1");
            $resultado = $sql->query();
            $pessoa = $resultado->fetchAll();
            return $pessoa;
        } catch (PDOException $e) {
            echo "Erro atualizar: " . $e->getMessage();
        }
    }

    // Exclui cadastro da pessoa, busca pelo cod
    public function excluirPessoa($dados)
    {
        try {
            $sql = $this->conexao->prepare("update " . TABLENAME . " set datex = current_timestamp, exc = 1 where cod = (?)");
            $sql->execute($dados);
        } catch (PDOException $e) {
            echo "Erro atualizar: " . $e->getMessage();
        }
    }

    // Busca pessoa pelo cod
    public function buscarPessoa($dados)
    {
        try {
            $sql = $this->conexao->prepare("select * from " . TABLENAME . " where cod = (?) and exc = 0");
            $resultado = $sql->execute($dados);
            $pessoa = $resultado->fetch();
            return $pessoa;
        } catch (PDOException $e) {
            echo "Erro inserir: " . $e->getMessage();
        }
    }
    
    //Busca pessoas pelo nome
    public function buscarPessoaNome($dados)
    {
        try {
            $sql = $this->conexao->prepare("select * from " . TABLENAME . " where nom like = '%(?)%'");
            $resultado = $sql->execute($dados);
            $pessoa = $resultado->fetch();
            return $pessoa;
        } catch (PDOException $e) {
            echo "Erro inserir: " . $e->getMessage();
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
    
    
    
    
    
    
}