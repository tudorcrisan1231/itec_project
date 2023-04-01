<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UsersForm extends Component
{
    public $user_type, $confortable_stack = 'both';
    //general data
    public $work_years, $industries_worked=[];

    //front data & back data
    public $front_framework = [];
    public $back_framework = [];

    //extra data
    public $communication_style;

    public function submitForm($id){
        dd($this->industries_worked, $this->front_framework, $this->back_framework, $this->communication_style, $this->confortable_stack, $this->work_years);
    }

    public function render()
    {
        if(auth()->user()->role_id == 1){
            $this->user_type = 'Manager';
        } else if(auth()->user()->role_id == 2){
            $this->user_type = 'Old employee';
        } else {
            $this->user_type = 'New employee';
        }

        
        return view('livewire.users-form');
    }
}
