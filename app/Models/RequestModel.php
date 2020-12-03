<?php namespace App\Models;
use CodeIgniter\Model;

class RequestModel extends Model{
	protected $table = "requests";
	protected $allowedFields = ["id","product_id","names","email","phone","status","address"];
	protected $useTimestamps = true;

}
