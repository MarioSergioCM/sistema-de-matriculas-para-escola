<?php

namespace generic;

class Controller{
    private $arrChamadas=[];
    public function __construct(){
        {
            $this->arrChamadas = [
                "aluno/listar"     => new Acao("AlunoController", "listar"),
                "aluno/formulario" => new Acao("AlunoController", "formulario"),
                "aluno/salvar"     => new Acao("AlunoController", "salvar"),
                "aluno/excluir"    => new Acao("AlunoController", "excluir"),
                "aluno/formularioMatricula"    => new Acao("AlunoController", "formularioMatricula"),
                "matricula/salvar" => new Acao("AlunoController", "matriculaSalvar"),
                "curso/listar"     => new Acao("CursoController", "listar"),
                "curso/formulario" => new Acao("CursoController", "formulario"),
                "curso/salvar"     => new Acao("CursoController", "salvar"),
                "curso/excluir"    => new Acao("CursoController", "excluir"),
                
            ];
        }
    }

    public function verificarChamadas($rota){
        if(isset($this->arrChamadas[$rota])){
            $acao = $this->arrChamadas[$rota];
            $acao->executar();
            return;
        }

        echo "Rota não existe!";
    }
}