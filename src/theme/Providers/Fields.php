<?php
namespace WpTheme\Providers;

use Carbon_Fields\Container\Container;
use Carbon_Fields\Field;
use WpTheme\Core\GutenbergBlock;
use WpTheme\Core\OptionsPage;

class Fields
{
    static function Init ()
    {
        static::MenuItem();
    }

    static function GeneralOptionsPage ()
    {
        if($page = OptionsPage::Get("theme-options")){
            $page->add_fields([
                Field::make("image", "favicon", __("Site favicon", WPTHEME_TEXTDOMAIN)),
                Field::make("image", "header_logo", __("Header Logo", WPTHEME_TEXTDOMAIN)),
            ]);
        }
    }

    static function HeaderOptionsPage ()
    {
        if($page = OptionsPage::Get("header-options")){
            $page->add_fields([
                Field::make("image", "header_logo", __("Header logo", WPTHEME_TEXTDOMAIN)),
                Field::make("image", "mobile_header_logo", __("Mobile header logo", WPTHEME_TEXTDOMAIN)),
                Field::make("image", "drawer_logo", __("Mobile menu logo", WPTHEME_TEXTDOMAIN)),
            ]);
        }
    }

    static function FooterOptionsPage ()
    {
        if($page = OptionsPage::Get("footer-options")){
            $page->add_fields([
                Field::make("image", "footer_logo", __("Footer logo", WPTHEME_TEXTDOMAIN)),
                Field::make("complex", "footer_social", __("Social networks", WPTHEME_TEXTDOMAIN))
                    ->set_collapsed(true)
                    ->setup_labels([
                        'plural_name' => __("Socials", WPTHEME_TEXTDOMAIN),
                        'singular_name' => __("Social", WPTHEME_TEXTDOMAIN),
                    ])
                    ->add_fields([
                        Field::make("text", "label", __("Label", WPTHEME_TEXTDOMAIN))->set_width(33),
                        Field::make("icon", "icon", __("Icon", WPTHEME_TEXTDOMAIN))->set_width(33),
                        Field::make("text", "url", __("Link", WPTHEME_TEXTDOMAIN))->set_width(33)
                    ])
                    ->set_header_template('
                    <% if(label){ %>
                        <%- label %>
                    <% } %>
                    '),
                Field::make("text", "footer_copyright", __("Copyright text", WPTHEME_TEXTDOMAIN))
            ]);
        }
    }

    static function AdditionalCodeOptionsPage ()
    {
        if($page = OptionsPage::Get("additional-code")){
            $page->add_fields([
                Field::make("header_scripts", "header_scripts", __("Code to insert into <head>")),
                Field::make("footer_scripts", "footer_scripts", __("Code to insert before closing </body>"))
            ]);
        }
    }

    static function BlockContainer ()
    {
        if($block = GutenbergBlock::Get("example_container")){
            $block->add_fields([
                Field::make("checkbox", "padding_x", __("Horizontal padding", WPTHEME_TEXTDOMAIN)),
                Field::make("checkbox", "padding_y", __("Vertical padding", WPTHEME_TEXTDOMAIN)),
                Field::make("checkbox", "fluid", __("Full width", WPTHEME_TEXTDOMAIN)),
                Field::make("checkbox", "background_image", __("Background image", WPTHEME_TEXTDOMAIN)),
                Field::make("image", "background_image_image", __("Image", WPTHEME_TEXTDOMAIN))
                    ->set_conditional_logic([['field' => "background_image", 'value' => true]])
            ]);
        }
    }

    static function MenuItem ()
    {
        Container::make("nav_menu_item", __("Menu item", WPTHEME_TEXTDOMAIN))
            ->add_fields([
                Field::make("image", "icon", __("Icon", WPTHEME_TEXTDOMAIN)),
                Field::make("checkbox", "special", __("Special link", WPTHEME_TEXTDOMAIN)),
            ]);
    }

}
