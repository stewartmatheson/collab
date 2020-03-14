<?php

use PHPUnit\Framework\TestCase;
use Collab\Route;
use Collab\Request;

final class RouteTest extends TestCase {
    public function testRouteMatchesRequest() {
        $routePath = "/posts";
        $incomingPath = "/posts";

        $route = new Route($routePath);
        $result = $route->match($incomingPath);
        $this->assertTrue($result->getIsMatch());
    }

    public function testRouteMatchWithId() {
        $routePath = "/posts/:id";
        $incomingPath = "/posts/12345";

        $route = new Route($routePath);
        $result = $route->match($incomingPath);
        $this->assertTrue($result->getIsMatch());
        $this->assertArrayHasKey('id', $result->getValues());
        $this->assertEquals($result->getValues()['id'], '12345');
    }

}
