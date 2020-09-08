<?php namespace App\Models;

use CodeIgniter\Model;
class KhachHangModel extends Model{
  protected $table = 'khachhang';
  protected $allowedFields = ['firstname', 'lastname', 'email' , 'address' , 'cmnd' , 'number_phone' , 'old' , 'gender' , 'status'];
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