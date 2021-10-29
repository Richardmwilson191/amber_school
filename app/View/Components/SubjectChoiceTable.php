<?php

namespace App\View\Components;

use App\Models\Student;
use App\Models\SubjectChoice;
use Illuminate\View\Component;

class SubjectChoiceTable extends Component
{
    public $studentId;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($studentId = null)
    {
        $this->studentId = $studentId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        if ($this->studentId) {
            $subject_choices = Student::find($this->studentId)->subjectChoices;
        } else {
            $subject_choices = SubjectChoice::paginate(20)->sortBy('subject_id');
        }
        // dd($sub);
        // $subject_choices = Subject::whereRelation('subjectChoices', 'student_id', '=', $this->studentId)->get();
        return view('components.subject-choice-table', compact('subject_choices'));
    }
}
