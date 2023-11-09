<?php

namespace App\Helpers;

class Mail
{

    public function send($name, $subject, $email, $content): void
    {
        $mj = new \Mailjet\Client ($_ENV['API_KEY'], $_ENV['API_SECRET'], true, ['version' => 'v3.1']);
        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => "oussama231@gmail.com",
                        'Name' => "monblog",
                    ],
                    'To' => [
                        [
                            'Email' => "oussamabelfarhi@gmail.com",
                            'Name' => "monblog",
                        ],
                    ],
                    'TextPart' => "Nom/Prénom: $name, Sujet: $subject, Email: $email, Message: $content",
                ],
            ],
        ];
        $response = $mj->post(\Mailjet\Resources::$Email, ['body' => $body]);
        $response->success();
    }
}