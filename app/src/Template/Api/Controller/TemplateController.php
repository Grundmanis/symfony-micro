<?php

namespace  App\Template\Api\Controller;

use App\Template\Infrastructure\Repository\TemplateRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Twig\Environment;

class TemplateController extends AbstractController
{
    public function __construct(
        private Environment $twig,
        private TemplateRepository $templateRepository,
    ) {
    }

    #[Route('/template/render', name: 'app_template_render' , format: 'json')]
    public function templateRenderAction(
        Request $request,
    ): Response
    {
        // TODO: Deserialize beautifully
        $content = $request->getContent();
        $json = json_decode($content, true);

        $templatEntity = $this->templateRepository->findOneBy([
            'slug' => $json['slug'],
        ]);

        // TODO: Make it private
        // TOOD: Accept only POST
        $template = $this->twig->createTemplate($templatEntity->getContent());

        return new Response($template->render([
            'code' => $json['variables']['code'],
        ]));
    }
}
