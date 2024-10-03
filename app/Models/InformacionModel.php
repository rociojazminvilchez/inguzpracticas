<?php 
namespace App\Models;
use CodeIgniter\Model;

class InformacionModel extends Model{ 
    protected $table = 'inguz_informacion'; 
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true; 
    protected $returnType = 'array';
    protected $useSoftDeletes = false; //Como se comporta la eliminacion de registro
    protected $allowedFields = ['quienes', 'lugar','horarios','actividades']; //Van los campos de la tabla
    
    public function mostrarTodo(){
        $resultado = $this->db->table('inguz_informacion');
		return  $resultado->get()->getResultArray();
   }
}
?> 