<?php
/**
 * Holder template to define any custom widgets, An example category widget included below
 *
 * @package WP UnFramework
 * @subpackage widgets.php
 */


	class WPU_Category_Widget extends WP_Widget {

		function __construct() {
			$widget_ops = array (
				'classname'   => 'wpu_category_widget',
				'description' => __( 'Better Category Widget', 'wpu' ),
			);
			$control_ops = array ();
			parent::__construct( 'wpu_category_widget', __( 'Better Category Widget', 'wpu' ), $widget_ops, $control_ops );
		}

		/**
		 * Displays the widget
		 *
		 * @param array $args
		 * @param array $instance
		 */
		function widget( $args, $instance ) {
			/**
			 * @var string $before_widget Defined in sidebar setup function
			 * @var string $before_title Defined in sidebar setup function
			 * @var string $after_title Defined in sidebar setup function
			 * @var string $after_widget Defined in sidebar setup function
			 */
			extract( $args );
			$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
			$exclude = apply_filters( 'widget_title', empty( $instance['exclude'] ) ? '' : $instance['exclude'], $instance, $this->id_base );
			echo $before_widget;
			echo $before_title;
			echo $title;
			echo $after_title;
			echo '<ul id="better_categories_widget">';
			$cat_args = array (
				'hide_empty'    => true,
				'title_li'      => '',
				'exclude'       => $exclude,
			);
			wp_list_categories( $cat_args );
			echo '</ul>';
			echo $after_widget;
		}

		/**
		 * Updates the widget options in the db
		 *
		 * @param array $new_instance
		 * @param array $old_instance
		 * @return array
		 */
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = strip_tags( $new_instance['title'] );
			$instance['exclude'] = strip_tags( $new_instance['exclude'] );
			return $instance;
		}

		/**
		 * Displays the widget options
		 *
		 * @param array $instance
		 * @return string|void
		 */
		function form( $instance ) {
			$instance = wp_parse_args( (array)$instance, array (
					'title'    => '',
					'exclude'  => ''
				)
			);
			$title = strip_tags( $instance['title'] );
			$exclude = strip_tags( $instance['exclude'] );
			?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'wpu' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>"/></p>
		<p><label for="<?php echo $this->get_field_id( 'exclude' ); ?>"><?php _e( 'Categories To Exclude', 'wpu' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'exclude' ); ?>" name="<?php echo $this->get_field_name( 'exclude' ); ?>" type="text" value="<?php echo esc_attr( $exclude ); ?>"/></p>
		<?php
		}
	}
	function wpu_register_widgets() {
		register_widget( 'WPU_Category_Widget' );
	}