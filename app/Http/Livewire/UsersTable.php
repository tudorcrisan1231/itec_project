<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Termwind\Components\Dd;

class UsersTable extends Component
{
    public $user_type, $users, $edit_user, $edit_name, $edit_quick_info, $edit_email, $edit_date, $edit_position;

    public function editUser($id){
        $this->edit_user = $id;
        $user = User::find($id);
        $this->edit_name = $user->name;
        $this->edit_quick_info = $user->quick_info;
        $this->edit_email = $user->email;
        $this->edit_date = $user->start_date;
        $this->edit_position = $user->position;

    }

    public function cancelEdit(){
        $this->edit_user = null;
    }

    public function saveUser($id){
        $user = User::find($id);
        $user->name = $this->edit_name;
        $user->quick_info = $this->edit_quick_info;
        $user->email = $this->edit_email;
        $user->start_date = $this->edit_date;
        $user->position = $this->edit_position;
        $user->save();
        $this->edit_user = null;
    }

    public function render()
    {
        if(auth()->user()->role_id == 1){
            $this->user_type = 'Manager';
            $this->users = User::where('role_id', '!=', 1)->get();
        } else if(auth()->user()->role_id == 2){
            
            $this->user_type = 'Old employee';
            $current_user = User::find(auth()->user()->id);
            $current_user_buddies = json_decode($current_user->buddys);

            
            $this->users = User::where('role_id', '!=', 1)->where('role_id', '!=', 2)->whereIn('id', $current_user_buddies)->get();
            

        } else {
            $this->user_type = 'New employee';

            $current_user = User::find(auth()->user()->id);
            $current_user_buddies = json_decode($current_user->buddys);
            $this->users =User::where('role_id', '!=', 1)->where('role_id', '!=', 3)->whereIn('id', $current_user_buddies)->get();
        }
        return view('livewire.users-table');
    }
}
