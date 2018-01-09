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
 * FailedMessageResultInterface.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
interface FailedMessageResultInterface extends MessageResultInterface
{
    /**
     * @return string
     */
    public function getError(): string;

    /**
     * @param string $error
     *
     * @return $this
     */
    public function setError(string $error);
}
