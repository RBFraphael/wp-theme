<?php get_template_part("templates/partials/drawer"); ?>
<?php get_template_part("templates/partials/loader"); ?>

<header id="site-header">
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                <div class="col-4 col-lg-3">
                    <a href="<?= get_bloginfo("url"); ?>">
                        <!-- Desktop -->
                        <div class="d-none d-lg-block">
                            <?php if($header_logo = get_field("header_logo", "options")): ?>
                            <img src="<?= $header_logo; ?>" alt="<?= get_bloginfo("name"); ?>">
                            <?php else: ?>
                            <h3><?= get_bloginfo("name"); ?></h3>
                            <h5 class="small"><?= get_bloginfo("description"); ?></h5>
                            <?php endif; ?>
                        </div>

                        <!-- Mobile -->
                        <div class="d-block d-lg-none">
                            <?php if($mobile_logo = get_field("mobile_header_logo", "options")): ?>
                            <img src="<?= $mobile_logo; ?>" alt="<?= get_bloginfo("name"); ?>">
                            <?php else: ?>
                            <h4><?= get_bloginfo("name"); ?></h4>
                            <h6 class="small"><?= get_bloginfo("description"); ?></h6>
                            <?php endif; ?>
                        </div>
                    </a>
                </div>
                <div class="col-8 col-lg-9 text-end">
                    <div class="d-none d-lg-block">
                        <?php do_action("desktop_menu"); ?>
                    </div>
                    <div class="d-block d-lg-none">
                        <button class="btn btn-primary" onclick="window.openDrawer()">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>