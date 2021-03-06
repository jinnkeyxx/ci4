<?php namespace App\Models;

use CodeIgniter\Model;
class feedbackSpModel extends Model{
  protected $table = 'feedbacksp';
  protected $allowedFields = ['email_feedback', 'user_feedback', 'content_feedback' , 'status'];
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