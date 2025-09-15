<?php
namespace service;

use dao\mysql\ClienteDAO;

class ClienteService extends ClienteDAO{

    public function listarCliente(){
        return parent::listar();
    }

    #continuar escrevendo os metodos
}