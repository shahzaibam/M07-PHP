<?php
include_once("../Modelo/Contacto.php");


class Editar
{

    public function mostrarFormularioEdicion($contacto)
    {
?>
        <h2>Editar Contacto</h2>

        <form method="post" action="guardar_edicion.php">

            <div>
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" value="<?php echo $contacto->getNombre(); ?>" required>
            </div>

            <div>
                <label for="apellido">Apellido:</label>
                <input type="text" name="apellido" id="apellido" value="<?php echo $contacto->getApellidos(); ?>" required>
            </div>

            <div>
                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="<?php echo $contacto->getFNacimiento(); ?>" required>
            </div>

            <div>
                <label for="email">Correo Electrónico:</label>
                <input type="email" name="email" id="email" value="<?php echo $contacto->getEmail(); ?>" required>
            </div>

            <div>
                <input type="submit" value="Guardar">
            </div>
        </form>
<?php
    }
}

?>