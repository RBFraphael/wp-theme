<?php
namespace WpTheme\Providers;

use WpTheme\Core\OptionsPage;

class OptionsPages
{
    static function Init()
    {
        static::General();
        static::Header();
        static::Footer();
        static::AdditionalCode();
    }

    static function General()
    {
        OptionsPage::Create(__("Theme Options", WPTHEME_TEXTDOMAIN), "theme-options");
        Fields::GeneralOptionsPage();
    }

    static function Header()
    {
        OptionsPage::CreateChild(__("Header", WPTHEME_TEXTDOMAIN), "header-options", "theme-options");
        Fields::HeaderOptionsPage();
    }

    static function Footer()
    {
        OptionsPage::CreateChild(__("Footer", WPTHEME_TEXTDOMAIN), "footer-options", "theme-options");
        Fields::FooterOptionsPage();
    }

    static function AdditionalCode()
    {
        OptionsPage::CreateChild(__("Additional Code", WPTHEME_TEXTDOMAIN), "additional-code", "theme-options");
        Fields::AdditionalCodeOptionsPage();
    }
}
