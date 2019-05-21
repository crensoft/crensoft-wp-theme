<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Crensoft
 */
global $meta;
$postContent = get_the_content();

// todo: optimize two domdocument calls
function cssData($htmlString) {
  $doc = new DOMDocument();
  $doc->loadHTML($htmlString);
  return $doc->documentElement->firstChild->firstChild->getAttribute('data-css');
}
function logoUrl() {
  $custom_logo_id = get_theme_mod( 'custom_logo' );
  $custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
  return esc_url( $custom_logo_url );
}
function interpolateData($htmlString) {
  $doc = new DOMDocument();
  $doc->loadHTML($htmlString);
  $rootDiv = $doc->documentElement->firstChild->firstChild;
  $rootDiv->removeAttribute('data-css');
  return str_replace('%wp:logo%', logoUrl(), $doc->saveHTML($rootDiv));
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
    <link href="https://use.fontawesome.com/releases/v5.8.2/css/svg-with-js.css" rel="stylesheet">
    <?php
      echo '<style type="text/css" id="server-side-styles">' . cssData($postContent) . '</style>';
    ?>
  </head>
  <body <?php body_class(); ?>>
    <div id="page" class="site">
      <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'crensoft' ); ?></a>
      <div id="root-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php
          echo interpolateData($postContent)
        ?>
      </div><!-- #post-<?php the_ID(); ?> -->
    </div>
    <?php wp_footer(); ?>
  </body>
</html>