<?php namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ProductModel;
use App\Models\ProductImagesModel;
use App\Models\RequestModel;

class Home extends BaseController
{

	private $data = array();
	private $log_status = "Soma_logged_in";

	public function _preset()
	{
		$this->session->set("return_url", current_url());
		if ($this->session->get($this->log_status) == null) {
			header("location: " . base_url('login'));
			die();
		} else if ($this->session->get('t_lock_status') != null) {
			header("location: " . base_url('login'));
			die();
		}
	}

	public function index()
	{
		$mdl = new ProductModel();
		$data = array();
		$data['title'] = "Home page";
		$data['products'] = $mdl->select("products.id,products.title,products.price,products.description,product_images.image,if(products.product_type=1,\"Sale\",\"Rent\")as type,if(products.bargain=1,\"Negotiable\",\"Not Negotiable\")as bargain,if(status=1,\"Available\",\"Sold\")as status")
			->join('product_images', 'products.id=product_images.product_id', 'LEFT')
			->groupBy('product_images.product_id')
			->get()->getResultArray();
		$data['carForSale'] = $mdl->select('count(id) as counter')->where('product_type', 1)->where('type', 1)->get()->getRowArray();
		$data['carForRent'] = $mdl->select('count(id) as counter')->where('product_type', 2)->where('type', 1)->get()->getRowArray();
		$data['houseForSale'] = $mdl->select('count(id) as counter')->where('product_type', 1)->where('type', 2)->get()->getRowArray();
		$data['houseForRent'] = $mdl->select('count(id) as counter')->where('product_type', 2)->where('type', 2)->get()->getRowArray();
		$data['content'] = view('pages/index', $data);
		return view('layout/layout', $data);
	}

	public function carForSale()
	{
		$mdl = new ProductModel();
		$data = array();
		$data['title'] = "Cars page";
		$data['products'] = $mdl->select("products.id,products.title,products.price,products.description,product_images.image,if(products.type=1,\"Sale\",\"Rent\")as type")
			->join('product_images', 'products.id=product_images.product_id', 'LEFT')
			->where('type', 1)
			->where('product_type', 1)
			->groupBy('product_images.product_id')
			->get()->getResultArray();
		$data['content'] = view('pages/cars', $data);
		return view('layout/layout', $data);
	}

	public function carForRent()
	{
		$mdl = new ProductModel();
		$data = array();
		$data['title'] = "Cars page";
		$data['products'] = $mdl->select("products.id,products.title,products.price,products.description,product_images.image,if(products.type=1,\"Sale\",\"Rent\")as type")
			->join('product_images', 'products.id=product_images.product_id', 'LEFT')
			->where('type', 1)
			->where('product_type', 2)
			->groupBy('product_images.product_id')
			->get()->getResultArray();
		$data['content'] = view('pages/cars', $data);
		return view('layout/layout', $data);
	}

	public function houseForSale()
	{
		$mdl = new ProductModel();
		$data = array();
		$data['title'] = "Cars page";
		$data['products'] = $mdl->select("products.id,products.title,products.price,products.description,product_images.image,if(products.type=1,\"Sale\",\"Rent\")as type")
			->join('product_images', 'products.id=product_images.product_id', 'LEFT')
			->where('type', 2)
			->where('product_type', 1)
			->groupBy('product_images.product_id')
			->get()->getResultArray();
		$data['content'] = view('pages/house', $data);
		return view('layout/layout', $data);
	}

	public function houseForRent()
	{
		$mdl = new ProductModel();
		$data = array();
		$data['title'] = "Cars page";
		$data['products'] = $mdl->select("products.id,products.title,products.price,products.description,product_images.image,if(products.type=1,\"Sale\",\"Rent\")as type")
			->join('product_images', 'products.id=product_images.product_id', 'LEFT')
			->where('type', 2)
			->where('product_type', 2)
			->groupBy('product_images.product_id')
			->get()->getResultArray();
		$data['content'] = view('pages/house', $data);
		return view('layout/layout', $data);
	}

	public function dashboard()
	{
		$this->_preset();
		$data = array();
		$data['title'] = "Dashboard";
		$data['data'] = view('admin/base', $data);
		return view('layout/base-layout', $data);
	}

