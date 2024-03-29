<?php

wp_enqueue_script( 'slick' );

$columns = isset($columns) ? $columns : 4;
$rows_count = isset($rows) ? $rows : 1;


$screen_desktop          =      isset($screen_desktop) ? $screen_desktop : 4;
$screen_desktopsmall     =      isset($screen_desktopsmall) ? $screen_desktopsmall : 3;
$screen_tablet           =      isset($screen_tablet) ? $screen_tablet : 3;
$screen_mobile           =      isset($screen_mobile) ? $screen_mobile : 1;

$disable_mobile          =      isset($disable_mobile) ? $disable_mobile : '';

$countall = count($categoriestabs);

$pagi_type 		 = ($pagi_type == 'yes') ? 'true' : 'false';
$nav_type  		 = ($nav_type == 'yes') ? 'true' : 'false';
$data_loop  	 = ($data_loop == 'yes') ? 'true' : 'false';
$data_auto  	 = ($data_auto == 'yes') ? 'true' : 'false';
$disable_mobile  = ($disable_mobile == 'yes') ? 'true' : 'false';
?>
<div class="owl-carousel categories v3" data-items="<?php echo esc_attr($columns); ?>" data-large="<?php echo esc_attr($screen_desktop);?>" data-medium="<?php echo esc_attr($screen_desktopsmall); ?>" data-smallmedium="<?php echo esc_attr($screen_tablet); ?>" data-verysmall="<?php echo esc_attr($screen_mobile); ?>" data-carousel="owl" data-pagination="<?php echo esc_attr( $pagi_type ); ?>" data-nav="<?php echo esc_attr( $nav_type ); ?>" data-loop="<?php echo esc_attr( $data_loop ); ?>" data-auto="<?php echo esc_attr( $data_auto ); ?>" data-autospeed="<?php echo esc_attr( $data_autospeed )?>" data-unslick="<?php echo esc_attr( $disable_mobile ); ?>">
    <?php 
     $count = 0; 
     foreach ($categoriestabs as $tab) {
     	$cat 		= 	get_term_by( 'id', $tab['category'], 'product_cat' );

     	if( isset($tab['images']) && $tab['images'] ) {

	        $cat_id 		= 	$tab['images'];    

	        if( isset($cat) && $cat ) {
				$cat_name 		= 	$cat->name;    
				$cat_slug 		= 	$cat->slug;   
				$cat_link 		= 	get_term_link($cat->slug, 'product_cat'); 	
	        } else {
	        	$cat_name = esc_html__('Shop', 'puca');
	        	$cat_link 		= 	get_permalink( wc_get_page_id( 'shop' ) );	
	        }

	        if( isset($tab['check_custom_link']) &&  $tab['check_custom_link'] == 'yes' && isset($tab['custom_link']) && !empty($tab['custom_link']) ) {
	        	$cat_link = $tab['custom_link'];
	        } 


			$image 		   = wp_get_attachment_url( $cat_id );
	        ?> 

			<?php if($count%$rows_count == 0){ ?> 
				<div class="item">
			<?php } ?>

					<div class="item-cat">
						<?php if ( !empty($image) ) { ?>
							<a class="cat-img tbay-image-loaded" href="<?php echo esc_url($cat_link); ?>">
                    			<?php puca_tbay_src_image_loaded($image, array('alt'=> $cat_name )); ?>
							</a>
						<?php } ?>

						<a class="cat-name" href="<?php echo esc_url($cat_link); ?>">
							<?php echo esc_html($cat_name); ?>
						</a>

						<div class="tab-menu-wrapper">
                            <?php 
                                $menu_id = $tab['nav_menu'];
                                puca_get_custom_menu($menu_id);
                            ?>
                        </div>

						<?php 
		                    if( $shop_now === 'yes' ) { ?>
		                    	<div class="button-shop">
			                        <a href="<?php echo esc_url($cat_link); ?>" class="readmore">
										<?php echo esc_html('shop now', 'puca'); ?>
									</a>
								</div>
		                <?php } ?>

					</div>

			<?php if($count%$rows_count == $rows_count-1 || $count==$countall -1){ ?>
				</div>
			<?php }
			$count++;
			?>
	        <?php 
	    
		}
	}

    ?>
</div> 
<?php wp_reset_postdata(); ?>