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

namespace Fresh\FirebaseCloudMessagingBundle\Message\Builder;

use Fresh\FirebaseCloudMessagingBundle\Message\Builder\Payload\AndroidPayloadBuilder;
use Fresh\FirebaseCloudMessagingBundle\Message\Builder\Payload\IosPayloadBuilder;
use Fresh\FirebaseCloudMessagingBundle\Message\Builder\Payload\WebPayloadBuilder;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Options\Options;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Options\OptionsInterface;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Options\Priority;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\Combined\CombinedPayload;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\CommonPayloadInterface;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\Data\DataPayload;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\Notification\AbstractCommonNotificationPayload;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\Notification\AndroidNotificationPayload;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\Notification\IosNotificationPayload;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\Notification\WebNotificationPayload;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Target;
use Fresh\FirebaseCloudMessagingBundle\Message\Type\AbstractMessage;

/**
 * MessageBuilder.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 *
 * @todo Add validation while building message
 */
class MessageBuilder
{
    /** @var AbstractMessage */
    private $message;

    /** @var array */
    private $targetPart = [];

    /** @var array */
    private $optionsPart = [];

    /** @var array */
    private $payloadPart = [];

    /**
     * @param AbstractMessage $message
     */
    public function setMessage(AbstractMessage $message): void
    {
        $this->message = $message;
    }

    /**
     * @throws \Exception
     *
     * @return array
     */
    public function getMessagePartsAsArray(): array
    {
        if (!$this->messageIsValid()) {
            throw new \RuntimeException('Message is not valid');
        }

        $this->buildTargetPart();
        $this->buildOptionsPart();
        $this->buildPayloadPart();

        return \array_merge($this->targetPart, $this->optionsPart, $this->payloadPart);
    }

    /**
     * @return string
     */
    public function getMessageAsJson(): string
    {
        return \json_encode($this->getMessagePartsAsArray());
    }

    /**
     * Check if message is valid (has all required parts).
     *
     * Target and payload are required parts. Options can be omitted.
     *
     * @throws \RuntimeException
     *
     * @return bool
     */
    private function messageIsValid(): bool
    {
        if (!$this->message instanceof AbstractMessage) {
            throw new \RuntimeException(\sprintf('Message is not instance of %s', AbstractMessage::class));
        }

        if (!$this->message->getTarget() instanceof Target\TargetInterface) {
            throw new \RuntimeException(\sprintf('Message target is not instance of %s', Target\TargetInterface::class));
        }

        if (!$this->message->getPayload() instanceof CommonPayloadInterface) {
            throw new \RuntimeException(\sprintf('Message target is not instance of %s', CommonPayloadInterface::class));
        }

        return true;
    }

    /**
     * Build target part.
     */
    private function buildTargetPart(): void
    {
        $target = $this->message->getTarget();

        if ($target instanceof Target\ConditionTarget) {
            $this->targetPart = ['condition' => $target->getCondition()];
        } elseif ($target instanceof Target\MulticastTarget) {
            $this->targetPart = ['registration_ids' => $target->getRegistrationTokens()];
        } elseif ($target instanceof Target\SingleRecipientTarget) {
            $this->targetPart = ['to' => $target->getRegistrationToken()];
        } else {
            throw new \InvalidArgumentException('Unsupported target part');
        }
    }

    /**
     * Build options part.
     */
    private function buildOptionsPart(): void
    {
        if ($this->message instanceof AbstractMessage && $this->message->getOptions() instanceof OptionsInterface) {
            $options = $this->message->getOptions();
            $this->optionsPart = [];

            if (!empty($options->getCollapseKey())) {
                $this->optionsPart['collapse_key'] = $options->getCollapseKey();
            }

            // By default, messages are sent with normal priority.
            // If priority is different add it to the set of options.
            if (Priority::NORMAL !== $options->getPriority()) {
                $this->optionsPart['priority'] = $options->getPriority();
            }

            // By default `content_available` option is false. Adding it only if it was changed to true.
            if ($options->isContentAvailable()) {
                $this->optionsPart['content_available'] = true;
            }

            // By default `mutable_content` option is false. Adding it only if it was changed to true.
            if ($options->isMutableContent()) {
                $this->optionsPart['mutable_content'] = true;
            }

            // By default TTL for message in FCM is 4 weeks, it is also the default value if you omitted the TTL option.
            // So if the TTL is overwritten and is not equal to the default value, then add this option.
            // Otherwise if TTL is still equal to default, then it is not need to send this option.
            if (Options::DEFAULT_TTL_IN_SECONDS !== $options->getTimeToLive()) {
                $this->optionsPart['time_to_live'] = $options->getTimeToLive();
            }

            if (!empty($options->getRestrictedPackageName())) {
                $this->optionsPart['restricted_package_name'] = $options->getRestrictedPackageName();
            }

            // By default `dry_run` option is.... @todo
            if ($options->isDryRun()) {
                $this->optionsPart['dry_run'] = true;
            }
        }
    }

    /**
     * Build payload part.
     */
    private function buildPayloadPart(): void
    {
        $payload = $this->message->getPayload();

        if ($payload instanceof AbstractCommonNotificationPayload) {
            $this->payloadPart['notification'] = $this->buildNotificationPayloadPart($payload);
        } elseif ($payload instanceof DataPayload) {
            $this->payloadPart['data'] = $payload->getData();
        } elseif ($payload instanceof CombinedPayload) {
            $this->payloadPart = [
                'notification' => $this->buildNotificationPayloadPart($payload->getNotificationPayload()),
                'data' => $payload->getDataPayload()->getData(),
            ];
        } else {
            throw new \InvalidArgumentException('Unsupported payload part');
        }
    }

    /**
     * @param AbstractCommonNotificationPayload $payload
     *
     * @throws \InvalidArgumentException
     *
     * @return array
     */
    private function buildNotificationPayloadPart(AbstractCommonNotificationPayload $payload): array
    {
        if ($payload instanceof AndroidNotificationPayload) {
            $payloadBuilder = new AndroidPayloadBuilder($payload);
        } elseif ($payload instanceof IosNotificationPayload) {
            $payloadBuilder = new IosPayloadBuilder($payload);
        } elseif ($payload instanceof WebNotificationPayload) {
            $payloadBuilder = new WebPayloadBuilder($payload);
        } else {
            throw new \InvalidArgumentException('Unsupported payload part');
        }

        return $payloadBuilder->build()->getPayloadPart();
    }
}
