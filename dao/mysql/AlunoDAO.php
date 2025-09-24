<?php
// dao/mysql/AlunoDAO.php
namespace dao\mysql;

use dao\IAlunoDAO;
use generic\MysqlSingleton;
use model\Aluno;
use model\Curso;
use PDO;
use PDOException;

class AlunoDAO implements IAlunoDAO {

    public function listarTodos() {
        try {
            $singleton = MysqlSingleton::getInstance();

            $pdo = $singleton->connect();
            //query para buscar alunos, simultaneamente carregando os nomes dos cursos.
            $sql = "SELECT a.id, a.nome, a.email, a.cpf, GROUP_CONCAT(DISTINCT c.nome SEPARATOR ', ') as cursos FROM alunos a
                    LEFT JOIN alunos_cursos ac ON a.id = ac.aluno_id
                    LEFT JOIN cursos c ON ac.curso_id = c.id
                    GROUP BY a.id";
            $sth = $pdo->query($sql);
            
            return $sth->fetchAll(PDO::FETCH_CLASS, 'model\Aluno');
        } catch (PDOException $e) {
            // Em caso de erro, retorna um array vazio para não quebrar a view.
            return [];
        }
    }
    
    public function buscarPorId($id) {
        try {
            $singleton = MysqlSingleton::getInstance();
            $pdo = $singleton->connect();

            $sql = "SELECT id, nome, email, cpf FROM alunos WHERE id = :id";
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':id', $id, PDO::PARAM_INT);
            $sth->execute();
            
            return $sth->fetchObject('model\Aluno');
        } catch (PDOException $e) {
            return false;
        }
    }

    public function criar(Aluno $aluno) {
        try {
            $singleton = MysqlSingleton::getInstance();
            $pdo = $singleton->connect();

            $sql = "INSERT INTO alunos (nome, email, cpf) VALUES (:nome, :email, :cpf)";
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':nome', $aluno->nome);
            $sth->bindValue(':email', $aluno->email);
            $sth->bindValue(':cpf', $aluno->cpf);
            $sth->execute();
            
            return $pdo->lastInsertId();
        } catch (PDOException $e) {
            return false;
        }
    }

    public function atualizar(Aluno $aluno) {
        try {
            $singleton = MysqlSingleton::getInstance();
            $pdo = $singleton->connect();

            $sql = "UPDATE alunos SET nome = :nome, email = :email, cpf = :cpf WHERE id = :id";
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':id', $aluno->id, PDO::PARAM_INT);
            $sth->bindValue(':nome', $aluno->nome);
            $sth->bindValue(':email', $aluno->email);
            $sth->bindValue(':cpf', $aluno->cpf);
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

            $sql = "DELETE FROM alunos WHERE id = :id";
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':id', $id, PDO::PARAM_INT);
            $sth->execute();
            
            return $sth->rowCount() > 0;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function matricular(Aluno $aluno, Curso $curso) {
        try {
            $singleton = MysqlSingleton::getInstance();
            $pdo = $singleton->connect();

            $sql = "INSERT INTO alunos_cursos (aluno_id, curso_id) VALUES (:aluno_id, :curso_id)";
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':aluno_id', $aluno->id);
            $sth->bindValue(':curso_id', $curso->id);
            $sth->execute();
            
            return $pdo->lastInsertId();
        } catch (PDOException $e) {
            return false;
        }
    }
}