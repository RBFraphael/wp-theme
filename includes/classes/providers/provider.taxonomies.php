<?php

class Provider_Taxonomies
{
    public function __construct()
    {
        $this->example_taxonomy();
    }

    public function example_taxonomy()
    {
        $labels = [
            'name' => __("Examples", "starter-theme"),
            'singular_name' => __("Example", "starter-theme"),
            'search_items' => __("Search examples", "starter-theme"),
            'all_items' => __("All examples", "starter-theme"),
            'parent_item' => __("Parent example", "starter-theme"),
            'parent_item_colon' => __("Parent example:", "starter-theme"),
            'edit_item' => __("Edit example", "starter-theme"),
            'update_item' => __("Update example", "starter-theme"),
            'add_new_item' => __("Add new example", "starter-theme"),
            'new_item_name' => __("New example", "starter-theme"),
            'menu_name' => __("Example", "starter-theme"),
        ];
        
        $settings = [
            'hierarchical' => false,
            'labels' => $labels,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => ['slug' => 'example'],
        ];
        
        register_taxonomy("example_taxonomy", ['example_cpt'], $settings);
    }
}