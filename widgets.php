<?php

/**
 * @package Bemyguru WordPress Plugin - Widgets
 * @version 1.0
 */
/*

/*
* GURU BADGE
-------------------------------------------------------------*/

/**
 * Badge Widget
 *
 * @since 1.0
 */

class bemyguru_guru_badge extends WP_Widget {
        // Constructor
        function __construct() {
                parent::__construct(
                        'bemyguru_guru_badge', // Base ID
                        __( 'Guru Badge', 'bemyguru' ), // Name
                        array( 'description' => __( 'Show your bemyguru badge', 'bemyguru' ) ) // Args
                );
        }

        /**
         * Front-end display of widget
         *
         * @see WP_Widget::widget()
         *
         * @param array $args. Widget arguments.
         * @param array $instance. Saved values from database.
         */
        public function widget( $args, $instance ) {
                extract( $args );

                // Widget options
                $title = apply_filters( 'widget_title', $instance['title'] );
                $username = $instance['username'];

                echo $before_widget;
                if ( ! empty( $title ) )
                        echo $before_title . $title . $after_title;

                // Username
                if ( ! empty( $username ) ) {
                    echo '<div id="bemyguru_widget_box"></div><script src="http://www.bemyguru.it/widget/0.9/' . $username . '" type="text/javascript"></script>';
                } 
                else {
                    echo '<span><strong>Insert a valid bemyguru guru username</strong></span>';
                }
                
                echo $after_widget;
        }

        /**
         * Back-end widget form.
         *
         * @see WP_Widget::form()
         *
         * @param array $instance. Previously saved values from database.
         */
        public function form( $instance ) {

                $title = esc_attr($instance['title']);          // Widget Title
                $username = esc_attr($instance['username']);    // Guru username
                ?>

                <p>
                        <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', 'bemyguru' ); ?></label>
                        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>">
                </p>

                <p>
                        <label for="<?php echo $this->get_field_id('username'); ?>"><?php _e( 'Username:', 'bemyguru' ); ?></label>
                        <input class="widefat" id="<?php echo $this->get_field_id('username'); ?>" name="<?php echo $this->get_field_name('username'); ?>" type="text" value="<?php echo $username; ?>">
                        <br>
                        <small><?php _e( 'You can find it under your guru profile page', 'bemyguru' ); ?></small>
                </p>

                <?php
        }

        /**
         * Sanitize widget form values as they are saved.
         *
         * @see WP_Widget::update()
         *
         * @param array $new_instance. Values just sent to be saved.
         * @param array $old_instance. Previously saved values from database.
         */
        public function update( $new_instance, $old_instance ) {
                $instance = $old_instance;
                $instance['title'] = $new_instance['title'];
                $instance['username'] = $new_instance['username'];

                return $instance;
        }
}

/**
 * Register widgets
 */

add_action( 'widgets_init', create_function('', 'return register_widget( "bemyguru_guru_badge" );') );

/*----------------------------------------------------------------------------------------------------*/