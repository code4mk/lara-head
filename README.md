![larahead](https://user-images.githubusercontent.com/17185462/56885908-85d97780-6a8f-11e9-81ef-e7e6ac49d1ed.PNG)

# installation

```bash
composer require code4mk/lara-head
```

# usage meta

~ inside controller

```php
use Khead;
class Test
{
  public function home()
  {
    Khead::setMeta('viewport',[
      "name" => "viewport",
      "content"=>"width=device-width, initial-scale=1"
    ]);
  }
}
```

~ inside view <access>

```php
{!! Khead::getMeta('viewport') !!}
// <meta name="viewport" content="width=device-width, initial-scale=1">
```

# link

```php
Khead::setLink('author',[
  "rel"=>"author",
  "href"=>"humans.txt"
]);
// access inside view
{!! Khead::getLink('author') !!}
// <link rel="author" href="humans.txt">
```

# script

```php
Khead::setScript('one',[
  "src"=>"test.js",
]);
// view
Khead::getScript('one');
// <script src="test.js"></script>
```
# title

```php
Khead::setTitle('this is a title');
// access view
{!! Khead::getTitle() !!}
```

# facebook open graph

```php
Khead::setOg([
  "app_id" => [
    "property"=>"fb:app_id",
    "content"=>"123456789"
  ],
  "url" => [
    "property"=>"og:url",
    "content"=>"https://example.com/page.html"
  ],
  "type" => [
    "property"=>"og:type", "content"=>"website"
  ],
  "title" => [
    "property"=>"og:title",
    "content"=>"Content Title"
  ],
  "image" => [
    "property"=>"og:image",
    "content"=>"https://example.com/image.jpg"
  ],
  "description" => [
    "property"=>"og:description",
    "content"=>"Description Here"
  ],
  "site_name" => [
    "property"=>"og:site_name",
    "content"=>"Site Name"
  ],
  "locale" => [
    "property"=>"og:locale",
    "content"=>"en_US"
  ],
  "author" => [
    "property"=>"article:author",
    "content"=>"@code4mk"
  ]
]);

// access with view

{!! Khead::getOg() !!}
```

# twitter cards

```php
Khead::setTwitCards([
  "card" => [
    "name" => "twitter:card",
    "content"=>"summary"
  ],
  "site" => [
    "name"=>"twitter:site",
    "content"=>"@code4mk"
  ],
  "creator" => [
    "name"=>"twitter:creator",
    "content"=>"@code4mk"
  ],
  "url" => [
    "name"=>"twitter:url",
    "content"=>"https://code4mk.org"
  ],
  "title" => [
    "name"=>"twitter:title",
    "content"=>"Content Title"
  ],
  "description" => [
    "name"=>"twitter:description",
    "content"=>"Content description less than 200 characters"
  ],
  "image" => [
    "name"=>"twitter:image",
    "content"=>"https://code4mk.org/image.jpg"
  ],
  "dnt" => [
    "name"=>"twitter:dnt",
    "content"=>"on"
  ]
]);
// access inside view

{!! Khead::getTwitCards() !!}
```

# Head tags

* [gist link](https://gist.github.com/lancejpollard/1978404)
* [gethead](https://gethead.info/)

<a href="https://twitter.com/0devco" target="_blank" ><p align="center" ><img src="https://raw.githubusercontent.com/0devco/docs/master/.devco-images/logo-transparent.png"></p></a>
