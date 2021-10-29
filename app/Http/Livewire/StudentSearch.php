<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;

class StudentSearch extends Component
{
    public $value;
    public $studs;

    public function search()
    {
        $this->studs = Student::where('frst_nm', $this->value)
            ->orWhere('last_nm', $this->value)
            ->get()->toArray();
    }

    public function render()
    {
        return view('livewire.student-search');
    }
}
