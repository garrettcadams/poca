<?php 
global $product;

wp_enqueue_script( 'flexslider', WC_VERSION , true ); 

?>
   <div class="product-block grid style-vertical clearfix" data-product-id="<?php echo esc_attr($product->get_id()); ?>">

        <div class="row">
            <div class="block-inner">
                <figure class="image">
                    <a title="<?php the_title(); ?>" href="<?php echo the_permalink(); ?>" class="product-image">
                        <?php
                            /**
                            * woocommerce_before_shop_loop_item_title hook
                            *
                            * @hooked woocommerce_show_product_loop_sale_flash - 10
                            * @hooked woocommerce_template_loop_product_thumbnail - 10
                            */
                            do_action( 'woocommerce_before_shop_loop_item_title' );
                        ?>
                    </a>

                    <?php 
                        do_action( 'woocommerce_before_shop_loop_item_title_2' );
                    ?>
                    
                </figure>
                <?php if (class_exists('YITH_WCQV_Frontend')) { ?>
                    <div class="group-image">
                        <div>
                            <a href="#" class="button yith-wcqv-button" title="<?php echo esc_html__('Quick view', 'puca'); ?>"  data-product_id="<?php echo esc_attr($product->get_id()); ?>">
                                <i class="icon-eye icons"></i>
                                <span><?php echo esc_html__('Quick view', 'puca'); ?></span>
                            </a>
                        </div>    
                    </div>  
                <?php } ?>
            </div>
            <div class="caption">
                <h3 class="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <?php
                    /**
                    * woocommerce_after_shop_loop_item_title hook
                    *
                    * @hooked woocommerce_template_loop_rating - 5
                    * @hooked woocommerce_template_loop_price - 10
                    */
                    remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
                    add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 15);
                    do_action( 'woocommerce_after_shop_loop_item_title');
                    remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 15);
                    add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
                ?> 
                <?php 
                    /**
                    * puca_woocommerce_time_countdown hook
                    *
                    * @hooked puca_woo_product_time_countdown - 10
                    */
                    do_action('puca_woocommerce_time_countdown');
                ?>
                <div class="woocommerce-product-details__short-description">
                    <?php echo puca_tbay_substring(get_the_content(), 20, '...' ); ?>
                </div> 
                <div class="group-buttons clearfix">    
                        <?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
                        
                        <?php if( class_exists( 'YITH_Woocompare' ) ) { ?>
                            <?php
                                $action_add = 'yith-woocompare-add-product';
                                $url_args = array(
                                    'action' => $action_add,
                                    'id' => $product->get_id()
                                );
                            ?>
                            <div class="yith-compare">
                                <a href="<?php echo wp_nonce_url( add_query_arg( $url_args ), $action_add ); ?>" title="<?php echo esc_html__('Compare', 'puca'); ?>" class="compare" data-product_id="<?php echo esc_attr($product->get_id()); ?>">
                                    <span><?php echo esc_html__('Compare', 'puca'); ?></span>
                                </a>
                            </div>
                        <?php } ?>
                        <div class="button-wishlist">
                            <?php
                                if( class_exists( 'YITH_WCWL' ) ) {
                                    echo do_shortcode( '[yith_wcwl_add_to_wishlist]' );
                                }
                            ?>  
                        </div>
                        
                    </div>                   
            </div>   
        </div>
    </div> 
