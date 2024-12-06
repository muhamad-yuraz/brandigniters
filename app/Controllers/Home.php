<?php

namespace App\Controllers;
helper('url');

class Home extends BaseController
{
    public function index()
    {
        //$rows = $this->Administracao_model->getAllData('index_banner');
        $data = array(
            'header_title' => 'BrandIgniters - Excelência e Inovação',
            'header_desciption' => 'Marketing, Técnologia e Eletrodomesticos.'
            //'rows' => $rows
        );
        return view('home_page', $data);
        //$this->load->view("index", $data);
    }

    public function sobre()
    {
        $data = array(
            'header_title' => 'BrandIgniters - Sobre',
            'header_desciption' => 'Marketing, Técnologia e Eletrodomesticos.'
        );
        return view('sobre', $data);
    }

    public function servicos()
    {
        $data = array(
            'header_title' => 'BrandIgniters - Servicos',
            'header_desciption' => 'Marketing, Técnologia e Eletrodomesticos.'
        );
        return view('servicos', $data);
    }
}
