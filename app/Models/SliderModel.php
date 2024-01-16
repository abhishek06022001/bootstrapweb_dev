<?php 
namespace App\Models;
use CodeIgniter\Model;
class SliderModel extends Model
{
     protected $table = 'slidertable';      
     protected $primaryKey = 'id'; // Replace with your actual primary key column name
     protected $allowedFields = ['id', 'image_link']; // Replace with your actual table fields   
}
