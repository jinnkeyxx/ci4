<?php namespace App\Controllers;
use App\Controllers\Users;
use App\Models\UserModel;
use App\Models\PostModel;

class Dashboard extends BaseController
{
	public $UserModel;
	public $PostModel;
	public $data;
	public $checkUser;
	public function __construct()
	{
		helper(['url']);
		$this->checkUser = new Users();
		$this->UserModel = new UserModel();
		$this->PostModel = new PostModel();
		$this->data = [];
		if($this->checkUser->checkAdmin() == NULL):
			echo view('errors/html/error_404');
			exit();
		endif;
		
	} 
	// Hiển thị 
	public function index()
	{
		if($this->checkUser->checkAdmin() == NULL):
			
			return redirect()->to(base_url().'/admin');
		endif;
		$this->data['title'] = 'Admin';
		$this->data['user'] = $this->UserModel->where('id', session()->get('id'))->first();
		$this->data['users'] = $this->UserModel->findAll();
		$this->data['posts'] = $this->PostModel->findAll();
		echo view('admin/templates/header' , $this->data);
		echo view('admin/templates/navbar',$this->data);
		echo view('admin/dashboard', $this->data);
		echo view('admin/templates/footer');
	}
	
	//----------------------------------------------------
	
	
	
	
	//---------------------------------------------------------
	
	// thêm sửa xóa người dung 

	//--------------------------------------------------------
	
	public function user()
	{
		if($this->checkUser->checkAdmin() == NULL):
			$this->data['title'] = "Không có quyền truy cập";

			exit();
		endif;

		$this->data['title'] = 'Admin';
		helper(['form']);
		$this->data['user'] = $this->UserModel->where('id', session()->get('id'))->first();
		$this->data['users'] = $this->UserModel->orderBy('id', 'DESC')->findAll();
		echo view('admin/templates/header',$this->data);
		echo view('admin/templates/navbar',$this->data );
		echo view('admin/user' , $this->data);
		echo view('admin/templates/footer');	
	}
	public function adduser()
	{
		if($this->checkUser->checkAdmin() == NULL):
			$this->data['title'] = "Không có quyền truy cập";

			exit();
		endif;
		if($this->checkAdmin() == NULL):
		
			return redirect()->to(base_url().'/dashbroad');
		
		else:
		
			if ($this->request->getMethod() == 'post') :
			
				$rules = [
					'firstname' => 'required|min_length[2]|max_length[20]',
					'lastname' => 'required|min_length[2]|max_length[20]',
					'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
					'password' => 'required|min_length[8]|max_length[255]',
					'password_confirm' => 'matches[password]',
				];
				$errors = [
					'firstname' => [
						'required' => 'Họ tên không được bỏ trống',
						'min_length' => 'Họ tên không được nhỏ hơn 2 kí tự',
						'max_length' => 'Họ tên không được lớn hơn 20 kí tự',
					],
					'lastname' => [
						'required' => 'Họ tên không được bỏ trống',
						'min_length' => 'Họ tên không được nhỏ hơn 2 kí tự',
						'max_length' => 'Họ tên không được lớn hơn 20 kí tự',
					],
					'email' => [
						'required' => 'Email không được bỏ trống',
						'min_length' => 'Email không được nhỏ hơn 6 kí tự',
						'max_length' => 'Email quá dài',
						'valid_email' => 'Email không hợp lệ',
					],
					'password' => [
						'required' => 'Mật khẩu không được bỏ trống',
						'min_length' => 'Mật khẩu không được nhỏ hơn 8 kí tự',
						'max_length' => 'Mật khẩu quá dài',
					],
					'password_confirm' => [
						'matches' => 'Mật khẩu không trùng nhau',
					],

					
				];

				if (! $this->validate($rules)) :
				
					$this->data['validation'] = $this->validator;
				
				else : 
				
				
					$newData = [
						'firstname' => $this->request->getVar('firstname'),
						'lastname' => $this->request->getVar('lastname'),
						'email' => $this->request->getVar('email'),
						'password' => $this->request->getVar('password'),
						'role' => $this->request->getvar('role'),
					];
					$this->UserModel->save($newData);
					$session = session();
					$session->setFlashdata('success', 'Thêm người dùng thành công ');
					return redirect()->to(base_url().'/user');

				endif;
			endif;
		endif;
		
				
	}
	
