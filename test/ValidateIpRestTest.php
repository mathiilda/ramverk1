<?php

namespace Anax\Validate;

use Anax\DI\DIMagic;
use Anax\Response\ResponseUtility;
use PHPUnit\Framework\TestCase;

/**
 * Test features from kmom01.
 */
class ValidateIpRestTest extends TestCase
{
    public function setUp()
    {
        global $di;

        $di = new DIMagic();
        $di->loadServices("config/di");

        $this->controller = new ValidateIpRESTController();
        $this->controller->setDi($di);
    }

    public function testIndex()
    {
        $res = $this->controller->indexAction();
        $this->assertInstanceOf(ResponseUtility::class, $res);
    }

    public function testShowResult()
    {
        $_POST["ip"] = "127.0.0.1";
        $res = $this->controller->showResultAction();
        $this->assertInstanceOf(ResponseUtility::class, $res);
    }

    public function testShowResultIp6()
    {
        $_POST["ip"] = "2001:0db8:85a3:0000:0000:8a2e:0370:7334";
        $res = $this->controller->showResultAction();
        $this->assertInstanceOf(ResponseUtility::class, $res);
    }

    public function testShowResultFail()
    {
        $_POST["ip"] = "127.0.0.1hejhej";
        $res = $this->controller->showResultAction();
        $this->assertInstanceOf(ResponseUtility::class, $res);
    }
}
