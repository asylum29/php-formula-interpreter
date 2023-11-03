<?php

use Mormat\FormulaInterpreter\Command\BooleanCommand;
use Mormat\FormulaInterpreter\Command\CommandFactory\BooleanCommandFactory;
use Mormat\FormulaInterpreter\Command\CommandFactory\NumericCommandFactory;

/**
 * Description of NumericCommandFactory
 *
 * @author mormat
 */
class BooleanCommandFactoryTest extends \PHPUnit\Framework\TestCase {
    
    /**
     * @dataProvider getData
     */
    public function testCreate($value) {
        $factory = new BooleanCommandFactory();
        $options = array('value' => $value);
        $this->assertEquals($factory->create($options), new BooleanCommand($value));
    }
    
    public function getData() {
        return array(
            array(true),
            array(true),
        );
    }
    
    /**
     * @expectedException Mormat\FormulaInterpreter\Command\CommandFactory\CommandFactoryException
     */
    public function testCreateWithMissingValueOption() {
        $factory = new NumericCommandFactory();
        $factory->create(array());
    }
    
}
