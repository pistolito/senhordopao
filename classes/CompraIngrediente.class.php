    <?php
    namespace padaria\dao;

    require 'BaseDAO.php';

    use PDOException;
    define('TABLENAME', 'compra_ingrediente');

    class CompraIngrediente extends BaseDAO
    {

        // Adiciona uma nova compra
        public function compraIngrediente($dados)
        {
            try {
                $sql = $this->conexao->prepare("insert into " . TABLENAME . " (codcom, ingrcod, qnt, valorprod) values (?, ?, ?, ?)");
                $sql->execute($dados);
            } catch (PDOException $e) {
                echo "Erro inserir: " . $e->getMessage();
            }
        }

        // Altera compra caso aj� algum erro, qnt/valor/ codcom
        public function alteraCompras($dados)
        {
            try {
                $sql = $this->conexao->prepare("insert into " . TABLENAME . " qnt = (?), valorprod(?) where codcom = (?)");
                $sql->execute($dados);
            } catch (PDOException $e) {
                echo "Erro inserir: " . $e->getMessage();
            }
        }

        // Busca compra pelo codigo da compra
        public function buscarcodcom($codigo)
        {
            try {
                $sql = $this->conexao->prepare("select * from " . TABLENAME . " where codcom = (?)");
                $resultado = $sql->execute($codigo);
                $compraingr = $resultado->fetch();
                return $compraingr;
            } catch (PDOException $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        // Busca compra pelo cod do ingrediente
        public function buscarcodcom($codigo)
        {
            try {
                $sql = $this->conexao->prepare("select * from " . TABLENAME . " where ingrcod = (?)");
                $resultado = $sql->execute($codigo);
                $compraingr = $resultado->fetch();
                return $compraingr;
            } catch (PDOException $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        // Retorna todas as compras
        public function getComprasIngredientes()
        {
            try {
                $sql = $this->conexao->prepare("select * from " . TABLENAME);
                $resultado = $sql->execute();
                $compraingr = $resultado->fetch();
                return $compraingr;
            } catch (PDOException $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        // Exclui a compra atravez do codigo da compra
        public function excluirCompra($codigo)
        {
            try {
                $sql = $this->conexao->prepare("delete from " . TABLENAME . " where ingrcod = (?)");
                $sql->execute($codigo);
            } catch (PDOException $e) {
                echo "Erro excluir: " . $e->getMessage();
            }
        }
    }