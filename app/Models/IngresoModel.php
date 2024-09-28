<?php 
namespace App\Models;
use CodeIgniter\Model;

class IngresoModel extends Model{ 
   protected $table = 'ingreso'; 
   protected $primaryKey = 'id';
   protected $useAutoIncrement = false; 
   protected $returnType = 'array';
   protected $useSoftDeletes = false; //Como se comporta la eliminacion de registro
   protected $allowedFields = ['correo','contraseña','tipo']; //Van los campos de la tabla

    public function obtenerUsuario($data){
         $Usuario = $this->db->table('registrousuario');
			$Usuario->where($data);
			return $Usuario->get()->getResultArray();
   }
}
?>