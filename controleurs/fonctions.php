<?php
/**
 * Created by PhpStorm.
 * User: bastien
 * Date: 19/11/2018
 * Time: 23:20
 */


/**
 * @param $password
 * @return bool|string
 */
function hashPassword($password)
{
    return password_hash($password, PASSWORD_BCRYPT);
}