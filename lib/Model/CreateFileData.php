<?php
/**
 * CreateFileData
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
 * CreateFileData Class Doc Comment
 *
 * @category Class
 * @package  Call\Recorder\Client
 */
class CreateFileData implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'CreateFileData';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'name' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'l_name' => 'string',
        'f_name' => 'string',
        'notes' => 'string',
        'tags' => 'string',
        'source' => 'string',
        'remind_days' => 'string',
        'remind_date' => '\DateTime'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'name' => null,
        'email' => null,
        'phone' => null,
        'l_name' => null,
        'f_name' => null,
        'notes' => null,
        'tags' => null,
        'source' => null,
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
        'name' => 'name',
        'email' => 'email',
        'phone' => 'phone',
        'l_name' => 'l_name',
        'f_name' => 'f_name',
        'notes' => 'notes',
        'tags' => 'tags',
        'source' => 'source',
        'remind_days' => 'remind_days',
        'remind_date' => 'remind_date'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'name' => 'setName',
        'email' => 'setEmail',
        'phone' => 'setPhone',
        'l_name' => 'setLName',
        'f_name' => 'setFName',
        'notes' => 'setNotes',
        'tags' => 'setTags',
        'source' => 'setSource',
        'remind_days' => 'setRemindDays',
        'remind_date' => 'setRemindDate'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'name' => 'getName',
        'email' => 'getEmail',
        'phone' => 'getPhone',
        'l_name' => 'getLName',
        'f_name' => 'getFName',
        'notes' => 'getNotes',
        'tags' => 'getTags',
        'source' => 'getSource',
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

    const SOURCE__0 = '0';
    const SOURCE__1 = '1';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getSourceAllowableValues()
    {
        return [
            self::SOURCE__0,
            self::SOURCE__1,
        ];
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
        $this->container['name'] = isset($data['name']) ? $data['name'] : 'test-file';
        $this->container['email'] = isset($data['email']) ? $data['email'] : 'e@mail.com';
        $this->container['phone'] = isset($data['phone']) ? $data['phone'] : '+16463742122';
        $this->container['l_name'] = isset($data['l_name']) ? $data['l_name'] : 'l';
        $this->container['f_name'] = isset($data['f_name']) ? $data['f_name'] : 'f';
        $this->container['notes'] = isset($data['notes']) ? $data['notes'] : 'n';
        $this->container['tags'] = isset($data['tags']) ? $data['tags'] : 't';
        $this->container['source'] = isset($data['source']) ? $data['source'] : '0';
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

        $allowedValues = $this->getSourceAllowableValues();
        if (!is_null($this->container['source']) && !in_array($this->container['source'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'source', must be one of '%s'",
                implode("', '", $allowedValues)
            );
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
        $allowedValues = $this->getSourceAllowableValues();
        if (!is_null($source) && !in_array($source, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'source', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['source'] = $source;

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


