<?php

global $wpdb;

return [
    'paths' => [
        'migrations' => WPTHEME_PATH."/src/theme/Database/Migrations",
        'seeds' => WPTHEME_PATH."/src/theme/Database/Seeds"
    ],
    'environments' => [
        'default_migration_table' => $wpdb->prefix."migrations",
        'default_environment' => "wordpress",
        'wordpress' => [
            'adapter' => "mysql",
            'host' => DB_HOST,
            'name' => DB_NAME,
            'user' => DB_USER,
            'pass' => DB_PASSWORD,
            'table_prefix' => $wpdb->prefix,
            'port' => 3306,
            'charset' => DB_CHARSET
        ]
    ],
    'version_order' => "creation"
];
