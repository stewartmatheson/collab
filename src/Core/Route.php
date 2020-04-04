<?php

namespace Collab\Core;

use Collab\Core\Request;
use Collab\Core\RouteMatchResult;

class MatchPathPartResult {

    private string $name;
    private string $value;
    private bool $hasValue;
    private bool $isMatch;

    function __construct (bool $isMatch) {
        $this->isMatch = $isMatch;
        $this->hasValue = false;
    }

    public static function withValue (
        bool $isMatch, string $name, string $value
    ): MatchPathPartResult {

        $instance = new self($isMatch);
        $instance->setName($name);
        $instance->setValue($value);
        $instance->setHasValue(true);
        return $instance;
    }

    public function getIsMatch(): bool {
        return $this->isMatch;
    }

    public function getHasValue(): bool {
        return $this->hasValue;
    }

    public function getValue(): string {
        return $this->value;
    }
    
    public function getName(): string {
        return $this->name;
    }

    protected function setName(string $name) {
        $this->name = $name;
    }

    protected function setValue(string $value) {
        $this->value = $value; 
    }

    protected function setHasValue(bool $hasValue) {
        $this->hasValue = $hasValue; 
    }
}

class Route {

    private string $pathMatcher;
    private string $viewName;
    private bool $isSecure;

    function __construct(string $pathMatcher, string $viewName, bool $isSecure) {
        $this->pathMatcher = $pathMatcher;
        $this->viewName = $viewName;
        $this->isSecure = $isSecure;
    }

    public function getIsSecure(): bool {
        return $this->isSecure;
    }

    public function getViewName() {
        return $this->viewName;
    }

    public function match(string $incomingPath): RouteMatchResult {
        $incomingPathParts = explode("/", $incomingPath);
        $matchPathParts = explode("/", $this->pathMatcher);

        if (count($incomingPathParts) !== count($matchPathParts)) {
            return new RouteMatchResult(false, []);
        }
        
        $routePathValues = array();
        
        for($i = 0; $i < count($incomingPathParts); $i++) {
            $matchPartResult = $this->matchPathPart(
                $incomingPathParts[$i], $matchPathParts[$i]
            );

            if (!$matchPartResult->getIsMatch()) {
                return new RouteMatchResult(false, []);
            }

            if ($matchPartResult->getHasValue()) {
                $routePathValues[$matchPartResult->getName()] = 
                    $matchPartResult->getValue();
            }
        }

        return new RouteMatchResult(true, $routePathValues);
    }

    private function matchPathPart($incomingPathPart, $matchPathPart): MatchPathPartResult {
        if(substr($matchPathPart, 0, 1) === ":") {
            return MatchPathPartResult::withValue(
                true,
                substr($matchPathPart, 1, strlen($matchPathPart)),
                $incomingPathPart 
            );
        }

        if ($matchPathPart === $incomingPathPart) {
            return new MatchPathPartResult(true);
        }

        return new MatchPathPartResult(false);
    }
}
