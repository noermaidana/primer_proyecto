<?php 
namespace App\Models; 
use CodeIgniter\Model; 

class producto_model extends Model 
{ 
    protected $table = 'productos'; //nombre de la tabla 
    protected $primaryKey = 'id_producto'; //identificador de la tabla 
    protected $allowedFields = ['nombre', 'precio', 'stock']; //todos los campos de la tabla
}