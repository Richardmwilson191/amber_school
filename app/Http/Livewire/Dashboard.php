<?php

namespace App\Http\Livewire;

use App\Models\Subject;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Password;

class Dashboard extends Component
{
    public $name, $email, $subjects;

    public $isOpenATModal = false;
    public $isOpenASModal = false;

    public function openModal($propName)
    {
        $this->{$propName} = true;
        $this->closeModal('isOpenASModal');
    }

    public function closeModal($propName)
    {
        $this->{$propName} = false;
    }

    public function addTeacher()
    {
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        $status = Password::sendResetLink([
            'email' => $this->email
        ]);

        $this->closeModal('isOpenATModal');

        $this->assignSubject();

        $this->openModal('isOpenASModal');


        // session()->flash('message')

        // return $status === Password::RESET_LINK_SENT
        //     ? back()->with(['status' => __($status)])
        //     : back()->withErrors(['email' => __($status)]);
    }

    public function assignSubject()
    {
        $this->subjects = Subject::all();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
