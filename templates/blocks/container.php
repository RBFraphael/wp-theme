<div class="container <?= $px." ".$py; ?> <?= is_admin() ? "border p-2" : ""; ?>">
    <?php if(is_admin()): ?>
    <small class="text-muted text-uppercase fw-light"><?= __("Container", "starter-theme"); ?></small>
    <?php endif; ?>
    
    <InnerBlocks />
</div>