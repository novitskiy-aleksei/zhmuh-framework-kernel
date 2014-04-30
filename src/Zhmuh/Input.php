<?php

/**
 * POST/GET input wrapper
 *
 * Class Input
 */
class Input {

    /**
     * Retrieve $_GET value
     *
     * @param $key
     * @param null $default
     * @return null
     */
    public static function get($key, $default = null)
    {
        return isset($_GET[$key]) ? $_POST[$key] : $default;
    }

    /**
     * Retrieve $_post value
     *
     * @param $key
     * @param null $default
     * @return null
     */
    public static function post($key, $default = null)
    {
        return isset($_POST[$key]) ? $_POST[$key] : $default;
    }

    /**
     * Is post data received
     *
     * @return bool
     */
    public static function isPost()
    {
        return !empty($_POST);
    }

    /**
     * Is get data received
     *
     * @return bool
     */
    public static function isGet()
    {
        return !empty($_GET);
    }
} 