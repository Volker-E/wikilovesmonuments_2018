<?php
/**
 * Default searchform
 *
 * @package Wiki_Loves_Monuments_2018
 * @since 0.7.0
 * @link https://www.wikilovesmonuments.org/
 * @version 0.7.0
 */
?>
<form method="get" id="searchbar" action="<?php echo home_url( '/' ); ?>">
	<input type="search" name="s" value="<?php _e( 'Type and hit enter to search', 'wikilovesmonuments' ); ?>" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;">
</form>
