<?php 
namespace App\Models;
use CodeIgniter\Model;
class HeaderModel extends Model
{
     protected $table = 'header';      
     protected $primaryKey = 'id'; // Replace with your actual primary key column name
     protected $allowedFields = ['id', 'header_top', 'header_description']; // Replace with your actual table fields   
}
