<?php

namespace App\short;

use Exception;

class Shortner
{
    protected static $chars = "abcdfghjkmnpqrstvwxyz|ABCDFGHJKLMNPQRSTVWXYZ|0123456789";
    protected static $codeLength = 6;
    public $filename = "list.json";


    public function urlToShortCode(string $url)
    {
        if ($this->validateUrlFormat($url) == false) {
            throw new exception("URL does not have a valid format.");
        }
        $shortcode = $this->urlExistsInJS($url);
        if ($shortcode == false) {
            return $this->createShortCode($url);

        }

    }


    protected function createShortCode(string $url)
    {
        $fp = fopen('list.json', 'w+');
        $shortCode = $this->generateRandomString(self::$codeLength);

        $array = array('url' => $url, 'short_Code' => $shortCode);
        fwrite($fp, json_encode($array, JSON_PRETTY_PRINT));
        fclose($fp);
        return $shortCode;


    }


    public function urlExistsInJS($url)
    {
        $fj = json_decode(file_get_contents("list.json"), true);
        if (array_key_exists('url', $fj) && $fj['url'] === $url) {
            throw new exception ('URL already exists');

        }

        return false;

    }


    protected function validateUrlFormat($url)
    {
        return filter_var($url, FILTER_VALIDATE_URL);
        if ($this->validateUrlFormat($url) == false) {
            throw new exception("URL does not have a valid format.");
        }

    }


    protected function generateRandomString($length = 6)
    {
        $sets = explode('|', self::$chars);
        $all = '';
        $randString = '';
        foreach ($sets as $set) {
            $randString .= $set[array_rand(str_split($set))];
            $all .= $set;
        }
        $all = str_split($all);
        for ($i = 0; $i < $length - count($sets); $i++) {
            $randString .= $all[array_rand($all)];
        }
        $randString = str_shuffle($randString);
        return $randString;
    }


}