<?php

class Callbacks_Blocks
{
    public function container($block)
    {
        if(get_field("disabled") && !is_admin()) return;

        $data = array_merge(get_fields(), compact('block'));
        startertheme_render_block("container", $data);
    }
}