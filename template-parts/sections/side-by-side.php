<?php 
    $image = get_sub_field('image');
    $imageText = get_sub_field('text_image');
    $button = get_sub_field('button');
    if($button):
        $side_btn_url = $button['url'];
        $side_btn_title = $button['title'];
        $side_btn_target = $button['target'] ? $button['target'] : '_self';
    endif;
?>
<section class="side-by-side --<?php the_sub_field('type');?>">
    <div class="container">
        <div class="side-by-side__content">
            <div class="side-by-side__image">
                <?php if( $image):?>
                    <img src="<?php echo  $image['url']; ?>" alt="<?php echo  $image['alt']; ?>" title="<?php echo  $image['title']; ?>">
                <?php endif;?>
            </div>
            <div class="side-by-side__text">
                <h2><?php the_sub_field('title'); ?></h2>
                <p><?php the_sub_field('description') ?></p>
                <?php if($button):?>
                    <a class="primary-btn" href="<?php echo esc_url( $side_btn_url ); ?>" target="<?php echo esc_attr( $side_btn_target ); ?>"><?php echo esc_html( $side_btn_title ); ?></a>
                <?php endif;?>
                <?php if($imageText):?>
                    <img src="<?php echo $imageText['url']; ?>" alt="<?php echo $imageText['alt']; ?>" title="<?php echo $imageText['title']; ?>">
                <?php endif;?>
            </div>
        </div>
    </div>
</section><!--End call-us-->