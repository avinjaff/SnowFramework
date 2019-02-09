<?php
/**
 * Config class script
 * Sets hosting service variables
 *
 * @author        MohammadReza Tayyebi <rexa@gordarg.com>
 * @since         1.0
 */

class Config
{
    public static function Languages()
    {
        $languages = array();

        array_push($languages, new Language("fa", "فارسی", "IR", "r", "🇮🇷"));
        array_push($languages, new Language("en", "English", "US", "l", "🇺🇸"));
        
        return $languages;
    }

    const TimeZone = "Asia/Tehran";

    const ConnectionString_SERVER  = "localhost";
    const ConnectionString_DATABASE = "SnowKMS";
    const ConnectionString_USERNAME  = "root";
    const ConnectionString_PASSWORD = "123";

    const BASEURL = "http://localhost/SnowFramework/"; //       /Anything
    const TITLE = "سامانه‌ی مدیریت دانش";
    const LANGUAGE = "English";
    const REGION = "IR";
    const NAME = "KMS";
    const SPONSOR = "Gordarg";
    const META_KEYWORDS = "knowledge, social network, content, SEO, telecommunications, e-business";
    const META_DESCRIPTION = "DESCRIPTION HERE";
    const META_AUTHOR = "";
    
    const WebMaster = "info@gordarg.com";
}