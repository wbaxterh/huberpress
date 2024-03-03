<?php
class WP_Bootstrap_Navwalker extends Walker_Nav_Menu {
    // Start Level
    function start_lvl( &$output, $depth = 0, $args = null ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = str_repeat( $t, $depth );
        $classes = array( 'dropdown-menu' );
        $class_names = join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
        $output .= "{$n}{$indent}<ul class=\"$class_names\">{$n}";
    }

    // Start Element
    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = ( $depth ) ? str_repeat( $t, $depth ) : '';
    
        $li_attributes = '';
        $li_attributes .= ( $args->walker->has_children ) ? 'data-bs-toggle="dropdown" aria-expanded="false"' : '';
        $class_names = $value = '';
    
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'nav-item';
        $classes[] = ( $args->walker->has_children ) ? 'dropdown dropdown-toggle px-1 mx-3' : 'px-3';
        $classes[] = ( $item->current || $item->current_item_ancestor ) ? 'active' : '';
        $classes[] = 'menu-item-' . $item->ID;
        if ($depth && $args->walker->has_children){
            $classes[] = 'dropdown-menu';
        }
    
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
    
        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
    
        $output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';
    
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) . '"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) . '"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) . '"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) . '"' : '';
        $attributes .= ( $args->walker->has_children ) ? ' class="nav-link"' : ' class="nav-link"';
        // Note: The 'aria-expanded' attribute can be dynamically changed via JavaScript to reflect the dropdown's state.
    
        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        // Include the caret within the anchor tag for dropdown items
        if ($depth == 0 && $args->walker->has_children) {
            $item_output .= ' <b class="caret"></b>';
        }
        $item_output .= '</a>';
        $item_output .= $args->after;

    
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }    
}
?>