<?php namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model{
	protected $table = "users";
	protected $allowedFields = ["id","names","username","email","type","password","last_login","status"];
	protected $useTimestamps = true;
	public function checkUser($username,$key="username"){
		$res = $this->where($key,$username)
			->get();
		return $res->getRow();
	}

	public function updateLogin($id){
		return $this->where("email",$id)->update(null,array("lastlogin"=>time()));
	}
}
