<?php

return [
    '/'         => 'IndexController@index',
    '/post'     => 'IndexController@post',

    '/login'    => 'UserController@login',
    '/register' => 'UserController@register',
    '/logout'   => 'UserController@logout',
];