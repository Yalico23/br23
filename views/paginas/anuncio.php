

<main class="contenedor seccion contenido-centrado">
    <h2><?php echo $propiedad->Titulo?></h2>

        <img loading="lazy" src="imagenes/<?php echo $propiedad->Imagen?>" alt="anuncio">
    <div class="resumen-propiedad">
        <p class="precio">$ <?php echo $propiedad->Precio?></p>
        <ul class="iconos-caracteristicas">
            <li>
                <img loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                <p><?php echo $propiedad->servicio_higienico?></p>
            </li>
            <li>
                <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                <p><?php echo $propiedad->Estacionamiento?></p>
            </li>
            <li>
                <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono dormitorios">
                <p><?php echo $propiedad->Num_habitaciones?></p>
            </li>
        </ul>
        <p><?php echo $propiedad->Descripcion?></p>
    </div>
</main>

