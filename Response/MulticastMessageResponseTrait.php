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

namespace Fresh\FirebaseCloudMessagingBundle\Response;

use Fresh\FirebaseCloudMessagingBundle\Response\MessageResult\CanonicalTokenMessageResult;
use Fresh\FirebaseCloudMessagingBundle\Response\MessageResult\Collection\CanonicalTokenMessageResultCollection;
use Fresh\FirebaseCloudMessagingBundle\Response\MessageResult\Collection\FailedMessageResultCollection;
use Fresh\FirebaseCloudMessagingBundle\Response\MessageResult\Collection\SuccessfulMessageResultCollection;
use Fresh\FirebaseCloudMessagingBundle\Response\MessageResult\FailedMessageResult;
use Fresh\FirebaseCloudMessagingBundle\Response\MessageResult\SuccessfulMessageResult;

/**
 * MulticastMessageResponseTrait.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
trait MulticastMessageResponseTrait
{
    /** @var int */
    private $multicastId;

    /** @var SuccessfulMessageResultCollection */
    private $successfulMessageResults;

    /** @var FailedMessageResultCollection */
    private $failedMessageResults;

    /** @var CanonicalTokenMessageResultCollection */
    private $canonicalTokenMessageResults;

    /**
     * @return int
     */
    public function getMulticastId(): int
    {
        return $this->multicastId;
    }

    /**
     * @return SuccessfulMessageResultCollection|SuccessfulMessageResult[]
     */
    public function getSuccessfulMessageResults(): SuccessfulMessageResultCollection
    {
        return $this->successfulMessageResults;
    }

    /**
     * @return int
     */
    public function getNumberOfSuccessfulMessageResults(): int
    {
        return \count($this->successfulMessageResults);
    }

    /**
     * @return bool
     */
    public function hasSuccessfulMessageResults(): bool
    {
        return $this->getNumberOfSuccessfulMessageResults() > 0;
    }

    /**
     * @return FailedMessageResultCollection|FailedMessageResult[]
     */
    public function getFailedMessageResults(): FailedMessageResultCollection
    {
        return $this->failedMessageResults;
    }

    /**
     * @return int
     */
    public function getNumberOfFailedMessageResults(): int
    {
        return \count($this->failedMessageResults);
    }

    /**
     * @return bool
     */
    public function hasFailedMessageResults(): bool
    {
        return $this->getNumberOfFailedMessageResults() > 0;
    }

    /**
     * @return CanonicalTokenMessageResultCollection|CanonicalTokenMessageResult[]
     */
    public function getCanonicalTokenMessageResults(): CanonicalTokenMessageResultCollection
    {
        return $this->canonicalTokenMessageResults;
    }

    /**
     * @return int
     */
    public function getNumberOfCanonicalTokenMessageResults(): int
    {
        return \count($this->canonicalTokenMessageResults);
    }

    /**
     * @return bool
     */
    public function hasCanonicalTokenMessageResults(): bool
    {
        return $this->getNumberOfCanonicalTokenMessageResults() > 0;
    }
}
