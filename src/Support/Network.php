<?php

namespace ArtARTs36\ULoginApi\Support;

class Network
{
    public const TWITTER = 'twitter';
    public const VK = 'vkontakte';
    public const MAIL_RU = 'mailru';
    public const OK = 'odnoklassniki';
    public const YA = 'yandex';
    public const GOOGLE = 'google';
    public const STEAM = 'steam';
    public const SOUND_CLOUD = 'soundcloud';
    public const LAST_FM = 'lastfm';
    public const LINKED_IN = 'linkedin';
    public const LIVE_ID = 'liveid';
    public const FLICKR = 'flickr';
    public const LIVE_JOURNAL = 'livejournal';
    public const OPEN_ID = 'openid';
    public const WEB_MONEY = 'webmoney';
    public const YOUTUBE = 'youtube';
    public const FOUR_SQUARE = 'foursquare';
    public const TUMBLR = 'tumblr';
    public const GOOGLE_PLUS = 'googleplus';
    public const INSTAGRAM = 'instagram';
    public const WAR_GAMING = 'wargaming';

    public const ALL = [
        self::TWITTER,
        self::VK,
        self::MAIL_RU,
        self::OK,
        self::YA,
        self::GOOGLE,
        self::STEAM,
        self::SOUND_CLOUD,
        self::LAST_FM,
        self::LINKED_IN,
        self::LIVE_ID,
        self::FLICKR,
        self::LIVE_JOURNAL,
        self::OPEN_ID,
        self::WEB_MONEY,
        self::YOUTUBE,
        self::FOUR_SQUARE,
        self::TUMBLR,
        self::GOOGLE_PLUS,
        self::INSTAGRAM,
        self::WAR_GAMING,
    ];

    public static function isValid(string $name): bool
    {
        return in_array($name, static::ALL);
    }
}
