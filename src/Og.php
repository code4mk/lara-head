<?php

namespace Code4mk\LaraHead;

use Illuminate\Support\HtmlString;
use Illuminate\Support\Arr;

class Og
{
  public $metas = [];
  public $ogs = [];
  public $cards = [];
  public $title;

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

  public function setLink($name,$data = [])
  {
    $this->metas[$name] = $this->toHtmlString('<link' . $this->attributes($data) . '>');
  }

  public function getLink($key)
  {
    return  Arr::get($this->metas, $key, '');
  }

  public function setOg($data = [])
  {
    foreach ($data as $key => $value) {
      $this->ogs[] = $this->toHtmlString('<meta' . $this->attributes($value) . '>');
    }
  }

  public function getOg()
  {
    //$m =  implode("\n",$this->ogs)."</pre>";
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
    //$m =  implode("\n",$this->ogs)."</pre>";
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
          // For numeric keys we will assume that the value is a boolean attribute
          // where the presence of the attribute represents a true value and the
          // absence represents a false value.
          // This will convert HTML attributes such as "required" to a correct
          // form instead of using incorrect numerics.


          // Treat boolean attributes as HTML properties


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
