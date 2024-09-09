<?php
// Include Elementor Widget class.
class OpenstreetMap extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'openstreetmap';
    }

    public function get_title()
    {
        return esc_html__('المان نقشه acf', 'kishtaz');
    }

    public function get_icon()
    {
        return 'eicon-archive-posts';
    }

    public function get_categories()
    {
        return ['general'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'content1aboutusonekaren',
            [
                'label' => esc_html__('محتوای المان', 'kaveh-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'fielda',
            [
                'label' => esc_html__('نام فیلد', 'kaveh-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $clsid = $this->get_id();
        $fielda = $settings['fielda'];
        $post_id = get_the_ID();
        $location = get_field($fielda, $post_id);
        echo $location;
    }
}