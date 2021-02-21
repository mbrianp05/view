<?php

namespace Mbrianp\FuncCollection\View;

use Mbrianp\FuncCollection\DIC\DIC;

class TemplateManager
{
    public function __construct(
        protected DIC $dependenciesContainer,
        protected string $templatesFile = '',
    )
    {
    }

    public function render(string $file, array $variables = []): string
    {
        foreach ($variables as $variable => $value) {
            $$variable = $value;
        }

        ViewHelper::setDIC($this->dependenciesContainer);

        ob_start();
        require_once $this->templatesFile . '/' . $file;

        return ob_get_clean();
    }
}