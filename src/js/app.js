document.addEventListener('DOMContentLoaded', function () {
    IniciaApp();
});

function IniciaApp(params) {
    mobileResponsive();
    darkMode();
    contacto();
}

function mobileResponsive(params) {
    const mobile = document.querySelector('.mobile-menu');
    mobile.addEventListener('click', navegacionResponsive);  
}

function navegacionResponsive(params) {
    const navegacion = document.querySelector('.navegacion');
    navegacion.classList.toggle('mostrar');
}

function darkMode(params) {
    // Ver las preferencias del sistema si es modo oscuro, claro o automatico
    const preferenciaDarkmode = window.matchMedia('(prefers-color-scheme: dark)');
    //console.log(preferenciaDarkmode.matches);
    if (preferenciaDarkmode.matches) {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }
    // Cambie el tema automaticamente si las preferencias del sistema cambian
    preferenciaDarkmode.addEventListener("change", function (params) {
        if (preferenciaDarkmode.matches) {
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        }
    });

    //Boton de cambio de temas de claro a oscuro y biceversa
    const boton_dark_mode = document.querySelector('.dark-mode-button');
    boton_dark_mode.addEventListener('click', function darkFunction(params) {
        document.body.classList.toggle('dark-mode');
    });
}

function contacto(){
    const metodoCambiar = document.querySelectorAll('input[name="contacto"]');
    //console.log(metodoCambiar);
    metodoCambiar.forEach(input => input.addEventListener('click',mostrarContacto));
}

function mostrarContacto(e){
    //console.log("Seleccionando...");
    const contactoDiv = document.querySelector("#contacto");
    //contactoDiv.textContent = "Le diste click";

    //console.log(e);
    if (e.target.value === "telefono") {

        contactoDiv.innerHTML = `
        <label for="telefono">Numero Telefono</label>
        <input type="tel" placeholder="Tu telefono" id="telefono" name="telefono">

        <p>Elija la fecha y la hora que desee ser contactado</p>

            <label for="fecha">Fecha</label>
            <input type="date" id="fecha" name="fecha">

            <label for="hora">Hora</label>
            <input type="time" id="hora" min="09:00" max="18:00" name="hora">
        `;
    }else if(e.target.value === "email"){
        
        contactoDiv.innerHTML = `
        <label for="email">E-mail</label>
        <input type="email" placeholder="Tu E-mail" id="email" name="email" required>
        `;
    }

}