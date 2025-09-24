<?php

namespace dao;
use model\Aluno;
use model\Curso;

interface IAlunoDAO {
    public function buscarPorId($id);
    public function listarTodos();
    public function criar(Aluno $aluno);
    public function atualizar(Aluno $aluno);
    public function deletar($id);
    public function matricular(Aluno $aluno, Curso $curso);
}