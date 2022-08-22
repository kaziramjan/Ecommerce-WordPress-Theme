<?php 
// Teachers
add_action('cmb2_admin_init', 'header_option');
function header_option(){
	$metabox = new_cmb2_box( array(
    'id'           => 'header-option',
    'title'        => 'Header Option',
    'object_types' => array( 'page' ), // post type
    'context'      => 'normal', //  'normal', 'advanced', or 'side'
    'priority'     => 'high',  //  'high', 'core', 'default' or 'low'
    'show_names'   => true, // Show field names on the left
) );

		$metabox->add_field(array(
			'name'	=> 'Title',
			'id'	=> 'header-title',
			'type'	=> 'text',
		));
		$metabox->add_field(array(
			'name'	=> 'Description',
			'id'	=> 'header-description',
			'type'	=> 'textarea_small',
		));
}

// Training
add_action('cmb2_admin_init', 'trainer_showing_in_training_page');
function trainer_showing_in_training_page(){
	$metabox = new_cmb2_box( array(
    'id'           => 'trainer-show',
    'title'        => 'Trainer',
    'object_types' => array( 'product' ), // post type
    'context'      => 'normal', //  'normal', 'advanced', or 'side'
    'priority'     => 'high',  //  'high', 'core', 'default' or 'low'
    'show_names'   => true, // Show field names on the left
) );

		$metabox->add_field(array(
		    'name'           => 'Select Trainer',
		    'id'             => 'trainer-select',
		    'object_types' => array( 'teachers' ), // post type
		    'type'           => 'multicheck_posttype',
		    // Optional :
		    'text'           => array(
		        'no_terms_text' => 'Sorry, no terms could be found.' // Change default text. Default: "No terms"
		    ),
		    'remove_default' => 'true', // Removes the default metabox provided by WP core.
		    // Optionally override the args sent to the WordPress get_terms function.
		    'query_args' => array(
		        // 'orderby' => 'slug',
		        // 'hide_empty' => true,
		    ),
		));
}

// Teachers
add_action('cmb2_admin_init', 'departmentinfo');
function departmentinfo(){
	$metabox = new_cmb2_box(array(
		'object_types'	=> array('teachers'),
		'title'			=> 'Department Info',
		'id'			=> 'department',
	));

		$metabox->add_field(array(
			'name'	=> 'Details',
			'id'	=> 'department-details',
			'type'	=> 'textarea_small',
		));
}

add_action('cmb2_admin_init', 'contact_info');
function contact_info(){
	$metabox = new_cmb2_box(array(
		'object_types'	=> array('teachers'),
		'title'			=> 'CONTACT INFO',
		'id'			=> 'contact-info',
	));

		$metabox->add_field(array(
			'name'	=> 'Mail',
			'id'	=> 'mail',
			'type'	=> 'text_email',
		));
		$metabox->add_field(array(
			'name'	=> 'Phone Number',
			'id'	=> 'phone-number',
			'type'	=> 'text_medium',
		));
		$metabox->add_field(array(
			'name' => 'Facebook',
		    'id'   => 'facebookurl',
		    'type' => 'text_url',   
		));
		$metabox->add_field(array(
			'name' => 'Twitter',
		    'id'   => 'twitterurl',
		    'type' => 'text_url',   
		));
		$metabox->add_field(array(
			'name' => 'Skype',
		    'id'   => 'skypeurl',
		    'type' => 'text_medium',   
		));
		$metabox->add_field(array(
			'name' => 'Website',
		    'id'   => 'website',
		    'type' => 'text_url',   
		));
		$metabox->add_field(array(
			'name' => 'Location',
		    'id'   => 'location',
		    'type' => 'text_medium',   
		));
		
}



add_action('cmb2_admin_init', 'activity_interest');
function activity_interest(){
	$metabox = new_cmb2_box(array(
		'object_types'	=> array('teachers'),
		'title'			=> 'ACTIVITIES/INTERESTS',
		'id'			=> 'activity-interest',
	));

		$metabox->add_field(array(
			'name'	=> 'SUMMARY',
			'id'	=> 'sum-activity-interest',
			'type'	=> 'textarea_small',
		));

}

add_action('cmb2_admin_init', 'teacher_bio');
function teacher_bio(){
	$metabox = new_cmb2_box(array(
		'object_types'	=> array('teachers'),
		'title'			=> 'Biography',
		'id'			=> 'biography',
	));

		$metabox->add_field(array(
			'name'	=> 'Summary',
			'id'	=> 'biography-info',
			'type'	=> 'textarea_small',
		));

}



