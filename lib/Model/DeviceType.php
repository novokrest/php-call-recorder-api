<?php
/**
 * DeviceType
 *
 * PHP version 5
 *
 * @category Class
 * @package  Call\Recorder\Client
 */

/**
 * Call Recorder API
 *
 * Call Recorder API
 *
 * OpenAPI spec version: 1.0.0
 */


namespace Call\Recorder\Client\Model;
use \Call\Recorder\Client\ObjectSerializer;

/**
 * DeviceType Class Doc Comment
 *
 * @category Class
 * @package  Call\Recorder\Client
 */
class DeviceType
{
    /**
     * Possible values of this enum
     */
    const ANDROID = 'android';
    const IOS = 'ios';
    const MAC = 'mac';
    const WINDOWS = 'windows';
    const WEB = 'web';
    const CUSTOM = 'custom';
    
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::ANDROID,
            self::IOS,
            self::MAC,
            self::WINDOWS,
            self::WEB,
            self::CUSTOM,
        ];
    }
}


