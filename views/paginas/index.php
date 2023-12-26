
<main class="contenedor seccion">
    <h2>More about us</h2>
    <div class="iconos-nosotro">
        <div class="icono">
            <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
            <h3>Security</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique omnis, repudiandae eligendi nisi
                quam modi deserunt. A, nemo omnis, dolore rem dolor autem soluta magni deserunt labore sint fuga
                laudantium?</p>
        </div>
        <div class="icono">
            <img src="build/img/icono2.svg" alt="Icono precio" loading="lazy">
            <h3>Cheap</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique omnis, repudiandae eligendi nisi
                quam modi deserunt. A, nemo omnis, dolore rem dolor autem soluta magni deserunt labore sint fuga
                laudantium?</p>
        </div>
        <div class="icono">
            <img src="build/img/icono3.svg" alt="Icono tiempo" loading="lazy">
            <h3>Time</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique omnis, repudiandae eligendi nisi
                quam modi deserunt. A, nemo omnis, dolore rem dolor autem soluta magni deserunt labore sint fuga
                laudantium?</p>
        </div>
    </div>
</main>
<section  ection class="seccion contenedor">
    <h2>Houses and Apartments for Sale</h2>

    <?php
    include 'listado.php';
    ?>

    <div class="ver-todas">
        <a class="boton-verde" href="anuncios">Ver Todas</a>
    </div>
</section>

<section class="imagen-contacto">
    <h2>Find the home of your dreams</h2>
    <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
    <a href="contacto.php" class="boton-amarillo">Contactanos</a>
</section>

<div class="contenedor seccion seccion-inferior">
    <section class="blog">
        <h3>Nuestro Blog</h3>
        <!--Primer article-->
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source loading="lazy" srcset="build/img/blog1.webp" type="image/webp">
                    <img loading="lazy" src="build/img/blog1.jpg" alt="imagen-blog">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span> </p>
                    <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero</p>
                </a>
            </div>
        </article>
        <!--Segundo article-->
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source loading="lazy" srcset="build/img/blog2.webp" type="image/webp">
                    <img loading="lazy" src="build/img/blog2.jpg" alt="imagen-blog">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Guía para la decoración de tu hogar</h4>
                    <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span> </p>
                    <p>Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio</p>
                </a>
            </div>
        </article>
    </section>
    <!--Testimoniales-->
    <section class="testimoniales">
        <h3>Testimoniales</h3>
        <div class="testimonial">
            <blockquote>
                El personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas.
            </blockquote>
            <p>- Yalico Espinoza Oscar</p>
        </div>
    </section>
</div>
