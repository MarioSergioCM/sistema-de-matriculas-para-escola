<?php

namespace dao;
use model\Aluno;

interface IAlunoDAO {
    public function buscarPorId($id);
    public function listarTodos();
    public function criar(Aluno $aluno);
    public function atualizar(Aluno $aluno);
    public function deletar($id);
}