// Notice
add_action('cmb2_admin_init', 'notice');
function notice(){
	$metabox = new_cmb2_box(array(
		'object_types'	=> array('notices'),
		'title'			=> 'Notice Date',
		'id'			=> 'notice',
	));
	
		$metabox->add_field(array(
			'name'	=> 'Pick Date',
			'id'	=> 'notice-date',
			'type'	=> 'text_date', 
			'date_format' => 'j F Y',
		));
}



// Events
add_action('cmb2_admin_init', 'events');
function events(){
	$prefix = '_cmb_';
	$metabox = new_cmb2_box(array(
		'object_types'	=> array('events'),
		'title'			=> 'Events Info',
		'id'			=> $prefix . 'events-info',
	));
	
		$metabox->add_field(array(
			'name'	=> 'Location',
			'id'	=> 'events-location',
			'type'	=> 'text_medium',
		));
		$metabox->add_field(array(
			'name'	=> 'Date',
			'id'	=> 'events-date',
			'type'	=> 'text_small',
		));
		$metabox->add_field(array(
			'name'	=> 'Month',
			'id'	=> 'events-month',
			'type'	=> 'text_small',
		));
		$metabox->add_field(array(
			'name'	=> 'Time',
			'id'	=> 'events-time',
			'type' => 'text_time'
    // Override default time-picker attributes:
    // 'attributes' => array(
    //     'data-timepicker' => json_encode( array(
    //         'timeOnlyTitle' => __( 'Choose your Time', 'cmb2' ),
    //         'timeFormat' => 'HH:mm',
    //         'stepMinute' => 1, // 1 minute increments instead of the default 5
    //     ) ),
    // ),
    // 'time_format' => 'h:i:s A',
		));
		$metabox->add_field(array(
			'name'	=> 'Events Fee',
			'id'	=> 'events-fee',
			'type'	=> 'text_money',
		));
		$metabox->add_field(array(
			'name'	=> 'Apply Link',
			'id'	=> 'events-apply-link',
			'type'	=> 'text_url',
		));





		
		 // Repeatable group
        $group_repeat_test = $metabox->add_field( array(
            'id'          => $prefix . 'metaboxjff_sections',
            'type'        => 'group',
            'options'     => array(
                'group_title'   => __( 'Speaker', 'atzi' ) . ' {#}', // {#} gets replaced by row number
                'add_button'    => __( 'Add another Speaker', 'atzi' ),
                'remove_button' => __( 'Remove Speaker', 'atzi' ),
                'sortable'      => true, // beta
            ),
        ) );


        //* Name
        $metabox->add_group_field( $group_repeat_test, array(
            'name'    => __( 'Speaker Name', 'atzi' ),
            'id'      => $prefix . 'test_title_2',
            'type'    => 'text',
        ) );
        


        //* Occupation
        $metabox->add_group_field( $group_repeat_test, array(
            'name'    => __( 'Speaker Occupation', 'atzi' ),
            'id'      => $prefix . 'test_content_2',
            'type'    => 'text',
        ) );


        //* image
        $metabox->add_group_field( $group_repeat_test, array(
            'name'    => __( 'Speaker Image', 'atzi' ),
            'id'      => $prefix . 'speaker_img',
            'type'    => 'file',
        ) );


}





//About Page
add_action('cmb2_admin_init', 'about_page');
function about_page(){

$metabox = new_cmb2_box( array(
    'id'           => 'success-stories',
    'title'        => 'Success Stories',
    'object_types' => array( 'page' ), // post type
    'show_on'      => array( 'key' => 'page-template', 'value' => 'templates/about.php' ),
    'context'      => 'normal', //  'normal', 'advanced', or 'side'
    'priority'     => 'high',  //  'high', 'core', 'default' or 'low'
    'show_names'   => true, // Show field names on the left
) );
	$metabox->add_field(array(
				'name'	=> 'Title',
				'id'	=> 'success-stories-title',
				'type'	=> 'text_medium',
			));
	$metabox->add_field(array(
				'name'	=> 'Descriptions',
				'id'	=> 'success-stories-discriptions',
				'type'	=> 'wysiwyg',
			));
	$metabox->add_field(array(
				'name'	=> 'Background Image',
				'id'	=> 'success-stories-background-image',
				'type'	=> 'file',
			));
	$metabox->add_field(array(
				'name'	=> 'Video Link',
				'id'	=> 'success-stories-video',
				'type'	=> 'oembed',
			));

}


