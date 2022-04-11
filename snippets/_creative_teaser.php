<li 
class="board__list-item w-100 w-50-ns w-third-l w-20-xl ma0"

<?php 
foreach ($filter_taxonomies as $filter_key => $filter_val) {
    $term_list = get_the_terms($post,$filter_val['slug']);
    if($term_list) {
        $term_list_array = array();
        foreach($term_list as $term_list_key => $term_list_value) {
            $term_list_array[] = $term_list_value->slug;
        }
?>
data-<?php echo $filter_val['slug'];?>="<?php echo implode(' ',$term_list_array);?>" 
<?php } } ?>
>
    <a href="<?php the_permalink();?>" title="<?php the_title();?>" class="db w-100 link">
        <figure class="db ma0 w-100 relative aspect-ratio aspect-ratio--3x4">
            <?php $thumbnail_id = get_post_thumbnail_id();?>
            <?php echo wp_get_attachment_image($thumbnail_id, 'large', false, array('title' => get_the_title($thumbnail_id), 'loading' => 'lazy', 'class' => 'aspect-ratio--object db object-fit--cover object-position--center'));?>
        </figure>
        <h2 class="lh-solid mb0 mt3 fsize5 black"><?php the_title();?></h2>
    </a>

</li>