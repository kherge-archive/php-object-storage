<?php

namespace Herrera\Util\Test;

use Herrera\Util\ObjectStorage;

class ExampleStore extends ObjectStorage
{
    public function isSupported($object)
    {
        return ($object instanceof ExampleInterface);
    }
}
