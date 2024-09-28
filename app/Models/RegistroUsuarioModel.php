<?php 
namespace App\Models;
use CodeIgniter\Model;

class RegistroUsuarioModel extends Model{ 
    protected $table = 'registrousuario'; 
    protected $primaryKey = 'correo';
    protected $useAutoIncrement = false; 
    protected $returnType = 'array';
    protected $useSoftDeletes = false; //Como se comporta la eliminacion de registro
    protected $allowedFields = ['nombre', 'apellido','edad','telefono', 'direccion','certificado','contraseña', 'contraseña2']; //Van los campos de la tabla
    
    public function mostrarTodo($data){
        $resultado = $this->db->table('registrousuario');
        $resultado->where($data);
		return  $resultado->get()->getResultArray();
   }
}
?>