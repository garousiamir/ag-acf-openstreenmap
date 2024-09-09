<?php
/**
 * Plugin Name: المان نقشه acf
 * Description: این پلاگین یک المان المنتوری برای خروجی openstreetmap در acf است
 * Version: 1.0.0
 * Author: امیرحسین گروسی
 * Author URI: https://agarousi.ir
 * 
 * Text Domain: openstreetmap-plugin
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class agOpen {

    private $widgets_manager;

    public function __construct($widgets_manager) {
        $this->widgets_manager = $widgets_manager;
    }

    public function registerWidgets() {
        $widget_classes = [
            'openstreetmap',
        ];

        foreach ($widget_classes as $class_name) {
            $file_path = __DIR__ . '/elements/' . strtolower($class_name) . '.php';

            if (file_exists($file_path)) {
                require_once($file_path);

                if (class_exists($class_name)) {
                    $this->widgets_manager->register_widget_type(new $class_name());
                }
            }
        }
    }

    public static function init() {
        $self = new self(\Elementor\Plugin::$instance->widgets_manager);
        add_action('elementor/widgets/widgets_registered', array($self, 'registerWidgets'));
    }
}

add_action('elementor/init', ['agOpen', 'init']);
