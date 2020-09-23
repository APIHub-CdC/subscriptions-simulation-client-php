<?php

namespace SubscripcionSimulacionClientPhp\Client\Model;

use \ArrayAccess;
use \SubscripcionSimulacionClientPhp\Client\ObjectSerializer;

class SubscriptionsMetadata implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;
    
    protected static $apihubModelName = 'SubscriptionsMetadata';
    
    protected static $apihubTypes = [
        '_metadata' => '\SubscripcionSimulacionClientPhp\Client\Model\Metadata',
        'subscriptions' => '\SubscripcionSimulacionClientPhp\Client\Model\Subscription[]'
    ];
    
    protected static $apihubFormats = [
        '_metadata' => null,
        'subscriptions' => null
    ];
    
    public static function apihubTypes()
    {
        return self::$apihubTypes;
    }
    
    public static function apihubFormats()
    {
        return self::$apihubFormats;
    }
    
    protected static $attributeMap = [
        '_metadata' => '_metadata',
        'subscriptions' => 'subscriptions'
    ];
    
    protected static $setters = [
        '_metadata' => 'setMetadata',
        'subscriptions' => 'setSubscriptions'
    ];
    
    protected static $getters = [
        '_metadata' => 'getMetadata',
        'subscriptions' => 'getSubscriptions'
    ];
    
    public static function attributeMap()
    {
        return self::$attributeMap;
    }
    
    public static function setters()
    {
        return self::$setters;
    }
    
    public static function getters()
    {
        return self::$getters;
    }
    
    public function getModelName()
    {
        return self::$apihubModelName;
    }
    
    
    
    protected $container = [];
    
    public function __construct(array $data = null)
    {
        $this->container['_metadata'] = isset($data['_metadata']) ? $data['_metadata'] : null;
        $this->container['subscriptions'] = isset($data['subscriptions']) ? $data['subscriptions'] : null;
    }
    
    public function listInvalidProperties()
    {
        $invalidProperties = [];
        return $invalidProperties;
    }
    
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }
    
    public function getMetadata()
    {
        return $this->container['_metadata'];
    }
    
    public function setMetadata($_metadata)
    {
        $this->container['_metadata'] = $_metadata;
        return $this;
    }
    
    public function getSubscriptions()
    {
        return $this->container['subscriptions'];
    }
    
    public function setSubscriptions($subscriptions)
    {
        $this->container['subscriptions'] = $subscriptions;
        return $this;
    }
    
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }
    
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }
    
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }
    
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }
    
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) {
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}
