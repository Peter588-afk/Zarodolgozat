<?php
    class ConfigTests extends \PHPUnit\Framework\TestCase{
        public function testConnectionOK(){
            include "app\config.php";
            $this->assertEquals(is_object($db),true);
        }
    }
?>