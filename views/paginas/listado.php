<div class="contenedor-anuncios">
            <!--Auncio-->
            <?php foreach($propiedades as $propiedad):?>
            <div class="anuncio">
                <picture>
                    <img loading="lazy" src="/imagenes/<?php echo $propiedad->Imagen?>" alt="anuncio" class="img">
                </picture>
                <div class="contenido-anuncio">
                    <h3><?php echo $propiedad->Titulo?></h3>
                    <p><?php echo $propiedad->Descripcion?></p>
                    <p class="precio">$<?php echo $propiedad->Precio?></p>
                    <ul class="iconos-caracteristicas">
                        <li>
                            <img class="icon" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                            <p><?php echo $propiedad->servicio_higienico?></p>
                        </li>
                        <li>
                            <img class="icon" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                            <p><?php echo $propiedad->Estacionamiento?></p>
                        </li>
                        <li>
                            <img class="icon" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono dormitorios">
                            <p><?php echo $propiedad->Num_habitaciones?></p>
                        </li>
                    </ul>
                    <a class="boton boton-amarillo" href="anuncio?Id=<?php echo $propiedad->Id?>">Ver propiedad</a>
                </div>
            </div>
            <?php endforeach;?>
            <!--Fin de anuncio-->
        </div><!--Fin de contenedor anuncios-->