	public function singleProduct($id)
	{
		$this->_preset();
		$mdl = new ProductModel();
		$imgMdl = new ProductImagesModel();
		$data = array();
		$data['title'] = "Single Product";
		$data['products'] = $imgMdl->select("id,image")->where('product_id', $id)->get()->getResultArray();
		$data['product'] = $mdl->select("id,title,price,description,if(product_type=1,\"Sale\",\"Rent\")as type,if(type=1,\"Car\",\"House\")as productType")
			->where('id', $id)
			->get()
			->getRowArray();
		$data['data'] = view('pages/single-product', $data);
		return view('layout/base-layout', $data);
	}

	public function about()
	{
		$data = array();
		$data['title'] = "About page";
		$data['content'] = view('pages/about');
		return view('layout/layout', $data);
	}

	public function admin()
	{
		$data = array();
		$data['title'] = "Login";
		return view('login', $data);
	}

	public function logout($msg = null)
	{
		session_destroy();
		$this->session->setFlashdata("error", $msg);
		return redirect()->to(base_url('admin'));
	}

	function login_pro()
	{
		$model = new UserModel();
		$email = strtolower($this->request->getPost('email'));
		$password = $this->request->getPost('password');
		$validation = \Config\Services::validation();
		$validation->setRule("email", 'email', 'trim|required');
		$validation->setRule("password", 'password', 'required|min_length[6]');
		if ($validation->run() !== FALSE) {
			$this->session->setFlashdata('email', $email);
			if ($this->request->getGet("type", true) == "ajax") {
				echo '{"type":"error","msg":"' . $validation->getError() . '"}';
			} else {
				$this->session->setFlashdata('error', $validation->getError());
				$this->session->setFlashdata('email', $email);
				echo "errrrer";
				die();
				return redirect()->to(base_url("admin"));
			}
		} else {
			$result = $model->checkUser($email);
			$this->session->setFlashdata('email', $email);
			if ($result != null) {
				if (password_verify($password, $result->password)) {
					if ($result->status == 1 || $result->status == 2) {
						$data = array(
							't_username' => $result->username,
							't_email' => $result->email,
							't_id' => $result->id,
							$this->log_status => true
						);
						$this->session->set($data);
						$model->updateLogin($result->id);
						if ($this->request->getGet("type", true) == "ajax") {
							echo '{"type":"success","msg":"login done"}';
						} else {
							return redirect()->to(base_url('dashboard'));
						}
					} else {
						if ($this->request->getGet("type", true) == "ajax") {
							echo '{"type":"error","msg":"Account not active"}';
						} else {
							$this->session->setFlashdata('error', "Account not active");
							return redirect()->to(base_url("login"));
						}
					}
				} else {
					if ($this->request->getGet("type", true) == "ajax") {
						echo '{"type":"error","msg":"Password not correct"}';
					} else {
						$this->session->setFlashdata('error', "Password not correct");
						return redirect()->to(base_url("login"));
					}
				}
			} else {
				if ($this->request->getGet("type", true) == "ajax") {
					echo '{"type":"error","msg":"User not found"}';
				} else {
					$this->session->setFlashdata('error', "User not found");
					return redirect()->to(base_url("login"));
				}
			}
		}
	}

	public function users()
	{
		$this->_preset();
		$data = array();
		$mdl = new UserModel();
		$data['users'] = $mdl->select("id,names,username,email,type")->get()->getResultArray();
		$data['title'] = "Users";
		$data['data'] = view('pages/users', $data);
		return view('layout/base-layout', $data);
	}

	public function product()
	{
		$this->_preset();
		$data = array();
		$mdl = new ProductModel();
		$data['products'] = $mdl->select("id,bargain,title,price,description,if(type=1,\"Sale\",\"Rent\")as type,if(type=1,\"Car\",\"House\")as productType,if(status=1,\"Available\",\"Sold\")as status")
			->get()
			->getResultArray();


		$data['title'] = "Products";
		$data['data'] = view('pages/product', $data);
		return view('layout/base-layout', $data);
	}

	public function requests()
	{
		$this->_preset();
		$data = array();
		$mdl = new RequestModel();
		$data['requests'] = $mdl->select("requests.id,requests.names,requests.email,requests.phone,requests.address,products.title")
			->join('products', 'requests.product_id=products.id')
			->get()->getResultArray();
		$data['title'] = "Request";
		$data['data'] = view('pages/requests', $data);
		return view('layout/base-layout', $data);
	}

