<?php

App::uses('SlowPasswordHasher', 'Controller/Component/Auth');

/**
 * Class SlowPasswordHasherTest
 */
class SlowPasswordHasherTest extends CakeTestCase {

    public function setUp() {
        parent::setUp();
        $this->passwordHasher = new SlowPasswordHasher();
    }

    public function testMatchPassword() {
        $rawPassword = 'p@ssword21';
        $hashed = $this->passwordHasher->hash($rawPassword);
        $this->assertTrue($this->passwordHasher->check($rawPassword, $hashed));
    }

    public function testUnmatchPassword() {
        $rawPassword = 'p@ssword21';
        $missPassword = 'p@ssword22';
        $hashed = $this->passwordHasher->hash($missPassword);
        $this->assertFalse($this->passwordHasher->check($rawPassword, $hashed));
    }

}
