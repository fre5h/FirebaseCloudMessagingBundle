<?php
/*
 * This file is part of the FirebaseCloudMessagingBundle
 *
 * (c) Artem Henvald <genvaldartem@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Fresh\FirebaseCloudMessagingBundle\Command;

use Fresh\FirebaseCloudMessagingBundle\Client\FirebaseClient;
use Fresh\FirebaseCloudMessagingBundle\Message\MessageFactory;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Options\OptionsFactory;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Options\Priority;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\PayloadFactory;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Target\TargetFactory;
use Fresh\FirebaseCloudMessagingBundle\Response\MulticastMessageResponseInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Class FirebaseSendTestMessageCommand.
 */
class FirebaseSendTestMessageCommand extends Command
{
    private $firebaseClient;

    /** @var SymfonyStyle */
    private $io;

    /**
     * @param FirebaseClient $firebaseClient
     */
    public function __construct(FirebaseClient $firebaseClient)
    {
        parent::__construct();
        $this->firebaseClient = $firebaseClient;
    }

    /**
     * {@inheritdoc}
     */
    protected function configure(): void
    {
        $this
            ->setName('firebase:send:test-message')
            ->setDescription('Sends test message with the "notification" payload to the specific registration token')
            ->setHelp(<<<'HELP'
The <info>%command.name%</info> sends test message with the "notification" payload to the specific registration token.

<info>%command.full_name% registration_token</info>
HELP
            )
            ->addArgument('registration_token', InputArgument::REQUIRED, 'Registration token of a recipient');
    }

    /**
     * {@inheritdoc}
     */
    protected function initialize(InputInterface $input, OutputInterface $output): void
    {
        $this->io = new SymfonyStyle($input, $output);
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->io->title('Sending message...');

        $message = MessageFactory::createAndroidMessage()
            ->setTarget(
                TargetFactory::createSingleRecipientTarget()
                    ->setRegistrationToken($input->getArgument('registration_token'))
            )
            ->setOptions(
                OptionsFactory::createOptions()
                    ->setPriority(Priority::NORMAL)
                    ->setCollapseKey('test')
            )
            ->setPayload(
                PayloadFactory::createNotificationAndroidPayload()
                    ->setTitle('Hello world!')
                    ->setBody('It is a test message, ignore it.')
            );

        $response = $this->firebaseClient->sendMessage($message);

        if ($response instanceof MulticastMessageResponseInterface) {
            $this->showResponseDetails($response);
        }

        $this->io->success('Done');
    }

    /**
     * @param MulticastMessageResponseInterface $response
     */
    private function showResponseDetails(MulticastMessageResponseInterface $response): void
    {
        if ($response->hasSuccessfulMessageResults()) {
            $this->io->title('Successfully sent messages');

            $headers = ['Registration Token', 'Message Id'];
            $rows = [];

            foreach ($response->getSuccessfulMessageResults() as $messageResult) {
                $rows[] = [
                    $this->shortinizeToken($messageResult->getToken()),
                    $messageResult->getMessageId(),
                ];
            }

            $this->io->table($headers, $rows);
        }

//        if ($response->hasCanonicalTokenMessageResults()) {
//            foreach ($response->getCanonicalTokenMessageResults() as $messageResult) {
//                $rows[] = [
//                    $messageResult->getToken(),
//                    $messageResult->getMessageId(),
//                    $messageResult->getCanonicalToken(),
//                    null,
//                ];
//            }
//        }
//
//        if ($response->hasFailedMessageResults()) {
//            foreach ($response->getFailedMessageResults() as $messageResult) {
//                $rows[] = [
//                    $messageResult->getToken(),
//                    null,
//                    null,
//                    $messageResult->getError(),
//                ];
//            }
//        }
    }

    /**
     * @param string $token
     *
     * @return string
     */
    private function shortinizeToken(string $token): string
    {
        $positionOfColon = \strpos($token, ':');

        return \substr($token, 0, $positionOfColon).\str_pad('', $positionOfColon, '.').\substr($token, -$positionOfColon, $positionOfColon);
    }
}
