<?php
/* Admin option page function */

function tbdateformat_options_page() {
      ob_start();
    ?>

    <div>
        <?php screen_icon(); ?>
        <h2>Tibetan Date Format</h2>
        <form method="post" action="options.php">

            <?php settings_fields('tbdateformat_settings_group'); ?>
            <?php do_settings_sections('tbdateformat_settings_group'); ?>
            <h4>Select Date Format</h4>
            <table>               
                <tr>
                    <td>

                        <?php
                        /**
                         * Filters the default date formats.
                         *
                         * @since 2.7.0
                         * @since 4.0.0 Added ISO date standard YYYY-MM-DD format.
                         *
                         * @param array $default_date_formats Array of default date formats.
                         */
                        $date_formats = array_unique(apply_filters('date_formats', array(__('F j, Y'), 'Y-m-d', 'm/d/Y', 'd/m/Y')));

                        $date_formats = array_unique(apply_filters('date_formats', array(__('F j, Y'), 'Y-m-d', 'm/d/Y', 'd/m/Y', '3' => 'ཕྱི་ལོ། Y ཟླ། m ཚེས། d ཉིན་སྤེལ།')));
                        $custom = true;

                        foreach ($date_formats as $format) {
                            echo "\t<label><input type='radio' name='date_format' value='" . esc_attr($format) . "'";
                            if (get_option('date_format') === $format) { // checked() uses "==" rather than "==="
                                echo " checked='checked'";
                                //$custom = false;
                            }
                            echo ' /> <span class="date-time-text format-i18n">' . date_i18n($format) . '</span><code>' . esc_html($format) . "</code></label><br />\n";
                        }
                        ?>

                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>

    <?php
}

function myplugin_register_settings() {
    register_setting('tbdateformat_settings_group', 'date_format', 'myplugin_callback');
}

add_action('admin_init', 'myplugin_register_settings');

function myplugin_register_options_page() {
    add_options_page('Tibetan Date Format', 'Tibetan Date Translator', 'manage_options', 'translate-to-tb', 'tbdateformat_options_page');
}

add_action('admin_menu', 'myplugin_register_options_page');
