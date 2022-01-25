<?php

class Callbacks_Blocks
{
    public function container()
    {
        startertheme_render_block("container", get_fields());
    }
}