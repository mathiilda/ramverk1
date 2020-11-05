<?php

namespace Anax\Validate;

use Anax\DI\DIMagic;
use Anax\Response\ResponseUtility;
use PHPUnit\Framework\TestCase;

/**
 * Test features from kmom01.
 */
class ApiTest extends TestCase
{
    public function setUp()
    {
        global $di;

        $di = new DIMagic();
        $di->loadServices("config/di");

        $this->controller = new ApiController();
        $this->controller->setDi($di);
    }

    public function testIndex()
    {
        $_POST["ip"] = "127.0.0.1";
        $res = $this->controller->indexAction();
        $this->assertIsArray($res);
    }

    public function testIndexIp6()
    {
        $_POST["ip"] = "2001:0db8:85a3:0000:0000:8a2e:0370:7334";
        $res = $this->controller->indexAction();
        $this->assertIsArray($res);
    }

    public function testIndexFail()
    {
        $_POST["ip"] = "127.hejhejhejehj.0";
        $res = $this->controller->indexAction();
        $this->assertIsArray($res);
    }

    public function testIndexNull()
    {
        $_POST["ip"] = null;
        $res = $this->controller->indexAction();
        $this->assertIsString($res);
    }
}
