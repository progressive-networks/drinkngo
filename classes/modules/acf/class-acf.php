<?php

namespace Modules\Acf;

class Acf
{
    public function __construct()
    {
        if (!function_exists('acf_add_options_page')) {
            return;
        }

        add_action('init', [$this, 'addOptionsPage'], 10, 0);
    }

    public function addOptionsPage(): void
    {
        acf_add_options_page();
        // acf_add_options_sub_page('Home');
        // acf_add_options_sub_page('Header');
        // acf_add_options_sub_page('Footer');
    }
}
