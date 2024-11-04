<?php 
namespace App\Models;
use CodeIgniter\Model;
class ActividadesModel extends Model { 
    protected $table = 'informacion'; 
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true; 
    protected $returnType = 'array';
    protected $useSoftDeletes = false; 
    protected $allowedFields = ['Tipo', 'Dia', 'Horario','hora_inicio','hora_fin','Cupo', 'Instructor']; 
    
    public function verificarCoincidenciaInstructor() {
        // Consulta SQL para verificar coincidencias
        $query = "SELECT `informacion`.*, `registroinstructor`.*
                  FROM `informacion`
                  JOIN `registroinstructor` ON `informacion`.`Instructor` = `registroinstructor`.`correo`";

        // Ejecutar la consulta
        $stmt = $this->db->query($query); // Usa query directamente en lugar de prepare y execute

        // Verificar si hay resultados
        if ($stmt->getNumRows() > 0) {
            return "coincide"; // Hay resultados, retorna "coincide"
        } else {
            return "no coincide"; // No hay resultados
        }
    }
    public function mostrarTodaBD() {
        $resultado = $this->db->table('informacion');
        return $resultado->get()->getResultArray();
    }
    public function mostrarTodo($data) {
        $resultado = $this->db->table('informacion');
        $resultado->where($data);
        return $resultado->get()->getResultArray();
    }
    
    public function mostrarSolo($data){
        $resultado = $this->db->table('informacion');
        $resultado->where($data);
        return $resultado->get()->getResultArray();
    }

    public function mostrarSoloHorarios() {
        $resultado = $this->db->table('informacion');
        $resultado->select('Horario');
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
    
    public function getHorarioSemanal(){
        $resultado = $this->db->table('informacion');
        $resultado->orderBy("FIELD(dia, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes')");
        return $resultado->get()->getResultArray();
    }


    public function obtenerHorariosHIIT() {
        $resultado = $this->db->table('informacion');
        $resultado->select('Horario');
        $resultado->where('Tipo', 'HIIT'); // Filtrar por tipo HIIT
        $resultado->where('Cupo >', 0); // Asegurarse de que hay cupo disponible
        $resultado->groupBy('Horario'); // Evitar duplicados
        $query = $resultado->get(); // Ejecutar la consulta
    return array_column($query->getResultArray(), 'Horario');
    }

    public function obtenerHorariosREFORMER() {
        $resultado = $this->db->table('informacion');
        $resultado->select('Horario');
        $resultado->where('Tipo', 'Reformer'); // Filtrar por tipo HIIT
        $resultado->where('Cupo >', 0); // Asegurarse de que hay cupo disponible
        $resultado->groupBy('Horario'); // Evitar duplicados
        $query = $resultado->get(); // Ejecutar la consulta
    return array_column($query->getResultArray(), 'Horario');
    } 

    public function obtenerHorariosTERAPEUTICO() {
        $resultado = $this->db->table('informacion');
        $resultado->select('Horario');
        $resultado->where('Tipo', 'Terapeutico'); // Filtrar por tipo HIIT
        $resultado->where('Cupo >', 0); // Asegurarse de que hay cupo disponible
        $resultado->groupBy('Horario'); // Evitar duplicados
        $query = $resultado->get(); // Ejecutar la consulta
    return array_column($query->getResultArray(), 'Horario');
    }
    
    #HORARIOS SIN TENER EN CUENTA CUPOS
    public function obtenerHorariosHIIT2() {
        $resultado = $this->db->table('informacion');
        $resultado->select('Horario');
        $resultado->where('Tipo', 'HIIT'); // Filtrar por tipo HIIT
        $resultado->groupBy('Horario'); // Evitar duplicados
        $query = $resultado->get(); // Ejecutar la consulta
    return array_column($query->getResultArray(), 'Horario');
    }

    public function obtenerHorariosREFORMER2() {
        $resultado = $this->db->table('informacion');
        $resultado->select('Horario');
        $resultado->where('Tipo', 'Reformer'); // Filtrar por tipo HIIT
        $resultado->groupBy('Horario'); // Evitar duplicados
        $query = $resultado->get(); // Ejecutar la consulta
    return array_column($query->getResultArray(), 'Horario');
    }

    public function obtenerHorariosTERAPEUTICO2() {
        $resultado = $this->db->table('informacion');
        $resultado->select('Horario');
        $resultado->where('Tipo', 'Terapeutico'); // Filtrar por tipo HIIT
        $resultado->groupBy('Horario'); // Evitar duplicados
        $query = $resultado->get(); // Ejecutar la consulta
    return array_column($query->getResultArray(), 'Horario');
    }
}


?>