
<section class="contact mv5 pv4">
    <div class="wrapper w-90 w-80-xl center">
        <div class="w-100 flex items-center justify-center">
            <div class="w-50 w-100-l bw2 bl">
                <div class="content w-90 w-60-l center nb3">
                <h2 class="fsize2 nt1"><?php echo $field_val['headline']; ?></h2>
                <?php echo $field_val['wyswg']; ?>
                </div>
            </div>
            <div class="w-50 w-100-l">
                <?php if($field_val['image']) { ?>
                <figure class="w-100 h-100 ma0 pa0">
                    <?php echo wp_get_attachment_image($field_val['image'], 'large', false, array('loading' => 'lazy', 'class' => 'db w-100 h-100 object-fit--cover object-position--top-center', 'title' => get_the_title($field_val['image']))); ?>
                </figure>
                <?php } ?>
            </div>
        </div>
    </div>
</section>