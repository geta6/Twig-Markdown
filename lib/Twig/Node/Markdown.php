<?php
class Twig_Node_Markdown extends Twig_Node
{
    public function __construct(Twig_NodeInterface $body, $lineno, $tag = 'markdown')
    {
        parent::__construct(array('body' => $body), array(), $lineno, $tag);
    }

    /**
     * Compiles the node to PHP.
     *
     * @param Twig_Compiler A Twig_Compiler instance
     */
    public function compile(Twig_Compiler $compiler)
    {
        include_once dirname(__FILE__).'/../Markdown/markdown.php';
        $compiler
            ->addDebugInfo($this)
            ->write("ob_start();\n")
            ->subcompile($this->getNode('body'))
            ->write("echo Markdown(ob_get_clean());\n")
        ;
    }
}
