<?php 

namespace App\Template\Domain\ValueObject;

class Variables {

    private int $code;

    public function __construct(int $code) {
        $this->code = $code;
    }
    
    public function getCode(): int {
        return $this->code;
    }
}