<?php

namespace dao;
use model\Curso;

interface ICursoDAO {
    public function buscarPorId($id);
    public function listarTodos();
    public function criar(Curso $curso);
    public function atualizar(Curso $curso);
    public function deletar($id);
}