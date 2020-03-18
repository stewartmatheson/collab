<?php

namespace Collab;

class RouteMatchResult {

    private bool $isMatch;
    private array $matchValues;

    function __construct(bool $isMatch, array $matchValues) {
        $this->isMatch = $isMatch;
        $this->matchValues = $matchValues;
    }

    public function getIsMatch(): bool {
        return $this->isMatch;
    }

    public function getValues(): array {
        return $this->matchValues;
    }
}

