<?php namespace App\Models;
use CodeIgniter\Model;

class ProductImagesModel extends Model{
	protected $table = "product_images";
	protected $allowedFields = ["id","product_id","image","created_by"];
	protected $useTimestamps = true;

}
