<?php
namespace dao;

interface IClienteDAO{
    public function listar();
    public function inserir();
    public function listarId();
    public function alterar();
}