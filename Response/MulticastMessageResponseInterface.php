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
 * MulticastMessageResponseInterface.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
interface MulticastMessageResponseInterface extends FirebaseResponseInterface
{
    /**
     * @return int
     */
    public function getMulticastId(): int;

    /**
     * @return SuccessfulMessageResultCollection|SuccessfulMessageResult[]
     */
    public function getSuccessfulMessageResults(): SuccessfulMessageResultCollection;

    /**
     * @return int
     */
    public function getNumberOfSuccessfulMessageResults(): int;

    /**
     * @return bool
     */
    public function hasSuccessfulMessageResults(): bool;

    /**
     * @return FailedMessageResultCollection|FailedMessageResult[]
     */
    public function getFailedMessageResults(): FailedMessageResultCollection;

    /**
     * @return int
     */
    public function getNumberOfFailedMessageResults(): int;

    /**
     * @return bool
     */
    public function hasFailedMessageResults(): bool;

    /**
     * @return CanonicalTokenMessageResultCollection|CanonicalTokenMessageResult[]
     */
    public function getCanonicalTokenMessageResults(): CanonicalTokenMessageResultCollection;

    /**
     * @return int
     */
    public function getNumberOfCanonicalTokenMessageResults(): int;

    /**
     * @return bool
     */
    public function hasCanonicalTokenMessageResults(): bool;
}
