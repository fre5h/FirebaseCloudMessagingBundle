<?php
/*
 * This file is part of the FirebaseCloudMessagingBundle
 *
 * (c) Artem Genvald <genvaldartem@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fresh\FirebaseCloudMessagingBundle\Event;

use Fresh\FirebaseCloudMessaging\Response\MessageResult\CanonicalTokenMessageResult;
use Fresh\FirebaseCloudMessaging\Response\MessageResult\Collection\CanonicalTokenMessageResultCollection;
use Fresh\FirebaseCloudMessaging\Response\MessageResult\Collection\FailedMessageResultCollection;
use Fresh\FirebaseCloudMessaging\Response\MessageResult\Collection\SuccessfulMessageResultCollection;
use Fresh\FirebaseCloudMessaging\Response\MessageResult\FailedMessageResult;
use Fresh\FirebaseCloudMessaging\Response\MessageResult\SuccessfulMessageResult;
use Fresh\FirebaseCloudMessaging\Response\MulticastMessageResponseInterface;
use Fresh\FirebaseCloudMessaging\Response\MulticastMessageResponseTrait;
use Symfony\Component\EventDispatcher\Event;

/**
 * MulticastMessageResponseEvent.
 *
 * @author Artem Genvald <genvaldartem@gmail.com>
 */
class MulticastMessageResponseEvent extends Event implements MulticastMessageResponseInterface
{
    use MulticastMessageResponseTrait;

    /**
     * @param int                                                                 $multicastId
     * @param SuccessfulMessageResultCollection|SuccessfulMessageResult[]         $successMessageResults
     * @param FailedMessageResultCollection|FailedMessageResult[]                 $failureMessageResults
     * @param CanonicalTokenMessageResultCollection|CanonicalTokenMessageResult[] $canonicalTokenMessageResults
     */
    public function __construct(
        $multicastId,
        SuccessfulMessageResultCollection $successMessageResults,
        FailedMessageResultCollection $failureMessageResults,
        CanonicalTokenMessageResultCollection $canonicalTokenMessageResults
    ) {
        $this->multicastId = $multicastId;
        $this->successfulMessageResults = $successMessageResults;
        $this->failedMessageResults = $failureMessageResults;
        $this->canonicalTokenMessageResults = $canonicalTokenMessageResults;
    }
}
