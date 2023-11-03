<?php

use Mormat\FormulaInterpreter\Parser\BooleanParser;
use Mormat\FormulaInterpreter\Parser\ParserException;

/**
 * Tests the parsing of numeric values
 *
 * @author asylum29
 */
class BooleanParserTest extends \PHPUnit\Framework\TestCase {
    
    public function setUp(): void {
        $this->parser = new BooleanParser();
    }
    
    /**
     * @dataProvider getIntegerValue
     */
    public function testParseInteger($expression, $infos) {
        $infos['type'] = 'boolean';
        $this->assertEquals($this->parser->parse($expression), $infos);
    }
    
    public function getIntegerValue() {
        return array(
            array('true', array('value' => true)),
            array('false', array('value' => false)),
            array(' true ', array('value' => true)),
        );
    }
    
    /**
     * @dataProvider getUncorrectExpressionData
     */
    public function testParseUncorrectExpression($expression) {
        $this->expectException(ParserException::class);
        $this->expectExceptionMessage(
            sprintf('Failed to parse expression %s', $expression)
        );
        $this->parser->parse($expression);
    }
    
    public function getUncorrectExpressionData() {
        return array(
            array('1'),
            array('0'),
            array(' test '),
            array(' some_function( '),
            array('2.23.23')
        );
    }
    
}
