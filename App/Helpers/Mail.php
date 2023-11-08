<?php

namespace App\Helpers;

use App\Config;

class Mail
{

    public function send($name, $subject, $email, $content): void
    {
        $mj = new \Mailjet\Client (config::API_KEY, config::API_SECRET, true, ['version' => 'v3.1']);
        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => "oussama231se@gmail.com",
                        'Name' => "monblog",
                    ],
                    'To' => [
                        [
                            'Email' => "oussama231se@gmail.com",
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
