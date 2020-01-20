<?php

namespace MayMeow\Enum;

abstract class Enum
{
    protected $name;
    protected $key;
    protected $value;

    /**
     * Name => Key
     */
    public static $namesKeys = [];

    /**
     * Key => Name
     */
    public static $keysNames = [];

    public static function cache()
    {
        $class = static::class;

        if (!isset(static::$keysNames[$class])) {
            static::$keysNames[$class] = static::map();
        }

        return static::$keysNames[$class];
    }

    public static function map()
    {
        return array_fill_keys(array_values(static::namesAndKeys()), null);
    }

    public static function namesAndKeys()
    {
        $class = static::class;

        if (!array_key_exists($class, static::$namesKeys)) {
            static::$namesKeys[$class] = (new \ReflectionClass($class))->getConstants();
        }

        return static::$namesKeys[$class];
    }

    public static function keys(): array
    {
        return array_keys(static::cache());
    }

    public static function names(): array
    {
        return array_keys(static::namesAndKeys());
    }
}