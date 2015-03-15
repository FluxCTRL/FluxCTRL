# FluxCTRL

Minimalistic information flux management tool, in other words, a [news
aggregator][aggregator] on steroids.

It's pronounced **_fluks kən trōl′_**.

## About

FluxCTRL came  out of a need to manage the constantly growing flux of information
I have to deal with.

So, if you are like me and would like to centralize all your reading (i.e. blogs
you follow, multiple twitter/github/stackoverflow/quora feeds) and social activity
(i.e. commenting on blogs, replying on QA sites, RT, starring, etc.) or automate
certain stuff like downloading the full content, filtering/tagging based on
keywords, adding to your reading list any post tweeted by friends, etc; I suggest
you give it a try.

## Philosophy

Early development's main focus will be on _simplicity_ and _extensibility_ without
sacrificing _efficiency_.

* **Minimalistic.** Less is more.
* **Liberatarian.** Freedom of choice.
* **Powerful.** No time to waste.

## Usage

For now, only developer install:

```
git clone git@github.com:jadb/FluxCTRL.git
cd $_
composer install --prefer-dist
```

## Roadmap

**0.1**
- APIs: Feeds & Items [IN PROGRESS]
- Formats: Atom & RSS
- Themes: Clear [IN PROGRESS]

**0.2**
- APIs: Settings
- Actions: Favorites & Unread
- Enhancers: XPath & Regex

**0.3**
- Plugins: Github & Twitter

**0.4**
- Plugins: Buffer

## Copyright / License

Copyright (c)2015 Jad Bitar.

FluxCTRL is licensed under the MIT license. See [LICENSE](LICENSE) for more
information.

[aggregator]:http://en.wikipedia.org/wiki/News_aggregator

