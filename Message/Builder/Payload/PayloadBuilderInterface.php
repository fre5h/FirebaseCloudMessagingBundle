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

namespace Fresh\FirebaseCloudMessagingBundle\Message\Builder\Payload;

/**
 * PayloadBuilderInterface.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
interface PayloadBuilderInterface
{
    /**
     * @return $this
     */
    public function build();

    /**
     * @return array
     */
    public function getPayloadPart(): array;
}
