<?php 
namespace App\Models;
use CodeIgniter\Model;
class ActividadesModel extends Model { 
    protected $table = 'informacion'; 
    protected $primaryKey = 'id';
    protected $useAutoIncrement = false; 
    protected $returnType = 'array';
    protected $useSoftDeletes = false; 
    protected $allowedFields = ['Tipo', 'Dia', 'Horario', 'Descripcion']; 
    
    public function mostrarTodo($data) {
        $resultado = $this->db->table('informacion');
        $resultado->where($data);
        return $resultado->get()->getResultArray();
    }

    // Método para actualizar la descripción
    public function updateDescripcion($id, $descripcion) {
        return $this->where('id', $id)->set('Descripcion', $descripcion)->update();
    }

    // Método para actualizar un horario
    public function updateHorario($id, $hora, $dia, $tipo) {
        $data = [
            'Horario' => $hora,
            'Dia' => $dia,
            'Tipo' => $tipo
        ];
        return $this->where('id', $id)->set($data)->update();
    }

    // Método para limpiar un horario
    public function clearHorario($id) {
        return $this->where('id', $id)->delete();
    }

    // Método auxiliar para obtener el ID de un horario basado en Hora y Día
    public function getHorarioId($hora, $dia) {
        return $this->where('Horario', $hora)->where('Dia', $dia)->first()['id'] ?? null;
    }

    // Método auxiliar para obtener el tipo de actividad basado en ID
    public function getTipoById($id) {
        return $this->where('id', $id)->first()['Tipo'] ?? null;
    }
}


?>