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
 * AST node representing a subexpression. Only for temporary
 * use in the parser.
 */
class SubExpressionNode extends Node
{
    /** @var string $value Dummy value usually '('. A temporary SubExpressionNode
     * is generated by the parser when encountering a parenthesized subexpression. */
    private $value;

    /** Constructor. Create a SubExpressionNode with given value. */
    function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * Returns the value
     * @retval int|float
     */
    public function getValue()
    {
        return $this->value;
    }

    public function getOperator()
    {
        return '(';
    }

    /**
     * Implementing the Visitable interface.
     */
    public function accept(Visitor $visitor)
    {
        return null;
    }

    /** Implementing the compareTo abstract method. */
    public function compareTo($other)
    {
        if ($other === null) {
            return false;
        }
        if (!($other instanceof SubExpressionNode)) {
            return false;
        }

        return $this->getValue() == $other->getValue();
    }

}
