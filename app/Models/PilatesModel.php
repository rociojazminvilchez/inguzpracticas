<?php 
namespace App\Models;
use CodeIgniter\Model;

class PilatesModel extends Model{ 
    protected $table = 'pilates'; 
    protected $primaryKey = 'id';
    protected $useAutoIncrement = false; 
    protected $returnType = 'array';
    protected $useSoftDeletes = false; //Como se comporta la eliminacion de registro
    protected $allowedFields = ['Tipo', 'Clases','Precio']; //Van los campos de la tabla
    
    public function mostrarTodo($data2){
        $resultado = $this->db->table('pilates');
        $resultado->where($data2);
		return  $resultado->get()->getResultArray();
   }

   public function updatePrecio($id, $clases, $precio)
   {
       return $this->update($id, [
           'Clases' => $clases,
           'Precio' => $precio
       ]);
   }
}
?>