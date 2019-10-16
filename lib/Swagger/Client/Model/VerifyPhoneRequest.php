<?php
/**
 * VerifyPhoneRequest
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
 * VerifyPhoneRequest Class Doc Comment
 *
 * @category Class
 * @package  Call\Recorder\Client
 */
class VerifyPhoneRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'VerifyPhoneRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'token' => 'string',
        'phone' => 'string',
        'code' => 'string',
        'mcc' => 'string',
        'app' => '\Swagger\Client\Model\App',
        'device_token' => 'string',
        'device_id' => 'string',
        'device_type' => '\Swagger\Client\Model\DeviceType',
        'time_zone' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'token' => null,
        'phone' => null,
        'code' => null,
        'mcc' => null,
        'app' => null,
        'device_token' => null,
        'device_id' => null,
        'device_type' => null,
        'time_zone' => null
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
        'token' => 'token',
        'phone' => 'phone',
        'code' => 'code',
        'mcc' => 'mcc',
        'app' => 'app',
        'device_token' => 'device_token',
        'device_id' => 'device_id',
        'device_type' => 'device_type',
        'time_zone' => 'time_zone'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'token' => 'setToken',
        'phone' => 'setPhone',
        'code' => 'setCode',
        'mcc' => 'setMcc',
        'app' => 'setApp',
        'device_token' => 'setDeviceToken',
        'device_id' => 'setDeviceId',
        'device_type' => 'setDeviceType',
        'time_zone' => 'setTimeZone'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'token' => 'getToken',
        'phone' => 'getPhone',
        'code' => 'getCode',
        'mcc' => 'getMcc',
        'app' => 'getApp',
        'device_token' => 'getDeviceToken',
        'device_id' => 'getDeviceId',
        'device_type' => 'getDeviceType',
        'time_zone' => 'getTimeZone'
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
        $this->container['token'] = isset($data['token']) ? $data['token'] : '55942ee3894f51000530894';
        $this->container['phone'] = isset($data['phone']) ? $data['phone'] : '+16463742122';
        $this->container['code'] = isset($data['code']) ? $data['code'] : '';
        $this->container['mcc'] = isset($data['mcc']) ? $data['mcc'] : '300';
        $this->container['app'] = isset($data['app']) ? $data['app'] : 'rec';
        $this->container['device_token'] = isset($data['device_token']) ? $data['device_token'] : '871284c348e04a9cacab8aca6b2f3c9a';
        $this->container['device_id'] = isset($data['device_id']) ? $data['device_id'] : '871284c348e04a9cacab8aca6b2f3c9a';
        $this->container['device_type'] = isset($data['device_type']) ? $data['device_type'] : 'ios';
        $this->container['time_zone'] = isset($data['time_zone']) ? $data['time_zone'] : '10';
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['token'] === null) {
            $invalidProperties[] = "'token' can't be null";
        }
        if ($this->container['phone'] === null) {
            $invalidProperties[] = "'phone' can't be null";
        }
        if ($this->container['code'] === null) {
            $invalidProperties[] = "'code' can't be null";
        }
        if ($this->container['mcc'] === null) {
            $invalidProperties[] = "'mcc' can't be null";
        }
        if ($this->container['app'] === null) {
            $invalidProperties[] = "'app' can't be null";
        }
        if ($this->container['device_token'] === null) {
            $invalidProperties[] = "'device_token' can't be null";
        }
        if ($this->container['device_type'] === null) {
            $invalidProperties[] = "'device_type' can't be null";
        }
        if ($this->container['time_zone'] === null) {
            $invalidProperties[] = "'time_zone' can't be null";
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
     * Gets token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->container['token'];
    }

    /**
     * Sets token
     *
     * @param string $token token
     *
     * @return $this
     */
    public function setToken($token)
    {
        $this->container['token'] = $token;

        return $this;
    }

    /**
     * Gets phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->container['phone'];
    }

    /**
     * Sets phone
     *
     * @param string $phone phone
     *
     * @return $this
     */
    public function setPhone($phone)
    {
        $this->container['phone'] = $phone;

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
     * Gets mcc
     *
     * @return string
     */
    public function getMcc()
    {
        return $this->container['mcc'];
    }

    /**
     * Sets mcc
     *
     * @param string $mcc mcc
     *
     * @return $this
     */
    public function setMcc($mcc)
    {
        $this->container['mcc'] = $mcc;

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
     * Gets device_token
     *
     * @return string
     */
    public function getDeviceToken()
    {
        return $this->container['device_token'];
    }

    /**
     * Sets device_token
     *
     * @param string $device_token device_token
     *
     * @return $this
     */
    public function setDeviceToken($device_token)
    {
        $this->container['device_token'] = $device_token;

        return $this;
    }

    /**
     * Gets device_id
     *
     * @return string
     */
    public function getDeviceId()
    {
        return $this->container['device_id'];
    }

    /**
     * Sets device_id
     *
     * @param string $device_id device_id
     *
     * @return $this
     */
    public function setDeviceId($device_id)
    {
        $this->container['device_id'] = $device_id;

        return $this;
    }

    /**
     * Gets device_type
     *
     * @return \Swagger\Client\Model\DeviceType
     */
    public function getDeviceType()
    {
        return $this->container['device_type'];
    }

    /**
     * Sets device_type
     *
     * @param \Swagger\Client\Model\DeviceType $device_type device_type
     *
     * @return $this
     */
    public function setDeviceType($device_type)
    {
        $this->container['device_type'] = $device_type;

        return $this;
    }

    /**
     * Gets time_zone
     *
     * @return string
     */
    public function getTimeZone()
    {
        return $this->container['time_zone'];
    }

    /**
     * Sets time_zone
     *
     * @param string $time_zone time_zone
     *
     * @return $this
     */
    public function setTimeZone($time_zone)
    {
        $this->container['time_zone'] = $time_zone;

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


