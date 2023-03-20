<?php

namespace Mormat\FormulaInterpreter\Parser;

/**
 * Parse functions in formulas
 *
 * @author mormat
 */
class FunctionParser implements ParserInterface {
    
    use ExpressionExploderTrait;
    
    /**
     * @var ParserInterface
     */
    protected $argumentParser;
    
    function __construct(ParserInterface $argumentParser) {
        $this->argumentParser = $argumentParser;
    }

    function parse($rawExpression) {
        $expression = trim($rawExpression);
        
        if (!preg_match('/^(\w)+\(/', $expression)) {
            throw new ParserException($rawExpression);
        }
        if (substr($expression, -1, 1) != ')') {
            throw new ParserException($rawExpression);
        }
        
        $open = strpos($expression, '(');

        $results = array(
            'type' => 'function',
            'name' => substr($expression, 0, $open),
        );

        $argumentsExpression = trim(substr($expression, $open + 1, -1));
        if ($argumentsExpression != '') {
            $separators = [','];
            $fragments  = $this->explodeExpression($argumentsExpression, $separators);
            $arguments  = array_diff($fragments, $separators);
            $values     = array_map([$this->argumentParser, 'parse'], $arguments);
            $results['arguments'] = $values;
        }

        return $results;
    }

}
