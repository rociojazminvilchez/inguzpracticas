<?php 
namespace App\Models;
use CodeIgniter\Model;
class ActividadesModel extends Model { 
    protected $table = 'informacion'; 
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true; 
    protected $returnType = 'array';
    protected $useSoftDeletes = false; 
    protected $allowedFields = ['Tipo', 'Dia', 'Horario', 'Instructor']; 
    
    public function mostrarTodo($data) {
        $resultado = $this->db->table('informacion');
        $resultado->where($data);
        return $resultado->get()->getResultArray();
    }

#Metodos para actualizar datos
    public function mostrarTodoActualizar() {
        $resultado = $this->db->table('informacion');
        return $resultado->get()->getResultArray();
    }

    public function updateHorario($id, $hora, $dia, $tipo) {
        $data = [
            'Horario' => $hora,
            'Dia' => $dia,
            'Tipo' => $tipo
        ];
        return $this->where('id', $id)->set($data)->update();
    }

    public function clearHorario($id) {
        return $this->where('id', $id)->delete();
    }
#Metodos auxiliares
    // obtener el ID de un horario basado en Hora y Día
    public function getHorarioId($hora, $dia) {
        return $this->where('Horario', $hora)->where('Dia', $dia)->first()['id'] ?? null;
    }

    // obtener el tipo de actividad basado en ID
    public function getTipoById($id) {
        return $this->where('id', $id)->first()['Tipo'] ?? null;
    }
}


?>