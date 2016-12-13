<?php if (is_home()): ?>
  <style>
    <?php echo file_get_contents(get_template_directory_uri() . '/dist/css/criticals/home.css'); ?>
  </style>
<?php elseif (is_archive()): ?>
  <style>
    <?php echo file_get_contents(get_template_directory_uri() . '/dist/css/criticals/index.css'); ?>
  </style>
<?php endif; ?>

<?php if (is_single()): ?>
  <style>
    <?php echo file_get_contents(get_template_directory_uri() . '/dist/css/criticals/single.css'); ?>
  </style>
<?php endif; ?>

<?php if (is_page_template('template-pages/hello.php')): ?>
  <style>
    <?php echo file_get_contents(get_template_directory_uri() . '/dist/css/criticals/hello.css'); ?>
  </style>
<?php elseif (is_page()): ?>
  <style>
    <?php echo file_get_contents(get_template_directory_uri() . '/dist/css/criticals/page.css'); ?>
  </style>
<?php endif; ?>

<?php if (is_404()): ?>
  <style>
    <?php echo file_get_contents(get_template_directory_uri() . '/dist/css/criticals/error.css'); ?>
  </style>
<?php endif; ?>

<?php if (is_preview()): ?>
  <style>
    <?php echo file_get_contents(get_template_directory_uri() . '/dist/css/criticals/preview.css'); ?>
  </style>
<?php endif; ?>
