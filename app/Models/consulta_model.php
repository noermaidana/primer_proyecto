<?php 
namespace App\Models; 
use CodeIgniter\Model; 

class consulta_model extends Model 
{ 
    protected $table = 'consultas'; //nombre de la tabla 
    protected $primaryKey = 'id_consulta'; //identificador de la tabla 
    //todos los campos de la tabla
    protected $allowedFields = ['nombre', 'email', 'motivo', 'descripcion']; 
}