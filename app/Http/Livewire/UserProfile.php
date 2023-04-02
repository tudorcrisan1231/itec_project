<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Termwind\Components\Dd;

class UserProfile extends Component
{
    public $id_profile, $profile_data,$showDelete=0, $editProfile;
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
    public $edit_name,$edit_quickInfo, $edit_email;

    public function editProfile($id){
        $this->editProfile = $id;
        $this->edit_name = $this->profile_data->name;
        $this->edit_quickInfo = $this->profile_data->quick_info;
        $this->edit_email = $this->profile_data->email;
    }

    public function cancelEdit(){
        $this->editProfile = null;
    }

    public function saveData(){
        $user = User::find($this->editProfile);
        $user->name = $this->edit_name;
        $user->quick_info = $this->edit_quickInfo;
        $user->email = $this->edit_email;
        $user->save();
        $this->editProfile = null;
    }

    public function editExtraProfile(){
        $user = User::find($this->id_profile);
        $user->info = null;
        
       
        $user->buddys = null;
        

        $user->save();
        return redirect('/dashboard');
    }

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
