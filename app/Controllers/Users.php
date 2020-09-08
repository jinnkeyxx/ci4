<?php namespace App\Controllers;

use App\Models\UserModel;



class Users extends BaseController
{
	public $data;
	public $UserModel;
	public function __construct()
	{
		helper(['url']);
		$this->data = [];
		$this->UserModel = new UserModel();
	}
	public function index()
	{
		if($this->checkAdmin() !== NULL):
			return redirect()->to(base_url().'/dashboard');
		endif;
		$this->data['title'] = "Admin";
		helper(['form']);
		if($this->request->getMethod() == 'post') :
			$rules = [
				'email' => 'required|min_length[6]|max_length[50]|valid_email',
				'password' => 'required|min_length[8]|max_length[255]|validateUser[email,password]',
			];
			$errors = [
				'password' => [
					'validateUser' => 'Email hoặc mật khẩu không đúng ',
					'required'=> 'Mật khẩu không được bỏ trống',
					'min_length' => 'Mật khẩu không được 8 kí tự',
				],
				'email' => [
					'required' => 'Email không được bỏ trống',
					'min_length' => 'Email không được nhỏ hơn 6 kí tự',
					'max_length' => 'Email quá dài',
					'valid_email' => 'Email không hợp lệ',
				],
			];
			if (!$this->validate($rules, $errors)) :
				$this->data['validation'] = $this->validator;
			else :
				$user = $this->UserModel->where('email', $this->request->getVar('email'))->first();
				$this->setUserSession($user);
				return redirect()->to('dashboard');
			endif;
		endif;
		echo view('admin/templates/header' ,$this->data);
		echo view('admin/login', $this->data);
		echo view('admin/templates/footer');
	}
	private function setUserSession($user)
	{
		$data = [
			'id' => $user['id'],
			'isLoggedIn' => true,
		];
		session()->set($data);
		return true;
	}
	public function checkAdmin()
	{
		$type = "";
		if(session()->get('id')):
			$this->data['user'] = $this->UserModel->where('id', session()->get('id'))->first();
			$this->data['count'] = $this->UserModel->findAll();
			if($this->data['user']['role'] == '1'):
				$type = "mod";
			
			elseif($this->data['user']['role'] == '0'):
				$type = "admin";	
			else:
				$type = NULL;
			endif;
		else :
			$type = NULL;
		endif;
		return $type;
	}
	public function logout(){
		session()->destroy();
		return redirect()->to(base_url());
	}
	//--------------------------------------------------------------------

}