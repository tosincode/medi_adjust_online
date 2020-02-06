<?php

class medicaldirectory_Categories_one extends WP_Widget {

    function __construct() {
        $widget_ops = array( 'classname' => 'medicaldirectory_widget_categories', 'description' => esc_html__( "Styled list  of categories.",'medical-directory'  ) );
        parent::__construct('medicaldirectory_categories_one', esc_html__('Blog Categories Footer','medical-directory' ), $widget_ops);
    }

    function widget( $args, $instance ) {
        extract( $args );

        $title = apply_filters('widget_title', empty( $instance['title'] ) ? esc_html__( 'SB Categories','medical-directory'  ) : $instance['title'], $instance, $this->id_base);
        $c = ! empty( $instance['count'] ) ? '1' : '0';
        $h = ! empty( $instance['hierarchical'] ) ? '1' : '0';
        $d = ! empty( $instance['dropdown'] ) ? '1' : '0';

        echo apply_filters( 'medicaldirectory_categories_before',  $args['before_widget'] );

        ?>
        
        <?php if ( $title ) 
        
        echo apply_filters('Categories_before_title',$args['before_title']). esc_attr($title) . apply_filters('Categories_after_title',$args['after_title']);  

        ?>
                        
                <?php
                $cat_args = array(
                    'orderby' => 'name',
                    'show_count' => $c,
                    'hierarchical' => $h,
                    'hide_if_empty' => true,


                );

                if ( $d ) {
                    $cat_args['show_option_none'] = esc_html__('Select Category','medical-directory' );
                    wp_dropdown_categories(apply_filters('widget_categories_dropdown_args', $cat_args));
                    ?>

                     <script type='text/javascript'>
                        /* <![CDATA[ */
                        var dropdown = document.getElementById("cat");
                        function onCatChange() {
                            if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
                                location.href = "<?php echo esc_url(home_url('/')); ?>/?cat="+dropdown.options[dropdown.selectedIndex].value;
                            }
                        }
                        dropdown.onchange = onCatChange;
                        /* ]]> */
                    </script>

                 <?php
                } else {
                    ?> 
                    <ul class="tags-list">
                        <?php
                        $cat_args['title_li'] = '';?>
                        <?php wp_list_categories(apply_filters('widget_categories_args', $cat_args));
                        ?>
                    </ul>
                <?php
                }
                ?> 
            <!-- </div>
        </li> -->
        <?php
        echo apply_filters( 'medicaldirectory_categories_after',  $args['after_widget'] );
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['count'] = !empty($new_instance['count']) ? 1 : 0;
        $instance['hierarchical'] = !empty($new_instance['hierarchical']) ? 1 : 0;
        $instance['dropdown'] = !empty($new_instance['dropdown']) ? 1 : 0;

        return $instance;
    }

    function form( $instance ) {
        //Defaults
        $instance = wp_parse_args( (array) $instance, array( 'title' => '') );
        $title = esc_attr( $instance['title'] );
        $count = isset($instance['count']) ? (bool) $instance['count'] :false;
        $hierarchical = isset( $instance['hierarchical'] ) ? (bool) $instance['hierarchical'] : false;
        $dropdown = isset( $instance['dropdown'] ) ? (bool) $instance['dropdown'] : false;
        ?>
        <p><label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e( 'Title:','medical-directory' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

        <p><input type="checkbox" class="checkbox" id="<?php echo esc_attr($this->get_field_id('dropdown')); ?>" name="<?php echo esc_attr($this->get_field_name('dropdown')); ?>"<?php checked( $dropdown ); ?> />
            <label for="<?php echo esc_attr($this->get_field_id('dropdown')); ?>"><?php esc_html_e( 'Display as dropdown','medical-directory'); ?></label><br />

            <input type="checkbox" class="checkbox" id="<?php echo esc_attr($this->get_field_id('count')); ?>" name="<?php echo esc_attr($this->get_field_name('count')); ?>"<?php checked( $count ); ?> />
            <label for="<?php echo esc_attr($this->get_field_id('count')); ?>"><?php esc_html_e( 'Show post counts','medical-directory'  ); ?></label><br />

            <input type="checkbox" class="checkbox" id="<?php echo esc_attr($this->get_field_id('hierarchical','medical-directory' )); ?>" name="<?php echo esc_attr($this->get_field_name('hierarchical')); ?>"<?php checked( $hierarchical ); ?> />
            <label for="<?php echo esc_attr($this->get_field_id('hierarchical')); ?>"><?php esc_html_e( 'Show hierarchy','medical-directory'  ); ?></label></p>
    <?php
    }

}

add_action('widgets_init', 'medicaldirectory_categories_one');

function medicaldirectory_categories_one(){
    register_widget('medicaldirectory_Categories_one');
}
