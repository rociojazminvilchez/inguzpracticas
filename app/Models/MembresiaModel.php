<?php 
namespace App\Models;
use CodeIgniter\Model;

class MembresiaModel extends Model{ 
    protected $table = 'membresia'; 
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true; 
    protected $returnType = 'array';
    protected $useSoftDeletes = false; //Como se comporta la eliminacion de registro
    protected $allowedFields = ['correo', 'actividad','cantidad','pago','estado','fecha_creada','fecha_inicio','fecha_fin']; //Van los campos de la tabla
    
    public function mostrarTodo(){
        $resultado = $this->db->table('membresia');
		return  $resultado->get()->getResultArray();
   }

   public function mostrarSoloID($id){
    $resultado = $this->db->table('membresia');
    $resultado->where($id);
    return $resultado->get()->getResultArray();
}
}
?> 