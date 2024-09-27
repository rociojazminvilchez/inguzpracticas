<?php 
namespace App\Models;
use CodeIgniter\Model;

class ActividadesModel extends Model{ 
    protected $table = 'informacion'; 
    protected $primaryKey = 'id';
    protected $useAutoIncrement = false; 
    protected $returnType = 'array';
    protected $useSoftDeletes = false; //Como se comporta la eliminacion de registro
    protected $allowedFields = ['Tipo', 'Dia','Horario','Descripcion']; //Van los campos de la tabla
    
    public function mostrarTodo($data){
        $resultado = $this->db->table('informacion');
        $resultado->where($data);
		return  $resultado->get()->getResultArray();
   }
}
?>