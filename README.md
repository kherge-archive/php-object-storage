Object Storage
==============

[![Build Status]](http://travis-ci.org/herrera-io/php-object-storage)

A simple object storage class that will only allow "supported" objects.

```php
class MyObjectStorage extends Herrera\Util\ObjectStorage
{
    public function isSupported($object)
    {
        return ($object instanceof PDO);
    }
}

$store = new MyObjectStorage();
$pdo = new PDO('dsn...');
$time = new DateTime();

$store->attach($pdo);
$store->attach($time); // throws "UnexpectedValueException"
```

Documentation
-------------

- [Installing][]
- [Usage][]

[Build Status]: https://secure.travis-ci.org/herrera-io/php-object-storage.png?branch=master
[Installing]: doc/00-Installing.md
[Usage]: doc/01-Usage.md
