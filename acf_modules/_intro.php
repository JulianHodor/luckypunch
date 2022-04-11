<?php if ($field_val['image']) { ?>
    <section class="intro w-100 height-100vh relative">
        <?php if ($field_val['headline']) { ?>
            <div class="intro__headline absolute">
                <h1 class="fsize1 intro_h1"><?php echo $field_val['headline']; ?></h1>
                <a href="#" class="intro__button scrolldown absolute right-0 bottom-0">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/arrow-left-white.svg" alt="" title="Scroll Down" width="47" height="30" />
                </a>
            </div>
        <?php } ?>
        <figure class="w-100 h-100 ma0 pa0">
            <?php echo wp_get_attachment_image($field_val['image'], 'large', false, array('loading' => 'lazy', 'class' => 'db w-100 h-100 object-fit--cover object-position--top-center', 'title' => get_the_title($field_val['image']))); ?>
        </figure>

    </section>
<?php } ?>