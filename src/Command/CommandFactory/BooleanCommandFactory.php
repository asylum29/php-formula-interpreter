<?php

namespace Mormat\FormulaInterpreter\Command\CommandFactory;

use Mormat\FormulaInterpreter\Command\BooleanCommand;

/**
 * Creates a command to execute a boolean expression
 *
 * @author asylum29
 */
class BooleanCommandFactory implements CommandFactoryInterface {
    
    public function create($options) {
        if (!isset($options['value'])) {
            throw new CommandFactoryException();
        }
        
        return new BooleanCommand($options['value']);
    }
    
}
