<?php

/**
 * View managing class
 *
 * Class View
 */
class View {

    const VIEW_PATH = 'views/';

    static $layout = 'layout.php';
    static $viewName = '';
    static $vars = [];

    /**
     * View render
     *
     * @param $name
     * @param array $vars
     */
    public static function make($name, $vars = array())
    {
        self::$viewName = $name;
        self::$vars = $vars;
        extract(self::$vars);
        include(self::VIEW_PATH . self::$layout);
    }

    /**
     * View include
     *
     * @param $view
     */
    public static function inc($view)
    {
        extract(self::$vars);
        include(self::VIEW_PATH . $view . '.php');
    }

    /**
     * Content flag
     */
    public static function content()
    {
        self::inc(self::$viewName);
    }

    /**
     * Flash-messages flag
     *
     * @return mixed
     */
    public static function flash()
    {
        return Session::getFlash();
    }
}