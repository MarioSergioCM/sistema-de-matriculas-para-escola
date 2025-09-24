<?php
namespace controller;

use model\Aluno;
use service\AlunoService;

class AlunoController {
    private $alunoService;

    public function __construct() {
        $this->alunoService = new AlunoService();
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
}