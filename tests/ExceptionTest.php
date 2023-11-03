<?php

use Mormat\FormulaInterpreter\Exception as BaseException;

/**
 * Testing Exceptions
 *
 * @author mormat
 */
class ExceptionTest extends \PHPUnit\Framework\TestCase {
    
    /**
     * @dataProvider getAllExceptionsMustImplementsBaseExceptionData()
     */
    function testAllExceptionsMustImplementsBaseException($exception)
    {
        $this->assertTrue(
            is_subclass_of($exception, BaseException::class),
            sprintf("Class '%s' must implements '%s'", $exception, BaseException::class)
        );
    }
    
    function getAllExceptionsMustImplementsBaseExceptionData()
    {
        $exceptions = [];
        $srcFolder = implode(DIRECTORY_SEPARATOR, [__DIR__, '..', 'src']);
        
        $patterns  = array(
            [$srcFolder, '*', '*Exception.php'],
            [$srcFolder, '*', '*', '*Exception.php'],
        );
        
        foreach ($patterns as $pattern) {
            $files = glob(implode(DIRECTORY_SEPARATOR, $pattern));
            foreach ($files as $file) {
                $class = substr($file, strlen($srcFolder), -strlen('.php'));
                $class = '\Mormat\FormulaInterpreter' . str_replace('/', '\\', $class);
                $exceptions[] = $class;                
            }
            
        }
        
        return array_map(function($exception) {
            return [$exception];
        }, $exceptions);
    }
    
}

