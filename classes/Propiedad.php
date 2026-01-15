<?php

namespace App;

class Propiedad
{

    // Base de datos
    protected static $db;

    //mapeo de la base de datos
    protected static $columnasDB = [
        'id',
        'titulo',
        'precio',
        'imagen',
        'descripcion',
        'habitaciones',
        'wc',
        'aparcamiento',
        'creado',
        'vendedor_id'
    ];
    protected static $errores = [];

    public $titulo = "";
    public $precio = "";
    public $imagen = "";
    public $descripcion = "";
    public $habitaciones = "";
    public $wc = "";
    public $aparcamiento = "";
    public $creado = "";
    public $vendedor_id = "";

    public function __construct($args = [])
    {
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->aparcamiento = $args['aparcamiento'] ?? '';
        $this->creado = date('Y-m-d') ?? '';
        $this->vendedor_id = $args['vendedor_id'] ?? '';
    }
    // Definir la conexion a la base de datos
    public static function setDB($database)
    {
        self::$db = $database;
    }
    public function guardar()
    {

        //Sanitizar los atributos antes de guardar en la base de datos
        $atributos = $this->sanitizarAtributos();
        //debuguear($atributos);


        //debuguear(array_keys($atributos));//muestra las llaves de un array
        //debuguear(array_values($atributos));//muestra los valores de un array
        //$string = join(',', array_values($atributos));
        //debuguear($string);


        //Insertar en la base de datos
        $query = "INSERT INTO propiedades (";
        $query .= join(',', array_keys($atributos));
        $query .= ") VALUES ('";
        $query .= join("','", array_values($atributos));
        $query .= "')";
        //debuguear($query);
        $resultado = self::$db->query($query);
        return $resultado;
        //debuguear($resultado);   
    }
    //Identificar y unir los atributos de la BD
    public function atributos()
    {
        $atributos = [];
        foreach (self::$columnasDB as $columna) {
            if ($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }
    //Sanitizar los atributos
    public function sanitizarAtributos()
    {
        $atributos = $this->atributos();
        $sanitizados = [];
        foreach ($atributos as $key => $value) {
            $sanitizados[$key] = self::$db->escape_string($value);
        }
        return $sanitizados;
    }
    public static function getErrores()
    {
        return self::$errores;
    }
    public function validar()
    {
        if (!$this->titulo) {
            self::$errores[] = "Debes añadir un titulo";
        }
        if (!$this->precio) {
            self::$errores[] = "Debes añadir un precio";
        }
        if (strlen($this->descripcion) < 20) {
            self::$errores[] = "Debes añadir una descripción de al menos 20 caracteres";
        }
        if (!$this->habitaciones) {
            self::$errores[] = "Debes añadir el número de habitaciones";
        }
        if (!$this->wc) {
            self::$errores[] = "Debes añadir número de wc";
        }
        if (!$this->aparcamiento) {
            self::$errores[] = "Debes añadir número de estacionamientos";
        }
        if (!$this->vendedor_id) {
            self::$errores[] = "Debes añadir un vendedor";
        }
        if (!$this->imagen) {
            self::$errores[] = "Debes añadir una imagen";
        }
        
        return self::$errores;
    }
    public function setImagen($imagen)
    {
        //Asignar el atributo de imagen al nombre de la imagen
        if($imagen){
            $this->imagen = $imagen;
        }
    }
    public static function all(){
        $query = "SELECT * FROM propiedades";

        $resultado = self::consultarSQL($query);
        //debuguear($resultado->fetch_assoc());
        return $resultado;
    }
    public static function consultarSQL($query){
        //Consultar la base de datos
        $resultado= self::$db->query($query);

        //Iterar los resultados
        $array = [];
        while($registro = $resultado->fetch_assoc()){
            $array[] = self::crearObjeto($registro);            
        }
        //debuguear($array);

        //Liberar memoria
        $resultado ->free();

        //Retornar los resultados
        return $array;
    }

    protected static function crearObjeto($registro){
        $objeto = new self;
        //debuguear($objeto);

        foreach ($registro as $key => $value) {
            if(property_exists($objeto, $key)){
                $objeto->$key = $value;
            } 
            //debuguear($objeto);          
        }
        return $objeto;
    }
}

//self hace referencia a la clase static
//this hace referencia a la instancia public