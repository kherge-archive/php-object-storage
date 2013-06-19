Usage
=====

To use the `ObjectStorage` class, you must extend it with your own class.

```php
use Herrera\Util\ObjectStorage;

/**
 * This is your class.
 */
class MyObjectStorage extends ObjectStorage
{
    /**
     * @override
     */
    public function isSupported($object)
    {
        return ($object instanceof DateTime);
    }
}
```

In the example above, `MyObjectStorage` class will only permit `DateTime` to
be added. Any attempt to add a different type of object will result in an
exception (`UnexpectedValueException`) being thrown with the following message:
`The object, SomeClass, is not supported.`

How you implement the `isSupported()` method is entirely up to you. The method
only needs to return `true` if the object it is given is supported, or `false`
if it is not.
