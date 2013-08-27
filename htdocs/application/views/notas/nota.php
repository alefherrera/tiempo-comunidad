

<div class="contenido">

    <div id="nota" class="float60">
        <div class="nota_formato">
            <h5><?php echo $nota['fecha_alta']; ?> - Por <span><?php echo $nota['autor'] == '' ? 'Anónimo' : $nota['autor']; ?></span></h5>
            <h1>
                <?php echo $nota['titulo'] ?>
            </h1>
            <p class="bajada">
                <?php echo nl2br($nota['bajada']) ?>
            </p>
            <?php if ($nota['imagen'] != ''): ?>
                <img style="width:100%" src="/images/notas/<?php echo $nota['imagen'] ?>"/>
            <?php endif ?>

            <p class="texto">
                <?php echo nl2br($nota['contenido']) ?>
            </p>
        </div>
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo current_url(); ?>" target="_blank">
            Facebook
        </a>
        <a href="https://twitter.com/share" class="twitter-share-button" data-via="Tiempodelacomun" data-lang="es" data-count="none">Twittear</a>
        <script>!function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                if (!d.getElementById(id)) {
                    js = d.createElement(s);
                    js.id = id;
                    js.src = p + '://platform.twitter.com/widgets.js';
                    fjs.parentNode.insertBefore(js, fjs);
                }
            }(document, 'script', 'twitter-wjs');
        </script>
    </div>

    <div class="float30">
        <div class="anexo">
        </div>

        <div class="anexo">
        </div>
    </div>      
</div>