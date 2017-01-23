<?php

namespace M6Web\PhpLint\Tests\Units\Command;

/**
 * Class Linter
 */
class Linter extends \atoum
{
    public function testOnlyValidDirectoryLint()
    {
        $this
            ->given($this->newTestedInstance)
            ->if($lint = $this->testedInstance->lint([__DIR__.'/../../Fixtures/Valid']))
            ->then
                ->integer($lint)
                    ->isEqualTo(true)
        ;
    }

    public function testOnlyInvalidDirectoryLint()
    {
        $this
            ->given($this->newTestedInstance)
            ->if($lint = $this->testedInstance->lint([__DIR__.'/../../Fixtures/Invalid']))
            ->then
                ->integer($lint)
                    ->isEqualTo(false)
                ->array($this->testedInstance->getErrors())
                    ->hasSize(1)
        ;
    }

    public function testDirectoryLint()
    {
        $this
            ->given($this->newTestedInstance)
            ->if($lint = $this->testedInstance->lint([__DIR__.'/../../Fixtures']))
            ->then
                ->integer($lint)
                    ->isEqualTo(false)
                ->array($this->testedInstance->getErrors())
                    ->hasSize(1)
        ;
        $this
            ->given($this->newTestedInstance)
            ->if($lint = $this->testedInstance->lint([__DIR__.'/../../Fixtures/Invalid', __DIR__.'/../../Fixtures/Valid']))
            ->then
                ->integer($lint)
                    ->isEqualTo(false)
                ->array($this->testedInstance->getErrors())
                    ->hasSize(1)
        ;
    }
}
