<?php
namespace Collab\Framework;

use Collab\Framework\ITemplateManager;
use Smarty;

class SmartyTemplateManager extends Smarty implements ITemplateManager {

    function __construct()
    {
        parent::__construct();
        $this->setTemplateDir(__DIR__ . '/../../templates/');
        $this->setCompileDir(__DIR__ . '/../../tmp/templates_c/');
        $this->setConfigDir(__DIR__ . '/../../config/');
        $this->setCacheDir(__DIR__ . '/../../tmp/cache/');
        $this->caching = Smarty::CACHING_LIFETIME_CURRENT;
        $this->assign('app_name', 'Collab');
    }

    public function render(string $templateName) {
        $this->display($templateName . ".html");
    }
    
}