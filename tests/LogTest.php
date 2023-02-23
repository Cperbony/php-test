<?php

namespace Code;

use Code\Log;
use PHPUnit\Framework\TestCase;

class LogTest extends TestCase
{


    protected function assertPreConditions(): void
    {
        $classe = class_exists('\\Code\\Log');

        $this->assertTrue($classe);
    }

    public function test_se_log_com_sucesso()
    {
        $log = new Log();

        $this->assertEquals('Logando dados no sistema Testando Save de Log no Sistema', $log->log('Testando Save de Log no Sistema'));
    }


}