	public function userdelete($id)
	{
		if($this->checkUser->checkAdmin() == NULL):
			$this->data['title'] = "Không có quyền truy cập";

			exit();
		endif;
		$this->data = $this->UserModel->delete($id);
		$session = session();
		$session->setFlashdata('success', 'Xóa người dùng thành công');
		return redirect()->to(base_url().'/user');
	}
	public function useredit($id)
	{
		if($this->checkUser->checkAdmin() == NULL):
			$this->data['title'] = "Không có quyền truy cập";
			exit();
		endif;
			helper(['form']);
			$this->data['title'] = "Admin";
			$this->data['user'] = $this->UserModel->where('id', session()->get('id'))->first();
			$this->data['useredit'] = $this->UserModel->where('id', $id)->first();
			if ($this->request->getMethod() == 'post'):
			
				$rules = [
					'firstname' => 'min_length[0]|max_length[20]',
					'lastname' => 'min_length[0]|max_length[20]',
				];
					if (! $this->validate($rules)):
					
						$data['validation'] = $this->validator;
					
					else:
					

						$newData = [
							'id' => $id,
							'firstname' => $this->request->getvar('firstname'),
							'lastname' => $this->request->getvar('lastname'),
							'email' => $this->request->getvar('email'),
							'role' => $this->request->getvar('role'),

						];
							
						$this->UserModel->save($newData);
						session()->setFlashdata('success', 'Sửa người dùng thành công');
						return redirect()->to(base_url().'/user');
					endif;
			endif;
	
		
		echo view('admin/templates/header' , $this->data);
		echo view('admin/templates/navbar', $this->data);
		echo view('admin/useredit', $this->data);
		echo view('admin/templates/footer');
	}
	//--------------------------------------------------------

