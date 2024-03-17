<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Online Market
 */

 $footer_logo = get_field('footer_logo', 'option');
?>

	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="site-footer__content">
				<div class="site-footer__main-box">
					<?php if($footer_logo):?>
						<a href="/" class="custom-logo-link" rel="home" aria-current="page">
							<img class="custom-footer-logo" src="<?php echo $footer_logo['url'];?>" alt="<?php echo $footer_logo['alt'];?>" loading="lazy" decoding="async">
						</a>
					<?php endif;?>
					<?php get_template_part( 'template-parts/components/address' ); ?>
					<?php get_template_part( 'template-parts/components/social-links' ); ?>
				</div>
				<?php
					$theme_location = 'footer-menu';
					if ( has_nav_menu( $theme_location ) ) { 
						wp_nav_menu(
							array(
								'theme_location' => $theme_location,
								'menu_id'        => 'footer-menu',
								'container'        => 'nav',
								'container_class'  => 'menu',
								'menu_class'       => 'menu-list', 
							)
						);
					} 
				?>
			</div>
			<div class="site-footer__copyright">
				<?php if(get_field('copyright', 'option')):?>
					<p><?php the_field('copyright', 'option');?></p>
				<?php endif;?>
			</div>
		</div>
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
