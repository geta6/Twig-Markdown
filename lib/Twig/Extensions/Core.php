<?php

if (!defined('ENT_SUBSTITUTE')) {
    define('ENT_SUBSTITUTE', 8);
}

class Twig_Markdown_Extension extends Twig_Extension
{
    public function getTokenParsers()
    {
        include dirname(__FILE__).'/../TokenParser/Markdown.php';
        return array(
            new Twig_TokenParser_Markdown(),
        );
    }

    public function getFilters()
    {
        $filters = array(
            // formatting filters
            'markdown'=> new Twig_Filter_Function('twig_markdown'),
        );

        return $filters;
    }

    public function getName()
    {
        return 'markdown';
    }

}

function twig_markdown($data)
{
    include dirname(__FILE__).'/../Markdown/markdown.php';
    return Markdown($data);
}

