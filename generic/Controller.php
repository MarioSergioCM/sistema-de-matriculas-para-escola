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