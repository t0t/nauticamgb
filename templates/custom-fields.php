

<!-- Bloques -->
<?php if( have_rows('layout_content') ): ?>
<?php while ( have_rows('layout_content') ) : the_row();?>

    <!-- Contenido principal -->
    <?php if( get_row_layout() == '1_block' ):?>

        <!-- repeater -->
        <?php if( have_rows('block')): ?>

            <?php while (have_rows('block')) : the_row(); ?>

                <hgroup class="main-post__header">

                <?php if ( !is_page('catalogo')): ?>

                    <!-- Page Header -->
                    <?php get_template_part('templates/page', 'header'); ?>

                <?php endif ?>

                <?php if (get_sub_field("header")): ?>

                    <h3 class="main-post__subheader"><?php the_sub_field("header"); ?></h3>

                <?php endif ?>

                </hgroup>

                <!-- main post content -->
                <div class="main-post__content">

                <?php if (get_sub_field("content")): ?>

                    <article class="main-post__content__entry" role="article">

                    <!-- Header image -->
                    <?php if (get_sub_field("header_image")) { ?>

                        <figure><img src="<?php the_sub_field("header_image"); ?>" alt=""></figure>

                            <?php } else { ?>
                            
                            <!-- thumb -->
                            <?php //the_post_thumbnail('thumbnail'); ?>

                            <?php } ?>

                            <?php if ( get_post_type() == 'post'): ?>
                                <small><?php echo get_the_time('j F Y'); ?></small>
                            <?php endif ?>

                            <!-- the post content -->
                            <?php the_sub_field("content"); ?>

                            <!-- Lista -->
                            <?php if( have_rows('lista_simple')): ?>

                                <?php while( have_rows('lista_simple') ): the_row(); ?>

                                    <ul class="list list--unordered">

                                    <?php if (get_sub_field("title")): ?>

                                        <li><?php the_sub_field('title'); ?></li>

                                    <?php endif ?>

                                    <?php while(has_sub_field('lista_simple_elemento')): ?>

                                        <?php
                                        $txt = get_sub_field('txt');
                                        $link = get_sub_field('link');
                                        ?>

                                        <li class="list__item">

                                        <?php if( $link ): ?>

                                            <a href="<?php the_sub_field('link'); ?>">

                                        <?php endif; ?>

                                        <?php if( $txt ): ?>

                                            <?php the_sub_field('txt'); ?>

                                            <?php if (get_sub_field("external_url")): ?>

                                                <?php the_sub_field('external_url'); ?>

                                            <?php endif ?>

                                        <?php endif; ?>

                                        <?php if( $link ): ?>

                                            </a>

                                        <?php endif; ?>

                                        </li>

                                    <?php endwhile; ?>

                                    </ul>
                                    <!-- /lista -->

                                <?php endwhile; ?>

                            <?php endif; ?>





                            <?php if( have_rows('upload_files')): ?>
                                <!-- Upload files -->

                                <ul>

                                <?php while( have_rows('upload_files') ): the_row(); ?>

                                    <?php
                                    $title = get_sub_field('title');
                                    $file = get_sub_field('file');
                                    ?>

                                    <li>

                                    <?php if( $file ): ?>

                                        <a href="<?php echo $file['url']; ?>" alt="<?php echo $file['url']; ?>" target="_blank">

                                    <?php endif; ?>

                                    <?php if( $title ): ?>

                                        <span class="icon-file-pdf" aria-labelledby="icono"></span> <?php echo $title; ?>

                                    <?php endif; ?>

                                    <?php if( $file ): ?>

                                        </a>

                                    <?php endif; ?>

                                    </li>

                                <?php endwhile; ?>

                                </ul>

                                <!-- /Upload files -->

                            <?php endif; ?>




                            <?php the_tags( '', ' • ', '<br />' ); // muestrame los tags al final del post cuando haya ?>

                            </article>

                        <?php endif ?>







                        <?php if (get_sub_field("gallery")): ?>

                            <!-- galeria -->
                            <div class="galeria">

                            <!-- <h4 class="galeria__title"></h4> -->

                            <?php if (get_sub_field("description")): ?>

                                <h3 class="galeria-fotos__description">
                                <?php the_sub_field("description"); ?>
                                </h3>

                            <?php endif ?>


                            <div class="galeria-fotos">

                            <?php
                            $images = get_sub_field('gallery');

                            if( $images ): ?>

                            <?php foreach( $images as $image ): ?>

                                <figure class="galeria-fotos__figure">

                                <a href="<?php echo $image['url']; ?>" data-lightbox="serie" data-title="<?php echo $image['description']; ?>">

                                <img src="<?php echo $image['sizes']['mini']; ?>" alt="<?php echo $image['alt']; ?>" class="img--circle" />

                                <figcaption class="galeria-fotos__caption">

                                <?php echo $image['caption']; ?></figcaption>

                                </a>

                                </figure>

                            <?php endforeach; ?>

                        <?php endif; ?>

                        </div>

                        <?php if (get_sub_field("enlace_externo")): ?>

                            <small><a href="<?php the_sub_field('enlace_externo'); ?>" target="_blank">Enlace externo</a></small>

                        <?php endif ?>

                        </div>
                        <!-- /galeria -->

                    <?php endif ?>





                    <!-- Lista con emails -->
                    <?php if( have_rows('equipo')): ?>

                        <section class="grid">

                        <?php while( have_rows('equipo') ): the_row(); ?>

                            <?php
                            $nombre = get_sub_field('nombre');
                            $cargo = get_sub_field('cargo');
                            $email = get_sub_field('email');
                            ?>

                            <?php 
                            // $personal = array(
                            //         $nombre,
                            //         $cargo,
                            //         $email
                            //     );

                            // foreach ($personal as $persona) {
                            //     $persona = $nombre." ".$cargo."<br>".'<span class="icon-envelope" aria-labelledby="icono"></span>'.$email;
                            // }
                            // echo $persona;
                            ?>

                            <article role="article">

                            <?php if( $nombre ): ?>

                                <div class="icon-profile-male" aria-labelledby="icono"></div> 

                                <h3><?php echo $nombre; ?></h3>

                                <h4><?php echo $cargo; ?></h4>

                            <?php endif; ?>

                            <?php if( $email ): ?>

                                <span class="icon-envelope" aria-labelledby="icono"></span> <?php echo $email; ?>

                            <?php endif; ?>

                            </article>

                        <?php endwhile; ?>

                        </section>
                        <!-- /equipo -->

                    <?php endif; ?>





                    <?php if (get_sub_field("address")): ?>

                        <!-- mapa/form -->
                        <section class="grid">

                        <?php

                        if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
                            wpcf7_enqueue_scripts();
                        }
        
                        if ( function_exists( 'wpcf7_enqueue_styles' ) ) { 
                            wpcf7_enqueue_styles(); 
                        }

                        ?>

                        <div class="grid-content__item">

                        <?php if (get_sub_field("image")) { ?>

                        <img src="<?php the_sub_field("image"); ?>" alt="">

                        <?php } else { ?>

                        <!-- Mapa -->
                        <?php echo do_shortcode('[mappress mapid="2" width="100%"]'); ?>

                        <?php } ?>

                        <p><?php the_sub_field("address"); ?></p>

                        </div>

                        <div class="grid-content__item">

                        <?php echo do_shortcode('[contact-form-7 id="56" title="Formulario de contacto"]'); ?>

                        </div>

                        </section>
                        <!-- /mapa/form -->

                    <?php endif; ?>





                    <?php if( have_rows('carrusel_links_externos')): ?>

                        <!-- carrusel links externos -->
                        <section class="slider__wrap">

                        <h3 class="slider__title"><span class="icon-attachment" aria-labelledby="icono"></span> Tiendas Virtuales</h3>

                        <div class="slider__slides slider">

                        <?php while( have_rows('carrusel_links_externos') ): the_row(); ?>

                            <?php
                            $titulo = get_sub_field('titulo');
                            $link = get_sub_field('link');
                            ?>

                            <figure>

                            <?php if (get_sub_field("img")): ?>

                                <a class="" href="<?php echo $link; ?>" target="_blank">
                                <?php $image = get_sub_field('img');
                                echo '<img src="'.$image['sizes']['large'].'" />'; ?>
                                </a>

                            <?php endif ?>

                            <figcaption>

                            <?php if( $titulo ): ?>

                                <h3><?php echo $titulo; ?></h3>

                            <?php endif; ?>

                            <?php if( $link ): ?>
                            <?php endif; ?>

                            </figcaption>

                            </figure>

                        <?php endwhile; ?>

                        </div>

                        <button type="button" class="slider__btn-prev"></button>
                        <button type="button" class="slider__btn-next"></button>

                        </section>
                        <!-- /carrusel links externos -->

                    <?php endif; ?>





                    <?php if( have_rows('carrusel_webs_interesantes')): ?>

                        <!-- carrusel webs interesantes -->
                        <section class="slider__wrap">

                        <h3 class="slider__title"><span class="icon-attachment" aria-labelledby="icono"></span> Webs interesantes</h3>

                        <div class="slider__slides slider">

                        <?php while( have_rows('carrusel_webs_interesantes') ): the_row(); ?>
                            
                            <a class="" href="<?php the_sub_field('link') ?>" target="_blank" aria-labelledby="link externo">

                            <figure>

                            <?php if (get_sub_field("img")): ?>

                                <?php $image = get_sub_field('img');
                                echo '<img src="'.$image['sizes']['large'].'" />'; ?>

                            <?php endif ?>

                            <figcaption class="slider__title">

                            <?php the_sub_field('titulo'); ?>

                            </figcaption>

                            </figure>

                            </a>

                        <?php endwhile; ?>

                        </div>

                        <button type="button" class="slider__btn-prev"></button>
                        <button type="button" class="slider__btn-next"></button>

                        </section>
                        <!-- /carrusel webs interesantes -->

                    <?php endif; ?>




                    <?php if( have_rows('grid')): ?>

                        <?php while (have_rows('grid')) : the_row(); ?>

                            <?php while(has_sub_field('grid_element')): ?>

                                <div class="grid__item">

                                <?php if (get_sub_field("title")): ?>
                                    <h3><?php the_sub_field('title'); ?></h3>
                                <?php endif ?>

                                <?php if (get_sub_field("img")): ?>
                                    <?php $image = get_sub_field('img');
                                    echo '<img src="'.$image['sizes']['medium'].'" />'; ?>
                                <?php endif ?>

                                <?php if (get_sub_field("parrafo")): ?>
                                    <p><?php the_sub_field('parrafo'); ?></p>
                                <?php endif ?>

                                <?php if (get_sub_field("content")): ?>
                                    <?php the_sub_field('content'); ?>
                                <?php endif ?>

                                <?php if (get_sub_field("precio")): ?>
                                    <p><?php the_sub_field('precio'); ?>€</p>
                                <?php endif ?>

                                    <?php if (get_sub_field("boto_paypal")): ?>
                                        <?php the_sub_field('boto_paypal'); ?>
                                    <?php endif ?>

                                    <?php if (get_sub_field("external_url")): ?>
                                        <?php the_sub_field('external_url'); ?>
                                    <?php endif ?>

                                    <?php if (get_sub_field("link")): ?>
                                        <?php the_sub_field('link'); ?>
                                    <?php endif ?>

                                </div>
                                <!-- /grid item -->
                                                                
                            <?php endwhile; ?>

                            <!-- /grid -->

                <?php endwhile; ?>
                <?php endif; ?>


                    <?php if (!is_page()): ?>

                    <!-- Sidebars -->
                    <?php get_sidebar(); ?>

                <?php endif ?>

                </div>
                <!-- /main post content -->

            <?php endwhile;?>
            <!-- </div> -->
            <?php endif ?>





        <?php elseif(get_row_layout() == "gallery"): // Layout Gallery ?>

            <!-- galeria de fotos -->
            <div class="galeria-fotos">

            <h2 class="galeria-fotos__title">Galería de fotos</h2>

            <?php if (get_sub_field("description")): ?>

                <h3 class="galeria-fotos__description">
                <?php the_sub_field("description"); ?>
                </h3>

            <?php endif ?>

            <div class="galeria-fotos">

            <?php
            $images = get_sub_field('gallery');

            if( $images ): ?>

            <?php foreach( $images as $image ): ?>

                <figure class="galeria-fotos__figure">

                <a href="<?php echo $image['url']; ?>" data-lightbox="serie" data-title="<?php echo $image['description']; ?>">

                <img src="<?php echo $image['sizes']['mini']; ?>" alt="<?php echo $image['alt']; ?>" class="img--circle" />

                <figcaption class="galeria-fotos__caption">

                <?php echo $image['caption']; ?>

                </figcaption>
                </a>

                </figure>

            <?php endforeach; ?>

        <?php endif; ?>

        </div>

        </div>

    <?php endif;?>

