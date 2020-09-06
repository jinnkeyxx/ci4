<?php namespace App\Controllers;

use App\Models\UserModel;



class Users extends BaseController
{
	public $data;
	/**
	 * Class constructor.
	 */
	public function __construct()
	{
		$this->data = [];
	}
	public function index()
	{
		
		helper(['form']);


		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'email' => 'required|min_length[6]|max_length[50]|valid_email',
				'password' => 'required|min_length[8]|max_length[255]|validateUser[email,password]',
			];

			$errors = [
				'password' => [
					'validateUser' => 'Email hoặc mật khẩu không đúng ',
				],
				'email' => [
					'required' => 'Email không được bỏ trống',
					'min_length' => 'Email không được nhỏ hơn 6 kí tự',
					'max_length' => 'Email quá dài',
					'valid_email' => 'Email không hợp lệ',
				]
			];

			if (! $this->validate($rules, $errors))
			{
				$this->data ['validation'] = $this->validator;
			}
			else
			{
				$model = new UserModel();
				$user = $model->where('email', $this->request->getVar('email'))
											->first();
				$this->setUserSession($user);	
				if($user['role'] >= 2){
					return redirect()->to(base_url().'/home');
				}
				else {
					return redirect()->to(base_url().'/dashboard');
				}
			}
		}

		echo view('admin/templates/header');
		echo view('admin/login');
		echo view('admin/templates/footer');
	}

	private function setUserSession($user)
	{
		$data = [
			'id' => $user['id'],
			'firstname' => $user['firstname'],
			'lastname' => $user['lastname'],
			'email' => $user['email'],
			'role' => $user['role'],
			'isLoggedIn' => true,
		];

		session()->set($data);
		return true;
	}

	// public function register(){
	// 	$data = [];
	// 	helper(['form']);

	// 	if ($this->request->getMethod() == 'post') {
			
	// 		$rules = [
	// 			'firstname' => 'required|min_length[3]|max_length[20]',
	// 			'lastname' => 'required|min_length[3]|max_length[20]',
	// 			'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
	// 			'password' => 'required|min_length[8]|max_length[255]',
	// 			'password_confirm' => 'matches[password]',
	// 		];

	// 		if (! $this->validate($rules)) {
	// 			$data['validation'] = $this->validator;
	// 		}else{
	// 			$model = new UserModel();

	// 			$newData = [
	// 				'firstname' => $this->request->getVar('firstname'),
	// 				'lastname' => $this->request->getVar('lastname'),
	// 				'email' => $this->request->getVar('email'),
	// 				'password' => $this->request->getVar('password'),
	// 			];
	// 			$model->save($newData);
	// 			$session = session();
	// 			$session->setFlashdata('success', 'Successful Registration');
	// 			return redirect()->to('/public');

	// 		}
	// 	}


	// 	echo view('admin/templates/header', $data);
	// 	echo view('admin/register');
	// 	echo view('admin/templates/footer');
	// }
	
	
	
	
	public function logout(){
		session()->destroy();
		return redirect()->to(base_url());
	}



	//--------------------------------------------------------------------

}