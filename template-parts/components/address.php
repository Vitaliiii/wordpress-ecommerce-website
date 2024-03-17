<?php 
    $address = get_field('address', 'option');
    if($address): 
        $link_url = $address['url'];
        $link_title = $address['title'];
        $link_target = $address['target'] ? $address['target'] : '_self';
?>
    <div class="address">
        <a class="address-link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
    </div>
<?php endif; ?>