function cambiosDisplay(campo) {
    if (campo["campo"].checked) {
        campo["contenedor"].style.transition = ".3s !important";
        campo["contenedor"].style.height = "auto";
    }
    else {
        campo["contenedor"].style.transition = ".3s !important";
        campo["contenedor"].style.height = 0;
    }
}




let cambios = {
    "descuento" : {
        "campo" : document.getElementById("discount"),
        "contenedor" : document.getElementById("tabla-descuentos")
    },
    "custom" : {
        "campo" : document.getElementById("custom"),
        "contenedor" : document.getElementById("customPizza")
    }
};




for (let nombreCampo in cambios) {
    cambiosDisplay(cambios[nombreCampo]);
    cambios[nombreCampo]["campo"].addEventListener("click", function () {
        cambiosDisplay(cambios[nombreCampo]);
    });
}
