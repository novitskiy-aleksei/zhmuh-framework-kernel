<?php

/**
 * Model base class
 *
 * Class Model
 */
class Model {
    public static $collection = '';

    public static function getCollection()
    {
        if (empty(static::$collection)){
            throw new \Exception('Entity collection is not set');
        }
        return static::$collection;
    }

    /**
     * Mongo find wrapper
     *
     * @param $options
     * @return array
     */
    public static function find($options)
    {
        $cursor = Db::$db->selectCollection(self::getCollection())->find($options);
        $results = [];
        foreach ($cursor as $one) {
            $results[] = $one;
        }

        return $results;
    }

    /**
     * Mongo insert wrapper
     *
     * @param $item
     */
    public static function insert($item)
    {
        Db::$db->selectCollection(self::getCollection())->insert($item);
    }

    /**
     * Find all records in current collection
     *
     * @return array
     */
    public static function findAll()
    {
        return self::find([]);
    }
} 