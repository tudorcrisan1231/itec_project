<?php

namespace App\Http\Livewire;

use App\Mail\MatchFound;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Termwind\Components\Dd;

class UsersForm extends Component
{
    public $user_type, $confortable_stack = 'both';
    //general data
    public $work_years=0, $industries_worked=[];

    //front data & back data
    public $front_framework = [];
    public $back_framework = [];

    //extra data
    public $communication_style;

    public function submitForm($id){
        $user = User::find($id);
        //create a json file with the data
        $user_json = json_encode([
            'work_years' => $this->work_years,
            'industries_worked' => $this->industries_worked,
            'confortable_stack' => $this->confortable_stack,
            'front_framework' => $this->front_framework,
            'back_framework' => $this->back_framework,
            'communication_style' => $this->communication_style,
        ]);

        //save the json file in the database
        $user->info = $user_json;
        

        //match users with their buddies
        $users = User::all();
        $buddies = [];
        if($user->role_id == 3){ //daca e new atunci ii cautam un mentor cu skill uri asemanatoare
            $new_user_json = json_decode($user->info);
            $matches = 0;
            foreach($users as $value){
                if($value->role_id == 2 && $value->info != null && $value->pause != 1){//parcurgem toti mentorii posibili
                    //verificam daca skillurile sunt asemanatoare
                    //daca sunt asemanatoare ii facem match
                    $old_user_json = json_decode($value->info);
                    if($new_user_json->confortable_stack == $old_user_json->confortable_stack){
                        $matches++;
                    }
                    if($new_user_json->communication_style == $old_user_json->communication_style){
                        $matches++;
                    }
                    foreach($new_user_json->front_framework as $front){
                        foreach($old_user_json->front_framework as $old_front){
                            if($front == $old_front){
                                $matches++;
                            }
                        }
                    }
                    foreach($new_user_json->back_framework as $back){
                        foreach($old_user_json->back_framework as $old_back){
                            if($back == $old_back){
                                $matches++;
                            }
                        }
                    }
                    if($matches >= 2){
                        array_push($buddies, $value->id);
                        $mentor = User::find($value->id);
                        if($mentor->buddys == null){
                            $mentor->buddys = json_encode([$user->id]);
                        } else {
                            $mentor_buddys = json_decode($mentor->buddys);
                            //test if the user is already in the array
                            if(!in_array($user->id, $mentor_buddys)){
                                array_push($mentor_buddys, $user->id);
                                $mentor->buddys = json_encode($mentor_buddys);
                            }   
                        }
                        $mentor->save();

                        $mailData = [
                            "mentor" =>  $value->name,
                            "employee" => $user->name
                        ];
                        //get manager email
                        $manager = User::where('role_id', 1)->first();
                        Mail::to($manager->email)->send(new MatchFound($mailData));  //to manager(pt ca nu pot face multe requesturi la mailtrap deodata)
                    }
                }
            }
        }
   
       $user->buddys = json_encode($buddies);

       $user->save();
        return redirect('/');
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
