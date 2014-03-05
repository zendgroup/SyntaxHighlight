
#SyntaxHighlight
ZF2 SyntaxHighlight Module

Version 0.0.1 Created by [Thuy Dinh Xuan](http://zendgroup.vn/)

# Introduction

This ZF2 module simply adds [SyntaxHighlight](http://qbnz.com/highlighter/) support to your project. It utilizes the [GeShi SyntaxHighlight](http://qbnz.com/highlighter/) library

## Installation

To install SyntaxHighlight, simply recursively clone this repository (`git clone
--recursive`) into your ZF2 modules directory and enable it in your
`config/application.config.php` file.  That's it!

## Usage

With this module installed, using SyntaxHighlight in your view scripts is easy:

```php
<?php 
	$source = '
	    $foo = 45;
	    for ( $i = 1; $i < $foo; $i++ ){
	    echo "$foo\n"; --$foo;
	    }
	';
	$language = 'php';
	echo $this->highlight($source, $language);
?>
```

**NOTE:** For more information you can found in [documents](http://qbnz.com/highlighter/geshi-doc.html) 

## Configuration

## Todo
* Configuration style

## License

SyntaxHighlight is released under the New BSD-2 license. See the included LICENSE file.
GeSHi is released under the GNU GPLv2