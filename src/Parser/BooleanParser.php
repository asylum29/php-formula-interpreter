<?php

namespace Mormat\FormulaInterpreter\Parser;

/**
 * Parse numeric values in formulas
 *
 * @author asylum29
 */
class BooleanParser implements ParserInterface  {
    
    function parse($rawExpression) {
        
        $expression = trim($rawExpression);
        
        if (!in_array($expression, ['true', 'false'])) {
            throw new ParserException($rawExpression);
        }
        
        return array(
            'type' => 'boolean',
            'value' => $expression === 'true',
        );
    }
    
}
