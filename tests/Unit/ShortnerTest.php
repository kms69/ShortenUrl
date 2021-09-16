<?php

namespace Test\Unit;

use App\short\LongUrl;
use PHPUnit\Framework\TestCase;
use App\short\Shortner;



class ShortnerTest extends TestCase
{

    /** @test */
 public function test_url()
 {
     $url = 'https://www.w66schools.com/';
     $shortener = new Shortner();

     $shortCode = $shortener->urlToShortCode($url);
     $data = json_decode(file_get_contents("list.json"), true);
     $this->assertEquals($shortCode, $data['short_Code']);



}

}