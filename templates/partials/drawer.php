<div class="drawer shadow bg-dark">
    <div class="row drawer-header align-items-center px-2 bg-primary">
        <div class="col-7 py-2">
            <?php if($drawer_logo = get_field("drawer_logo", "options")): ?>
            <img src="<?= $drawer_logo; ?>" alt="<?= get_bloginfo("name"); ?>" class="img-fluid lazy">
            <?php else: ?>
            <p class="fw-bold text-light"><?= get_bloginfo("name"); ?></p>
            <?php endif; ?>
        </div>
        <div class="col-3 text-center"></div>
        <div class="col-2 text-end">
            <button class="close d-block" onclick="window.closeDrawer();">
                <i class="fas fa-times fa-fw"></i>
            </button>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-12 drawer-menu">
            <?php do_action("mobile_menu"); ?>
        </div>
    </div>
</div>
<div class="drawer-overlay d-none"></div>