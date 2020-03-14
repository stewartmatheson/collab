<?php

namespace Collab;

interface ITemplateManager {
    public function render(string $templateName, array $templateValues);
}

