<?php namespace App\Controllers;
use App\Models\PostModel;
class Home extends BaseController
{
	public $PostModel;
	public $data;
	/**
	 * Class constructor.
	 */
	public function __construct()
	{
		$this->PostModel = new PostModel();
		$this->data = [];
	}
	public function index()
	{
		$this->data['post'] = $this->PostModel->orderBy('id', 'DESC')->findAll(5);
		// $this->data['post'] = $this->PostModel->findAll(5)->orderBy('id');
		echo view('/home/templates/header');
		echo view('/home/index' , $this->data);
		echo view('/home/templates/footer');
	}

	//--------------------------------------------------------------------

}