//contact page
add_action('cmb2_admin_init', 'contact_page');
function contact_page(){
$metabox = new_cmb2_box( array(
    'id'           => 'contact-information',
    'title'        => 'Contact Information',
    'object_types' => array( 'page' ), // post type
    'show_on'      => array( 'key' => 'page-template', 'value' => 'templates/contact.php' ),
    'context'      => 'normal', //  'normal', 'advanced', or 'side'
    'priority'     => 'high',  //  'high', 'core', 'default' or 'low'
    'show_names'   => true, // Show field names on the left
) );
	$metabox->add_field(array(
				'name'	=> 'Information',
				'id'	=> 'c_info',
				'type' => 'wysiwyg',
			));
	$metabox->add_field(array(
				'name'	=> 'Phone',
				'id'	=> 'c_phone',
				'type' => 'text',
			));
	$metabox->add_field(array(
				'name'	=> 'Mail',
				'id'	=> 'c_mail',
				'type'	=> 'text_email',
			));
	$metabox->add_field(array(
				'name'	=> 'Location',
				'id'	=> 'c_location',
				'type'	=> 'textarea_small',
			));
	$metabox->add_field(array(
				'name'	=> 'Google Map',
				'description' => 'PASTE link from iframe tag: src="COPY LINK FROM HERE & THEN PASTE IT">',
				'id'	=> 'c_g_map',
				'type'	=> 'textarea_small',
			));
}


//Training Page
add_action('cmb2_admin_init', 'training');
function training(){
	$metabox = new_cmb2_box(array(
		'object_types'	=> array('product'),
		'title'			=> 'Training Details',
		'id'			=> 'training',
	));
	
		$metabox->add_field(array(
			'name'	=> 'Courses',
			'id'	=> 'training-courses',
			'type'	=> 'text_medium',
		));
		$metabox->add_field(array(
			'name'	=> 'Duration',
			'id'	=> 'training-duration',
			'type'	=> 'text_medium',
		));
}


