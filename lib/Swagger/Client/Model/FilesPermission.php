<?php
/**
 * FilesPermission
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


namespace Swagger\Client\Model;
use \Call\Recorder\Client\ObjectSerializer;

/**
 * FilesPermission Class Doc Comment
 *
 * @category Class
 * @package  Call\Recorder\Client
 */
class FilesPermission
{
    /**
     * Possible values of this enum
     */
    const _PUBLIC = 'public';
    const _PRIVATE = 'private';
    
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::_PUBLIC,
            self::_PRIVATE,
        ];
    }
}


