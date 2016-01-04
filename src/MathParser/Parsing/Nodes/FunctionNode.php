<?php
/*
 * @package     Parsing
 * @author      Frank Wikström <frank@mossadal.se>
 * @copyright   2015 Frank Wikström
 * @license     http://www.opensource.org/licenses/lgpl-license.php LGPL
 *
 */

namespace MathParser\Parsing\Nodes;

use MathParser\Interpreting\Visitors\Visitor;

/**
 * AST node representing a function applications (e.g. sin(...))
 */
class FunctionNode extends Node
{
    private $name;
    private $operand;

    function __construct($name, $operand)
    {
        $this->name = $name;
        if (is_int($operand)) $operand = new NumberNode($operand);
        $this->operand = $operand;
    }

    /**
     * Return the name of the function
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Return the operand
     * @return Node
     */
    public function getOperand()
    {
        return $this->operand;
    }

    /**
     * Implementing the Visitable interface.
     */
    public function accept(Visitor $visitor)
    {
        return $visitor->visitFunctionNode($this);
    }
}