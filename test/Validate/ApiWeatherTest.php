<?php

namespace Anax\Validate;

use Anax\DI\DIMagic;
use Anax\Response\ResponseUtility;
use PHPUnit\Framework\TestCase;

/**
 * Test features from kmom01.
 */
class ApiWeatherTest extends TestCase
{
    public function setUp()
    {
        global $di;

        $di = new DIMagic();
        $di->loadServices("config/di");

        $this->controller = new ApiWeatherController();
        $this->controller->setDi($di);
    }

    public function testIndex()
    {
        $_POST["ip"] = "8.8.8.8";
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