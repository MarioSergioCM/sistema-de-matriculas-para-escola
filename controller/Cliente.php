<?php
namespace controller;

use service\ClienteService;
use template\ClienteTemp;
use template\Itemplate;

class Cliente{
    private ITemplate $template;

    public function __construct(){
        $this->template = new ClienteTemp();
    }

    public function listar(){
        $service = new ClienteService();
        $resultado = $service->listarCliente();
        $this->template->layout("\\public\\cliente\\listar.php", $resultado);
    }
}