<?php

class Twig_Extension_Markdown extends Twig_Extension
{
    public function getTokenParsers()
    {
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
    return Markdown($data);
}

