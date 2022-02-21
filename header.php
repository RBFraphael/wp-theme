<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php do_action("custom_code_head_open"); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <?php do_action("custom_code_head_close"); ?>
</head>
<?php $enable_barba = get_field("enable_barba", "options"); ?>
<body <?php body_class(); ?> <?php if($enable_barba): ?> data-barba="wrapper" <?php endif; ?>>

<?php do_action("custom_code_body_open"); ?>
<?php get_template_part("templates/partials/site-header"); ?>

<main <?php if($enable_barba): ?> data-barba="container" data-barba-namespace="startertheme" <?php endif; ?>>