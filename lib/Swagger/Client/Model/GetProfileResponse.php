<?php
/**
 * GetProfileResponse
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

use \ArrayAccess;
use \Call\Recorder\Client\ObjectSerializer;

/**
 * GetProfileResponse Class Doc Comment
 *
 * @category Class
 * @package  Call\Recorder\Client
 */
class GetProfileResponse implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'GetProfileResponse';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'status' => 'string',
        'code' => 'string',
        'profile' => '\Swagger\Client\Model\GetProfileResponseProfile',
        'app' => '\Swagger\Client\Model\App',
        'share_url' => 'string',
        'rate_url' => 'string',
        'credits' => 'int',
        'credits_trans' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'status' => null,
        'code' => null,
        'profile' => null,
        'app' => null,
        'share_url' => null,
        'rate_url' => null,
        'credits' => 'int64',
        'credits_trans' => 'int64'
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'status' => 'status',
        'code' => 'code',
        'profile' => 'profile',
        'app' => 'app',
        'share_url' => 'share_url',
        'rate_url' => 'rate_url',
        'credits' => 'credits',
        'credits_trans' => 'credits_trans'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'status' => 'setStatus',
        'code' => 'setCode',
        'profile' => 'setProfile',
        'app' => 'setApp',
        'share_url' => 'setShareUrl',
        'rate_url' => 'setRateUrl',
        'credits' => 'setCredits',
        'credits_trans' => 'setCreditsTrans'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'status' => 'getStatus',
        'code' => 'getCode',
        'profile' => 'getProfile',
        'app' => 'getApp',
        'share_url' => 'getShareUrl',
        'rate_url' => 'getRateUrl',
        'credits' => 'getCredits',
        'credits_trans' => 'getCreditsTrans'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    

    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['status'] = isset($data['status']) ? $data['status'] : '';
        $this->container['code'] = isset($data['code']) ? $data['code'] : '';
        $this->container['profile'] = isset($data['profile']) ? $data['profile'] : '';
        $this->container['app'] = isset($data['app']) ? $data['app'] : 'rec';
        $this->container['share_url'] = isset($data['share_url']) ? $data['share_url'] : '';
        $this->container['rate_url'] = isset($data['rate_url']) ? $data['rate_url'] : '';
        $this->container['credits'] = isset($data['credits']) ? $data['credits'] : '';
        $this->container['credits_trans'] = isset($data['credits_trans']) ? $data['credits_trans'] : '';
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['status'] === null) {
            $invalidProperties[] = "'status' can't be null";
        }
        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param string $status status
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->container['code'];
    }

    /**
     * Sets code
     *
     * @param string $code code
     *
     * @return $this
     */
    public function setCode($code)
    {
        $this->container['code'] = $code;

        return $this;
    }

    /**
     * Gets profile
     *
     * @return \Swagger\Client\Model\GetProfileResponseProfile
     */
    public function getProfile()
    {
        return $this->container['profile'];
    }

    /**
     * Sets profile
     *
     * @param \Swagger\Client\Model\GetProfileResponseProfile $profile profile
     *
     * @return $this
     */
    public function setProfile($profile)
    {
        $this->container['profile'] = $profile;

        return $this;
    }

    /**
     * Gets app
     *
     * @return \Swagger\Client\Model\App
     */
    public function getApp()
    {
        return $this->container['app'];
    }

    /**
     * Sets app
     *
     * @param \Swagger\Client\Model\App $app app
     *
     * @return $this
     */
    public function setApp($app)
    {
        $this->container['app'] = $app;

        return $this;
    }

    /**
     * Gets share_url
     *
     * @return string
     */
    public function getShareUrl()
    {
        return $this->container['share_url'];
    }

    /**
     * Sets share_url
     *
     * @param string $share_url share_url
     *
     * @return $this
     */
    public function setShareUrl($share_url)
    {
        $this->container['share_url'] = $share_url;

        return $this;
    }

    /**
     * Gets rate_url
     *
     * @return string
     */
    public function getRateUrl()
    {
        return $this->container['rate_url'];
    }

    /**
     * Sets rate_url
     *
     * @param string $rate_url rate_url
     *
     * @return $this
     */
    public function setRateUrl($rate_url)
    {
        $this->container['rate_url'] = $rate_url;

        return $this;
    }

    /**
     * Gets credits
     *
     * @return int
     */
    public function getCredits()
    {
        return $this->container['credits'];
    }

    /**
     * Sets credits
     *
     * @param int $credits credits
     *
     * @return $this
     */
    public function setCredits($credits)
    {
        $this->container['credits'] = $credits;

        return $this;
    }

    /**
     * Gets credits_trans
     *
     * @return int
     */
    public function getCreditsTrans()
    {
        return $this->container['credits_trans'];
    }

    /**
     * Sets credits_trans
     *
     * @param int $credits_trans credits_trans
     *
     * @return $this
     */
    public function setCreditsTrans($credits_trans)
    {
        $this->container['credits_trans'] = $credits_trans;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


