<?php
/*
 * This file is part of the FirebaseCloudMessagingBundle.
 *
 * (c) Artem Henvald <genvaldartem@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Fresh\FirebaseCloudMessagingBundle\DataCollector;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\DataCollector\DataCollector;

/**
 * FirebaseCollector.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class FirebaseCollector extends DataCollector
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * {@inheritdoc}
     */
    public function collect(Request $request, Response $response, \Throwable $exception = null): void
    {
        $this->data = [
            'messages_count' => 1,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getName(): string
    {
        return 'firebase';
    }

    /**
     * {@inheritdoc}
     */
    public function reset(): void
    {
        $this->data = [
            'messages_count' => 0,
        ];
    }

    /**
     * @return int
     */
    public function getMessagesCount(): int
    {
        return $this->data['messages_count'];
    }
}
