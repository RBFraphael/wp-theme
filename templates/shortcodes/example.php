<p><?= $content; ?></p>
<ol>
    <?php foreach($attrs as $key => $value): ?>
    <li><?= $key." = ".$value; ?></li>
    <?php endforeach; ?>
</ol>