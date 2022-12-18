<?php
namespace Alfredo\Elementor;

use Alfredo\Config\CustomFunctions;
use Timber\Timber;

class CustomWidget extends \Elementor\Widget_Base

{
    public function get_name()
    {
        return 'custom_widget';
    }

    public function get_title()
    {
        return esc_html__('Hotels Widget', 'alfredo_base_theme');

    }

    public function get_icon()
    {
        return 'eicon-welcome';
    }

    public function get_custom_help_url()
    {
        return '';
    }

    public function get_categories()
    {
        return ['general'];
    }

    public function get_keywords()
    {
        return ['keyword', 'keyword'];
    }

    public function get_script_depends()
    {}

    public function get_style_depends()
    {}

    protected function register_controls()
    {

        $this->start_controls_section('content_section',
            [
                'label' => esc_html__('Query', 'alfredo_base_theme'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]);

        $this->add_control(
            'order_by',
            [
                'label' => esc_html__('Order By', 'alfredo_base_theme'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'ID',
                'options' => [
                    'ID' => esc_html__('Default', 'alfredo_base_theme'),
                    'author' => esc_html__('Author', 'alfredo_base_theme'),
                    'title' => esc_html__('Title', 'alfredo_base_theme'),
                    'name' => esc_html__('Name', 'alfredo_base_theme'),
                    'date' => esc_html__('Date', 'alfredo_base_theme'),
                    'rand' => esc_html__('Random', 'alfredo_base_theme'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .your-class' => 'border-style: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'order',
            [
                'label' => esc_html__('Order', 'alfredo_base_theme'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'ASC',
                'options' => [
                    'ASC' => esc_html__('Ascendent', 'alfredo_base_theme'),
                    'DESC' => esc_html__('Descendent', 'alfredo_base_theme'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .your-class' => 'border-style: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $hotels = CustomFunctions::getHotels($settings);
        $widgetContext = Timber::context();
        $widgetContext['hotels'] = $hotels;
        Timber::render('sections/custom-elementor.twig', $widgetContext);
        return;
    }

    protected function content_template()
    {

    }
}
