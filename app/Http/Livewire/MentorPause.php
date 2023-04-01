<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;


class MentorPause extends Component
{
    public function togglePause($mentor_id){
        $mentor = User::find($mentor_id);
        if($mentor->pause == null){
            $mentor->pause = 1;
        } else {
            $mentor->pause = !$mentor->pause;
        }
        $mentor->save();
        return redirect('/');
    }
    public function render()
    {
        return view('livewire.mentor-pause');
    }
}
