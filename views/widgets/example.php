<?php echo $args['before_widget']; ?>
<div class="example-widget">
    <?php echo $args['before_title']; ?>
    <h2><?php echo $instance['title']; ?></h2>
    <?php echo $args['after_title']; ?>

    <p><?php echo $instance['text']; ?></p>
</div>
<?php echo $args['after_widget']; ?>