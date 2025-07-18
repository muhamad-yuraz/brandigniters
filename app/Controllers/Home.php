<?php

namespace App\Controllers;
use \App\Models\UserModel;
use \App\Models\contactModel;/**/
use DateTime; // Para trabalhar com datas
use DateInterval; // Para trabalhar com intervalos de tempo

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

    public function login_form()
    {
        $data = array(
            'header_title' => 'BrandIgniters - Login',
            'header_desciption' => 'Login form - BrandIgniters'
        );
        return view('login_form', $data);
    }

    public function loginAjax()
    {
        // Certifique-se de que a requisição é POST e AJAX
        if (!$this->request->isAJAX() || $this->request->getMethod() != 'post') {
            return $this->response->setStatusCode(403)->setJSON(['success' => false, 'message' => 'Acesso não autorizado.']);
        }

        $model = new UserModel();
        $usernameOrEmail = $this->request->getPost('username_or_email');
        $password = $this->request->getPost('password');

        // 1. Verificar a existência e autenticação dos dados
        $user = $model->where('username', $usernameOrEmail)
                      ->orWhere('email', $usernameOrEmail)
                      ->first();

        // Definir limites (você pode colocar isso num arquivo de configuração também)
        $maxAttempts = 5; // Máximo de tentativas falhas
        $cooldownMinutes = 15; // Tempo de bloqueio em minutos

        // --- INÍCIO DA LÓGICA DE PROTEÇÃO CONTRA FORÇA BRUTA ---
        if ($user) { // Se o utilizador foi encontrado
            $now = new DateTime();
            $lastAttemptTime = $user['last_attempt_at'] ? new DateTime($user['last_attempt_at']) : null;
            $currentAttempts = $user['login_attempts'];

            // Se as tentativas atuais excedem o limite E ainda estamos no período de cooldown
            if ($currentAttempts >= $maxAttempts && $lastAttemptTime && ($lastAttemptTime->getTimestamp() + ($cooldownMinutes * 60)) > $now->getTimestamp()) {
                $cooldownEnd = $lastAttemptTime->getTimestamp() + ($cooldownMinutes * 60);
                $remainingSeconds = $cooldownEnd - $now->getTimestamp();
                $minutes = ceil($remainingSeconds / 60);
                return $this->response->setJSON([
                    'success' => false,
                    'message' => "Sua conta está temporariamente bloqueada devido a várias tentativas. Tente novamente em aproximadamente {$minutes} minuto(s)."
                ]);
            }

            // 2. O sistema verifica a password
            if (password_verify($password, $user['password_hash'])) {
                // Password correta!

                // Resetar tentativas de login após sucesso
                $model->update($user['id'], [
                    'login_attempts' => 0,
                    'last_attempt_at' => null,
                    'last_login_at' => date('Y-m-d H:i:s') // Seu campo opcional
                ]);

                // 3. Inicializa os dados de sessão
                $session = session();
                $session->set([
                    'user_id' => $user['id'],
                    'username' => $user['username'],
                    'user_email' => $user['email'],
                    'isLoggedIn' => true,
                    'user_role' => $user['user_role'] ?? 'default_role', // Exemplo: se tiver uma coluna 'role'
                ]);

                // Redireciona via JSON
                return $this->response->setJSON([
                    'success' => true,
                    'redirect_url' => base_url('admin_home') // Ou route_to('admin_home')
                ]);

            } else {
                // Password incorreta
                // Incrementar tentativas e registrar o timestamp
                $newAttempts = $currentAttempts + 1;
                $model->update($user['id'], [
                    'login_attempts' => $newAttempts,
                    'last_attempt_at' => $now->format('Y-m-d H:i:s')
                ]);

                // Mensagem de erro genérica para evitar enumeração de usernames/emails
                $message = 'Utilizador ou palavra-passe incorretos.';
                if ($newAttempts >= $maxAttempts) {
                    $message = sprintf('Múltiplas tentativas falhas. Sua conta está agora bloqueada por %d minutos.', $cooldownMinutes);
                }
                return $this->response->setJSON(['success' => false, 'message' => $message]);
            }
        }

        // Se o utilizador não foi encontrado ou está inativo, retorna mensagem genérica
        // Importante manter a mensagem genérica aqui também para não revelar se o utilizador existe.
        return $this->response->setJSON(['success' => false, 'message' => 'Utilizador ou palavra-passe incorretos.']);
        // --- FIM DA LÓGICA DE PROTEÇÃO CONTRA FORÇA BRUTA ---
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login')->with('success', 'Sessão terminada com sucesso.');
    }

    public function admin_home()
    {
        $session = session(); // Inicia a sessão

        // Verifica se o usuário está logado e pega os dados da sessão
        if (!$session->has('user_id') || !$session->get('isLoggedIn')) {
            // Se não estiver logado, redireciona para a página de login
            return redirect()->to(base_url('login'))->with('error', 'Por favor, faça login para aceder à área de administração.');
        }

        // Pega as variáveis da sessão
        $user_email = $session->get('user_email');
        $username = $session->get('username'); // Se você também quiser exibir o username

        $data = [
            'header_title' => 'BrandIgniters - Bem-vindo',
            'header_description' => 'Admin Dashboard - BrandIgniters',
            'user_email' => $user_email, // PASSA O EMAIL PARA A VIEW
            'username' => $username      // PASSA O USERNAME PARA A VIEW (se for usar)
        ];

        return view('_admin/admin_home', $data);
    }


}

