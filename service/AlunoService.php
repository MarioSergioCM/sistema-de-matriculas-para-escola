<?php

namespace service;

use dao\mysql\AlunoDAO;
use model\Aluno;

class AlunoService {
    private $alunoDAO;

    public function __construct() {
        $this->alunoDAO = new AlunoDAO();
    }

    public function listar() {
        return $this->alunoDAO->listarTodos();
    }

    public function buscar($id) {
        return $this->alunoDAO->buscarPorId($id);
    }

    public function excluir($id) {
        return $this->alunoDAO->deletar($id);
    }

    public function salvar(Aluno $aluno) {
        if ($aluno->id) {
            return $this->alunoDAO->atualizar($aluno);
        } else {
            return $this->alunoDAO->criar($aluno);
        }
    }
}