<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Crensoft
 */
global $meta;
?>
<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
    <?php
      echo '<style type="text/css" id="server-side-styles">' . current($meta['styles']) . '</style>';
    ?>
  </head>
  <body <?php body_class(); ?>>
    <div id="page" class="site">
      <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'crensoft' ); ?></a>
      <div id="root-<?php the_ID(); ?>" <?php post_class(); ?>>
          <?php
          the_content();
          ?>
      </div><!-- #post-<?php the_ID(); ?> -->
    </div>
    <?php wp_footer(); ?>
  </body>
</html>