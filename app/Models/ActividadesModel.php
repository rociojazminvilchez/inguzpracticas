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

     // Método para actualizar la descripción
     public function updateDescripcion($id, $descripcion)
{
    return $this->where('id', $id)->set('Descripcion', $descripcion)->update();
}
     // Método para actualizar un horario
public function updateHorario($id, $hora, $dia, $tipo)
{
    // Datos a actualizar
    $data = [
        'Horario' => $hora,
        'Dia' => $dia,
        'Tipo' => $tipo
    ];

    // Actualizamos el registro existente basado en el ID proporcionado
    return $this->where('id', $id)->set($data)->update();
}
public function clearHorario($hora, $dia)
{
    return $this->where('Horario', $hora)->where('Dia', $dia)->delete();
}
     
}
?>