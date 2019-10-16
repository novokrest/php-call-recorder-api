<?php
/**
 * GetProfileResponseProfile
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

use \ArrayAccess;
use \Call\Recorder\Client\ObjectSerializer;

/**
 * GetProfileResponseProfile Class Doc Comment
 *
 * @category Class
 * @package  Call\Recorder\Client
 */
class GetProfileResponseProfile implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'GetProfileResponseProfile';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'f_name' => 'string',
        'l_name' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'pic' => 'string',
        'language' => 'string',
        'is_public' => 'int',
        'play_beep' => 'int',
        'max_length' => 'int',
        'time_zone' => 'string',
        'time' => 'int',
        'pin' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'f_name' => null,
        'l_name' => null,
        'email' => null,
        'phone' => null,
        'pic' => null,
        'language' => null,
        'is_public' => null,
        'play_beep' => null,
        'max_length' => 'int64',
        'time_zone' => null,
        'time' => 'int64',
        'pin' => null
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
        'f_name' => 'f_name',
        'l_name' => 'l_name',
        'email' => 'email',
        'phone' => 'phone',
        'pic' => 'pic',
        'language' => 'language',
        'is_public' => 'is_public',
        'play_beep' => 'play_beep',
        'max_length' => 'max_length',
        'time_zone' => 'time_zone',
        'time' => 'time',
        'pin' => 'pin'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'f_name' => 'setFName',
        'l_name' => 'setLName',
        'email' => 'setEmail',
        'phone' => 'setPhone',
        'pic' => 'setPic',
        'language' => 'setLanguage',
        'is_public' => 'setIsPublic',
        'play_beep' => 'setPlayBeep',
        'max_length' => 'setMaxLength',
        'time_zone' => 'setTimeZone',
        'time' => 'setTime',
        'pin' => 'setPin'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'f_name' => 'getFName',
        'l_name' => 'getLName',
        'email' => 'getEmail',
        'phone' => 'getPhone',
        'pic' => 'getPic',
        'language' => 'getLanguage',
        'is_public' => 'getIsPublic',
        'play_beep' => 'getPlayBeep',
        'max_length' => 'getMaxLength',
        'time_zone' => 'getTimeZone',
        'time' => 'getTime',
        'pin' => 'getPin'
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
        $this->container['f_name'] = isset($data['f_name']) ? $data['f_name'] : 'f';
        $this->container['l_name'] = isset($data['l_name']) ? $data['l_name'] : 'l';
        $this->container['email'] = isset($data['email']) ? $data['email'] : 'e@mail.ru';
        $this->container['phone'] = isset($data['phone']) ? $data['phone'] : '+16463742122';
        $this->container['pic'] = isset($data['pic']) ? $data['pic'] : '';
        $this->container['language'] = isset($data['language']) ? $data['language'] : '';
        $this->container['is_public'] = isset($data['is_public']) ? $data['is_public'] : '';
        $this->container['play_beep'] = isset($data['play_beep']) ? $data['play_beep'] : '';
        $this->container['max_length'] = isset($data['max_length']) ? $data['max_length'] : '';
        $this->container['time_zone'] = isset($data['time_zone']) ? $data['time_zone'] : '10';
        $this->container['time'] = isset($data['time']) ? $data['time'] : '';
        $this->container['pin'] = isset($data['pin']) ? $data['pin'] : '';
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

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
     * Gets f_name
     *
     * @return string
     */
    public function getFName()
    {
        return $this->container['f_name'];
    }

    /**
     * Sets f_name
     *
     * @param string $f_name f_name
     *
     * @return $this
     */
    public function setFName($f_name)
    {
        $this->container['f_name'] = $f_name;

        return $this;
    }

    /**
     * Gets l_name
     *
     * @return string
     */
    public function getLName()
    {
        return $this->container['l_name'];
    }

    /**
     * Sets l_name
     *
     * @param string $l_name l_name
     *
     * @return $this
     */
    public function setLName($l_name)
    {
        $this->container['l_name'] = $l_name;

        return $this;
    }

    /**
     * Gets email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->container['email'];
    }

    /**
     * Sets email
     *
     * @param string $email email
     *
     * @return $this
     */
    public function setEmail($email)
    {
        $this->container['email'] = $email;

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
     * Gets pic
     *
     * @return string
     */
    public function getPic()
    {
        return $this->container['pic'];
    }

    /**
     * Sets pic
     *
     * @param string $pic pic
     *
     * @return $this
     */
    public function setPic($pic)
    {
        $this->container['pic'] = $pic;

        return $this;
    }

    /**
     * Gets language
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->container['language'];
    }

    /**
     * Sets language
     *
     * @param string $language language
     *
     * @return $this
     */
    public function setLanguage($language)
    {
        $this->container['language'] = $language;

        return $this;
    }

    /**
     * Gets is_public
     *
     * @return int
     */
    public function getIsPublic()
    {
        return $this->container['is_public'];
    }

    /**
     * Sets is_public
     *
     * @param int $is_public is_public
     *
     * @return $this
     */
    public function setIsPublic($is_public)
    {
        $this->container['is_public'] = $is_public;

        return $this;
    }

    /**
     * Gets play_beep
     *
     * @return int
     */
    public function getPlayBeep()
    {
        return $this->container['play_beep'];
    }

    /**
     * Sets play_beep
     *
     * @param int $play_beep play_beep
     *
     * @return $this
     */
    public function setPlayBeep($play_beep)
    {
        $this->container['play_beep'] = $play_beep;

        return $this;
    }

    /**
     * Gets max_length
     *
     * @return int
     */
    public function getMaxLength()
    {
        return $this->container['max_length'];
    }

    /**
     * Sets max_length
     *
     * @param int $max_length max_length
     *
     * @return $this
     */
    public function setMaxLength($max_length)
    {
        $this->container['max_length'] = $max_length;

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
     * Gets time
     *
     * @return int
     */
    public function getTime()
    {
        return $this->container['time'];
    }

    /**
     * Sets time
     *
     * @param int $time time
     *
     * @return $this
     */
    public function setTime($time)
    {
        $this->container['time'] = $time;

        return $this;
    }

    /**
     * Gets pin
     *
     * @return string
     */
    public function getPin()
    {
        return $this->container['pin'];
    }

    /**
     * Sets pin
     *
     * @param string $pin pin
     *
     * @return $this
     */
    public function setPin($pin)
    {
        $this->container['pin'] = $pin;

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


