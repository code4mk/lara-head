<?php

namespace Code4mk\LaraHead;

/**
 * @author    @code4mk <hiremostafa@gmail.com>
 * @author    @0devco <with@0dev.co>
 * @copyright 0dev.co (https://0dev.co)
 */

use Illuminate\Support\HtmlString;
use Illuminate\Support\Arr;

class Head
{
  private $metas = [];
  private $links = [];
  private $scripts = [];
  private $ogs = [];
  private $cards = [];
  private $title;

  public function setTitle($data)
  {
    $this->title = $this->toHtmlString('<title>' . $data . '</title>');
  }

  public function getTitle()
  {
    return $this->title;
  }

  public function setMeta($name,$data = [])
  {
    $this->metas[$name] = $this->toHtmlString('<meta' . $this->attributes($data) . '>');
  }

  public function getMeta($key)
  {
    return  Arr::get($this->metas, $key, '');
  }

  public function setScript($name,$data = [])
  {
    $this->scripts[$name] = $this->toHtmlString('<script' . $this->attributes($data) . '>' . "" . "</script>");
  }

  public function getScript($key)
  {
    return  Arr::get($this->scripts, $key, '');
  }

  public function setLink($name,$data = [])
  {
    $this->links[$name] = $this->toHtmlString('<link' . $this->attributes($data) . '>');
  }

  public function getLink($key)
  {
    return  Arr::get($this->links, $key, '');
  }

  public function setOg($data = [])
  {
    foreach ($data as $key => $value) {
      $this->ogs[] = $this->toHtmlString('<meta' . $this->attributes($value) . '>');
    }
  }

  public function getOg()
  {
    $m = "\t\t";
    return implode("\n{$m}",$this->ogs);
  }

  public function setTwitCards($data = [])
  {
    foreach ($data as $key => $value) {
      $this->cards[] = $this->toHtmlString('<meta' . $this->attributes($value) . '>');
    }
  }

  public function getTwitCards()
  {
    $m = "\t\t";
    return implode("\n{$m}",$this->cards);
  }
  /**
  * Build an HTML attribute string from an array.
  *
  * @param array $attributes
  *
  * @return string
  */
  public function attributes($attributes)
  {
    $html = [];
    foreach ((array) $attributes as $key => $value) {
      $element = $this->attributeElement($key, $value);
        if (! is_null($element)) {
          $html[] = $element;
      }
    }
    return count($html) > 0 ? ' ' . implode(' ', $html) : '';
  }

  /**
   * Build a single attribute element.
   *
   * @param string $key
   * @param string $value
   *
   * @return string
   */
    protected function attributeElement($key, $value)
    {
      if (! is_null($value)) {
          return $key . '="' . e($value, false) . '"';
      }
    }

  /**
   * Transform the string to an Html serializable object
   *
   * @param $html
   *
   * @return \Illuminate\Support\HtmlString
   */
    protected function toHtmlString($html)
    {
      return new HtmlString($html);
    }
}