	public function singlePost($id)
	{
		$mdl = new ProductModel();
		$imgMdl = new ProductImagesModel();
		$data = array();
		$data['title'] = "Single Product";
		$data['products'] = $imgMdl->select("id,image")->where('product_id', $id)->get()->getResultArray();
		$data['product'] = $mdl->select("id,title,price,description,if(product_type=1,\"Sale\",\"Rent\")as type,if(type=1,\"Car\",\"House\")as productType,if(status=1,\"Available\",\"Sold\")as status")
			->where('id', $id)
			->get()
			->getRowArray();
		$data['carForSale'] = $mdl->select("products.id,products.title,products.price,products.description,product_images.image,if(products.type=1,\"Sale\",\"Rent\")as type")
			->join('product_images', 'products.id=product_images.product_id', 'LEFT')
			->where('type', 1)
			->where('product_type', 1)
			->groupBy('product_images.product_id')
			->get()->getResultArray();
		$data['carForRent'] = $mdl->select("products.id,products.title,products.price,products.description,product_images.image,if(products.type=1,\"Sale\",\"Rent\")as type")
			->join('product_images', 'products.id=product_images.product_id', 'LEFT')
			->where('type', 1)
			->where('product_type', 2)
			->groupBy('product_images.product_id')
			->get()->getResultArray();
		$data['houseForSale'] = $mdl->select("products.id,products.title,products.price,products.description,product_images.image,if(products.type=1,\"Sale\",\"Rent\")as type")
			->join('product_images', 'products.id=product_images.product_id', 'LEFT')
			->where('type', 2)
			->where('product_type', 1)
			->groupBy('product_images.product_id')
			->get()->getResultArray();
		$data['houseForRent'] = $mdl->select("products.id,products.title,products.price,products.description,product_images.image,if(products.type=1,\"Sale\",\"Rent\")as type")
			->join('product_images', 'products.id=product_images.product_id', 'LEFT')
			->where('type', 2)
			->where('product_type', 2)
			->groupBy('product_images.product_id')
			->get()->getResultArray();
		$data['id'] = $id;
		$data['content'] = view('pages/single-post', $data);
		return view('layout/layout', $data);
	}

	public function get_user($id = null)
	{
		$mdl = new UserModel();
		$builder = $mdl->select("*")->where('id', $id);
		try {
			$data = $builder->get()->getRowArray();
			echo json_encode($data);
		} catch (\ErrorException $e) {
			echo '{"error":' . $e->getMessage() . '}';
		}
	}

	public function manipulate_user()
	{
		$logger = $this->session->get("live_id");
		$userModel = new UserModel();
		$names = $this->request->getPost("names");
		$username = $this->request->getPost("username");
		$email = $this->request->getPost("email");
		$password = $this->request->getPost("password");
		$type = $this->request->getPost("type");
		$data = array(
			"names" => $names,
			"username" => $username,
			"password" => password_hash($password, PASSWORD_DEFAULT),
			"privilege" => $type,
			"email" => $email,
			"status" => 1);
		try {
			$userModel->save($data);
			echo '{"success":"saved"}';
		} catch (\Exception $e) {
			echo '{"error":' . $e->getMessage() . '}';
		}
	}

	public function manipulate_product($id = null)
	{
		$logger = $this->session->get("live_id");
		$productMdl = new ProductModel();
		$id = $this->request->getPost("productId");
		$title = $this->request->getPost("title");
		$desc = $this->request->getPost("description");
		$price = $this->request->getPost("price");
		$type = $this->request->getPost("userType");
		$ptype = $this->request->getPost("productType");
		$negotiable = $this->request->getPost("negotiable");
		if ($id == "") {
			$data = array(
				"title" => $title,
				"description" => $desc,
				"price" => $price,
				"type" => $type,
				"product_type" => $ptype,
				"bargain" => $negotiable,
				"status" => 1);
		} else {
			$data = array(
				"id" => $id,
				"title" => $title,
				"description" => $desc,
				"price" => $price,
				"type" => $type,
				"product_type" => $ptype,
				"bargain" => $negotiable);
		}
		try {
			$productMdl->save($data);
			echo '{"success":"Product saved"}';
		} catch (\Exception $e) {
			echo '{"error":' . $e->getMessage() . '}';
		}
	}

	public function manipulate_requests()
	{
		$logger = $this->session->get("live_id");
		$requestMdl = new RequestModel();
		$names = $this->request->getPost("names");
		$phone = $this->request->getPost("phone");
		$email = $this->request->getPost("email");
		$address = $this->request->getPost("address");
		$id = $this->request->getPost("id");
		$data = array(
			"product_id" => $id,
			"names" => $names,
			"phone" => $phone,
			"email" => $email,
			"address" => $address,
			"status" => 1);
		try {
			$requestMdl->save($data);
			$this->send_email('car');
			echo '{"success":"your request sent"}';
		} catch (\Exception $e) {
			echo '{"error":' . $e->getMessage() . '}';
		}
	}

