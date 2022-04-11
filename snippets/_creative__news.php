<?php
    $creative_news = get_posts(
        array(
            'post_type' => 'news',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'news_creative',
                    'value' => $post->ID,
                    'compare' => '=',
                    'type' => 'NUMERIC'
                ),
                array(
                    'key' => 'news_creative',
                    'compare' => 'EXISTS',
                    'type' => 'NUMERIC'
                )                
            ),
            'numberposts' => 6
        )
    );

    if ($creative_news) {
    ?>

        <section class="creative__news mv5">
            <div class="wrapper w-100 w-90-l center pv5-l relative">
                <h2 class="absolute-l fsize2 left-0 top-0 wbreak w-90 center w-25-l mb0-l mv5">Neuigkeiten</h2>
                <div class="swiper w-100 creative__news__swiper relative" id="creative__news__swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($creative_news as $cn_key => $cn_val) { ?>
                            <div class="swiper-slide w-80 w-100-l flex-l items-center justify-center">
                                <div class="creative__news__teaser pa4 bg-black absolute-l center w-100 w-50-l w-40-xl left-0">
                                    <h3 class="mt0"><?php echo $cn_val->post_title; ?></h3>
                                    <div class="post_content">
                                        <?php echo apply_filters('the_content', $cn_val->post_content); ?>
                                    </div>
                                </div>
                                <div class="creative__news__image w-100 w-70-l ml-auto mr0">
                                    <figure class="db w-100 ma0 ph0 pt0 bg-blue aspect-ratio aspect-ratio--6x4">
                                        <?php
                                        if (has_post_thumbnail($cn_val->ID)) {
                                            $post_thumbnail = get_post_thumbnail_id($cn_val->ID);
                                            echo wp_get_attachment_image($post_thumbnail, 'large', false, array('loading' => 'lazy', 'class' => 'db aspect-ratio--object object-fit--cover object-position--center', 'title' => get_the_title($featured_media)));
                                        } else {
                                            if ($featured_media) {
                                                echo wp_get_attachment_image($featured_media, 'large', false, array('loading' => 'lazy', 'class' => 'db aspect-ratio--object object-fit--cover object-position--center', 'title' => get_the_title($featured_media)));
                                            }
                                        }
                                        ?>
                                    </figure>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="swiper-button--prev swiper-button dn db-l" id="creative__news__swiper_prev"><img src="<?php echo get_template_directory_uri(); ?>/assets/arrow-left.svg" alt="" title="Vorheriger Slide" width="47" height="30" /></div>
                    <div class="swiper-button--next swiper-button dn db-l" id="creative__news__swiper_next"><img src="<?php echo get_template_directory_uri(); ?>/assets/arrow-right.svg" alt="" title="Nächster Slide" width="47" height="30" /></div>
                </div>
            </div>
        </section>

    <?php } ?>