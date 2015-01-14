# Mantisbt-Client

This package is a client to interact with [MantisBT] API interface and allows you to retrieve, update and create issues, manage accounts and get progress information.

## Project quality

We want to ensure you get the best quality, so this client comes with unit tests (automated testing provided by [Travis-CI]) and code quality analysis provided by [SensioLabsInsight].

[![Build Status](https://travis-ci.org/DragonBe/mantisbt-client.svg)](https://travis-ci.org/DragonBe/mantisbt-client) [![SensioLabsInsight](https://insight.sensiolabs.com/projects/957c5fcc-3c90-49ae-b366-f8ad4fa7d078/mini.png)](https://insight.sensiolabs.com/projects/957c5fcc-3c90-49ae-b366-f8ad4fa7d078)

## Composer

The easiest way to add this project to your application is to use [Composer]. First, get the `composer.phar` if you don't have it already.

    curl -sS https://getcomposer.org/installer | php

The next thing you should do is add a `require` statement in your `composer.json` file to have this client installed.

    {
        "require": {
            "dragonbe/mantisbt-client": "0.0.1"
        }
    }

All you have to do is install the package with [Composer].

## Licence

This projects is made available under [MIT] License. Read the [LICENSE] file for details.

[MantisBT]: http://www.mantisbt.org
[Travis-CI]: http://travis-ci.org
[SensioLabsInsight]: http://insight.sensiolabs.com
[Composer]: http://getcomposer.org
[MIT]: http://opensource.org/licenses/MIT
[LICENSE]: LICENSE