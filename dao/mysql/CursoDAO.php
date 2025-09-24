<?php
// dao/mysql/AlunoDAO.php
namespace dao\mysql;

use dao\ICursoDAO;
use generic\MysqlSingleton;
use model\Curso;
use PDO;
use PDOException;

class CursoDAO implements ICursoDAO {

    public function listarTodos() {
        try {
            $singleton = MysqlSingleton::getInstance();

            $pdo = $singleton->connect();

            $sql = "SELECT id, nome FROM cursos ORDER BY nome";
            $sth = $pdo->query($sql);
            
            return $sth->fetchAll(PDO::FETCH_CLASS, 'model\Curso');
        } catch (PDOException $e) {
            // Em caso de erro, retorna um array vazio para não quebrar a view.
            return [];
        }
    }
    
    public function buscarPorId($id) {
        try {
            $singleton = MysqlSingleton::getInstance();
            $pdo = $singleton->connect();

            $sql = "SELECT id, nome FROM cursos WHERE id = :id";
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':id', $id, PDO::PARAM_INT);
            $sth->execute();
            
            return $sth->fetchObject('model\Curso');
        } catch (PDOException $e) {
            return false;
        }
    }

    public function criar(Curso $curso) {
        try {
            $singleton = MysqlSingleton::getInstance();
            $pdo = $singleton->connect();

            $sql = "INSERT INTO cursos (nome) VALUES (:nome)";
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':nome', $curso->nome);
            $sth->execute();
            
            return $pdo->lastInsertId();
        } catch (PDOException $e) {
            return false;
        }
    }

    public function atualizar(Curso $curso) {
        try {
            $singleton = MysqlSingleton::getInstance();
            $pdo = $singleton->connect();

            $sql = "UPDATE cursos SET nome = :nome WHERE id = :id";
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':id', $curso->id, PDO::PARAM_INT);
            $sth->bindValue(':nome', $curso->nome);
            $sth->execute();
            
            return $sth->rowCount() > 0;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function deletar($id) {
        try {
            $singleton = MysqlSingleton::getInstance();
            $pdo = $singleton->connect();

            $sql = "DELETE FROM cursos WHERE id = :id";
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':id', $id, PDO::PARAM_INT);
            $sth->execute();
            
            return $sth->rowCount() > 0;
        } catch (PDOException $e) {
            return false;
        }
    }
}