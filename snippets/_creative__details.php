<section class="creative__details flex-l">
        <?php
        $creative_fotos = get_field('creative_fotos');
        if ($creative_fotos) { ?>
            <div class="creative__details__slideshow w-100 w-50-l h-100-l <?php echo ( is_singular(array('dop_editor','director_writer')) ? 'bg-white' : 'bg-black');?>">
                <div class="swiper" id="creative__details__slideshow_1">
                    <div class="swiper-wrapper">
                        <?php foreach ($creative_fotos as $cf_key => $cf_value) { ?>
                            <?php
                                $image_object = wp_get_attachment_metadata($cf_value);
                                $ratio = "portrait";
                                if ($image_object['width'] > $image_object['height']) {
                                    $ratio = "landscape";
                                }
                            ?>
                            <div class="swiper-slide swiper-slide--<?php echo $ratio;?> flex items-center justify-center">
                                <figure class="w-100 w-60-l w-50-xl h-70-l h-60-xl ma0 pa0 flex items-center justify-center">
                                    <?php echo wp_get_attachment_image($cf_value, 'large', false, array('loading' => 'lazy', 'class' => 'db creative__details__slideshow__image center', 'title' => get_the_title($featured_media))); ?>
                                </figure>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="swiper-button--prev swiper-button dn db-l" id="creative__details__slideshow_1_prev"><img src="<?php echo get_template_directory_uri(); ?>/assets/arrow-left<?php echo ( is_singular(array('dop_editor','director_writer')) ? '' : '-white');?>.svg" alt="" title="Vorheriger Slide" width="47" height="30" /></div>
                    <div class="swiper-button--next swiper-button dn db-l" id="creative__details__slideshow_1_next"><img src="<?php echo get_template_directory_uri(); ?>/assets/arrow-right<?php echo ( is_singular(array('dop_editor','director_writer')) ? '' : '-white');?>.svg" alt="" title="Nächster Slide" width="47" height="30" /></div>
                </div>
            </div>
        <?php } ?>
        <?php $creative_vita = get_field('creative_vita'); ?>
        <?php if ($creative_vita) { ?>
            <div class="creative__details__cv w-90 center w-50-l mv5">
                <!-- <h2 class="fsize2 w-75-l w-60-xl center mv5">Vita</h2> -->
                <?php foreach ($creative_vita as $cv_key => $cv_item) { ?>
                    <details class="content w-75-l w-60-xl center mv5" <?php echo ($cv_key == 0 ? 'open' : 'open'); ?>>
                        <summary>
                            <h2 class="fsize4"><?php echo $cv_item['headline']; ?></h2>
                        </summary>
                        <?php echo $cv_item['inhalt']; ?>
                    </details>
                <?php } ?>
            </div>
        <?php } ?>

    </section>