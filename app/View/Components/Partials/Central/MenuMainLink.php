<?php

namespace App\View\Components\Partials\Central;

use Illuminate\View\Component;

class MenuMainLink extends Component
{
    public $title;
    public $icon;
    public $url;
    public $type;
    public $class;
    public $iconWidth;

    public function __construct(
      $title = null,
      $icon = null,
      $url = null,
      $type = null,
      $class = null
      )
    {
      $this->title = $title;
      $this->icon  = $icon;
      $this->url   = $url;
      $this->type  = $type;
      $this->class = $class;
      if($url)
      {
        $this->url = '';
      }
    }

    public function render()
    {
        return view('components.partials.central.menu-main-link');
    }
}
