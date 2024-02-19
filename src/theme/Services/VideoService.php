<?php

namespace WpTheme\Services;

class VideoService
{
    public static function getYoutubeEmbed($url)
    {
        $videoId = self::getYoutubeVideoId($url);
        return '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . $videoId . '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
    }

    public static function getYoutubeVideoId($url)
    {
        $videoId = '';
        $url = parse_url($url);
        if (isset($url['query'])) {
            parse_str($url['query'], $query);
            if (isset($query['v'])) {
                $videoId = $query['v'];
            }
        }
        return $videoId;
    }
}
