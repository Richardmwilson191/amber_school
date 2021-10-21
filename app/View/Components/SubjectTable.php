<?php

namespace App\View\Components;

use App\Models\Subject;
use Illuminate\View\Component;

class SubjectTable extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $subjects = Subject::all();
        return view('components.subject-table', compact('subjects'));
    }
}
