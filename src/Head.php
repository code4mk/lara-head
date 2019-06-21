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
  /**
   * hold all metas
   *
   *@var  array $metas
   */
  private $metas = [];

  /**
   * hold all links
   *
   *@var  array $links
   */
  private $links = [];

  /**
   * hold all scripts
   *
   *@var  array $scripts
   */
  private $scripts = [];

  /**
   * hold all open graph meta
   *
   *@var  array $ogs
   */
  private $ogs = [];

  /**
   * hold all twitter cards metas
   *
   *@var  array $cards
   */

  private $cards = [];

  /**
   * hold title
   *
   *@var  string $tilte
   */
  private $title;


  /**
   * set title meta
   *
   *@param  string $data
   *@return $this
   */
  public function setTitle($data)
  {
    $this->title = $this->toHtmlString('<title>' . $data . '</title>');
  }

  /**
   * get title meta
   *
   *@return  string
   */
  public function getTitle()
  {
    return $this->title;
  }

  /**
   * set single meta
   *
   *@param  string $name
   *@param array $data
   *@return $this
   */
  public function setMeta($name,$data = [])
  {
    $this->metas[$name] = $this->toHtmlString('<meta' . $this->attributes($data) . '>');
  }

  /**
   * get single meta
   *
   *@param string $key
   */
  public function getMeta($key)
  {
    return  Arr::get($this->metas, $key, '');
  }

  /**
   * set script
   *
   *@param  string $name
   *@param array $data
   *@return $this
   */
  public function setScript($name,$data = [])
  {
    $this->scripts[$name] = $this->toHtmlString('<script' . $this->attributes($data) . '>' . "" . "</script>");
  }

  /**
   * get scripts
   *
   *@param  string $key
   */
  public function getScript($key)
  {
    return  Arr::get($this->scripts, $key, '');
  }

  /**
   * set link css
   *
   *@param  string $name
   *@param array $data
   *@return $this
   */
  public function setLink($name,$data = [])
  {
    $this->links[$name] = $this->toHtmlString('<link' . $this->attributes($data) . '>');
  }

  /**
   * get link caa
   *
   *@param  string $key
   */
  public function getLink($key)
  {
    return  Arr::get($this->links, $key, '');
  }

  /**
   * set fb open graph meta
   *
   *@param  array $data
   *@return $this
   */
  public function setOg($data = [])
  {
    foreach ($data as $key => $value) {
      $this->ogs[] = $this->toHtmlString('<meta' . $this->attributes($value) . '>');
    }
  }

  /**
   * get fb open graph metas
   *
   *
   */
  public function getOg()
  {
    $m = "\t\t";
    return implode("\n{$m}",$this->ogs);
  }

  /**
   * set twitter cards meta
   *
   *@param  array $data
   *@return $this
   */
  public function setTwitCards($data = [])
  {
    foreach ($data as $key => $value) {
      $this->cards[] = $this->toHtmlString('<meta' . $this->attributes($value) . '>');
    }
  }

  /**
   * get twitter cards
   *
   *
   */
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
