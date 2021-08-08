<?php

namespace App\Enums;

class Enum
{

    protected $value;

    public function __construct($value)
    {
        if ($value instanceof static) {
            $value = $value->getValue();
        }
        if (!$this->isValid($value)) {
            throw new \UnexpectedValueException("Value '$value' is not part of the enum " . static::class);

        }
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

    public static function toArray()
    {
        $class = static::class;
        $reflection = new \ReflectionClass($class);
        return $reflection->getConstants();
    }

    public static function values()
    {
        $values = array();
        foreach (static::toArray() as $key => $value) {
            $values[$key] = new static($value);
        }
        return $values;
    }

    public static function isValid($value)
    {
        return \in_array($value, static::toArray(), true);
    }
}
