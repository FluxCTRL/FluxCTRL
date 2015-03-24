# FluxCTRL

___[fluks kən trōl′]___ Minimalistic Aggregator on Steroids.

## About

FluxCTRL is a self-hosted universal aggregator that is easy to install and customize. At its core,
it is a modular parser, backed by the SQL database engine of your choice and extendable via an
event-driven API using [plugins](#plugins) and [themes](#themes).

Have you ever wished you could customize your reader to automatically:

* curate/share/bookmark/star items that have interested other people you trust,
* aggregate non-standard data feeds like API results, HTML pages, etc.,

or let you:

* attach notes to selected items for future reference,
* reply to reddit/stackoverflow/quora/github threads,
* schedule tweets and other events?

If you answered yes to one or more, or if you have other automation and feature ideas you can
think of, then you might like FluxCTRL.

__FluxCTRL is being actively developed and open for [contributions](#team) of all sorts.
Although, in its current form, it could be used as a reader by just anyone; it still lacks
documentation, a wider array of plugins and a couple important milestones before reaching 1.0.__

## Philosophy

__Simplicity__ and __extensibility__ without sacrificing __efficiency__.

## Screenshots

{@todo add screenshots}

## Features

- RESTful JSON API (core)
- Popular hoses: Atom, Rss, Reddit, HackerNews, Github (core + plugin)
- Minimalist web interface (theme)
- Composer'd install
- And [CakePHP 3][cakephp] goodies: ORM, caching, logging, etc.

For upcoming features, please check the roadmap.

## Requirements

- PHP 5.5
- Composer
- RDMBS engine (SQLite, MySQL, PostgreSQL)

## Usage

```
composer install -s dev --prefer-dist fluxctrl/fluxctrl
```

For detailed installation steps and more, please check the [wiki].

## Plugins

Plugins are what makes FluxCTRL so powerful. If you are familiar with [CakePHP][cakephp]'s plugin
and event system, then it won't be very different (probably a couple more built-in events that's
all). If not, please start by checking CakePHP's [official documentation][cakebook].

A plugin should limit itself to doing one thing only (look at the [official plugins][FluxCTRL]). It
could be altering the stream outputed by the reader, the JSON response structure, adding more keyboard
shortcuts or anything else. You're only limited by available plugins and your imagination, if not, it's
a bug and we'd like to hear about your use case.

## Themes

By now, you should know about plugins and if not, scroll back up a little. Themes are the same thing,
it's just another term to separate between the back-end type of stuff (API, shells, etc.) and front-end
(web UI).

## Help

For help, please __do not__ use the issue tracker. Instead, reach out to us via one of the official
support channels:

- [Google group](https://groups.google.com/forum/#!forum/fluxctrl)
- [StackOverflow](http://stackoverflow.com/questions/tagged/FluxCTRL)
- `#FluxCTRL` (irc.freenode.net)

## Team

Building great software requires team effort. For now, the core is a handful of [talented people]
[authors] eager to grow into a mixed-gender, multi-disciplinary group of awesomeness crafters.

Want to take part in the action? Maybe reporting a bug or hacking on FluxCTRL? Awesome! We have put
together a [how-to contribute][contributing] document to get you started.

Here are some of the things we currently need help with:

* Code - obvious, no?
* Design - logo, website, extra themes, etc.
* Documentation - core and official plugins, etc.
* Evangelism - tutorials, announcements, presentations, etc.
* Review - existing code base, pull requests, suggestions, etc.
* Support - StackOverflow, IRC, Github, etc.

## License

Copyright (c)2015 Jad Bitar.

FluxCTRL is licensed under the MIT license. See [LICENSE] for more information.

[cakephp]:http://cakephp.org
[cakebook]:http://book.cakephp.org/3.0
[feedly]:http://feedly.com
[FluxCTRL]:https://github.com/FluxCTRL
[authors]:https://github.com/FluxCTRL/FluxCTRL/blob/master/AUTHORS.md
[contributing]:https://github.com/FluxCTRL/FluxCTRL/blob/master/CONTRIBUTING.md
[LICENSE]:https://github.com/FluxCTRL/FluxCTRL/blob/master/LICENSE
[ROADMAP]:https://github.com/FluxCTRL/FluxCTRL/blob/master/ROADMAP
[wiki]:https://github.com/FluxCTRL/FluxCTRL/wiki
