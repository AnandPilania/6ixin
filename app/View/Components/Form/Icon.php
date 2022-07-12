<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Icon extends Component
{
    public $path;
    public $viewBox;
    public $fill;
    public $stroke;
    public $height;
    public $width;
    public $iconWidth;
    public $class;
    public $type;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
      $path = null,
      $viewBox = '0 0 24 24',
      $fill = 'none',
      $type = null,
      $stroke = null,
      $height = 4,
      $width = 4,
      $iconWidth = 1,
      $class = null
      )
    {
      $this->path = config('icon.models.'.$path.'.path');
      $this->viewBox = $viewBox;
      $this->fill = $fill;
      $this->stroke = $stroke;
      $this->height = $height;
      $this->width = $width;
      $this->iconWidth = $iconWidth;
      $this->class = $class;
      if(!$class)
        {
          $this->class = 'mr-1.5';
        };
      if(!$stroke)
        {
          $this->stroke = 'currentColor';
        };
      if($type)
        {
          $this->path = config($type.'.models.'.$path.'.path');
          $this->viewBox = config($type.'.models.'.$path.'.viewBox');
        };


    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.icon');
    }
}
