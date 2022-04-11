<?php
    $creative_iframe = get_field('creative_iframe');
    $creative_reel = get_field('creative_reel');
    if ($creative_iframe | $creative_reel) {
    ?>
        <section class="creative__reel w-100 bg-black pv5">
            <?php if ($creative_iframe) { ?>
                <div class="creative__reel_reel w-90 center">
                    <h2 class="lh-solid white fsize2 tl tc-l pv5 mv0">Showreel</h2>
                    <div class="iframe_parent aspect-ratio aspect-ratio--6x4">
                        <?php echo $creative_iframe; ?>
                    </div>

                <?php } else { ?>
                    <div class="creative__reel_reel w-90 w-70-l w-60-xl center">
                        <h2 class="lh-solid white fsize2 tl tc-l pv5 mv0">Showreel</h2>
                        <div class="swiper-outer-wrapper relative w-100">
                            <div class="swiper-button--prev swiper-button dn db-l" id="creative__reel_reel_1_prev"><img src="<?php echo get_template_directory_uri(); ?>/assets/arrow-left-white.svg" alt="" title="Vorheriger Slide" width="47" height="30" /></div>
                            <div class="swiper-button--next swiper-button dn db-l" id="creative__reel_reel_1_next"><img src="<?php echo get_template_directory_uri(); ?>/assets/arrow-right-white.svg" alt="" title="Nächster Slide" width="47" height="30" /></div>
                            <div class="swiper swiper--reel" id="creative__reel_reel_1">
                                <div class="swiper-wrapper">
                                    <?php foreach ($creative_reel as $cr_key => $cr_value) { ?>
                                        <figure class="w-100 swiper-slide ma0">
                                            <div class="videobox w-100 relative preload">
                                                <?php
                                                $featured_media = get_post_thumbnail_id($cr_value['ID']);
                                                if ($featured_media) {
                                                    echo wp_get_attachment_image($featured_media, 'large', false, array('loading' => 'lazy', 'class' => 'absolute left-0 top-0 db w-100 h-auto h-100-l object-fit--cover object-position--center', 'title' => get_the_title($featured_media)));
                                                }
                                                ?>
                                                <video controls class="db w-100 ma0" src="data:," data-src="<?php echo $cr_value['url']; ?>" playsinline preload="metadata" id="video_reel_<?php echo $cr_key; ?>" type="video/mp4"> </video>
                                            </div>
                                            <figcaption class="white tc mv4 mt4-l mb5-l db w-100"><?php echo $cr_value['title']; ?></figcaption>
                                        </figure>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
        </section>
    <?php } ?>