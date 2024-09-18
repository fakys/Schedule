<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class AdminIndexBlock extends Component
{
    public $model;
    public function __construct($model)
    {
        $this->model= $model;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin-index-block', ['model'=>$this->model]);
    }
}
