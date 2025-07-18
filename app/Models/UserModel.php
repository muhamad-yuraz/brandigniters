<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users'; // O nome da sua tabela na base de dados
    protected $primaryKey = 'id';    // A chave primária da tabela

    protected $useAutoIncrement = true; // Para IDs auto-incrementais

    protected $returnType     = 'array'; // Define o formato do retorno (array ou object)
    protected $useSoftDeletes = false; // Se quiser "apagar" registos sem os remover da DB

    // ATENÇÃO: Estes são os campos que PODEM ser preenchidos por mass assignment.
    // 'password' (a password em texto puro) NÃO está aqui, pois é tratada pelo callback.
    protected $allowedFields = ['username', 'email', 'password_hash', 'is_active', 'last_login_at', 'login_attempts', 'last_attempt_at'];

    protected $useTimestamps = true; // Ativa created_at e updated_at
    protected $createdField  = 'created_at'; // Nome da coluna para data de criação
    protected $updatedField  = null;         // Desativado, pois não temos 'updated_at' na nossa tabela (pode adicionar se quiser)
    protected $deletedField  = null;         // Desativado, pois não temos 'deleted_at'

    // Regras de validação para os dados ANTES de serem processados ou guardados.
    // A regra 'password' aqui é para a password EM TEXTO PURO que vem do formulário.
    protected $validationRules    = [
        'username'      => 'required|alpha_numeric_space|min_length[3]|max_length[100]|is_unique[users.username]',
        'email'         => 'required|valid_email|is_unique[users.email]|max_length[255]',
        'password'      => 'required|min_length[8]', // A password que vem do formulário (texto puro)
    ];

    protected $validationMessages = []; // Mensagens de erro de validação personalizadas
    protected $skipValidation     = false; // Define se a validação deve ser ignorada em certos casos

    // Callbacks que serão executados ANTES de inserir ou atualizar dados na base de dados.
    // Este é o coração da segurança da password no Model.
    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    /**
     * Função para fazer o hash da password antes de guardar no banco de dados.
     * Recebe um array $data que contém os dados a serem inseridos/atualizados.
     */
    protected function hashPassword(array $data)
    {
        // Verifica se o campo 'password' (a password em texto puro) está presente nos dados.
        if (isset($data['data']['password'])) {
            // Faz o hash da password usando password_hash() do PHP (seguro e com salt automático).
            $data['data']['password_hash'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
            
            // Remove a password em texto puro do array $data antes de passá-lo para o salvamento,
            // garantindo que ela nunca seja guardada na coluna errada ou em texto puro.
            unset($data['data']['password']); 
        }
        return $data; // Retorna os dados modificados para o próximo passo no ciclo de vida do Model.
    }
}