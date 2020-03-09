<?php

namespace Collab;

use Collab\ITemplateManager;

class Controller {

    private ITemplateManager $templateManager;
    private PostsService $postsService;

    function __construct(ITemplateManager $templateManager, PostsService $postsService) {
        $this->templateManager = $templateManager;
        $this->postsService = $postsService;
    }

    public function index() {
        $this->templateManager->render("index");
    }

    public function about() {
        $this->templateManager->render("about");
        phpinfo();
    }

    public function notFound() {
        $this->templateManager->render("404");
    }
}
