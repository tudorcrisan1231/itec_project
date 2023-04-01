<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Termwind\Components\Dd;
use App\Mail\AddUserEmail;
use Illuminate\Support\Facades\Mail;
class AddUsers extends Component
{
    public $quick_info, $email, $password, $start_date, $position,$name;
    public function addUser(){
      
        $start_date = strtotime($this->start_date);
        $now = time();
        $years = date('Y', $now) - date('Y', $start_date);

        if($years <= 1){
            $role_id = 3;
        } else {
            $role_id = 2;
        }
        // dd($role_id, $this->name, $this->quick_info, $this->email, $this->password, $this->start_date, $this->position);
        
        $user = User::create([
            'name' => $this->name,
            'role_id' => $role_id,
            'quick_info' => $this->quick_info,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'start_date' => $this->start_date,
            'position' => $this->position,
        ]);
        // $user->save();
        
        $mailData = [
            "email" =>  $this->email,
            "password" => $this->password
        ];
    
     
        Mail::to($this->email)->send(new AddUserEmail($mailData));




        //empty inputs
        $this->name = '';
        $this->quick_info = '';
        $this->email = '';
        $this->password = '';
        $this->start_date = '';
        $this->position = '';


 

        return redirect('/dashboard');
    }
    public function render()
    {
        return view('livewire.add-users');
    }
}
