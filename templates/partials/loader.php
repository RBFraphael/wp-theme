<?php if(get_field("enable_loader", "options")): ?>
<style>
    #loader { position: fixed; top: 0; left: 0; bottom: 0; right: 0; z-index: 99999; background-color: #FFF; }
    #loader #wrapper { position: absolute; top: 50%; left: 50%; transform-origin: 50% 50%; animation: 1s loader forwards; }
    #loader #wrapper img { animation: spin 4s linear infinite; }
    @keyframes loader {
        0% { transform: scale(1.5) translate(-50%, -50%); opacity: 0; }
        100% { transform: scale(1) translate(-50%, -50%); opacity: 1; }
    }
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>

<div id="loader">
    <div id="wrapper">
        <img src="<?= get_field("loader_image", "options"); ?>" alt="<?= __("Loading website"); ?>">
    </div>
</div>
<?php endif; ?>