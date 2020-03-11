# magento2-config-hints
A convenient way to view and copy a system configuration path from the admin panel

## Why?
Often I've found myself searching for a system configuration path either in Magento's codebase
or piecing it together through various field values in the DOM. I thought there may be some
setting similar to template hints that when enabled would conveniently show a system path in relation
to a field in the admin panel... Alas (unless I've missed something) this does not appear to be the case.

This module adds a "config hint" beneath all system configuration fields when enabled. Clicking on the hint will copy it to your clipboard! Handy dandy.

![image](https://user-images.githubusercontent.com/1771667/76467147-df653f00-63e0-11ea-9144-df728a70cc0b.png)

## Installing
This module is available on https://packagist.org/
```shell script
composer require tr33m4n/magento2-config-hints
```
To enable "config hints" head to "Stores" -> "Configuration" -> "Advanced" -> "Developer" -> "Debug"
and set "Enable Admin Config Hints" to "Yes"
