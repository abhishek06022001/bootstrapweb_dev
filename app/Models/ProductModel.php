<?php
namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'id'; // Replace with your actual primary key column name
    protected $allowedFields = [ 'id','image_link', 'description']; // Replace with your actual table fields   
 
}
