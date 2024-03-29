<?php

if ( $max_value && $min_value === $max_value ) {
	?>
	<div class="quantity hidden">
		<input type="hidden" class="qty" name="<?php echo esc_attr( $input_name ); ?>" value="<?php echo esc_attr( $min_value ); ?>" />
	</div>
	<?php
} else {
	?>
	<div class="quantity">
		<button class="minus" type="button" value="&#160;"><span class="icons icon-arrow-left"></span></button>
		<input type="number" class="input-text qty text" data-step="<?php echo esc_attr( $step ); ?>" data-min="<?php echo esc_attr( $min_value ); ?>" data-max="<?php echo esc_attr( 0 < $max_value ? $max_value : '' ); ?>" name="<?php echo esc_attr( $input_name ); ?>" value="<?php echo esc_attr( $input_value ); ?>" title="<?php echo esc_attr_x( 'Qty', 'Product quantity input tooltip', 'puca' ) ?>" size="4" pattern="<?php echo esc_attr( $pattern ); ?>" data-inputmode="<?php echo esc_attr( $inputmode ); ?>" />
		<button class="plus" type="button" value="&#160;"><span class="icons icon-arrow-right"></span></button>
	</div>
	<?php
}
