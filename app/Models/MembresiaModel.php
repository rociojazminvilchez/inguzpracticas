<?php 
namespace App\Models;
use CodeIgniter\Model;

class MembresiaModel extends Model { 
    protected $table = 'membresia'; 
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true; 
    protected $returnType = 'array';
    protected $useSoftDeletes = false; // Cómo se comporta la eliminación de registro
    protected $allowedFields = ['fecha_creada','correo', 'actividad', 'cantidad', 'pago','estado_pago','fecha_inicio', 'fecha_fin','estado','pases','instructor','fecha_actualizacion']; // Campos de la tabla
    
    public function mostrarTodo() {
        $resultado = $this->db->table($this->table);
        return $resultado->get()->getResultArray();
    }

    public function mostrarSoloID($id) {
        $resultado = $this->db->table($this->table); 
        $resultado->where('id', $id); 
        return $resultado->get()->getResultArray();
    }

    public function mostrar_membresia_correo($correo){
        $resultado = $this->db->table($this->table); 
        $resultado->where('correo', $correo);
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
        $resultado->where('pases !=', '0');
        return $resultado->get()->getResultArray();
    }

    public function membresia_rechazada(){
        $resultado = $this->db->table($this->table); 
        $resultado->where(['estado_pago' => 'Rechazado']);
        return $resultado->get()->getResultArray();
    }

    public function membresia_vencida(){
        $resultado = $this->db->table($this->table); 
        $resultado->where(['estado' => 'Vencida', 'estado_pago'=>'Aprobado']);
        return $resultado->get()->getResultArray();
    }

    public function membresia_activa_segunID($correo){
        $resultado = $this->db->table($this->table); 
        $resultado->where(['correo' => $correo]);
        $resultado->where('estado', 'Activa');
        return $resultado->get()->getResultArray();
    }

    public function restarPase($correo,$id) {
        
        return $this->db->table($this->table)
                        ->set('pases', 'pases - 1', false) // Resta 1 al campo 'pases'
                        ->where('correo', $correo)
                        ->where('id', $id)  // O el campo que estés utilizando para identificar al usuario
                        ->update();
    }
}
