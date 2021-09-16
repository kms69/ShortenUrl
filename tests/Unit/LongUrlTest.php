<?php

namespace Test\Unit;

use App\short\LongUrl;
use PHPUnit\Framework\TestCase;
use App\short\Shortner;


class LongUrlTest extends TestCase
{

    /** @test */
 public function test_code()
 {
     $code = 'S1Tx3j';
     $shortener = new LongUrl();

     $Long_url = $shortener->shortCodeToUrl($code);
     $data = json_decode(file_get_contents("list.json"), true);
     $this->assertEquals($Long_url, $data['url']);



}

}