<?php

class Videoclub
{
    private $productos = [];
    private $socios = [];

    // metods públicos para incluir soportes y clientes
    public function incluirSoporte(Soporte $soporte)
    {
        $this->incluirProducto($soporte, $this->productos);
    }


    // metods público para incluir un juego
    public function incluirJuego(Juego $juego)
    {
        $this->incluirProducto($juego, $this->productos);
    }

    // metods privado para incluir un producto (soporte o cliente)
    private function incluirProducto($producto, &$array)
    {
        $array[] = $producto;
        echo "Producto incluido correctamente.\n";
    }

    public function incluirSocio(Cliente $socio)
    {
        $this->incluirProducto($socio, $this->socios);
    }


    public function listarProductos()
    {
        foreach ($this->productos as $producto) {
            echo "Tipo: " . get_class($producto) . "<br>";
            echo "Título: " . $producto->getTitulo() . "<br>";
            echo "Número: " . $producto->obtenerNumero() . "<br>";
            echo "Precio: " . $producto->getPrecio() . " euros<br>";
            echo "<br>";
        }
    }


}

?>

