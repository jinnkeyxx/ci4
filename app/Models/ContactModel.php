<?php namespace App\Models;

use CodeIgniter\Model;
class ContactModel extends Model{
  protected $table = 'khachhang';
  protected $allowedFields = ['email_contact', 'user_contact', 'content_contact'];
  protected $beforeInsert = ['beforeInsert'];
  protected $beforeUpdate = ['beforeUpdate'];

  protected function beforeInsert(array $data){
    $data['data']['created_at'] = date('Y-m-d H:i:s');
    return $data;
  }

  protected function beforeUpdate(array $data){
    $data['data']['updated_at'] = date('Y-m-d H:i:s');
    return $data;
  }

}