//Home page========================================================================
add_action('cmb2_admin_init', 'home_page');
function home_page(){

// Slider	
	$prefix = '_cmb_';
	$metabox = new_cmb2_box( array(
	    'id'           => $prefix . 'home-slider',
	    'title'        => 'SLIDER',
	    'object_types' => array( 'page' ), // post type
	    'show_on'      => array( 'key' => 'page-template', 'value' => 'templates/home.php' ),
	    'context'      => 'normal', //  'normal', 'advanced', or 'side'
	    'priority'     => 'high',  //  'high', 'core', 'default' or 'low'
	    'show_names'   => true, // Show field names on the left
	) );

	// Background Image for slider
	$metabox->add_field(array(
            'name'    => __( 'Default Slider Image', 'atzi' ),
            'id'      => 'slider-bg-img',
            'type'    => 'file',
        ) );


        $group_repeat_test = $metabox->add_field( array(
            'id'          => $prefix . 'slider',
            'type'        => 'group',
            'options'     => array(
                'group_title'   => __( 'Slider', 'atzi' ) . ' {#}', // {#} gets replaced by row number
                'add_button'    => __( 'Add another Slider', 'atzi' ),
                'remove_button' => __( 'Remove Slider', 'atzi' ),
                'sortable'      => true, // beta
            ),
        ) );


        //* Slider Title
        $metabox->add_group_field( $group_repeat_test, array(
            'name'    => __( 'Slider Title', 'atzi' ),
            'id'      => $prefix . 'slider_title',
            'type'    => 'text',
        ) );
        


        //* Slider Subtitle
        $metabox->add_group_field( $group_repeat_test, array(
            'name'    => __( 'Slider Subtitle', 'atzi' ),
            'id'      => $prefix . 'slider_subtitle',
            'type'    => 'textarea',
        ) );

        //* Slider Image
        $metabox->add_group_field( $group_repeat_test, array(
            'name'    => __( 'Slider Image', 'atzi' ),
            'id'      => $prefix . 'slider_img',
            'type'    => 'file',
        ) );

		
		//* Slider Button
        $metabox->add_group_field( $group_repeat_test, array(
            'name'    => __( 'Slider Button url', 'atzi' ),
            'id'      => $prefix . 'slider_btn_url',
            'type'    => 'text_url',
        ) );
        $metabox->add_group_field( $group_repeat_test, array(
            'name'    => __( 'Slider Button Text', 'atzi' ),
            'id'      => $prefix . 'slider_btn_text',
            'type'    => 'text_small',
        ) );


//BANNER FEATURE
	$metabox = new_cmb2_box( array(
	    'id'           => $prefix . 'banner-feature',
	    'title'        => 'BANNER FEATURE',
	    'object_types' => array( 'page' ), // post type
	    'show_on'      => array( 'key' => 'page-template', 'value' => 'templates/home.php' ),
	    'context'      => 'normal', //  'normal', 'advanced', or 'side'
	    'priority'     => 'high',  //  'high', 'core', 'default' or 'low'
	    'show_names'   => true, // Show field names on the left
	) );
	//Image for BANNER FEATURE
	$metabox->add_field(array(
            'name'    => __( 'BANNER FEATURE Image', 'atzi' ),
            'id'      => 'banner-feature-img',
            'type'    => 'file',
        ) );

	$group_repeat_test = $metabox->add_field( array(
            'id'          => $prefix . 'banner-f',
            'type'        => 'group',
            'options'     => array(
                'group_title'   => __( 'Banner', 'atzi' ) . ' {#}', // {#} gets replaced by row number
                'add_button'    => __( 'Add another Banner', 'atzi' ),
                'remove_button' => __( 'Remove Banner', 'atzi' ),
                'sortable'      => true, // beta
            ),
        ) );


        //* Banner Icon
        $metabox->add_group_field( $group_repeat_test, array(
            'name'    => __( 'Banner Icon', 'atzi' ),
            'id'      => $prefix . 'banner_icon',
            'type'    => 'text',
            'attributes'  => array(
		        'placeholder' => 'ti-book',
		    ),
        ) );
        //* Banner Title
        $metabox->add_group_field( $group_repeat_test, array(
            'name'    => __( 'Banner Title', 'atzi' ),
            'id'      => $prefix . 'banner_title',
            'type'    => 'text',
        ) );
        //* Banner Subtitle
        $metabox->add_group_field( $group_repeat_test, array(
            'name'    => __( 'Banner Subtitle', 'atzi' ),
            'id'      => $prefix . 'banner_subtitle',
            'type'    => 'textarea_small',
        ) );


//About Section
	$metabox = new_cmb2_box( array(
	    'id'           => 'about-section',
	    'title'        => 'About Section',
	    'object_types' => array( 'page' ), // post type
	    'show_on'      => array( 'key' => 'page-template', 'value' => 'templates/home.php' ),
	    'context'      => 'normal', //  'normal', 'advanced', or 'side'
	    'priority'     => 'high',  //  'high', 'core', 'default' or 'low'
	    'show_names'   => true, // Show field names on the left
	) );
	
	//Title for About Section
	$metabox->add_field(array(
            'name'    => __( 'Title', 'atzi' ),
            'id'      => 'about-title',
            'type'    => 'text',
        ) );

	//Subtitle for About Section
	$metabox->add_field(array(
            'name'    => __( 'Subtitle', 'atzi' ),
            'id'      => 'about-subtitle',
            'type'    => 'textarea_small',
        ) );

	//Button Text for About Section
	$metabox->add_field(array(
            'name'    => __( 'Button Text', 'atzi' ),
            'id'      => 'about-btn-text',
            'type'    => 'text_small',
        ) );

	//Button Link for About Section
	$metabox->add_field(array(
            'name'    => __( 'Button Link', 'atzi' ),
            'id'      => 'about-btn-link',
            'type'    => 'text_url',
        ) );

	//Image for About Section
	$metabox->add_field(array(
            'name'    => __( 'Image', 'atzi' ),
            'id'      => 'about-img',
            'type'    => 'file',
        ) );


//Training Section
	$metabox = new_cmb2_box( array(
	    'id'           => 'training-section',
	    'title'        => 'Training Section',
	    'object_types' => array( 'page' ), // post type
	    'show_on'      => array( 'key' => 'page-template', 'value' => 'templates/home.php' ),
	    'context'      => 'normal', //  'normal', 'advanced', or 'side'
	    'priority'     => 'high',  //  'high', 'core', 'default' or 'low'
	    'show_names'   => true, // Show field names on the left
	) );
	
	//Title for Training Section
	$metabox->add_field(array(
            'name'    => __( 'Title', 'atzi' ),
            'id'      => 'training-title',
            'type'    => 'text',
        ) );

	//Button Text for Training Section
	$metabox->add_field(array(
            'name'    => __( 'Button Text', 'atzi' ),
            'id'      => 'training-btn-text',
            'type'    => 'text_small',
        ) );

	//Button Link for Training Section
	$metabox->add_field(array(
            'name'    => __( 'Button Link', 'atzi' ),
            'id'      => 'training-btn-link',
            'type'    => 'text_url',
        ) );



//CTA Section
	$metabox = new_cmb2_box( array(
	    'id'           => 'cta-section',
	    'title'        => 'CTA Section',
	    'object_types' => array( 'page' ), // post type
	    'show_on'      => array( 'key' => 'page-template', 'value' => 'templates/home.php' ),
	    'context'      => 'normal', //  'normal', 'advanced', or 'side'
	    'priority'     => 'high',  //  'high', 'core', 'default' or 'low'
	    'show_names'   => true, // Show field names on the left
	) );
	
	//Title for cta Section
	$metabox->add_field(array(
            'name'    => __( 'Title', 'atzi' ),
            'id'      => 'cta-title',
            'type'    => 'text',
        ) );

	//Subtitle for cta Section
	$metabox->add_field(array(
            'name'    => __( 'Subtitle', 'atzi' ),
            'id'      => 'cta-subtitle',
            'type'    => 'text',
        ) );

	//Button Text for cta Section
	$metabox->add_field(array(
            'name'    => __( 'Button Text', 'atzi' ),
            'id'      => 'cta-btn-text',
            'type'    => 'text_small',
        ) );

	//Button Link for cta Section
	$metabox->add_field(array(
            'name'    => __( 'Button Link', 'atzi' ),
            'id'      => 'cta-btn-link',
            'type'    => 'text_url',
        ) );

	

//Success Story Section
	$metabox = new_cmb2_box( array(
	    'id'           => 'success-story-section',
	    'title'        => 'Success Story Section',
	    'object_types' => array( 'page' ), // post type
	    'show_on'      => array( 'key' => 'page-template', 'value' => 'templates/home.php' ),
	    'context'      => 'normal', //  'normal', 'advanced', or 'side'
	    'priority'     => 'high',  //  'high', 'core', 'default' or 'low'
	    'show_names'   => true, // Show field names on the left
	) );
	
	//Title for Success Story Section
	$metabox->add_field(array(
            'name'    => __( 'Title', 'atzi' ),
            'id'      => 'success-story-title',
            'type'    => 'text',
        ) );

	//Subtitle for Success Story Section
	$metabox->add_field(array(
            'name'    => __( 'Subtitle', 'atzi' ),
            'id'      => 'success-story-subtitle',
            'type'    => 'textarea',
        ) );


	//Image for Success Story Section
	$metabox->add_field(array(
            'name'    => __( 'Image', 'atzi' ),
            'id'      => 'success-story-img',
            'type'    => 'file',
        ) );

	//Video for Success Story Section
	$metabox->add_field(array(
            'name'    => __( 'Video URL', 'atzi' ),
            'id'      => 'success-story-vid',
            'type'    => 'text_url',
        ) );


//Event Section
	$metabox = new_cmb2_box( array(
	    'id'           => 'event-section',
	    'title'        => 'Event Section',
	    'object_types' => array( 'page' ), // post type
	    'show_on'      => array( 'key' => 'page-template', 'value' => 'templates/home.php' ),
	    'context'      => 'normal', //  'normal', 'advanced', or 'side'
	    'priority'     => 'high',  //  'high', 'core', 'default' or 'low'
	    'show_names'   => true, // Show field names on the left
	) );
	
	//Title for event Section
	$metabox->add_field(array(
            'name'    => __( 'Title', 'atzi' ),
            'id'      => 'event-title',
            'type'    => 'text',
        ) );


	//Button Text for event Section
	$metabox->add_field(array(
            'name'    => __( 'Button Text', 'atzi' ),
            'id'      => 'event-btn-text',
            'type'    => 'text_small',
        ) );

	//Button Link for event Section
	$metabox->add_field(array(
            'name'    => __( 'Button Link', 'atzi' ),
            'id'      => 'event-btn-link',
            'type'    => 'text_url',
        ) );

	//Events per page for event Section
	$metabox->add_field(array(
            'name'    => __( 'Posts per page', 'atzi' ),
            'id'      => 'event-number',
            'type' => 'text_small',
				'attributes' => array(
					'type' => 'number',
					'pattern' => '\d*',
				),
        ) );



//Teachers Section
	$metabox = new_cmb2_box( array(
	    'id'           => 'teacher-home-section',
	    'title'        => 'Teachers Section',
	    'object_types' => array( 'page' ), // post type
	    'show_on'      => array( 'key' => 'page-template', 'value' => 'templates/home.php' ),
	    'context'      => 'normal', //  'normal', 'advanced', or 'side'
	    'priority'     => 'high',  //  'high', 'core', 'default' or 'low'
	    'show_names'   => true, // Show field names on the left
	) );
	
	//Title for Teachers Section
	$metabox->add_field(array(
            'name'    => __( 'Title', 'atzi' ),
            'id'      => 'teacher-home-title',
            'type'    => 'text',
        ) );
	//Teachers per page
	$metabox->add_field(array(
            'name'    => __( 'Teachers per page', 'atzi' ),
            'id'      => 'teacher-home-number',
            'type' => 'text_small',
				'attributes' => array(
					'type' => 'number',
					'pattern' => '\d*',
				),
        ) );


//Blog Section
	$metabox = new_cmb2_box( array(
	    'id'           => 'blog-section',
	    'title'        => 'Blog Section',
	    'object_types' => array( 'page' ), // post type
	    'show_on'      => array( 'key' => 'page-template', 'value' => 'templates/home.php' ),
	    'context'      => 'normal', //  'normal', 'advanced', or 'side'
	    'priority'     => 'high',  //  'high', 'core', 'default' or 'low'
	    'show_names'   => true, // Show field names on the left
	) );
	
	//Title for Blog Section
	$metabox->add_field(array(
            'name'    => __( 'Title', 'atzi' ),
            'id'      => 'blog-title',
            'type'    => 'text',
        ) );
	//Blog per page
	$metabox->add_field(array(
            'name'    => __( 'Blog per page', 'atzi' ),
            'id'      => 'blog-number',
            'type' => 'text_small',
				'attributes' => array(
					'type' => 'number',
					'pattern' => '\d*',
				),
        ) );



}

