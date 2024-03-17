<?php 
    $subtitle = get_sub_field('subtitle');
    $title = get_sub_field('title');
    $description = get_sub_field('description');
    $button = get_sub_field('button');
    if($button):
        $hero_btn_url = $button['url'];
        $hero_btn_title = $button['title'];
        $hero_btn_target = $button['target'] ? $button['target'] : '_self';
    endif;
    $background_images = get_sub_field('background_images');

    $imageUrl = $background_images ? array_map(function($url) {
        return "url('$url')";
    }, $background_images) : '';
    $imagesList = $background_images ? implode(', ', $imageUrl) : '';
    $background = $background_images ? 'style="--bg-images: '.$imagesList.'";' : '';


?>
<section class="hero" <?php echo $background;?> >
    <div class="container">
        <div class="hero__content">
            <h3 class="subtitle"><?php echo add_accent_tag($subtitle); ?></h3>
            <h1 class="title"><?php echo add_accent_tag($title); ?></h1>
            <p class="txt"><?php echo add_accent_tag($description); ?></p>
            <?php if($button):?>
                <a class="primary-btn" href="<?php echo esc_url( $hero_btn_url ); ?>" target="<?php echo esc_attr( $hero_btn_target ); ?>"><?php echo esc_html( $hero_btn_title ); ?></a>
            <?php endif;?>
        </div>
    </div>
</section>