<?php if(!is_front_page()) { ?>
<div class="breadcrumbs">
  <div class="wrapper w-90 w-80-xl center pv3 flex justify-between">
    <?php
    if (function_exists('yoast_breadcrumb')) {
      yoast_breadcrumb('<p class="mv0 ff_black fsize6">', '</p>');
    }
    ?>
    <a href="#" class="scrollup link">&#9650;</a>
  </div>
</div>
<?php } ?>
<footer class="bg-black <?php echo (is_front_page() ? 'mt6' : '');?>">
  <div class="w-90 w-80-xl center pv3 flex-l white fsize6">
    
  <div class="footer__copyright"><span class="ff_black"><?php echo date('Y'); ?></span>&nbsp; – &nbsp;<?php echo get_bloginfo('title'); ?></div>

  <div class="footer__nav mr-auto-l">
      <?php
      wp_nav_menu(array(
        'theme_location' => 'legal',
        'container_class' => '',
        'container' => '',
        'menu_class' => ''
      ));
      ?>
  </div>

    <div class="ml-auto-l nr3 footer__nav">
      <?php
      wp_nav_menu(array(
        'theme_location' => 'secondary',
        'container_class' => '',
        'container' => '',
        'menu_class' => ''
      ));
      ?>
    </div>

  </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>