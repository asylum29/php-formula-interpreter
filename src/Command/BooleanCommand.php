<?php

namespace Mormat\FormulaInterpreter\Command;

/**
 * Execute of a string expression
 *
 * @author asylum29
 */
class BooleanCommand implements CommandInterface {
    
    /**
     * @var bool
     */
    protected $value;
    
    function __construct($value) {
        if (!is_bool($value)) {
            $message = sprintf(
                'Parameter $value of method __construct() of class %s must be a boolean. Got %s type instead.',
                get_class($this), 
                gettype($value)
            );
            throw new \InvalidArgumentException($message);
        }
        
        $this->value = $value;
    }
    
    public function run(CommandContext $context) {
        return $this->value;
    }
    
    
}
