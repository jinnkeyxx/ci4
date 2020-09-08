<?php namespace App\Models;

use CodeIgniter\Model;
class PostModel extends Model{
  protected $table = 'post';
  protected $allowedFields = ['title', 'user_post', 'images' , 'status' , 'user_update' , 'slug' , 'content'];
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