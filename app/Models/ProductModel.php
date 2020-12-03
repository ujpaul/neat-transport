<?php namespace App\Models;
use CodeIgniter\Model;

class ProductModel extends Model{
	protected $table = "products";
	protected $allowedFields = ["id","title","description","price","status","type","product_type","bargain"];
	protected $useTimestamps = true;

}
