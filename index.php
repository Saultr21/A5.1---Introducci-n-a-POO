<?php
class Vehiculo {
    protected $marca;
    protected $modelo;
    protected $color;

    public function __construct($marca, $modelo, $color) {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->color = $color;
    }

    public function obtenerDetalles() {
        return "Marca: {$this->marca} | Modelo: {$this->modelo} | Color: {$this->color}";
    }
}

class Coche extends Vehiculo {
    private $velocidad;

    public function __construct($marca, $modelo, $color, $velocidad = 0) {
        parent::__construct($marca, $modelo, $color);
        $this->velocidad = $velocidad;
    }

    public function obtenerDetallesCompleto() {
        $detallesVehiculo = parent::obtenerDetalles();
        return "{$detallesVehiculo} | Velocidad actual: {$this->velocidad} km/h.";
    }
}

$coche1 = new Coche("Toyota", "Corolla", "Gris", 20);
echo $coche1->obtenerDetallesCompleto();
?>