<?php endwhile;?>
<!-- /Contenido principal -->

<?php else :?>
<?php endif;?>
<!-- /bloques -->










<!-- //////////// Componentes ////////////////////////////////-->

<?php if( get_field('flexible_content') ): ?>

    <?php while( has_sub_field("flexible_content") ): ?>

        <?php if(get_row_layout() == "quote"): // Frases ?>

            <blockquote cite="<?php the_sub_field("autor"); ?>">

            <q>"<?php the_sub_field("quote"); ?>" </q><span><?php the_sub_field("autor"); ?></span>

            </blockquote>

        <?php elseif(get_row_layout() == "well-img"): //Wellcome panel ?>

            <div style="background-image: url('<?php the_sub_field("bg_image"); ?>'), radial-gradient(ellipse at center, #23904D 0%, #317549 99%); 
            background-attachment: fixed;
            " class="img--bg-big well well--img">

            <h1 class="efecto--intro"><?php the_sub_field("title"); ?></h1>
            <h3><?php the_sub_field("subtitle"); ?></h3>

            <p><?php the_sub_field("description"); ?></p>

            <button class="btn btn--image"><a href="<?php the_sub_field("call_to_action"); ?>">lo último...</a></button>

            </div>

        <?php elseif(get_row_layout() == "well-anim"): //Wellcome panel ?>

            <div class="well well--anim">

            <svg class="anim-intro" viewBox="0 -14 151 151" preserveAspectRatio="xMidYMid meet">

            <title>Logo t0theme anim</title>
            <desc>Logotipo de tema Wordpress y Styleguide de Sergio Forés</desc>
    
            <path class="efecto--stroke-dashoffset" d="M33.8175546,9.19339982 C33.8175546,9.19339982 46.2905546,0.973399822 69.8175546,2.10739982 C93.3455546,3.24139982 133.880555,7.49339982 144.652555,31.5873998 C155.423555,55.6823998 142.152555,90.3353998 115.738555,107.2724 C89.3255546,124.2104 54.5105546,125.4144 31.2665546,117.4774 C8.02255465,109.5404 -2.46544535,85.8133998 3.77055465,62.1013998 C10.0065546,38.3903998 12.5575546,22.8003998 33.8175546,9.19339982 L33.8175546,9.19339982 Z M91.0105546,55.4653998 L104.750555,55.4653998 L104.750555,39.1743998 L91.0105546,39.1743998 L91.0105546,55.4653998 Z M68.9675546,84.0283998 C68.9675546,84.0283998 69.5345546,89.1313998 73.7865546,92.8163998 C78.0385546,96.5013998 75.3175546,102.7374 71.2915546,101.8864 C67.2665546,101.0364 65.5655546,97.8743998 66.4155546,93.2193998 C67.2665546,88.5643998 68.9675546,84.0283998 68.9675546,84.0283998 L68.9675546,84.0283998 Z M32.9675546,86.5793998 C32.9675546,86.5793998 29.2825546,72.4063998 37.7865546,65.8863998 C46.2905546,59.3673998 55.3605546,60.2173998 60.7465546,54.2643998 C66.1325546,48.3123998 68.6835546,39.5243998 68.6835546,39.5243998 M27.5155546,81.1273998 C27.5155546,81.1273998 23.8305546,66.9543998 32.3345546,60.4343998 C33.9377315,59.2054358 35.561024,58.2383654 37.1759571,57.4382363 C44.1273844,53.9941064 50.9239252,53.6431383 55.2945546,48.8123998 C60.6805546,42.8593998 63.2315546,34.0723998 63.2315546,34.0723998" />

            </svg>

            <h1 class="altheader efecto--intro"><?php the_sub_field("title"); ?></h1>

            <h2><?php the_sub_field("description"); ?></h2>
            <button href="<?php the_sub_field("call_to_action"); ?>" class="btn btn--well">Work in progress</button>

            </div> 




        <?php elseif(get_row_layout() == "gallery"): // Layout Gallery ?>

            <h2 class="galeria-fotos__title">Galeria de fotos</h2>

            <?php if (get_sub_field("description")): ?>

                <h3 class="galeria-fotos__description">
                    <?php the_sub_field("description"); ?>
                </h3>

            <?php endif ?>

        <div class="galeria-fotos">
            
            <?php
            $images = get_sub_field('gallery');
                 
            if( $images ): ?>
                
                <?php foreach( $images as $image ): ?>

                    <figure class="galeria-fotos__figure">

                        <a href="<?php echo $image['url']; ?>" data-lightbox="serie" data-title="<?php echo $image['description']; ?>">

                        <img src="<?php echo $image['sizes']['mini']; ?>" alt="<?php echo $image['alt']; ?>" class="img--circle" />

                        <figcaption class="galeria-fotos__caption">
                        <?php echo $image['caption']; ?></figcaption>

                        </a>
                    
                    </figure>
                
                <?php endforeach; ?>
                
            <?php endif; ?>

        </div>
        


    <?php elseif(get_row_layout() == "video"): // Layout Videos ?>

    <section class="video-main">
        
        <h2 class="video-main__header"></h2>
        
    <?php if(get_sub_field('video_repeater')): ?>

    <?php while(has_sub_field('video_repeater')): ?>  

        <?php if (get_sub_field("video")): ?>
            <div class="video-main__iframe"><?php the_sub_field("video"); ?></div>
        <?php endif ?>

        <?php if (get_sub_field("descripcion")): ?>
            <p class="video-main__description"><?php the_sub_field("descripcion"); ?></p>
        <?php endif ?>

        <?php if (get_sub_field("btn")): ?>
            <a class="btn btn--invert" href="<?php the_sub_field('btn'); ?>"><?php the_sub_field('btn-title'); ?> &rarr;</a>
        <?php endif ?>
    
    <?php endwhile; ?>
    <?php endif; ?> 
    
    </section>



    <?php elseif(get_row_layout() == "carusel1"): // Carusel Superfoods ?>
    
    <?php

        $loop = new WP_Query( array( 
            'post_type' => 'cpt',
            'category_name' => 'energyfruits',
            // 'posts_per_page' => '',
            'orderby' => 'title',
            'order'   => 'ASC'
            ));
        
    ?>

    <section class="slider__wrap">

        <h3 class="slider__title"><?php the_sub_field("title"); ?></h3>
        <?php the_sub_field("description"); ?>

            <div class="slider__slides slider">

            <?php while ($loop->have_posts()) : $loop->the_post(); ?>

                <a href="<?php the_permalink(); ?>">

                    <figure>

                        <figcaption class="slider__caption"><?php the_title(); ?></figcaption>

                    </figure>

                </a>
              
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
                
            </div>

        <button type="button" class="slider__btn-prev"></button>
        <button type="button" class="slider__btn-next"></button>
  
    </section>


