<?php

class Controller {

    private ITemplateManager $templateManager;

    function __construct(ITemplateManager $templateManager) {
        $this->templateManager = $templateManager;
    }

    public function index() {
        $this->templateManager->render("index");
    }

    public function about() {
        $this->templateManager->render("about");
    }

    public function notFound() {
        $this->templateManager->render("404");
    }
}
