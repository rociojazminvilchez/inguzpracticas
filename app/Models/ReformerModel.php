<?php 
namespace App\Models;
use CodeIgniter\Model;

class ReformerModel extends Model{ 

    
    protected $table = 'correcion'; 
    protected $primaryKey = 'id';
    protected $useAutoIncrement = false; 
    protected $returnType = 'array'; //tambien se puede usar como object
    protected $useSoftDeletes = false; //Como se comporta la eliminacion de registro
    protected $allowedFields = ['titulo', 'descripcion','estado','categoria','img','usuario','usuario_modificado']; //Van los campos de la tabla
    /*Esta configurado para que de baja el registro pero no lo elimina completamente*/
    
    public function mostrarTodo($data){
        $resultado = $this->db->table('pilates');
        $resultado->where($data);
			return  $resultado->get()->getResultArray();
   }
}
?>