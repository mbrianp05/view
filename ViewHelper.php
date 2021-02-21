<?php

namespace Mbrianp\FuncCollection\View;

use Mbrianp\FuncCollection\DIC\DIC;

class ViewHelper
{
    protected static DIC $dic;

    public static function setDIC(DIC $dic): void
    {
        static::$dic = $dic;
    }

    public static function include(string $filename, array $variables = []): string
    {
        $templateManager = new TemplateManager(dirname(dirname(__DIR__)));

        return $templateManager->render($filename, $variables);
    }

    public static function generateUrl(string $name, array $params = []): string
    {
        return static::$dic->getService('kernel.routing')->generateUrl($name, $params);
    }
}