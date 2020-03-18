<?php

namespace Collab\Core;

interface ITemplateManager {
    public function render(string $templateName, array $templateValues);
}

