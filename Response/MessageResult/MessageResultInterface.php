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
 * MessageResultInterface.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
interface MessageResultInterface
{
    /**
     * @return string
     */
    public function getToken(): string;

    /**
     * @param string $token
     *
     * @return $this
     */
    public function setToken(string $token);
}
