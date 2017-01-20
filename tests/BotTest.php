<?php
namespace IamBot\Tests;

use PHPUnit\Framework\TestCase;
use IamBot\UserDao;

class BotTest extends TestCase
{
    
    public function testExample(){
      
      $testMath = 1+1;
      $expected = 2;
      
      return $this->assertEquals($testMath, $expected);
    }
    
    public function testConnectBot()
    {
        // The Logic of tets here.
    }
  
    public function testGetAllUsers()
    {
        // The logic of test here.
    }
  
}