<?php elseif(get_row_layout() == "carusel2"): // Carusel Supershakes ?>

    <?php
        $loop = new WP_Query( array( 
            'post_type' => 'cpt',
            'category_name' => 'supershakes',
            // 'posts_per_page' => '',
            'orderby' => 'title',
            'order'   => 'ASC'
            ));
    ?>

    <section class="slider__wrap">

        <h3 class="slider__title"><?php the_sub_field("title"); ?></h3>

        <?php the_sub_field("description"); ?>

        <div class="slider__slides slider">

        <?php while ($loop->have_posts()) : $loop->the_post(); ?>

            <a href="<?php the_permalink(); ?>">

                <figure>

                    <figcaption class="slider__caption"><?php the_title(); ?></figcaption>

                </figure>

            </a>

        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>

        </div>

        <button type="button" class="slider__btn-prev"></button>
        <button type="button" class="slider__btn-next"></button>

    </section>


<?php elseif(get_row_layout() == "carusel3"): // Carusel enlaces externos ?>

    <?php 
        $loop = new WP_Query( array( 
            'post_type' => 'post',
            'category_name' => '',
            'posts_per_page' => '',
            'orderby' => 'date',
            'order'   => 'DESC'
            )); 
    ?>

    <section>
    
    <?php the_sub_field("title"); ?>
    <?php the_sub_field("description"); ?>

    <div class="slider__slides slider">

    <?php while ($loop->have_posts()) : $loop->the_post(); ?>
      
        <article role="article">

        <? if ( has_post_thumbnail() ) { ?>

            <a href="<?php the_permalink(); ?>">
                
                <figure>

                    <?php the_post_thumbnail('thumbnail'); ?>
                    <figcaption class="slider__caption">

                        <span class="slider__title"><?php the_title(); ?></span>

                    </figcaption>

                </figure>

            </a>

        <?}else {?>

            <a href="<?php the_permalink(); ?>">

                <figure class="slider__figure">

                    <img src="<?php echo get_bloginfo('template_directory');?>/assets/img/logo.svg" alt="logo">

                    <figcaption class="slider__caption"><?php the_title(); ?></figcaption>

                </figure>

            </a>
        
        <?}?>

        </article>
      
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
        
    </div>
  
    </section>



    <?php elseif(get_row_layout() == "list-group-ul"): // Grupo Listas Desordenadas ?>
                
    <h2>Best Tools + Metodologies</h2>

    <section class="list-group">

    <?php
    // check if the repeater field has rows of data
    if( have_rows('lista') ):

        // loop through the rows of data
        while ( have_rows('lista') ) : the_row();
            ?>
            
                
            <ul class="list list--unordered">

            <li><?php the_sub_field('titulo'); ?></li>
            
            <?php while(has_sub_field('item_repeater')): ?>  
            <li class="list__item">
            <?php the_sub_field('item'); ?>
            </li>
                                        
            <?php endwhile; ?>
            </ul>

            <?
        endwhile;

    else :
    // no rows found
    endif;

    ?>
    </section>



    <?php elseif(get_row_layout() == "tienda"): // tienda ?>
    
    <section class="tienda">

    <?php
    // check if the repeater field has rows of data
    if( have_rows('lista') ):

        // loop through the rows of data
        while ( have_rows('lista') ) : the_row();
            ?>
            
                
            <div class="grid">
            
            <?php while(has_sub_field('productos')): ?>  
            

                <div class="tienda__item">

                    <?php if (get_sub_field("nom")): ?>
                        <h3><?php the_sub_field('nom'); ?></h3>
                    <?php endif ?>

                    <?php if (get_sub_field("descripcio")): ?>
                        <?php $image = get_sub_field('imatge');
                    echo '<img src="'.$image['sizes']['medium'].'" />'; ?>
                    <?php endif ?>
                    
                    <?php if (get_sub_field("descripcio")): ?>
                        <p><?php the_sub_field('descripcio'); ?>€</p>
                    <?php endif ?>

                    <?php if (get_sub_field("preu")): ?>
                        <p><?php the_sub_field('preu'); ?>€</p>
                        <small>+ 1&#8364; de gastos d&#8217;enviament</small>
                    <?php endif ?>

                    <?php if (get_sub_field("boto_paypal")): ?>
                        <?php the_sub_field('boto_paypal'); ?>
                    <?php endif ?>

                </div>

                                        
            <?php endwhile; ?>

            </div>

            <?
        endwhile;

    else :
    // no rows found
    endif;

    ?>
    </section>


    <?php elseif(get_row_layout() == "links_gallery"): // Galeria de enlaces ?>

    <section class="galeria-links">

        <div class="grid">

        <?php
        // check if the repeater field has rows of data
        if( have_rows('lista') ):

            // loop through the rows of data
            while ( have_rows('lista') ) : the_row();
                ?>
                
                <div class="galeria-links__item">

                    <?php the_sub_field('title'); ?>

                    <?php 
                    $image = get_sub_field('img');
                    $url = get_sub_field('url');
                    echo '<a href="'.$url.'" target="_new"><img src="'.$image['sizes']['thumbnail'].'" /></a>';
                    ?>

                    <p><?php the_sub_field('description'); ?></p>
              
                </div>

                <?
            endwhile;
            else :
            // no rows found
            endif;
            ?>
        </div>

    </section>



    <?php elseif(get_row_layout() == "content_summary"): // Sumario de contenido ?>
                
    <section class="content-summary">
    
        <div class="grid">

        <?php
        // check if the repeater field has rows of data
        if( have_rows('lista') ):
        // loop through the rows of data
        while ( have_rows('lista') ) : the_row();
        ?>
                            
            <?php while(has_sub_field('apartado')): ?>  
                
            <div class="content-summary__item">

                <h3><?php the_sub_field('title'); ?></h3>

                <?php if (get_sub_field("asocia_imagen")) { ?>

                <div class="content-summary__img <?php the_sub_field('asocia_imagen'); ?>"></div>

                <?php } else { ?>


                <?php
                //$image = get_sub_field('img');
                //echo '<img src="'.$image['sizes']['medium'].'" />';
                ?>
                <!-- <img src="<?php //echo get_bloginfo('template_directory');?>/assets/img/logo.svg" alt="logo"> -->

     
                <?php } ?>




                <p><?php the_sub_field('text'); ?></p>

                <a class="btn" href="<?php the_sub_field('btn'); ?>"><?php the_sub_field('btn-title'); ?> &rarr;</a>
                
            </div>
                                            
            <?php endwhile; ?>

        <?
        endwhile;
        else :
        // no rows found
        endif;
        ?>

        </div>

    </section>




    <?php elseif(get_row_layout() == "sub_heading"): // Layout lista ?>
    
    <h3><?php the_sub_field('subheading'); ?> </h3>










        <?php endif; ?> 
 
    <?php endwhile; ?>

 <?php endif; ?>
