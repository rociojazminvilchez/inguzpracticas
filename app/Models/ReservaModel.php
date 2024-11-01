<?php 
namespace App\Models;
use CodeIgniter\Model;

class ReservaModel extends Model{ 
    protected $table = 'reserva'; 
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true; 
    protected $returnType = 'array';
    protected $useSoftDeletes = false; //Como se comporta la eliminacion de registro
    protected $allowedFields = ['fecha', 'horario','actividad','alumno','instructor']; //Van los campos de la tabla
    
    public function mostrarTodo() {
        $resultado = $this->db->table($this->table);
        return $resultado->get()->getResultArray();
    }

    public function mostrarSoloCorreo($correo) {
        $resultado = $this->db->table($this->table); 
        $resultado->where('alumno', $correo); 
        return $resultado->get()->getResultArray();
    }

}
?>