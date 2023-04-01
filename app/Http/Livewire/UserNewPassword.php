<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserNewPassword extends Component
{
    public $password;
    public function changePassword($id){
        $user = User::find($id);
        $user->password = Hash::make($this->password);
        $user->pass_change = 1;
        // dd('salut');
        $user->save();
       
        return redirect('/');
    }
    public function render()
    {
        return view('livewire.user-new-password');
    }
}
