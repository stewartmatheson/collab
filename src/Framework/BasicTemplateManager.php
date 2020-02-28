<?php

class BasicTemplateManager implements ITemplateManager {
    public function render(string $templateName) {
        echo "Hello from the basic template manager " . $templateName;
    }
}
