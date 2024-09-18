<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\File;
use Illuminate\View\Component;

class CreateComponent extends Component
{
    public $model;
    public function __construct($data)
    {
        $this->model = $data['model'];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        return view("components.form.form-{$this->model::nameTable()}-component", ['model'=>$this->model]);
    }
}
