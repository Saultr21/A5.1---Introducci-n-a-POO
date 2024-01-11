<?php
interface Conduccion {
    public function acelerar($cantidad);
    public function frenar($cantidad);
}
class Vehiculo {
    protected $marca;
    protected $modelo;
    protected $color;

    public function __construct($marca, $modelo, $color) {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->color = $color;
    }

    public function __destruct() {
        echo "<p>El vehículo se ha destruido.\n</p>";
    }

    public function obtenerDetalles() {
        return "Marca: {$this->marca} | Modelo: {$this->modelo} | Color: {$this->color}";
    }
}

class Coche extends Vehiculo implements Conduccion {
    private $velocidad;

    public function __construct($marca, $modelo, $color, $velocidad = 0) {
        parent::__construct($marca, $modelo, $color);
        $this->velocidad = $velocidad;
    }

    public function obtenerDetallesCompleto() {
        $detallesVehiculo = parent::obtenerDetalles();
        return "{$detallesVehiculo} | Velocidad actual: {$this->velocidad} km/h.";
    }

    public function acelerar($cantidad) {
        $this->velocidad += $cantidad;
        echo "<p>Acelerando {$cantidad} km/h.\n</p>";
    }

    public function frenar($cantidad) {
        $this->velocidad = max(0, $this->velocidad - $cantidad);
        echo "<p>Frenando {$cantidad} km/h.\n</p>";
    }

    public function activarLuces() {
        echo "<p>Luces del coche activadas.\n</p>";
    }

    public function velocidad() {
        echo "<p>Velocidad: {$this->velocidad} km/h. </p>";
    }
}

$coche1 = new Coche("Toyota", "Corolla", "Gris", 20);
echo $coche1->obtenerDetallesCompleto();
$coche1->acelerar(10);
$coche1->velocidad();
$coche1->frenar(5);
$coche1->velocidad();
$coche1->activarLuces();
unset($coche1);
?>