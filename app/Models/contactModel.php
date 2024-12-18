<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model
{
    public function saveData($data){

    	$db = \Config\Database::connect();
    	$builder = $db->table('contacto');
    	$res = $builder->insert($data);
    	//Vai retornar true ou false caso haja algum problema ao adicionar no BD
    	return $res;

    }
}