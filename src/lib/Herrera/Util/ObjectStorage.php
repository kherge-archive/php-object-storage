<?php

namespace Herrera\Util;

use SplObjectStorage;
use UnexpectedValueException;

/**
 * Manages the storage of "supported" objects.
 *
 * A supported object is anything that that causes the `isSupported()` method
 * to return true. Ideally, it would be a particular class or interface that
 * must be implemented, but it could also be used to filter out objects that
 * do not meet certain expectations.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
abstract class ObjectStorage extends SplObjectStorage
{
    /**
     * @override
     */
    public function addAll(SplObjectStorage $storage)
    {
        foreach ($storage as $object) {
            if ($this->isSupported($object)) {
                $this[$object] = $storage[$object];
            }
        }
    }

    /**
     * @override
     *
     * @throws UnexpectedValueException If the object is not supported.
     */
    public function attach($object, $data = null)
    {
        if (!$this->isSupported($object)) {
            throw new UnexpectedValueException(
                sprintf(
                    'The object, %s, is not supported.',
                    get_class($object)
                )
            );
        }

        parent::attach($object, $data);
    }

    /**
     * Checks if an object is supported.
     *
     * @param object $object An object.
     *
     * @return boolean TRUE if it is supported, FALSE if not.
     */
    abstract public function isSupported($object);

    /**
     * @override
     *
     * @throws UnexpectedValueException If the object is not supported.
     */
    public function offsetSet($object, $data = null)
    {
        if (!$this->isSupported($object)) {
            throw new UnexpectedValueException(
                sprintf(
                    'The object, %s, is not supported.',
                    get_class($object)
                )
            );
        }

        parent::offsetSet($object, $data);
    }
}
