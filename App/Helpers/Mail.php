<?php

namespace App\Helpers;

class Mail {

    public function send(string $name, string $subject, string $email, string $content): void {
        $mj = new \Mailjet\Client($_ENV['API_KEY'], $_ENV['API_SECRET'], true, ['version' => 'v3.1']);
        $body = [
            'Messages' => [
                [
                    'From'     => [
                        'Email' => "oussama231se@gmail.com",
                        'Name'  => "monblog",
                    ],
                    'To'       => [
                        [
                            'Email' => "oussama231se@gmail.com",
                            'Name'  => "monblog",
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
