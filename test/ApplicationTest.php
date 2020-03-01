<?php

use PHPUnit\Framework\TestCase;
use Collab\Application;
use Collab\Controller;
use Collab\Framework\ITemplateManager;

final class ApplicationTest extends TestCase {

    public function testDoesRouteToCorrectPlace() {
        $templateMock = $this
            ->getMockBuilder(ITemplateManager::class)
            ->setMethods(["render"])
            ->getMock();

        $templateMock
            ->expects($this->once())
            ->method('render')
            ->with('index');
            
        $controller = new Controller($templateMock);
        $subject = new Application($controller);
        $subject->run("/");
    }

}
