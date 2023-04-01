<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Termwind\Components\Dd;

class UserProfile extends Component
{
    public $id_profile, $profile_data,$showDelete=0;
    public $worked_industries = [
        "0" => "Technology",
        "1" => "Healthcare",
        "2" => "Finance",
        "3" => "Education",
        "4" => "Retail",
        "5" => "Other",
    ];
    public $communication_style=[
        "0" => "Assertive",
        "1" => "Passive",
        "2" => "Aggresive",
    ];

    public function toggleDelete(){
        $this->showDelete = !$this->showDelete;
    }
    public function deleteUser($id){
        // dd($id);
        $user = User::find($id);
        $user->delete();
        return redirect('/');
    }
    public function render()
    {
        $this->profile_data = User::where('id', $this->id_profile)->first();
        if($this->profile_data){
            // dd($this->profile_data);
        } else {
            return abort(404);
        }
        return view('livewire.user-profile');
    }
}
