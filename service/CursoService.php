<?php

namespace service;

use dao\mysql\CursoDAO;
use model\Curso;

class CursoService {
    private $CursoDAO;

    public function __construct() {
        $this->CursoDAO = new CursoDAO();
    }

    public function listar() {
        return $this->CursoDAO->listarTodos();
    }

    public function buscar($id) {
        return $this->CursoDAO->buscarPorId($id);
        
    }

    public function excluir($id) {
        return $this->CursoDAO->deletar($id);
    }

    public function salvar(Curso $curso) {
        if ($curso->id) {
            return $this->CursoDAO->atualizar($curso);
        } else {
            return $this->CursoDAO->criar($curso);
        }
    }
    public function buscarPorNome($nome) {
        return $this->CursoDAO->buscarPorNome($nome);
}
    
}