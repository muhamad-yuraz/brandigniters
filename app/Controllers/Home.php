<?php

namespace App\Controllers;

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
}
