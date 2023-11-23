<?php 

namespace App\Template\Domain\ValueObject;

class Template {

    private string $slug; // TODO string to smth like Enum ?
    
    private Variables $variables;

    public function __construct(string $slug, Variables $variables) {

        $this->slug = $slug;
        $this->variables = $variables;
    }

    public function getSlug(): string {
        return $this->slug;
    }

    public function getVariables(): Variables {
        return $this->variables;
    }

}