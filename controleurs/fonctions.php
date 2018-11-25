<?php
/**
 * Fonctions utiles aux contrôleurs
 * User: bastien
 * Date: 19/11/2018
 * Time: 23:20
 */


/**
 * Crypter mot de passe dans la base de donnée
 * @param $password
 * @return bool|string
 */
function hashPassword($password)
{
    return password_hash($password, PASSWORD_BCRYPT);
}

/**
 * Passage de paramètres entre page en POST
 * @param $url
 * @param array|null $data
 * @param null $header
 * @return mixed
 * @throws Exception
 */
function curlPost($url, array $data=null, $header=null)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);

    if (!empty($data))
    {
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }
    if (!empty($header))
    {
        curl_setopt($ch, CURLOPT_HEADER, $header);
    }
    $reponse = curl_exec($ch);
    if (curl_error($ch))
    {
        throw new \Exception(curl_error($ch));
    }
    curl_close($ch);
    return $reponse;

}