	public function manipulate_image()
	{
		$logger = $this->session->get("coffee_id");
		$mdl = new ProductImagesModel();
		$id = $this->request->getPost("produit");
		$plan = $_FILES['image']['name'];
		$target_dir = "./assets/uploads/";
		$target_file = $target_dir . basename($plan);
		$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
		$uniqName = uniqid() . "." . $imageFileType;
		move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $uniqName);

		$data = array(
			"product_id" => $id,
			"image" => $uniqName,
			"created_by" => 1);
		try {
			$mdl->save($data);
			echo '{"success":"saved"}';
		} catch (\Exception $e) {
			echo '{"error":' . $e->getMessage() . '}';
		}
	}

	function send_email($product)
	{
		$this->email = \Config\Services::email();
		$config = array("SMTPHost" => "smtp.gmail.com", "SMTPUser" => "hardmahoro@gmail.com", "SMTPPass" => "mahuku2016"
		, "protocol" => "smtp", "SMTPPort" => 587, "mailType" => "html");
		$this->email->initialize($config);
		$this->email->setFrom("hardmahoro@gmail.com", "NEAT TRANSPORT");
		$this->email->setTo('uwimanajeanpaul3@gmail.com');
		$this->email->setSubject("Requested product");
		$this->email->setMessage("Dear Admin there is client who needs " . $product);
		if ($this->email->send(false)) {
			return true;
		}
		var_dump($this->email->printDebugger());
		return false;
	}

	function reply_email()
	{
		$message = $this->request->getPost("message");
		$email = $this->request->getPost("email");
		$this->email = \Config\Services::email();
		$config = array("SMTPHost" => "smtp.gmail.com", "SMTPUser" => "hardmahoro@gmail.com", "SMTPPass" => "mahuku2016"
		, "protocol" => "smtp", "SMTPPort" => 587, "mailType" => "html");
		$this->email->initialize($config);
		$this->email->setFrom("hardmahoro@gmail.com", "NEAT TRANSPORT");
		$this->email->setTo($email);
		$this->email->setSubject("Requested product");
		$this->email->setMessage($message);
		if ($this->email->send(false)) {
			return true;
		}
		var_dump($this->email->printDebugger());
		return false;
	}

	public function update_status()
	{
		$pmodel = new ProductModel();
		$id = $this->request->getPost("productId");
		try {
			$pmodel->save(array(
				"id" => $id,
				"status" => 2,
			));
			echo '{"success":"data updated"}';
		} catch (\Exception $e) {
			echo '{"error":' . $e->getMessage() . '}';
		}
	}

	public function returnProduct()
	{
		$pmodel = new ProductModel();
		$id = $this->request->getPost("productId");
		try {
			$pmodel->save(array(
				"id" => $id,
				"status" => 1,
			));
			echo '{"success":"data updated"}';
		} catch (\Exception $e) {
			echo '{"error":' . $e->getMessage() . '}';
		}
	}

	public function profile()
	{
		$this->_preset();
		$data = array();
		$mdl = new UserModel();
		$data['user'] = $mdl->select("*")->where("id", $this->session->get("t_id"))->get()->getRowArray();
		$data['title'] = "Profile";
		$data['data'] = view("pages/profile", $data);
		return view('layout/base-layout', $data);
	}

	public function changePassword()
	{
		$logger = $this->session->get("t_id");
		$formPassword = $this->request->getPost('currentPassword');
		$newPassword = $this->request->getPost('newPassword');
		$userModel = new UserModel();
		$password = $userModel->select("password")->where("id", $logger)->get()->getRowArray();
		if (password_verify($formPassword, $password['password'])) {
			$data = array(
				"id" => $logger,
				"password" => password_hash($newPassword, PASSWORD_DEFAULT));
			try {
				$userModel->save($data);
				echo '{"success":"saved"}';
			} catch (\Exception $e) {
				echo '{"error":' . $e->getMessage() . '}';
			}
		} else {
			echo '{"error":"Invalid Current Password"}';
		}

	}

	public function update_product($id)
	{
		$mdl = new ProductModel();
		$data = $mdl->select("id,bargain,title,price,description,type,product_type")
			->where('id', $id)
			->get()
			->getRowArray();
		return $this->response->setJSON($data);
	}

	//--------------------------------------------------------------------

}
