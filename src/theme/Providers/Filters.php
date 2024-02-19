<?php
namespace WpTheme\Providers;

use voku\helper\HtmlDomParser;

class Filters
{
    static function TheContent($content)
    {
        if($html = HtmlDomParser::str_get_html($content)){

            foreach($html->find("img") as $img){
                if(!$img->hasClass("img-fluid") && !$img->hasClass("no-fluid")){
                    $img->addClass("img-fluid");
                }

                if(!$img->hasAttribute("data-src") && !$img->hasClass("lazy")){
                    $src = $img->getAttribute("src");
                    $img->setAttribute("src", "");
                    $img->setAttribute("data-src", $src);
                    $img->addClass("lazy");
                }

                if($img->hasClass("aligncenter")){
                    $img->outertext = "<p class=\"text-center\">".$img->outertext."</p>";
                }
            }

            foreach($html->find("iframe") as $iframe){
                if(!$iframe->hasClass("no-fluid")){
                    $iframe->outertext = "<div class=\"ratio ratio-16x9\">".$iframe->outertext."</div>";
                }

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

    static function ExcerptLength($length)
    {
        return 30;
    }

    static function ExcerptEnding($ending)
    {
        return " ...";
    }

    static function BlockCategoriesAll($categories, $post)
    {
        $categories[] = [
            'slug' => WPTHEME_TEXTDOMAIN,
            'title' => __("Theme", WPTHEME_TEXTDOMAIN),
            'icon' => "dashicons-admin-customizer"
        ];
        return $categories;
    }

    static function LoginEnqueueScripts()
    {
        ?>
        <style type="text/css">
            body.login {
                background-color: #ecf0f1;
                background-image: url('<?php echo WPTHEME_URL; ?>/public/images/login/background.jpg');
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
            }

            body.login div#login {
                background: #ecf0f1;
                border-radius: 1rem;
                box-shadow: 0 0 1rem rgba(0, 0, 0, 0.5);
                padding: 1rem .5rem;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }

            body.login div#login h1 a {
                background-image: url('<?php echo WPTHEME_URL; ?>/public/images/login/logo.png');
                background-size: 100% 100%;
                background-repeat: no-repeat;
                background-position: center;
                margin: 0 auto 32px;
            }

            body.login div#login form#loginform,
            body.login div#login form#lostpasswordform {
                background: none;
                border: none;
                box-shadow: none;
            }

            body.login p#nav,
            body.login p#backtoblog {
                margin: 0;
            }

            body.login div.language-switcher {
                position: absolute;
                margin: 0;
                padding: .5rem;
                bottom: 0;
                right: 0;
            }
        </style>
        <?php
    }

    static function UseBlockEditorForPostType($status, $post_type)
    {
        if($post_type == "article" || $post_type == "page"){
            return false;
        }
        return $status;
    }

    static function AdminFooterText($text)
    {
        $text = "<span><i>".sprintf(__("Developed by %s.", WPTHEME_TEXTDOMAIN), '<a href="https://rbfraphael.github.io/" target="_blank" rel="noopener noreferrer">RBFraphael</a>')."</i></span>";
        return $text;
    }

    static function UpdateFooter($text)
    {
        $text = "<span>".sprintf(__("Wordpress %s", WPTHEME_TEXTDOMAIN), get_bloginfo("version", "display"))."</span>";
        return $text;
    }

    static function BlockEditorRestApiPreloadPaths($preload_paths)
    {
        global $post;

        $rest_path = rest_get_route_for_post($post);
        $remove_path = add_query_arg("context", "edit", $rest_path);
        
        return array_filter($preload_paths, function($url) use($remove_path){
            return $url !== $remove_path;
        });
    }

    static function UploadMimes($upload_mimes)
    {
        $upload_mimes['svg'] = "image/svg+xml";
        $upload_mimes['svgz'] = "image/svg+xml";
        return $upload_mimes;
    }
}
