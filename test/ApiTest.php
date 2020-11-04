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
    /**
     * Just assert something is true.
     */
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
        $_GET["ip"] = "127.0.0.1";
        $res = $this->controller->indexAction();
        $this->assertIsArray($res);
    }

    public function testIndexFail()
    {
        $_GET["ip"] = "127.hejhejhejehj.0";
        $res = $this->controller->indexAction();
        $this->assertIsArray($res);
    }

    public function testIndexNull()
    {
        $_GET["ip"] = null;
        $res = $this->controller->indexAction();
        $this->assertIsString($res);
    }
}
