# WordPress Secure Email Links
Simple shortcode wrapper for generating obfuscated email links in meta fields.

```php
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
```
Use the shortcode following this format

`[mailto email="test@gmail.com" target="_self"]`

... to output an obfuscated email link such as this:

```html
<a href="mailto:&#116;&#101;s&#116;&#64;&#103;m&#97;il.c&#111;&#109;" target="_self">&#116;&#101;&#115;t&#64;&#103;&#109;&#97;&#105;l&#46;&#99;om</a>
```
