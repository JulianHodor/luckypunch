<section class="creative__intro flex-l flex-wrap <?php echo ( is_singular(array('dop_editor','director_writer')) ? 'bg-black' : 'bg-white');?> ">
    <div class="creative__intro__image w-100 w-50-l h-100-l">
        <figure class="w-100 h-100 db ma0 pa0">
            <?php
            $featured_media = get_post_thumbnail_id($post->ID);
            if ($featured_media) {
                echo wp_get_attachment_image($featured_media, 'large', false, array('loading' => 'lazy', 'class' => 'db w-100 h-auto h-100-l object-fit--cover object-position--top-center', 'title' => get_the_title($featured_media)));
            }
            ?>
        </figure>
    </div>
    <div class="creative__intro__desc flex-l flex-wrap justify-center items-center w-100 w-50-l min-vh-100">
        <?php
        $creative_data = get_field('creative_data');
        if ($creative_data) { ?>
            <div class="content mv5 w-90 w-75-l w-60-xl center <?php echo ( is_singular(array('dop_editor','director_writer')) ? 'white' : 'black');?>">
                <h1 class="mt-auto mt0 mb5 w-100 fsize1"><?php the_title(); ?></h1>
                <ul class="creative__intro__desc__list w-100 list mv5 pa0">
                    <?php foreach ($creative_data as $crdata_key => $crdata) { ?>
                        <li class="flex-l mv3 mv1-l"><dfn class="db ff_black fs-normal w-100"><?php echo $crdata['titel']; ?></dfn> <span class="db w-100"><?php echo $crdata['daten']; ?></span></li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>
    </div>
</section>