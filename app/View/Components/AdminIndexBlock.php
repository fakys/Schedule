<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class AdminIndexBlock extends Component
{
    public $title = '';
    public $table = '';
    public function __construct($title, $table)
    {
        $this->title = $title;
        $this->table = $table;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin-index-block', ['title'=>$this->title, 'name_table'=>$this->table]);
    }
}
