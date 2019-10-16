<?php
/**
 * GetFilesResponseFile
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
 * GetFilesResponseFile Class Doc Comment
 *
 * @category Class
 * @package  Call\Recorder\Client
 */
class GetFilesResponseFile implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'GetFilesResponseFile';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'id' => 'int',
        'access_number' => 'string',
        'name' => 'string',
        'f_name' => 'string',
        'l_name' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'notes' => 'string',
        'meta' => 'string',
        'source' => 'string',
        'url' => 'string',
        'credits' => 'string',
        'duration' => 'string',
        'time' => 'string',
        'share_url' => 'string',
        'download_url' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'id' => 'int64',
        'access_number' => null,
        'name' => null,
        'f_name' => null,
        'l_name' => null,
        'email' => null,
        'phone' => null,
        'notes' => null,
        'meta' => null,
        'source' => null,
        'url' => null,
        'credits' => null,
        'duration' => null,
        'time' => null,
        'share_url' => null,
        'download_url' => null
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
        'id' => 'id',
        'access_number' => 'access_number',
        'name' => 'name',
        'f_name' => 'f_name',
        'l_name' => 'l_name',
        'email' => 'email',
        'phone' => 'phone',
        'notes' => 'notes',
        'meta' => 'meta',
        'source' => 'source',
        'url' => 'url',
        'credits' => 'credits',
        'duration' => 'duration',
        'time' => 'time',
        'share_url' => 'share_url',
        'download_url' => 'download_url'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'access_number' => 'setAccessNumber',
        'name' => 'setName',
        'f_name' => 'setFName',
        'l_name' => 'setLName',
        'email' => 'setEmail',
        'phone' => 'setPhone',
        'notes' => 'setNotes',
        'meta' => 'setMeta',
        'source' => 'setSource',
        'url' => 'setUrl',
        'credits' => 'setCredits',
        'duration' => 'setDuration',
        'time' => 'setTime',
        'share_url' => 'setShareUrl',
        'download_url' => 'setDownloadUrl'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'access_number' => 'getAccessNumber',
        'name' => 'getName',
        'f_name' => 'getFName',
        'l_name' => 'getLName',
        'email' => 'getEmail',
        'phone' => 'getPhone',
        'notes' => 'getNotes',
        'meta' => 'getMeta',
        'source' => 'getSource',
        'url' => 'getUrl',
        'credits' => 'getCredits',
        'duration' => 'getDuration',
        'time' => 'getTime',
        'share_url' => 'getShareUrl',
        'download_url' => 'getDownloadUrl'
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
        $this->container['id'] = isset($data['id']) ? $data['id'] : '';
        $this->container['access_number'] = isset($data['access_number']) ? $data['access_number'] : '';
        $this->container['name'] = isset($data['name']) ? $data['name'] : 'n';
        $this->container['f_name'] = isset($data['f_name']) ? $data['f_name'] : 'f';
        $this->container['l_name'] = isset($data['l_name']) ? $data['l_name'] : 'l';
        $this->container['email'] = isset($data['email']) ? $data['email'] : 'e@mail.ru';
        $this->container['phone'] = isset($data['phone']) ? $data['phone'] : '+16463742122';
        $this->container['notes'] = isset($data['notes']) ? $data['notes'] : 'n';
        $this->container['meta'] = isset($data['meta']) ? $data['meta'] : '';
        $this->container['source'] = isset($data['source']) ? $data['source'] : '';
        $this->container['url'] = isset($data['url']) ? $data['url'] : '';
        $this->container['credits'] = isset($data['credits']) ? $data['credits'] : '';
        $this->container['duration'] = isset($data['duration']) ? $data['duration'] : '';
        $this->container['time'] = isset($data['time']) ? $data['time'] : '';
        $this->container['share_url'] = isset($data['share_url']) ? $data['share_url'] : '';
        $this->container['download_url'] = isset($data['download_url']) ? $data['download_url'] : '';
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
     * Gets id
     *
     * @return int
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param int $id id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets access_number
     *
     * @return string
     */
    public function getAccessNumber()
    {
        return $this->container['access_number'];
    }

    /**
     * Sets access_number
     *
     * @param string $access_number access_number
     *
     * @return $this
     */
    public function setAccessNumber($access_number)
    {
        $this->container['access_number'] = $access_number;

        return $this;
    }

    /**
     * Gets name
     *
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string $name name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
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
     * Gets notes
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->container['notes'];
    }

    /**
     * Sets notes
     *
     * @param string $notes notes
     *
     * @return $this
     */
    public function setNotes($notes)
    {
        $this->container['notes'] = $notes;

        return $this;
    }

    /**
     * Gets meta
     *
     * @return string
     */
    public function getMeta()
    {
        return $this->container['meta'];
    }

    /**
     * Sets meta
     *
     * @param string $meta meta
     *
     * @return $this
     */
    public function setMeta($meta)
    {
        $this->container['meta'] = $meta;

        return $this;
    }

    /**
     * Gets source
     *
     * @return string
     */
    public function getSource()
    {
        return $this->container['source'];
    }

    /**
     * Sets source
     *
     * @param string $source source
     *
     * @return $this
     */
    public function setSource($source)
    {
        $this->container['source'] = $source;

        return $this;
    }

    /**
     * Gets url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->container['url'];
    }

    /**
     * Sets url
     *
     * @param string $url url
     *
     * @return $this
     */
    public function setUrl($url)
    {
        $this->container['url'] = $url;

        return $this;
    }

    /**
     * Gets credits
     *
     * @return string
     */
    public function getCredits()
    {
        return $this->container['credits'];
    }

    /**
     * Sets credits
     *
     * @param string $credits credits
     *
     * @return $this
     */
    public function setCredits($credits)
    {
        $this->container['credits'] = $credits;

        return $this;
    }

    /**
     * Gets duration
     *
     * @return string
     */
    public function getDuration()
    {
        return $this->container['duration'];
    }

    /**
     * Sets duration
     *
     * @param string $duration duration
     *
     * @return $this
     */
    public function setDuration($duration)
    {
        $this->container['duration'] = $duration;

        return $this;
    }

    /**
     * Gets time
     *
     * @return string
     */
    public function getTime()
    {
        return $this->container['time'];
    }

    /**
     * Sets time
     *
     * @param string $time time
     *
     * @return $this
     */
    public function setTime($time)
    {
        $this->container['time'] = $time;

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
     * Gets download_url
     *
     * @return string
     */
    public function getDownloadUrl()
    {
        return $this->container['download_url'];
    }

    /**
     * Sets download_url
     *
     * @param string $download_url download_url
     *
     * @return $this
     */
    public function setDownloadUrl($download_url)
    {
        $this->container['download_url'] = $download_url;

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


