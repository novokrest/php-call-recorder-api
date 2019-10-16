<?php
/**
 * UpdateFileRequest
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
 * UpdateFileRequest Class Doc Comment
 *
 * @category Class
 * @package  Call\Recorder\Client
 */
class UpdateFileRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'UpdateFileRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'api_key' => 'string',
        'id' => 'int',
        'f_name' => 'string',
        'l_name' => 'string',
        'notes' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'tags' => 'string',
        'folder_id' => 'int',
        'name' => 'string',
        'remind_days' => 'string',
        'remind_date' => '\DateTime'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'api_key' => null,
        'id' => 'int64',
        'f_name' => null,
        'l_name' => null,
        'notes' => null,
        'email' => null,
        'phone' => null,
        'tags' => null,
        'folder_id' => 'int64',
        'name' => null,
        'remind_days' => null,
        'remind_date' => 'date-time'
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
        'api_key' => 'api_key',
        'id' => 'id',
        'f_name' => 'f_name',
        'l_name' => 'l_name',
        'notes' => 'notes',
        'email' => 'email',
        'phone' => 'phone',
        'tags' => 'tags',
        'folder_id' => 'folder_id',
        'name' => 'name',
        'remind_days' => 'remind_days',
        'remind_date' => 'remind_date'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'api_key' => 'setApiKey',
        'id' => 'setId',
        'f_name' => 'setFName',
        'l_name' => 'setLName',
        'notes' => 'setNotes',
        'email' => 'setEmail',
        'phone' => 'setPhone',
        'tags' => 'setTags',
        'folder_id' => 'setFolderId',
        'name' => 'setName',
        'remind_days' => 'setRemindDays',
        'remind_date' => 'setRemindDate'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'api_key' => 'getApiKey',
        'id' => 'getId',
        'f_name' => 'getFName',
        'l_name' => 'getLName',
        'notes' => 'getNotes',
        'email' => 'getEmail',
        'phone' => 'getPhone',
        'tags' => 'getTags',
        'folder_id' => 'getFolderId',
        'name' => 'getName',
        'remind_days' => 'getRemindDays',
        'remind_date' => 'getRemindDate'
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
        $this->container['api_key'] = isset($data['api_key']) ? $data['api_key'] : '';
        $this->container['id'] = isset($data['id']) ? $data['id'] : '';
        $this->container['f_name'] = isset($data['f_name']) ? $data['f_name'] : 'f';
        $this->container['l_name'] = isset($data['l_name']) ? $data['l_name'] : 'l';
        $this->container['notes'] = isset($data['notes']) ? $data['notes'] : 'n';
        $this->container['email'] = isset($data['email']) ? $data['email'] : 'e@mail.ru';
        $this->container['phone'] = isset($data['phone']) ? $data['phone'] : '+16463742122';
        $this->container['tags'] = isset($data['tags']) ? $data['tags'] : 't';
        $this->container['folder_id'] = isset($data['folder_id']) ? $data['folder_id'] : 0;
        $this->container['name'] = isset($data['name']) ? $data['name'] : 'n';
        $this->container['remind_days'] = isset($data['remind_days']) ? $data['remind_days'] : '10';
        $this->container['remind_date'] = isset($data['remind_date']) ? $data['remind_date'] : '2019-09-03T21:11:51.824121+03:00';
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['api_key'] === null) {
            $invalidProperties[] = "'api_key' can't be null";
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
     * Gets api_key
     *
     * @return string
     */
    public function getApiKey()
    {
        return $this->container['api_key'];
    }

    /**
     * Sets api_key
     *
     * @param string $api_key api_key
     *
     * @return $this
     */
    public function setApiKey($api_key)
    {
        $this->container['api_key'] = $api_key;

        return $this;
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
     * Gets tags
     *
     * @return string
     */
    public function getTags()
    {
        return $this->container['tags'];
    }

    /**
     * Sets tags
     *
     * @param string $tags tags
     *
     * @return $this
     */
    public function setTags($tags)
    {
        $this->container['tags'] = $tags;

        return $this;
    }

    /**
     * Gets folder_id
     *
     * @return int
     */
    public function getFolderId()
    {
        return $this->container['folder_id'];
    }

    /**
     * Sets folder_id
     *
     * @param int $folder_id folder_id
     *
     * @return $this
     */
    public function setFolderId($folder_id)
    {
        $this->container['folder_id'] = $folder_id;

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
     * Gets remind_days
     *
     * @return string
     */
    public function getRemindDays()
    {
        return $this->container['remind_days'];
    }

    /**
     * Sets remind_days
     *
     * @param string $remind_days remind_days
     *
     * @return $this
     */
    public function setRemindDays($remind_days)
    {
        $this->container['remind_days'] = $remind_days;

        return $this;
    }

    /**
     * Gets remind_date
     *
     * @return \DateTime
     */
    public function getRemindDate()
    {
        return $this->container['remind_date'];
    }

    /**
     * Sets remind_date
     *
     * @param \DateTime $remind_date remind_date
     *
     * @return $this
     */
    public function setRemindDate($remind_date)
    {
        $this->container['remind_date'] = $remind_date;

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


