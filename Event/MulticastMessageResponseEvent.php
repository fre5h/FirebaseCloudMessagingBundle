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

namespace Fresh\FirebaseCloudMessagingBundle\Event;

use Fresh\FirebaseCloudMessagingBundle\Response\MessageResult\CanonicalTokenMessageResult;
use Fresh\FirebaseCloudMessagingBundle\Response\MessageResult\Collection\CanonicalTokenMessageResultCollection;
use Fresh\FirebaseCloudMessagingBundle\Response\MessageResult\Collection\FailedMessageResultCollection;
use Fresh\FirebaseCloudMessagingBundle\Response\MessageResult\Collection\SuccessfulMessageResultCollection;
use Fresh\FirebaseCloudMessagingBundle\Response\MessageResult\FailedMessageResult;
use Fresh\FirebaseCloudMessagingBundle\Response\MessageResult\SuccessfulMessageResult;
use Fresh\FirebaseCloudMessagingBundle\Response\MulticastMessageResponseInterface;
use Fresh\FirebaseCloudMessagingBundle\Response\MulticastMessageResponseTrait;
use Symfony\Component\EventDispatcher\Event;

/**
 * MulticastMessageResponseEvent.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
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
    public function __construct(int $multicastId, SuccessfulMessageResultCollection $successMessageResults, FailedMessageResultCollection $failureMessageResults, CanonicalTokenMessageResultCollection $canonicalTokenMessageResults)
    {
        $this->multicastId = $multicastId;
        $this->successfulMessageResults = $successMessageResults;
        $this->failedMessageResults = $failureMessageResults;
        $this->canonicalTokenMessageResults = $canonicalTokenMessageResults;
    }
}
