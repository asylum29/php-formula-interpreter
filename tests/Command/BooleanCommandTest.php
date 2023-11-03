<?php

use Mormat\FormulaInterpreter\Command\BooleanCommand;
use Mormat\FormulaInterpreter\Command\CommandContext;

/**
 * Description of ParserTest
 *
 * @author mormat
 */
class BooleanCommandTest extends \PHPUnit\Framework\TestCase {
    
    /**
     * @var ContextCommand
     */
    protected $commandContext;
    
    public function setUp(): void
    {
        $this->commandContext = new CommandContext();
    }
    
    /**
     * @dataProvider getData
     */
    public function testRun($value, $result) {
        $command = new BooleanCommand($value);
        
        $this->assertEquals($command->run($this->commandContext), $result);
    }
    
    public function getData() {
        return array(
            array(true, true),
            array(false, false),
        );
    }
    
    /**
     * @expectedException \InvalidArgumentException
     * @dataProvider getIncorrectValues
     */
    public function testInjectIncorrectValue($value) {
        $command = new BooleanCommand($value);
        $command->run($this->commandContext);
    }

    public function getIncorrectValues() {
        return array(
            array('string'),
            array(1.2),
            array(array()),
        );
    }
    
}
