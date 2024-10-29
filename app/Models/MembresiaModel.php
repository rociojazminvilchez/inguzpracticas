<?php 
namespace App\Models;
use CodeIgniter\Model;

class MembresiaModel extends Model { 
    protected $table = 'membresia'; 
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true; 
    protected $returnType = 'array';
    protected $useSoftDeletes = false; // Cómo se comporta la eliminación de registro
    protected $allowedFields = ['correo', 'actividad', 'cantidad', 'pago', 'estado', 'fecha_creada', 'fecha_inicio', 'fecha_fin','estado_pago']; // Campos de la tabla
    
    public function mostrarTodo() {
        $resultado = $this->db->table($this->table); // Usa el nombre de la tabla protegido
        return $resultado->get()->getResultArray();
    }

    public function mostrarSoloID($id) {
        $resultado = $this->db->table($this->table); // Usa el nombre de la tabla protegido
        $resultado->where('id', $id); // Especifica que busque donde 'id' es igual a $id
        return $resultado->get()->getResultArray();
    }
}
