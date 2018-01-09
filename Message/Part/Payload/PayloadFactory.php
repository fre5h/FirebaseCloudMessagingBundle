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

namespace Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload;

use Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\Combined\CombinedPayload;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\Data\DataPayload;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\Notification\AndroidNotificationPayload;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\Notification\IosNotificationPayload;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\Notification\WebNotificationPayload;

/**
 * PayloadFactory.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class PayloadFactory
{
    /**
     * @return CombinedPayload
     */
    public static function createCombinedPayload(): CombinedPayload
    {
        return new CombinedPayload();
    }

    /**
     * @return DataPayload
     */
    public static function createDataPayload(): DataPayload
    {
        return new DataPayload();
    }

    /**
     * @return AndroidNotificationPayload
     */
    public static function createNotificationAndroidPayload(): AndroidNotificationPayload
    {
        return new AndroidNotificationPayload();
    }

    /**
     * @return IosNotificationPayload
     */
    public static function createNotificationIosPayload(): IosNotificationPayload
    {
        return new IosNotificationPayload();
    }

    /**
     * @return WebNotificationPayload
     */
    public static function createNotificationWebPayload(): WebNotificationPayload
    {
        return new WebNotificationPayload();
    }
}
