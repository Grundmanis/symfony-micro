<?php 

namespace App\Template\Fixtures;

use App\Template\Domain\Entity\Template;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TemplateFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // TODO: load from file
        $emailContent = '<!DOCTYPE html>
        <html>
        <head>
            <title>Email verification</title>
            <style>
                .content {
                    margin: auto;
                    width: 600px;
                }
            </style>
        </head>
        <body>
            <div class="content">
                <p>Your verification code is {{ code }}.</p>
            </div>
        </body>
        </html>';
        $emailTemplate = new Template();
        $emailTemplate->setSlug('email-verification');
        $emailTemplate->setContent($emailContent);
        $manager->persist($emailTemplate);

        $mobileContent = "Your verification code is {{ code }}.";
        $mobileTemplate = new Template();
        $mobileTemplate->setSlug('mobile-verification');
        $mobileTemplate->setContent($mobileContent);
        $manager->persist($mobileTemplate);

        $manager->flush();
    }
}