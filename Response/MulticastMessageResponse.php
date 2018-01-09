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

use Fresh\FirebaseCloudMessagingBundle\Response\MessageResult\Collection\CanonicalTokenMessageResultCollection;
use Fresh\FirebaseCloudMessagingBundle\Response\MessageResult\Collection\FailedMessageResultCollection;
use Fresh\FirebaseCloudMessagingBundle\Response\MessageResult\Collection\SuccessfulMessageResultCollection;

/**
 * MulticastMessageResponse.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class MulticastMessageResponse implements MulticastMessageResponseInterface
{
    use MulticastMessageResponseTrait;

    /**
     * @param int $multicastId
     *
     * @return $this
     */
    public function setMulticastId(int $multicastId): self
    {
        $this->multicastId = $multicastId;

        return $this;
    }

    /**
     * @param SuccessfulMessageResultCollection $successfulMessageResults
     *
     * @return $this
     */
    public function setSuccessfulMessageResults(SuccessfulMessageResultCollection $successfulMessageResults): self
    {
        $this->successfulMessageResults = $successfulMessageResults;

        return $this;
    }

    /**
     * @param FailedMessageResultCollection $failedMessageResults
     *
     * @return $this
     */
    public function setFailedMessageResults(FailedMessageResultCollection $failedMessageResults): self
    {
        $this->failedMessageResults = $failedMessageResults;

        return $this;
    }

    /**
     * @param CanonicalTokenMessageResultCollection $canonicalTokenMessageResults
     *
     * @return $this
     */
    public function setCanonicalTokenMessageResults(CanonicalTokenMessageResultCollection $canonicalTokenMessageResults): self
    {
        $this->canonicalTokenMessageResults = $canonicalTokenMessageResults;

        return $this;
    }
}
