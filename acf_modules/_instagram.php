<?php $insta_cache = get_insta_cache();
if ($insta_cache) {
    $json = json_decode(($insta_cache));
    $text = 'Bild bei Instagram ansehen';
?>
    <section class="instagram pv4">
        <div class="wrapper w-90 w-80-xl center">
            <?php if($field_val['headline']) { ?>
            <div class="instagram__header mv5 flex items-center justify-between">
                <h2 class="fsize3 ma0"><?php echo $field_val['headline'];?></h2>
                <div class="instagram__link">
                <a href="https://www.instagram.com/luckypunchmanagement/" class="link" title="Luckypunch bei Instagram" target="_blank">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/insta-icon.svg" alt="" title="Instagram" width="25" height="24" />
                </a>
                </div>
            </div>
            <?php } ?>
            <div class="w-100 flex flex-wrap instagram__feed nt3 nb3">
            <?php
            $limit = 8;
            $counter = 0;
            if ($json->data) {
                foreach ($json->data as $item) {
                    if ($item->media_type) {
                        if ($counter < $limit) {
                            if ($item->media_type == "IMAGE" | $item->media_type == "CAROUSEL_ALBUM" | $item->media_type == "VIDEO") { ?>
                                <div class="insta_img <?php echo $item->media_type; ?>  w-100 w-50-ns w-25-l">
                                    <a class="db aspect-ratio aspect-ratio--1x1" href="<?php echo $item->permalink; ?>" title="<?php echo $text; ?>" target="_blank">
                                        <?php if (isset($item->caption)) { ?>
                                            <span class="caption bg-black absolute flex items-center justify-center">
                                                <span class="caption_text fsize6 white db w-80 center mt-auto mb-auto">
                                                    <?php
                                                    if (strlen($item->caption) > 150) {
                                                        echo substr($item->caption, 0, 150) . '...';
                                                    } else {
                                                        echo $item->caption;
                                                    }
                                                    ?>
                                                </span>
                                            </span>
                                        <?php } ?>
                                        <img 
                                        loading="lazy" 
                                        class="aspect-ratio--object db w-100 h-100 object-fit--cover object-position--center" 
                                        src="<?php echo ($item->media_type == "VIDEO" ? $item->thumbnail_url : $item->media_url);?>" 
                                        alt="Instagram Image ID <?php echo $item->id; ?>" />
                                    </a>
                                </div>

                            <?php
                            $counter++;
                            } 
                        } else {
                            break;
                        }
                    }
                }
            }
            ?>
        </div>
        </div>
    </section>
<?php } else { echo "no cache"; } ?>