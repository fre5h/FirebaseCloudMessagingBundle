<?php
/*
 * This file is part of the FirebaseCloudMessagingBundle
 *
 * (c) Artem Genvald <genvaldartem@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fresh\FirebaseCloudMessagingBundle\Command;

use Fresh\FirebaseCloudMessaging\Client as FirebaseCloudMessagingClient;
use Fresh\FirebaseCloudMessaging\Message\MessageFactory;
use Fresh\FirebaseCloudMessaging\Message\Part\Options\OptionsFactory;
use Fresh\FirebaseCloudMessaging\Message\Part\Options\Priority;
use Fresh\FirebaseCloudMessaging\Message\Part\Payload\PayloadFactory;
use Fresh\FirebaseCloudMessaging\Message\Part\Target\TargetFactory;
use Fresh\FirebaseCloudMessaging\Response\MulticastMessageResponseInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Class FirebaseSendTestMessageCommand.
 */
class FirebaseSendTestMessageCommand extends ContainerAwareCommand
{
    /** @var FirebaseCloudMessagingClient */
    private $fcmClient;

    /** @var SymfonyStyle */
    private $io;

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setName('firebase:send:test-message')
             ->setDescription('Sends test message in the "notification" payload to the specific registration token')
             ->setHelp(<<<'HELP'
The <info>%command.name%</info> sends test message in the "notification" payload to the specific registration token.

<info>%command.full_name% registration_token</info>
HELP
             )
             ->addArgument('registration_token', InputArgument::REQUIRED, 'Registration token of a recipient');
    }

    /**
     * {@inheritdoc}
     */
    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        $this->fcmClient = $this->getContainer()->get('firebase_cloud_messaging.client');
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

        $response = $this->fcmClient->sendMessage($message);

        if ($response instanceof MulticastMessageResponseInterface) {
            $this->showResponseDetails($response);
        }

        $this->io->success('Done');
    }

    private function showResponseDetails(MulticastMessageResponseInterface $response)
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
    private function shortinizeToken($token)
    {
        $positionOfColon = strpos($token, ':');

        return substr($token, 0, $positionOfColon).str_pad('', $positionOfColon, '.').substr($token, -$positionOfColon, $positionOfColon);
    }
}
