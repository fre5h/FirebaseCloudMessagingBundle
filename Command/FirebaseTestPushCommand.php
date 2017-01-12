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

use Fresh\FirebaseCloudMessaging\Client;
use Fresh\FirebaseCloudMessaging\Message\MessageFactory;
use Fresh\FirebaseCloudMessaging\Message\Part\Payload\PayloadFactory;
use Fresh\FirebaseCloudMessaging\Message\Part\Target\TargetFactory;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Class FirebaseTestPushCommand.
 */
class FirebaseTestPushCommand extends ContainerAwareCommand
{
    /** @var Client */
    private $fcmClient;

    /**
     * {@inheritDoc}
     */
    protected function configure()
    {
        $this->setName('firebase:message:send-test')
             ->setDescription('Sends test message to the specific registration token')
             ->setHelp(<<<HELP
The <info>%command.name%</info> sends test message to the specific registration token.

<info>%command.full_name% xxx:xx:xx</info>
HELP
             )
             ->addArgument('registration_token', InputArgument::REQUIRED, 'Registration token of recipient');
    }

    /**
     * {@inheritDoc}
     */
    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        $this->fcmClient = $this->getContainer()->get('firebase_cloud_messaging.client');
    }

    /**
     * {@inheritDoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $message = MessageFactory::createWebMessage()
            ->setTarget(
                TargetFactory::createSingleRecipientTarget()
                    ->setRegistrationToken($input->getArgument('registration_token'))
            )
            ->setPayload(
                PayloadFactory::createNotificationWebPayload()
                    ->setTitle('test')
                    ->setBody('hello world')
            );

        $this->fcmClient->sendMessage($message);
    }
}
