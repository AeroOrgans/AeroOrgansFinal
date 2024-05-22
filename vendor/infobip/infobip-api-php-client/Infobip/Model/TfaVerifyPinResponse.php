<?php
/**
 * TfaVerifyPinResponse
 *
 * PHP version 7.2
 *
 * @category Class
 * @package  Infobip
 * @author   Infobip Support
 * @link     https://www.infobip.com
 */

/**
 * Infobip Client API Libraries OpenAPI Specification
 *
 * OpenAPI specification containing public endpoints supported in client API libraries.
 *
 * Contact: support@infobip.com
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * Do not edit the class manually.
 */

namespace Infobip\Model;

use ArrayAccess;
use Infobip\ObjectSerializer;

/**
 * TfaVerifyPinResponse Class Doc Comment
 *
 * @category Class
 * @package  Infobip
 * @author   Infobip Support
 * @link     https://www.infobip.com
 * @implements \ArrayAccess<TKey, TValue>
 * @template TKey int|null
 * @template TValue mixed|null
 */
class TfaVerifyPinResponse implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'TfaVerifyPinResponse';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'attemptsRemaining' => 'int',
        'msisdn' => 'string',
        'pinError' => 'string',
        'pinId' => 'string',
        'verified' => 'bool'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'attemptsRemaining' => 'int32',
        'msisdn' => null,
        'pinError' => null,
        'pinId' => null,
        'verified' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'attemptsRemaining' => 'attemptsRemaining',
        'msisdn' => 'msisdn',
        'pinError' => 'pinError',
        'pinId' => 'pinId',
        'verified' => 'verified'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'attemptsRemaining' => 'setAttemptsRemaining',
        'msisdn' => 'setMsisdn',
        'pinError' => 'setPinError',
        'pinId' => 'setPinId',
        'verified' => 'setVerified'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'attemptsRemaining' => 'getAttemptsRemaining',
        'msisdn' => 'getMsisdn',
        'pinError' => 'getPinError',
        'pinId' => 'getPinId',
        'verified' => 'getVerified'
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
        return self::$openAPIModelName;
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
        $this->container['attemptsRemaining'] = $data['attemptsRemaining'] ?? null;
        $this->container['msisdn'] = $data['msisdn'] ?? null;
        $this->container['pinError'] = $data['pinError'] ?? null;
        $this->container['pinId'] = $data['pinId'] ?? null;
        $this->container['verified'] = $data['verified'] ?? null;
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
     * Gets attemptsRemaining
     *
     * @return int|null
     */
    public function getAttemptsRemaining()
    {
        return $this->container['attemptsRemaining'];
    }

    /**
     * Sets attemptsRemaining
     *
     * @param int|null $attemptsRemaining Number of remaining PIN attempts.
     *
     * @return self
     */
    public function setAttemptsRemaining($attemptsRemaining)
    {
        $this->container['attemptsRemaining'] = $attemptsRemaining;

        return $this;
    }

    /**
     * Gets msisdn
     *
     * @return string|null
     */
    public function getMsisdn()
    {
        return $this->container['msisdn'];
    }

    /**
     * Sets msisdn
     *
     * @param string|null $msisdn Phone number (`MSISDN`) to which the 2FA message was sent.
     *
     * @return self
     */
    public function setMsisdn($msisdn)
    {
        $this->container['msisdn'] = $msisdn;

        return $this;
    }

    /**
     * Gets pinError
     *
     * @return string|null
     */
    public function getPinError()
    {
        return $this->container['pinError'];
    }

    /**
     * Sets pinError
     *
     * @param string|null $pinError Indicates whether an error has occurred during PIN verification.
     *
     * @return self
     */
    public function setPinError($pinError)
    {
        $this->container['pinError'] = $pinError;

        return $this;
    }

    /**
     * Gets pinId
     *
     * @return string|null
     */
    public function getPinId()
    {
        return $this->container['pinId'];
    }

    /**
     * Sets pinId
     *
     * @param string|null $pinId Sent PIN code ID.
     *
     * @return self
     */
    public function setPinId($pinId)
    {
        $this->container['pinId'] = $pinId;

        return $this;
    }

    /**
     * Gets verified
     *
     * @return bool|null
     */
    public function getVerified()
    {
        return $this->container['verified'];
    }

    /**
     * Sets verified
     *
     * @param bool|null $verified Indicates whether the phone number (`MSISDN`) was successfully verified.
     *
     * @return self
     */
    public function setVerified($verified)
    {
        $this->container['verified'] = $verified;

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
     * @return mixed|null
     */
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
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
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    public function jsonSerialize()
    {
        return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}
