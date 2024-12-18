<?php

namespace App\Controllers;
use \App\Models\contactModel;

class Home extends BaseController
{

    //inicializamos a variavel para uso em todo controlador como $this->contactModel
    public $contactModel;

    public function __construct() {
        
        //ajudantes para url e validacoes de formularios
        helper('url');
        helper('form');

        // Chamamos model para poder ser utilizado como variavel a nivel do controlador
        $this->contactModel = new ContactModel();
    }

    public function index()
    {
        //$rows = $this->Administracao_model->getAllData('index_banner');
        $data = array(
            'header_title' => 'BrandIgniters - Excelência e Inovação',
            'header_desciption' => 'Homepage - BrandIgniters'
            //'rows' => $rows
        );
        return view('home_page', $data);
        //$this->load->view("index", $data);
    }

    public function sobre()
    {
        $data = array(
            'header_title' => 'BrandIgniters - Sobre',
            'header_desciption' => 'About - BrandIgniters'
        );
        return view('sobre', $data);
    }

    public function servicos()
    {
        $data = array(
            'header_title' => 'BrandIgniters - Servicos',
            'header_desciption' => 'Services - BrandIgniters'
        );
        return view('servicos', $data);
    }

    public function contactos()
    {
        $session = session();
        $val = null;

        //formulario de contacto
        $rules = [
            'nome'=>'required|min_length[3]|max_length[30]',
            'empresa'=>'max_length[30]',
            'email'=>'required|valid_email',
            'contacto'=>'required|exact_length[9]|numeric',
            'mensagem'=>'required',
        ];

        if($this->request->getMethod()=='post'){

            if($this->validate($rules)){

                $nome = $this->request->getVar('nome', FILTER_SANITIZE_STRING);
                $empresa = $this->request->getVar('empresa', FILTER_SANITIZE_STRING);
                $email = $this->request->getVar('email', FILTER_SANITIZE_STRING);
                $contacto = $this->request->getVar('contacto', FILTER_SANITIZE_STRING);
                $mensagem = $this->request->getVar('mensagem', FILTER_SANITIZE_STRING);

                //coluna do nome da BD => Request da variavel vinda da view (form) e filtragem
                $cdata = [
                    'nome' => $nome,
                    'empresa' => $empresa,
                    'email' => $email,
                    'contacto' => $contacto,
                    'mensagem' => $mensagem
                ];

                //invocando o model -> enviando os dados -> recebendo true ou false na variavel $status
                $status = $this->contactModel->saveData($cdata);
                if ($status == true) {

                    //configuracoes do email
                    $email = service('email');

                    $config = [
                        'protocol' => 'smtp',
                        'SMTPHost' => 'smtp.hostinger.com',
                        'SMTPUser' => 'no-reply@brandigniters.tech',
                        'SMTPPass' => 'Leculeu0!',
                        'SMTPPort' => '587',
                        'wordWrap' => true,
                        'mailType' => 'html',
                        'SMTPCrypto' => 'tls'
                    ];

                    $template = view('_emails/form_contacto', $cdata); 

                    $email->initialize($config);

                    //enviando o email
                    $email->setFrom('no-reply@brandigniters.tech', $this->request->getVar('nome', FILTER_SANITIZE_STRING));
                    $email->setTo('comercial@brandigniters.tech');

                    $email->setSubject('Email Do Website || De - ' . $nome);
                    //$email->setMessage('Testing the email class.');
                    $email->setMessage($template);

                    $sent = $email->send();

                    if(!$sent){
                        echo $email->printDebugger();
                    }

                    $session->setTempdata('success', 'Obrigado! Responderemos o mais breve possível.', 3);
                }else{
                    $session->setTempdata('error', 'Oops! Algo deu errado, por favor, envie-nos um email para <a href="#">geral@brandigniters.tech</a>', 3);
                }

            }else{

                $val = $this->validator;
            }

        }

        $data = array(
            'header_title' => 'BrandIgniters - Contacte-nos',
            'header_desciption' => 'Contact-us - BrandIgniters',
            'validation' => $val
        );
        return view('contacte-nos', $data);
    }
}

