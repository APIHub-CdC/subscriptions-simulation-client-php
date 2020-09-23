<?php

namespace SubscripcionSimulacionClientPhp\Client\Model;

use \ArrayAccess;
use \SubscripcionSimulacionClientPhp\Client\ObjectSerializer;

class Subscription implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;
    
    protected static $apihubModelName = 'Subscription';
    
    protected static $apihubTypes = [
        'event_type' => 'string',
        'web_hook_url' => 'string',
        'enrollment_id' => 'string',
        'subscription_id' => 'string',
        'date_time' => '\DateTime'
    ];
    
    protected static $apihubFormats = [
        'event_type' => null,
        'web_hook_url' => null,
        'enrollment_id' => 'uuid',
        'subscription_id' => 'uuid',
        'date_time' => 'date-time'
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
        'event_type' => 'eventType',
        'web_hook_url' => 'webHookUrl',
        'enrollment_id' => 'enrollmentId',
        'subscription_id' => 'subscriptionId',
        'date_time' => 'dateTime'
    ];
    
    protected static $setters = [
        'event_type' => 'setEventType',
        'web_hook_url' => 'setWebHookUrl',
        'enrollment_id' => 'setEnrollmentId',
        'subscription_id' => 'setSubscriptionId',
        'date_time' => 'setDateTime'
    ];
    
    protected static $getters = [
        'event_type' => 'getEventType',
        'web_hook_url' => 'getWebHookUrl',
        'enrollment_id' => 'getEnrollmentId',
        'subscription_id' => 'getSubscriptionId',
        'date_time' => 'getDateTime'
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
        $this->container['event_type'] = isset($data['event_type']) ? $data['event_type'] : null;
        $this->container['web_hook_url'] = isset($data['web_hook_url']) ? $data['web_hook_url'] : null;
        $this->container['enrollment_id'] = isset($data['enrollment_id']) ? $data['enrollment_id'] : null;
        $this->container['subscription_id'] = isset($data['subscription_id']) ? $data['subscription_id'] : null;
        $this->container['date_time'] = isset($data['date_time']) ? $data['date_time'] : null;
    }
    
    public function listInvalidProperties()
    {
        $invalidProperties = [];
        if ($this->container['event_type'] === null) {
            $invalidProperties[] = "'event_type' can't be null";
        }
        if ($this->container['web_hook_url'] === null) {
            $invalidProperties[] = "'web_hook_url' can't be null";
        }
        if ($this->container['enrollment_id'] === null) {
            $invalidProperties[] = "'enrollment_id' can't be null";
        }
        return $invalidProperties;
    }
    
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }
    
    public function getEventType()
    {
        return $this->container['event_type'];
    }
    
    public function setEventType($event_type)
    {
        $this->container['event_type'] = $event_type;
        return $this;
    }
    
    public function getWebHookUrl()
    {
        return $this->container['web_hook_url'];
    }
    
    public function setWebHookUrl($web_hook_url)
    {
        $this->container['web_hook_url'] = $web_hook_url;
        return $this;
    }
    
    public function getEnrollmentId()
    {
        return $this->container['enrollment_id'];
    }
    
    public function setEnrollmentId($enrollment_id)
    {
        $this->container['enrollment_id'] = $enrollment_id;
        return $this;
    }
    
    public function getSubscriptionId()
    {
        return $this->container['subscription_id'];
    }
    
    public function setSubscriptionId($subscription_id)
    {
        $this->container['subscription_id'] = $subscription_id;
        return $this;
    }
    
    public function getDateTime()
    {
        return $this->container['date_time'];
    }
    
    public function setDateTime($date_time)
    {
        $this->container['date_time'] = $date_time;
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