//Theme options ==========================

class Atzi_Admin {
	/**
 	 * Option key, and option page slug
 	 * @var string
 	 */
	private $key = 'atzi_options';
	/**
 	 * Options page metabox id
 	 * @var string
 	 */
	private $metabox_id = 'atzi_option_metabox';
	/**
	 * Options Page title
	 * @var string
	 */
	protected $title = '';
	/**
	 * Options Page hook
	 * @var string
	 */
	protected $options_page = '';
	/**
	 * Holds an instance of the object
	 *
	 * @var Atzi_Admin
	 **/
	private static $instance = null;
	/**
	 * Constructor
	 * @since 0.1.0
	 */
	private function __construct() {
		// Set our title
		$this->title = __( 'Theme Options', 'atzi' );
	}
	/**
	 * Returns the running object
	 *
	 * @return Atzi_Admin
	 **/
	public static function get_instance() {
		if( is_null( self::$instance ) ) {
			self::$instance = new Atzi_Admin();
			self::$instance->hooks();
		}
		return self::$instance;
	}
	/**
	 * Initiate our hooks
	 * @since 0.1.0
	 */
	public function hooks() {
		add_action( 'admin_init', array( $this, 'init' ) );
		add_action( 'admin_menu', array( $this, 'add_options_page' ) );
		add_action( 'cmb2_admin_init', array( $this, 'add_options_page_metabox' ) );
	}
	/**
	 * Register our setting to WP
	 * @since  0.1.0
	 */
	public function init() {
		register_setting( $this->key, $this->key );
	}
	/**
	 * Add menu options page
	 * @since 0.1.0
	 */
	public function add_options_page() {
		$this->options_page = add_menu_page( $this->title, $this->title, 'manage_options', $this->key, array( $this, 'admin_page_display' ) );
		// Include CMB CSS in the head to avoid FOUC
		add_action( "admin_print_styles-{$this->options_page}", array( 'CMB2_hookup', 'enqueue_cmb_css' ) );
	}
	/**
	 * Admin page markup. Mostly handled by CMB2
	 * @since  0.1.0
	 */
	public function admin_page_display() {
		?>
		<div class="wrap cmb2-options-page <?php echo esc_html($this->key); ?>">
			<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
			<?php cmb2_metabox_form( $this->metabox_id, $this->key ); ?>
		</div>
		<?php
	}
	/**
	 * Add the options metabox to the array of metaboxes
	 * @since  0.1.0
	 */
	function add_options_page_metabox() {
		// hook in our save notices
		add_action( "cmb2_save_options-page_fields_{$this->metabox_id}", array( $this, 'settings_notices' ), 10, 2 );
		$cmb = new_cmb2_box( array(
			'id'         => $this->metabox_id,
			'hookup'     => false,
			'cmb_styles' => false,
			'show_on'    => array(
				// These are important, don't remove
				'key'   => 'options-page',
				'value' => array( $this->key, )
			),
		) );
		// Set our CMB2 fields
		$cmb->add_field( array(
			'name' => __( 'Favicon', 'atzi' ),
			'desc' => __( 'Upload your Favicon', 'atzi' ),
			'id'   => 'favicon-logo-upload',
			'type' => 'file',
		) );
		$cmb->add_field( array(
			'name' => __( 'Preloader', 'atzi' ),
			'desc' => __( 'Upload your Preloader', 'atzi' ),
			'id'   => 'preloader-logo-upload',
			'type' => 'file',
		) );
		$cmb->add_field( array(
			'name' => __( 'Logo', 'atzi' ),
			'desc' => __( 'Upload your logo', 'atzi' ),
			'id'   => 'logo-upload',
			'type' => 'file',
		) );
		$cmb->add_field( array(
			'name'    => __( 'Phone', 'atzi' ),
			'id'      => 'phone-update',
			'type'    => 'text',
			'default' => '+88 01912 96 76 14',
		) );
		$cmb->add_field( array(
			'name'    => __( 'Facebook', 'atzi' ),
			'id'      => 'facebook',
			'type'    => 'text',
			'default' => '#',
		) );
		$cmb->add_field( array(
			'name'    => __( 'Twitter', 'atzi' ),
			'id'      => 'twitter',
			'type'    => 'text',
			'default' => '#',
		) );
		$cmb->add_field( array(
			'name'    => __( 'Linkedin', 'atzi' ),
			'id'      => 'linkedin',
			'type'    => 'text',
			'default' => '#',
		) );
		$cmb->add_field( array(
			'name'    => __( 'Instagram', 'atzi' ),
			'id'      => 'instagram',
			'type'    => 'text',
			'default' => '#',
		) );
		$cmb->add_field( array(
			'name'    => __( 'Phone', 'atzi' ),
			'id'      => 'phone-update',
			'type'    => 'text',
			'default' => '+88 01912 96 76 14',
		) );
		$cmb->add_field( array(
			'name'    => __( 'Copyright', 'atzi' ),
			'id'      => 'copyright',
			'type'    => 'textarea_small',
			'default' => 'Copyright © 2022 Developed by <a href="#">Kazi Ramjan</a>.',
		) );


// Archive: Blog==============================================
		$cmb->add_field( array(
			'name' => __( 'Blog Archive: Title', 'atzi' ),
			'id'   => 'blog-title',
			'type' => 'text',
		) );
		$cmb->add_field( array(
			'name' => __( 'Blog Archive: Subtitle', 'atzi' ),
			'id'   => 'blog-subtitle',
			'type' => 'textarea_small',
		) );
		$cmb->add_field( array(
			'name' => __( 'Blog Archive: Title Image', 'atzi' ),
			'id'   => 'blog-title-image',
			'type' => 'file',
		) );
// Archive: Scholarship==============================================
		$cmb->add_field( array(
			'name' => __( 'Scholarship Archive: Title', 'atzi' ),
			'id'   => 'scholarship-title',
			'type' => 'text',
		) );
		$cmb->add_field( array(
			'name' => __( 'Scholarship Archive: Subtitle', 'atzi' ),
			'id'   => 'scholarship-subtitle',
			'type' => 'textarea_small',
		) );
		$cmb->add_field( array(
			'name' => __( 'Scholarship Archive: Title Image', 'atzi' ),
			'id'   => 'scholarship-title-image',
			'type' => 'file',
		) );
		$cmb->add_field( array(
			'name' => __( 'Scholarship Archive: Content Title', 'atzi' ),
			'id'   => 'scholarship-content-title',
			'type' => 'text',
		) );
		$cmb->add_field( array(
			'name' => __( 'Scholarship Archive: Feature Image', 'atzi' ),
			'id'   => 'scholarship-feature-image',
			'type' => 'file',
		) );

		$cmb->add_field( array(
			'name' => __( 'Scholarship Archive: Descriptions', 'atzi' ),
			'id'   => 'scholarship-descriptions',
			'type' => 'wysiwyg',
		) );

// Archive: Events==============================================
		$cmb->add_field( array(
			'name' => __( 'Events Archive: Title', 'atzi' ),
			'id'   => 'event-title',
			'type' => 'text',
		) );
		$cmb->add_field( array(
			'name' => __( 'Events Archive: Subtitle', 'atzi' ),
			'id'   => 'event-subtitle',
			'type' => 'textarea_small',
		) );
		$cmb->add_field( array(
			'name' => __( 'Events Archive: Title Image', 'atzi' ),
			'id'   => 'event-title-image',
			'type' => 'file',
		) );

// Archive: Research==============================================
		$cmb->add_field( array(
			'name' => __( 'Research Archive: Title', 'atzi' ),
			'id'   => 'research-title',
			'type' => 'text',
		) );
		$cmb->add_field( array(
			'name' => __( 'Research Archive: Subtitle', 'atzi' ),
			'id'   => 'research-subtitle',
			'type' => 'textarea_small',
		) );
		$cmb->add_field( array(
			'name' => __( 'Research Archive: Title Image', 'atzi' ),
			'id'   => 'research-title-image',
			'type' => 'file',
		) );

// Archive: Teacher==============================================
		$cmb->add_field( array(
			'name' => __( 'Teacher Archive: Title', 'atzi' ),
			'id'   => 'teacher-title',
			'type' => 'text',
		) );
		$cmb->add_field( array(
			'name' => __( 'Teacher Archive: Subtitle', 'atzi' ),
			'id'   => 'teacher-subtitle',
			'type' => 'textarea_small',
		) );
		$cmb->add_field( array(
			'name' => __( 'Teacher Archive: Title Image', 'atzi' ),
			'id'   => 'teacher-title-image',
			'type' => 'file',
		) );

// Archive: Notice==============================================
		$cmb->add_field( array(
			'name' => __( 'Notice Archive: Title', 'atzi' ),
			'id'   => 'notice-title',
			'type' => 'text',
		) );
		$cmb->add_field( array(
			'name' => __( 'Notice Archive: Subtitle', 'atzi' ),
			'id'   => 'notice-subtitle',
			'type' => 'textarea_small',
		) );
		$cmb->add_field( array(
			'name' => __( 'Notice Archive: Title Image', 'atzi' ),
			'id'   => 'notice-title-image',
			'type' => 'file',
		) );

// Archive: Training(Shop)==============================================
		$cmb->add_field( array(
			'name' => __( 'Training Archive: Title', 'atzi' ),
			'id'   => 'training-title',
			'type' => 'text',
		) );
		$cmb->add_field( array(
			'name' => __( 'Training Archive: Subtitle', 'atzi' ),
			'id'   => 'training-subtitle',
			'type' => 'textarea_small',
		) );
		$cmb->add_field( array(
			'name' => __( 'Training Archive: Title Image', 'atzi' ),
			'id'   => 'training-title-image',
			'type' => 'file',
		) );




	}
	/**
	 * Register settings notices for display
	 *
	 * @since  0.1.0
	 * @param  int   $object_id Option key
	 * @param  array $updated   Array of updated fields
	 * @return void
	 */
	public function settings_notices( $object_id, $updated ) {
		if ( $object_id !== $this->key || empty( $updated ) ) {
			return;
		}
		add_settings_error( $this->key . '-notices', '', __( 'Settings updated.', 'atzi' ), 'updated' );
		settings_errors( $this->key . '-notices' );
	}
	/**
	 * Public getter method for retrieving protected/private variables
	 * @since  0.1.0
	 * @param  string  $field Field to retrieve
	 * @return mixed          Field value or exception is thrown
	 */
	public function __get( $field ) {
		// Allowed fields to retrieve
		if ( in_array( $field, array( 'key', 'metabox_id', 'title', 'options_page' ), true ) ) {
			return $this->{$field};
		}
		throw new Exception( 'Invalid property: ' . $field );
	}
}
/**
 * Helper function to get/return the Atzi_Admin object
 * @since  0.1.0
 * @return Atzi_Admin object
 */
function atzi_admin() {
	return Atzi_Admin::get_instance();
}
/**
 * Wrapper function around cmb2_get_option
 * @since  0.1.0
 * @param  string  $key Options array key
 * @return mixed        Option value
 */
function atzi_get_option( $key = '' ) {
	return cmb2_get_option( atzi_admin()->key, $key );
}
// Get it started
atzi_admin();