<?php
add_action('customize_register',function (WP_Customize_Manager $manager){

    $manager->add_section('photo_appearence', [
        'title' => __('Theme appearence')
    ]);

    $manager->add_setting('logo',[
        'sanitaze_callback' => 'esc_url_raw'

    ]);
    $manager->add_control(new WP_Customize_Image_Control($manager, 'logo',[
        'label' => __('logo', 'NewTheme'),
        'section'=> 'photo_appearence'
    ]));
});