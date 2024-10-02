<?php 
namespace App\Models;
use CodeIgniter\Model;

class RegistroInstructorModel extends Model{ 
    protected $table = 'registroinstructor'; 
    protected $primaryKey = 'correo';
    protected $useAutoIncrement = false; 
    protected $returnType = 'array';
    protected $useSoftDeletes = false; //Como se comporta la eliminacion de registro
    protected $allowedFields = ['nombre', 'apellido','edad','telefono', 'foto','formacion','tipo','contraseña', 'contraseña2','tipo_usuario']; //Van los campos de la tabla
    
    public function mostrarTodo($data){
        $resultado = $this->db->table('registroinstructor');
        $resultado->where($data);
		return  $resultado->get()->getResultArray();
   }
   public function mostrarTodoPerfil($data){
    $resultado = $this->db->table('registroinstructor');
    $resultado->where($data);
    return  $resultado->get()->getResultArray();
}
}
?>