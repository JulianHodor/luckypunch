<?php

/**
 * Template Name: Creatives
 *
 * @package WordPress
 * @subpackage Luckypunch
 */
include("includes/header.php");
$post_type = get_field('post_type');
?>


<?php if(has_post_thumbnail()) { ?>
<figure class="w-100 ma0 pa0 aspect-ratio aspect-ratio--32x9">
    <?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'large', false, array('loading' => 'lazy', 'class' => 'db aspect-ratio--object object-fit--cover object-position--center', 'title' => get_the_title(get_post_thumbnail_id()))); ?>
</figure>
<?php } ?>

<div class="border__filter--top w-100 bg-black pb4"> </div>

<div class="board__header w-100 bg-black pt3">
    <div class="wrapper w-90 w-80-xl center pv3">
        <h1 class="fsize1 white ttu w-70-l mv0"><?php the_title(); ?></h1>
    </div>
</div>

<div class="board__filter w-100 bg-black pv3">
    <div class="filter w-90 w-80-xl center flex pv2">
        <?php

        $taxonomies = get_object_taxonomies($post_type);
        $filter_taxonomies = array();
        foreach ($taxonomies as $tax_key => $tax_value) {


            $tax_obj = get_taxonomy($tax_value);
            $tax_filter_label = $tax_obj->label;

            if ($tax_value == "gender") {
                $type = "radio";
            } else {
                $type = "checkbox";
            }

            $tax_filter = array(
                'slug' => $tax_value,
                'type' => $type
            );

            $filter_taxonomies[$tax_filter_label] = $tax_filter;
        }

        foreach ($filter_taxonomies as $filter_key => $filter_val) {
            include("snippets/_taxonomy_filter.php");
        }
        ?>
    </div>
</div>

<div class="border__filter--bottom w-100 bg-black pb4"> </div>

<section class="board w-100 bg-white">



    <div class="board__list w-90 w-80-xl center">

        <?php

        if (!empty($post_type)) {

            $creatives_query = new WP_Query(array(
                'post_type' => $post_type,
                'posts_per_page' => -1,
                'order' => 'ASC',
                'orderby' => 'title'
            ));

            if ($creatives_query->have_posts()) { ?>
                <ul class="list flex flex-wrap ma0 ph0 pv3 w-100">
                    <?php
                    while ($creatives_query->have_posts()) {
                        $creatives_query->the_post();
                        include("snippets/_creative_teaser.php");
                    } ?>
                </ul>
        <?php
            }
            wp_reset_postdata();
        } else {
            echo "Bitte Post Type auswählen";
        }

        ?>

    </div>
</section>

<?php $board_seo = get_field('board_seo'); ?>
<?php if ($board_seo) { ?>
    <section>
        <div class="board__header w-100 bg-black pv6">
            <div class="wrapper w-90 w-80-xl center bl b--white bw2">
                <div class="w-90 w-80-xl w-70-l pl5">
                    <?php if ($board_seo['seo_headline']) { ?>
                        <h2 class="fsize3 ttu white lh-solid ma0"><?php echo $board_seo['seo_headline']; ?></h2>
                    <?php } ?>
                    <?php if ($board_seo['seo_content']) { ?>
                        <div class="content mt4 w-100 white nb4">
                            <?php echo $board_seo['seo_content']; ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<?php include("includes/footer.php"); ?>