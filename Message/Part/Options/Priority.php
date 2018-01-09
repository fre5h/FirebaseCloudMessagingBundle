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

namespace Fresh\FirebaseCloudMessagingBundle\Message\Part\Options;

/**
 * Class Priority.
 *
 * Contains available values for the `priority` option.
 *
 * @see https://firebase.google.com/docs/cloud-messaging/http-server-ref#priority
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
final class Priority
{
    /**
     * On iOS this value corresponds to 5.
     */
    public const NORMAL = 'normal';

    /**
     * On iOS this value corresponds to 10.
     */
    public const HIGH = 'high';
}
