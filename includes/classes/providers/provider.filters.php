<?php

class Provider_Filters
{
    public function the_content($content)
    {
        if($html = str_get_html($content)){

            foreach($html->find("img") as $img){
                // Responsive images
                if(!$img->hasClass("img-fluid") && !$img->hasClass("no-fluid")){
                    $img->addClass("img-fluid");
                }

                // Lazyload images
                if(!$img->hasAttribute("data-src") && !$img->hasClass("lazy")){
                    $src = $img->getAttribute("src");
                    $img->setAttribute("src", "");
                    $img->setAttribute("data-src", $src);
                    $img->addClass("lazy");
                }

                // Centered images
                if($img->hasClass("aligncenter")){
                    $img->outertext = "<p class=\"text-center\">".$img->outertext."</p>";
                }
            }

            foreach($html->find("iframe") as $iframe){
                // Responsive iframes
                if(!$iframe->hasClass("no-fluid")){
                    $iframe->outertext = "<div class=\"ratio ratio-16x9\">".$iframe->outertext."</div>";
                }

                // Lazyload iframes
                if(!$iframe->hasAttribute("data-src") && !$iframe->hasClass("lazy")){
                    $src = $iframe->getAttribute("src");
                    $iframe->setAttribute("src", "");
                    $iframe->setAttribute("data-src", $src);
                    $iframe->addClass("lazy");
                }
            }

            return $html;
        }
        return $content;
    }

    public function exerpt_length($length)
    {
        return 30;
    }

    public function excerpt_ending($ending)
    {
        return "...";
    }

    public function block_categories_all($categories, $post)
    {
        $categories[] = [
            'slug' => "starter-theme",
            'title' => __("Starter Theme", "starter-theme"),
            'icon' => "dashicons-admin-customizer"
        ];
        return $categories;
    }

    public function login_enqueue_scripts()
    {
        ?>
        <style type="text/css">
            body.login {
                background-color: #FFF;
                background-image: url('<?= STARTERTHEME_URL; ?>/assets/dist/img/login-background.jpg');
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
            }

            body.login div#login h1 a {
                background-image: url('<?= STARTERTHEME_URL; ?>/assets/dist/img/login-logo.png');
                background-size: 100% 100%;
                background-repeat: no-repeat;
                background-position: center;
                margin: 0 auto 32px;
            }

            body.login div#login form#loginform {
                background-color: rgba(255, 255, 255, 0.5);
            }
        </style>
        <?php
    }

    public function acf_settings_url($url)
    {
        return STARTERTHEME_URL."/includes/plugins/advanced-custom-fields/";
    }
}