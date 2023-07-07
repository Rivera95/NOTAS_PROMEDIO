<?php 

namespace Model;

class Funcion {

    // PARA LA BASE DE DATOS
    protected static $db;
    protected static $columnaDB = [];
    protected static $tabla = '';

    // ERROR DE VALIDACION
    protected static $errores = [];

    // CONEXION A LA BD
    public static function setDB($database) {
        self::$db = $database;
    }

    // INSERTAR DATOS
    public function crear(){

        // SANITIZAR LOS DATOS
    }

    // ATRIBUTOS
    public function atributos(){
        $atributos = [];
        foreach (static::$columnaDB as $columna) {
            if($columna === 'id') continue; // ESTRUCTURA ITERATIVA 
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    // SANITIZAR DATOS
    public function sanitizar(){
        $atributos = $this->atributos();
        $sanitizado = [];
        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }
}




?>