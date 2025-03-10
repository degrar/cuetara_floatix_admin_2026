<?php

namespace App\Transports;

use MailchimpTransactional\ApiClient;
use Symfony\Component\Mailer\SentMessage;
use Symfony\Component\Mailer\Transport\AbstractTransport;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\MessageConverter;

class MandrillTransport extends AbstractTransport
{
    /**
     * The Mailchimp API client.
     *
     * @var ApiClient
     */
    protected ApiClient $client;

    /**
     * Create a new Mailchimp transport instance.
     *
     * @param ApiClient $client
     * @return void
     */
    public function __construct(ApiClient $client)
    {
        parent::__construct();

        $this->client = $client;
    }

    protected function doSend(SentMessage $message): void
    {
        $email = MessageConverter::toEmail($message->getOriginalMessage());

        $body = [
            'html' => $email->getHtmlBody(),
            'subject' => $email->getSubject(),
            'from_email' => $email->getFrom()[0]->getAddress(),
            'from_name' => $email->getFrom()[0]->getName(),
            'to' => collect($email->getTo())->map(function (Address $email) {
                return ['email' => $email->getAddress(), 'name' => $email->getName()];
            })->all(),
            'headers' => [
                [
                    'Content-Type' => 'text/html; charset=UTF-8',
                    'Content-Transfer-Encoding' => '8bit',
                    'List-Unsubscribe' => '<mailto:'.$email->getFrom()[0]->getName().'?subject=unsubscribe>'
                ]
            ],
            'important' => 'false',
            'track_opens' => 'true',
            'track_clicks' => 'true',
            'auto_text' => true
        ];

        $attachments = $email->getAttachments();

        if (count($attachments) > 0)
        {
            $body['attachments'] = [];

            foreach ($attachments as $attachment)
            {
                $body['attachments'][] = [
                    'name' => $attachment->getName(),
                    'type' => $attachment->getContentType(),
                    'content' => $attachment->bodyToString()
                ];
            }
        }

        $this->client->messages->send(['message' => $body]);
    }

    /**
     * Get the string representation of the transport.
     *
     * @return string
     */
    public function __toString(): string
    {
        return 'mandrill';
    }
}
