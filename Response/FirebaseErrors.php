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

/**
 * Class FirebaseErrors.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
final class FirebaseErrors
{
    public const MISSING_REGISTRATION_TOKEN = 'MissingRegistration';

    public const INVALID_REGISTRATION_TOKEN = 'InvalidRegistration';

    public const UNREGISTERED_DEVICE = 'NotRegistered';

    public const INVALID_PACKAGE_NAME = 'InvalidPackageName';

    public const MISMATCHED_SENDER = 'MismatchSenderId';

    public const MESSAGE_TOO_BIG = 'MessageTooBig';

    public const INVALID_DATA_KEY = 'InvalidDataKey';

    public const INVALID_TIME_TO_LIVE = 'InvalidTtl';

    public const TIMEOUT = 'Unavailable';

    public const INTERVAL_SERVER_ERROR = 'InternalServerError';

    public const DEVICE_MESSAGE_RATE_EXCEEDED = 'DeviceMessageRateExceeded';

    public const TOPICS_MESSAGE_RATE_EXCEEDED = 'TopicsMessageRateExceeded';
}
