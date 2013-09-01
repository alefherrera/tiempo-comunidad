

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
        <div id="compartir">
            <div class="floatleft">
                <h1>Compartir</h1>
            </div>
            <div id="compartirsociales" class="floatleft">
                <div class="paddingsociales">
                    <div id="fb-root">
                        <div class="fb-like" data-href="<?php echo current_url(); ?>" data-layout="button_count"  data-width="100" data-show-faces="false" data-send="false"></div>
                    </div>
                </div>
                <div class="paddingsociales">
                    <a href="https://twitter.com/share" class="twitter-share-button" data-via="Tiempodelacomun" data-lang="es" data-count="none">Twittear</a>
                </div>
            </div>
            <div class="clearboth"></div>

        </div>
    </div>

    <div class="float30">
        <div class="anexo">
        </div>

        <div class="anexo">
        </div>
    </div>      
</div>
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/es_ES/all.js#xfbml=1";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    !function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
        if (!d.getElementById(id)) {
            js = d.createElement(s);
            js.id = id;
            js.src = p + '://platform.twitter.com/widgets.js';
            fjs.parentNode.insertBefore(js, fjs);
        }
    }(document, 'script', 'twitter-wjs');
</script>