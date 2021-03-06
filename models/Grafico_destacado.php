<?php

class Grafico_destacado {

    private $id;
    private $archivo;
    private $posicion;
    private $seccion;
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    function getId() {
        return $this->id;
    }

    function getArchivo() {
        return $this->archivo;
    }

    function getPosicion() {
        return $this->posicion;
    }
    function getSeccion() {
        return $this->seccion;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setArchivo($archivo) {
        $this->archivo = $archivo;
    }

    function setPosicion($posicion) {
        $this->posicion = $posicion;
    }
    function setSeccion($seccion) {
        $this->seccion = $seccion;
    }

    public function search($busqueda) {
        if ($busqueda == 'all') {
            $query = "SELECT * FROM graficodestacado ORDER BY posicion ASC;";
        } else {
            $query = "
                   SELECT * FROM estudio
	WHERE archivo LIKE '%" . $busqueda . "%'";
        }
        $resultado = $this->db->query($query);
        return $resultado;
    }

    public function save() {

        $now = new DateTime();
        $date = $now->format("Y-m-d H:i:s");

        $query = "INSERT INTO graficodestacado VALUES (NULL, '{$this->getArchivo()}', '{$this->getPosicion()}','{$this->getSeccion()}' );";

        $save = $this->db->query($query);

        $result = false;
        if ($save) {
            require_once 'models/Log.php';
            $archivo_nombre = substr($this->getArchivo(), strrpos($this->getArchivo(), '/') + 1);
            $log = new Log();
            $log->setFecha($date);
            $log->setTipo('Agregar');
            $log->setActividad('Grafico destacado'.' <i class=icon-fa>&#xf0a9;</i> '.$archivo_nombre);
            $log->setUsuario_id($_SESSION['identidad']->id);
            $log->save();
            $result = true;
        }
        return $result;
    }

    public function getAll() {
        $estudios = $this->db->query("SELECT * FROM graficodestacado ORDER BY posicion ASC;");
        return $estudios;
    }

    public function getGraficoById() {
        $result = false;
        $query = "SELECT * FROM graficodestacado WHERE id='{$this->getId()}' LIMIT 1;";
        $grafico = $this->db->query($query);
        if ($grafico) {
            $result = $grafico->fetch_object();
        }
        return $result;
    }
    public function delete() {
        $now = new DateTime();
        $date = $now->format("Y-m-d H:i:s");
        $result = false;
        $query = "DELETE FROM graficodestacado WHERE id = '$this->id'";
        $grafico_destacado = new Grafico_destacado();
        $grafico_destacado->setId($this->id);
        $gra_eliminado = $grafico_destacado->getGraficoById();
        if ($this->db->query($query) == TRUE && $this->db->affected_rows > 0) {
            require_once 'models/Log.php';
            $archivo_nombre = substr($gra_eliminado->archivo, strrpos($gra_eliminado->archivo, '/') + 1);
            $log = new Log();
            $log->setFecha($date);
            $log->setTipo('Eliminar');
            $log->setActividad('Grafico destacado'.' <i class=icon-fa>&#xf0a9;</i> '.$archivo_nombre);
            $log->setUsuario_id($_SESSION['identidad']->id);
            $log->save();
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    public function query($query) {
        $resultado = $this->db->query($query);
        return $resultado;
    }
}
