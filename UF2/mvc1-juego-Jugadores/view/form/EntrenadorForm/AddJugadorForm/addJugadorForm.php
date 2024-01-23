<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body>
<div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
</div>

<div id="content">

    <form method="post" action="">
        <fieldset>
            <div>
                <label for="nombre" class="nombre">Nombre</label>
                <input type="text" placeholder="nombre" name="nombre" id="nombre"/>

                <label for="pais" class="pais">País</label>
                <input type="text" placeholder="pais" name="pais" id="pais"/>

                <label for="numCamiseta" class="numCamiseta">Numero Camiseta</label>
                <input type="number" placeholder="numCamiseta" name="numCamiseta" id="numCamiseta"/>

                <label for="fNacimiento" class="fNacimiento">Fecha de Nacimiento</label>
                <input type="date" placeholder="fNacimiento" name="fNacimiento" id="fNacimiento"/>

                <label for="rol" class="rol">Rol</label>
                <input type="text" placeholder="rol" name="rol" id="rol"/>

                <label for="goles" class="goles">Goles</label>
                <input type="number" placeholder="goles" name="goles" id="goles"/>

                <label for="partidos" class="partidos">Partidos</label>
                <input type="number" placeholder="partidos" name="partidos" id="partidos"/>

            </div>


            <label>* Required fields</label>
            <input type="submit" name="actionSearch" value="Add"/>
        </fieldset>
    </form>

</div>
</body>
</html>
