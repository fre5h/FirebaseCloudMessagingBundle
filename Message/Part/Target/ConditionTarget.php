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

namespace Fresh\FirebaseCloudMessagingBundle\Message\Part\Target;

/**
 * Class ConditionTarget.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class ConditionTarget implements TargetInterface
{
    /** @var string */
    private $condition;

    /**
     * @param string $condition
     *
     * @return $this
     */
    public function setCondition(string $condition): self
    {
        $this->condition = $condition;

        return $this;
    }

    /**
     * @return string
     */
    public function getCondition(): string
    {
        return $this->condition;
    }
}
