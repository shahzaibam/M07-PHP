<?php

class Videoclub
{
    private $productos = [];
    private $socios = [];

    // Métodos públicos para incluir soportes y clientes
    public function incluirSoporte(Soporte $soporte)
    {
        $this->incluirProducto($soporte, $this->productos);
    }

    public function incluirCliente(Cliente $cliente)
    {
        $this->incluirProducto($cliente, $this->socios);
    }

    // Método público para incluir un juego
    public function incluirJuego(Juego $juego)
    {
        $this->incluirProducto($juego, $this->productos);
    }

    // Método privado para incluir un producto (soporte o cliente)
    private function incluirProducto($producto, &$array)
    {
        $array[] = $producto;
        echo "Producto incluido correctamente.\n";
    }
    public function incluirDvd(Dvd $dvd)
    {
        $this->incluirProducto($dvd, $this->productos);
    }
}

?>
