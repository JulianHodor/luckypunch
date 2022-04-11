<?php
$textblocks = $field_val['textblocks'];
if($textblocks) { ?>
<section class="xltext mv5 pv2">
    <div class="wrapper w-90 w-80-xl center">
    <?php foreach($textblocks as $textblock) { ?>
        <p class="mv5 ff_black fsize3 fsize3--xl ttu">
            <?php echo $textblock['textblock'];?>
        </p>
    <?php } ?>
    </div>
</section>
<?php } ?>