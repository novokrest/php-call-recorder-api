<?php
/**
 * PlayBeep
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
 * PlayBeep Class Doc Comment
 *
 * @category Class
 * @package  Call\Recorder\Client
 */
class PlayBeep
{
    /**
     * Possible values of this enum
     */
    const YES = 'yes';
    const NO = 'no';
    
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::YES,
            self::NO,
        ];
    }
}