	// thêm sửa xóa bài viết
	//---------------------------------------------------------
	public function postdelete($id)
	{
		if($this->checkUser->checkAdmin() == NULL):
			exit();
		endif;
		
			
			$this->PostModel->delete($id);
			$session = session();
			$session->setFlashdata('success', 'Xóa bài viết thành công');
			return redirect()->to('/post');
		
		
		
	}
	public function vietbai()
	{
		if($this->checkUser->checkAdmin() == NULL):
			$this->data['title'] = "Không có quyền truy cập";

			exit();
		endif;
		$this->data['title'] = "Admin";
		helper(['form']);
		$this->data['user'] = $this->UserModel->where('id', session()->get('id'))->first();
		$user =  $this->UserModel->where('id', session()->get('id'))->first();
		if ($this->request->getMethod() == 'post'):
		
			$rules = [
			'content' => 'required|min_length[2]',
			'title' => 'required|min_length[2]',
			'img' => 'uploaded[images]|is_image[images]|mime_in[images,	image/jpg,image/jpeg,image/png,image/gif]' ,
			];
			$errors = [
				'img' => [
					'uploaded' => 'Bạn chưa tải lên ảnh đại diện cho bài viết',
					'is_image' => 'Bạn vừa tải lên không phải là 1 bức ảnh',
					'mime_in' => 'Ảnh bạn tải lên không đúng định dạnh',
					
				],
				'content' => [
					'required' => 'Nội dung không được bỏ trống',
					'min_length' => 'Nội dung quá ngắn không thể đăng bài',
				],
				'title' => [
					'required' => 'Tiêu đề không được bỏ trống',
					'min_length' => 'Tiêu đề quá ngắn không thể đăng bài',
				],
			];
			
		
			if (! $this->validate($rules , $errors)):
			
				$this->data['validation'] = $this->validator;
			

			else :
			
				$slug = $this->to_slug($this->request->getVar('title'));

				$images_title = $this->request->getfile('images');
				$file_name = $images_title->getRandomName();
				$images_title->move('images' , $file_name);
				
				$newData = [
					'title' => $this->request->getVar('title'),
					'user_post' => $user['firstname'].' '.$user['lastname'],
					'images' =>  base_url().'/images/'.$file_name,
					'status' => 0,
					'user_update' => $user['firstname'].' '.$user['lastname'],
					'slug' => base_url().$slug,
					'content' => $this->request->getVar('content')
				];
				
				$this->PostModel->save($newData);
				$session = session();
				$session->setFlashdata('success', 'Đăng bài thành công');
				return redirect()->to(base_url().'/post');
			endif;
		endif;
		echo view('admin/templates/header' ,$this->data);
		echo view('admin/templates/navbar',$this->data);
		echo view('admin/vietbai' , $this->data);
		echo view('admin/templates/footer');
	
		
	}
	public function post()
	{
		if($this->checkUser->checkAdmin() == NULL):
			$this->data['title'] = "Không có quyền truy cập";

			exit();
		endif;
		$this->data['title'] = "Admin";
		$this->data['user'] = $this->UserModel->where('id', session()->get('id'))->first();
		$this->data['post'] = $this->PostModel->orderBy('id', 'DESC')->findAll();
		echo view('admin/templates/header' ,$this->data);
		echo view('admin/templates/navbar', $this->data);
		echo view('admin/post' , $this->data);
		echo view('admin/templates/footer');
	}
	public function postedit($id)
	{
		$this->data['title'] = "Admin";
		if($this->checkUser->checkAdmin() == NULL):
			$this->data['title'] = "Không có quyền truy cập";
			exit();
		endif;
	
			helper(['form']);
			$user =  $this->UserModel->where('id', session()->get('id'))->first();
			$this->data['user'] = $this->UserModel->where('id', session()->get('id'))->first();
			$this->data['postedit'] = $this->PostModel->where('id', $id)->first();
			if ($this->request->getMethod() == 'post'):
			
				$rules = [
				'content' => 'required|min_length[2]',
				'title' => 'required|min_length[2]',
				'img' => 'is_image[images]|mime_in[images,	image/jpg,image/jpeg,image/png,image/gif]' ,
				
				];
				$errors = [
					'img' => [
						
						'is_image' => 'Bạn vừa tải lên không phải là 1 bức ảnh',
						'mime_in' => 'Ảnh bạn tải lên không đúng định dạnh',
						
					],
					'content' => [
						'required' => 'Nội dung không được bỏ trống',
						'min_length' => 'Nội dung quá ngắn không thể đăng bài',
					],
					'title' => [
						'required' => 'Tiêu đề không được bỏ trống',
						'min_length' => 'Tiêu đề quá ngắn không thể đăng bài',
					],
				];
			
		
				if (! $this->validate($rules , $errors)) :
				
					$data['validation'] = $this->validator;
				

				else :
					$file_name = "";
					$slug = $this->to_slug($this->request->getVar('title'));
					$postEdit = explode('/' , $this->data['postedit']['images']);
					$postEdit = $postEdit[5];
					
					$images_title = $this->request->getfile('images');
					if($this->request->getfile('images')->getPath() == ""){
						$file_name = $postEdit;
					}
					else {
						$file_name = $images_title->getRandomName();
						$images_title->move('images' , $file_name);
					}
					$newData = [
						'id' => $id,
						'title' => $this->request->getVar('title'),
						'user_post' => $user['firstname'].' '.$user['lastname'],
						'images' =>  base_url().'/images/'.$file_name,
						'status' => 0,
						'user_update' => $user['firstname'].' '.$user['lastname'],
						'slug' => base_url().'/'.$slug,
						'content' => $this->request->getVar('content')
					];
					
					$this->data['postedit'] = $this->PostModel->save($newData);
					$session = session();
					$session->setFlashdata('success', 'Sửa bài viết thành công');
					return redirect()->to(base_url().'/post');
				endif;
			endif;
		
		echo view('admin/templates/header' , $this->data);
		echo view('admin/templates/navbar', $this->data);
		echo view('admin/postedit', $this->data);
		echo view('admin/templates/footer');
		
	}
	//---------------------------------------------------------
	
	// kiểm tra admin

	//-------------------------------------------------------
	

	
	//--------------------------------------------------------------------

	private function to_slug($str) {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        return $str;
    }
	
}