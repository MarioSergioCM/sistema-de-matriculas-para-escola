<?php
namespace controller;

use model\Aluno;
use model\Curso;
use service\AlunoService;
use service\CursoService;

class AlunoController {
    private $alunoService;
    private $cursoService;

    public function __construct() {
        $this->alunoService = new AlunoService();
        $this->cursoService = new CursoService();
    }

    public function listar() {
        $alunos = $this->alunoService->listar();
        include 'public/aluno/listar.php';
    }

    public function formulario() {
        $aluno = new Aluno();
        if (isset($_GET['id'])) {
            $aluno = $this->alunoService->buscar($_GET['id']);
        }
        include 'public/aluno/form.php';
    }

    public function salvar() {
        $aluno = new Aluno();
        $aluno->id = $_POST['id'] ?: null; 
        $aluno->nome = $_POST['nome'];
        $aluno->email = $_POST['email'];
        $aluno->cpf = $_POST['cpf'];

        $this->alunoService->salvar($aluno);

        
        header('Location: index.php?param=aluno/listar');
        exit;
    }

    public function excluir() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->alunoService->excluir($id);
        }
        header('Location: index.php?param=aluno/listar');
        exit;
    }

    public function formularioMatricula(){
        $alunos = $this->alunoService->listar();
        $cursos = $this->cursoService->listar();
            include 'public/matricula/form.php';
    }
    
    public function matriculaSalvar(){
        $aluno = new Aluno();
        $curso = new Curso();
        $aluno->id = $_POST['aluno']; 
        $curso->id = $_POST['curso'];

        $this->alunoService->matricular($aluno, $curso);

        
        header('Location: index.php?param=aluno/listar');
        exit;
    }
}