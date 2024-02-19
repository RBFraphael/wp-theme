<?php do_action("get_header"); ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1><?php echo __("404"); ?></h1>
            <p><?php echo __("Page not found"); ?></p>
            <a href="<?php echo home_url(); ?>"><?php echo __("Go back to home"); ?></a>
        </div>
    </div>
</div>

<?php do_action("get_footer"); ?>
