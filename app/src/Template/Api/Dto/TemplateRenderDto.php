<?php 

namespace  App\Template\Api\Dto;

use Symfony\Component\Validator\Constraints as Assert;

// TODO: should it be in API layer??
// TODO: Specification?

class TemplateRenderDto
{
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Choice(['mobile-verification', 'email-verification'])]
        public readonly string $slug,

        // TODO: JSON object
        #[Assert\NotBlank]
        public readonly array $variables,
    ) {
        
    }
}