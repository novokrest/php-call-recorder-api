<?php
/**
 * App
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
 * App Class Doc Comment
 *
 * @category Class
 * @package  Call\Recorder\Client
 */
class App
{
    /**
     * Possible values of this enum
     */
    const FREE = 'free';
    const REM = 'rem';
    const REC = 'rec';
    
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::FREE,
            self::REM,
            self::REC,
        ];
    }
}


