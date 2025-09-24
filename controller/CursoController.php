<?php
namespace controller;

use model\Curso;
use service\CursoService;

class CursoController {
    private $cursoService;

    public function __construct() {
        $this->cursoService = new CursoService();
    }

    public function listar() {
        $cursos = $this->cursoService->listar();
        include 'public/curso/listar.php';
    }

    public function formulario() {
        $curso = new Curso();
        if (isset($_GET['id'])) {
            $curso = $this->cursoService->buscar($_GET['id']);
        }
        include 'public/curso/form.php';
    }

    public function salvar() {

        $curso = new Curso();
        $curso->id = $_POST['id'] ?: null;
        $curso->nome = $_POST['nome'];
        if ($curso->id == null){
            $curso = $this->cursoService->buscarPorNome($curso->nome);
            if ($curso != null && $curso->id != $_POST['id']) {
                unset($curso);
                $erro = "este curso ja existe.";
                include 'public/curso/form.php';
                return;
            }
        }
        $this->cursoService->salvar($curso);


    header('Location: index.php?param=curso/listar');
    exit;
}

    public function excluir() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->cursoService->excluir($id);
        }
        header('Location: index.php?param=curso/listar');
        exit;
    }
}