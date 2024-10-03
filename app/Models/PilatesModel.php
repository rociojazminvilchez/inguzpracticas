<?php 
namespace App\Models;
use CodeIgniter\Model;

class PilatesModel extends Model{ 
    protected $table = 'pilates'; 
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true; 
    protected $returnType = 'array';
    protected $useSoftDeletes = false; //Como se comporta la eliminacion de registro
    protected $allowedFields = ['Tipo', 'Clases','Precio','Descripcion']; //Van los campos de la tabla
    
    public function mostrarTodo($data2){
        $resultado = $this->db->table('pilates');
        $resultado->where($data2);
		return  $resultado->get()->getResultArray();
   }

   public function updatePrecio($id, $precio,){
       return $this->update($id, [
           'Precio' => $precio
       ]);
   }
   // Método para actualizar la descripción
   public function updateDescripcion($id, $descripcion) {
    return $this->update($id,[
        'Descripcion' => $descripcion
    ]);

}
}
?>