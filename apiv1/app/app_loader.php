<?php
/**
 * Created by PhpStorm.
 * User: enterprise
 * Date: 7/18/16
 * Time: 11:02 AM
 */
$base = __DIR__ . '/../app/';

$folders = [
    'lib',
    'model',
    'route'
];

foreach($folders as $f)
{
    foreach (glob($base . "$f/*.php") as $filename)
    {
        require $filename;
    }
}