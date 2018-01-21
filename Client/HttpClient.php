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

namespace Fresh\FirebaseCloudMessagingBundle\Client;

use GuzzleHttp\Client as GuzzleClient;

/**
 * Class HttpClient.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
final class HttpClient extends GuzzleClient
{
    private const DEFAULT_ENDPOINT = 'https://fcm.googleapis.com/fcm/send';

    private const DEFAULT_GUZZLE_TIMEOUT = 50;

    /**
     * @param string $serverKey
     * @param string $endpoint
     * @param int    $guzzleTimeOut
     */
    public function __construct(string $serverKey, string $endpoint = self::DEFAULT_ENDPOINT, int $guzzleTimeOut = self::DEFAULT_GUZZLE_TIMEOUT)
    {
        $options = [
            'base_uri' => \rtrim($endpoint, '/'),
            'timeout' => $guzzleTimeOut,
            'http_errors' => false,
            'headers' => [
                'Authorization' => \sprintf('key=%s', $serverKey),
                'Content-Type' => 'application/json',
            ],
            'version' => 2.0,
        ];

        parent::__construct($options);
    }
}
