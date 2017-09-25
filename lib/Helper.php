<?php
/**
 * Created by PhpStorm.
 * User: SAnchik
 * Date: 22.09.2017
 * Time: 15:19
 */

class Helper
{
    public static function getPostParam(string $varName)
    {
        return htmlspecialchars(trim($_POST[$varName]) ?? '');
    }
}