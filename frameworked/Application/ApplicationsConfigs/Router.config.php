<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12.04.14
 * Time: 3:04
 */

return array(
    'default'=>array(
        'Controller' => 'DefaultController',
        'Action' => 'DefaultAction'
    ),
    '/welcome/:name' => array(
        'Controller' => "Welcome",
        'Action' => "welcomeAction",
        'Variables' => array(
            'name' => "required|max[10]|min[5]|string"
        )
    ),
    '/welcome/index/:name' => array(
        'Controller' => "Welcome",
        'Action' => "welcomeName",
        'Variables' => array(
            'name' => "required|max[10]|min[5]|string"
        )
    )
);