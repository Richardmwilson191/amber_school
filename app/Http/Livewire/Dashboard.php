<?php

namespace App\Http\Livewire;

use App\Models\Subject;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Password;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;
    public $name, $email, $subjects, $assignedSubject, $teacherId;

    public $isOpenATModal = false;
    public $isOpenASModal = false;

    public function openModal($propName)
    {
        $this->{$propName} = true;
        // $this->closeModal('isOpenAsModal');
    }

    public function closeModal($propName)
    {
        $this->{$propName} = false;
    }

    public function addTeacher()
    {
        $this->teacher = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        $status = Password::sendResetLink([
            'email' => $this->email
        ]);

        $this->closeModal('isOpenATModal');

        $this->loadSubjects($this->teacher->id);

        // session()->flash('message')

        // return $status === Password::RESET_LINK_SENT
        //     ? back()->with(['status' => __($status)])
        //     : back()->withErrors(['email' => __($status)]);
    }

    public function mount()
    {
        // $this->teachers = User::where('is_admin', 0)->paginate(5);
    }

    public function loadSubjects($id)
    {
        $this->teacherId = $id;
        $this->subjects = Subject::where('user_id', null)->get();
        $this->openModal('isOpenASModal');
    }

    public function assignSubject()
    {
        Subject::find($this->assignedSubject)->update([
            'user_id' => $this->teacherId
        ]);
    }

    public function render()
    {
        return view('livewire.dashboard', [
            'teachers' => User::where('is_admin', 0)->paginate(5)
        ]);
    }
}
