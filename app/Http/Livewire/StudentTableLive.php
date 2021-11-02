<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class StudentTableLive extends Component
{
    public $searchVal;
    // public $birthCert = [];

    use WithPagination;

    // public function updatedBirthCert()
    // {
    //     dd($this->birthCert);
    // }

    // public function birthCertUp($studentId)
    // {
    //     foreach ($this->birthCert as $key => $value) {
    //         Student::find($key)->update([
    //             'has_birth_cert' => $value
    //         ]);
    //     }
    // }
    public function birthCertUp($studentId)
    {
        $student = Student::find($studentId);
        if ($student->has_birth_cert) {
            $student->update([
                'has_birth_cert' => 0
            ]);
        } else {
            $student->update([
                'has_birth_cert' => 1
            ]);
        }
    }

    public function render()
    {
        return view('livewire.student-table-live', [
            'students' => Student::search('last_nm', $this->searchVal)->paginate(5)
        ]);
    }
}
