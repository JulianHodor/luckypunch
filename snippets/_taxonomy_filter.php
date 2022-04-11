<?php if(isset($filter_val)) { 

$terms = get_terms(array(
    'hide_empty' => true,
    'taxonomy' => $filter_val['slug']
));

if($terms) {

?>
<fieldset class="ma0 pa0">
    <legend role="button" aria-pressed="false" aria-controls="filter_<?php echo $filter_val['slug'];?>" class="aria-button toggle" title="<?php echo $filter_key;?> ausklappen"><?php echo $filter_key;?> <span>&#x25BC;</span> </legend>
    <div class="filter__values flex" aria-expanded="false" id="filter_<?php echo $filter_val['slug'];?>">
        <div class="filter__values-wrapper bg-white flex ph4">
    <?php foreach($terms as $term_key => $term) { ?>

        <div class="filter__item">
            <input type="<?php echo $filter_val['type'];?>" id="<?php echo $filter_val['slug'];?>_<?php echo $term->slug;?>" value="<?php echo $term->slug;?>" data-filter="<?php echo $filter_val['slug'];?>" name="<?php echo $filter_val['slug'];?>[]" class="filter_select">
            <label for="<?php echo $filter_val['slug'];?>_<?php echo $term->slug;?>"><?php echo $term->name;?></label>
        </div>

    <?php } ?>
        </div>
    </div>
</fieldset>
<?php } } else {

echo "no filter";

} ?>