<?php

namespace App\short;
use Exception;

class LongUrl extends Shortner
{
    public function shortCodeToUrl($code)
    {
        if ($this->validateShortCode($code) == false) {
            throw new exception("Short code does not have a valid format.");
        }

        $data = json_decode(file_get_contents("list.json"), true);


        foreach ($data as $key => $value) {
            if ($data['short_Code'] === $code) {
                return $data['url'];
            }
            throw new exception('There is no registered URL  for this short code');
        }

    }

    protected function validateShortCode($code)
    {
        $rawChars = str_replace('|', '', self::$chars);
        return preg_match("|[" . $rawChars . "]+|", $code);
    }

}
