<?php 
namespace App\Models;
use CodeIgniter\Model;

class MembresiaModel extends Model { 
    protected $table = 'membresia'; 
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true; 
    protected $returnType = 'array';
    protected $useSoftDeletes = false; // Cómo se comporta la eliminación de registro
    protected $allowedFields = ['fecha_creada','correo', 'actividad', 'cantidad', 'pago','estado_pago','fecha_inicio', 'fecha_fin','estado','pases','instructor']; // Campos de la tabla
    
    public function mostrarTodo() {
        $resultado = $this->db->table($this->table);
        return $resultado->get()->getResultArray();
    }

    public function mostrarSoloID($id) {
        $resultado = $this->db->table($this->table); 
        $resultado->where('id', $id); 
        return $resultado->get()->getResultArray();
    }

    public function mostrar_membresia_activa($correo){
        $resultado = $this->db->table($this->table); 
        $resultado->where(['correo' => $correo, 'estado' => 'Activa']);
        return $resultado->get()->getResultArray();
    }

    public function membresia_espera(){
        $resultado = $this->db->table($this->table); 
        $resultado->where(['estado_pago' => 'En espera']);
        return $resultado->get()->getResultArray();
    } 

    public function membresia_activa(){
        $resultado = $this->db->table($this->table); 
        $resultado->where(['estado' => 'Activa']);
        return $resultado->get()->getResultArray();
    }

    public function membresia_rechazada(){
        $resultado = $this->db->table($this->table); 
        $resultado->where(['estado' => 'Rechazada']);
        return $resultado->get()->getResultArray();
    }

    public function membresia_vencida(){
        $resultado = $this->db->table($this->table); 
        $resultado->where(['estado' => 'Vencida']);
        return $resultado->get()->getResultArray();
    }
}
