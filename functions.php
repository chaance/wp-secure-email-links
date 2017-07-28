<?php
function xx_mailto_shortcode( $atts, $content = null ) {

  $a = shortcode_atts( array(
    'email'     => 'info@xx.com',
    'target'    => '_blank',
  ), $atts );

  $email = $a['email'];
  $target = $a['target'];

  if ( is_email( $email ) === false ) return;

  if ( is_email($content) ) {
    $content = antispambot( sanitize_email( $content ) );
  } else {
    $content = esc_html( $content );
  }
  return '<a href="mailto:' . antispambot( sanitize_email($email) ) . '" target="' . esc_attr($target) . '">' . $content . '</a>';
}
add_shortcode( 'mailto', 'xx_mailto_shortcode' );
