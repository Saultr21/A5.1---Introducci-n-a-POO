<?php

// Definición de interfaz
interface Conduccion {
    public function acelerar($cantidad);
    public function frenar($cantidad);
}

// Definición de la clase principal
class Vehiculo {
    protected $marca;
    protected $modelo;
    protected $color;

    // Constructor
    public function __construct($marca, $modelo, $color) {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->color = $color;
    }

    // Destructor
    public function __destruct() {
        echo "<p>El vehículo se ha destruido.\n</p>";
    }

    // Método final para obtener detalles del vehículo
    final public function obtenerDetalles() {
        return "Marca: {$this->marca} | Modelo: {$this->modelo} | Color: {$this->color}";
    }
}

// Clase que hereda de Vehiculo e implementa la interfaz Conduccion
class Coche extends Vehiculo implements Conduccion {
    private $velocidad;

    // Constante de la clase Coche
    const MAX_VELOCIDAD = 120;

    // Constructor que acepta la velocidad como parámetro
    public function __construct($marca, $modelo, $color, $velocidad = 5) {
        parent::__construct($marca, $modelo, $color);
        $this->velocidad = $velocidad;
    }

    // Método para mostrar la velocidad
    public function velocidad(){
        echo "<p>Velocidad: {$this->velocidad} km/h. </p>";
    }
    
    // Método de la interfaz para acelerar
     public function acelerar($cantidad) {
        $this->velocidad = min(self::MAX_VELOCIDAD, $this->velocidad + $cantidad);
        echo "<p>Acelerando {$cantidad} km/h.</p>";
    }

    // Método de la interfaz para frenar
    public function frenar($cantidad) {
        $this->velocidad = max(0, $this->velocidad - $cantidad);
        echo "<p>Frenando {$cantidad} km/h.</p>";
    }

    // Método específico del coche
    public function activarLuces() {
        echo "<p>Luces del coche activadas.\n</p>";
    }

    // Método para obtener detalles del coche
    public function obtenerDetallesCompleto() {
        $detallesVehiculo = parent::obtenerDetalles();
        echo "<p>{$detallesVehiculo} | Velocidad actual: {$this->velocidad} km/h.</p>";
    }
}

// Comprobaciones
$coche1 = new Coche("Toyota", "Corolla", "Gris", 20);
$coche2 = new Coche("Ferrari", "", "Rojo");
$coche1->obtenerDetallesCompleto();
$coche1->acelerar(140);
$coche1->velocidad();
$coche1->frenar(5);
$coche1->velocidad();
$coche1->activarLuces();
unset($coche1);
echo "-------------------------";
$coche2->obtenerDetallesCompleto();
$coche2->acelerar(5);
$coche2->velocidad();
$coche2->frenar(15);
$coche2->velocidad();

?>

