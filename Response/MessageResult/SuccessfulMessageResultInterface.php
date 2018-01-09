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

namespace Fresh\FirebaseCloudMessagingBundle\Response\MessageResult;

/**
 * SuccessfulMessageResultInterface.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
interface SuccessfulMessageResultInterface extends MessageResultInterface
{
    /**
     * @return string
     */
    public function getMessageId(): string;

    /**
     * @param string $messageId
     *
     * @return $this
     */
    public function setMessageId(string $messageId);
}
