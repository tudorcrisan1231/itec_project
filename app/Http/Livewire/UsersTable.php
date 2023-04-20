<?php

namespace App\Http\Livewire;

use App\Models\Chats;
use App\Models\User;
use Livewire\Component;
use Termwind\Components\Dd;


class UsersTable extends Component
{
    public $user_type, $users, $edit_user, $edit_name, $edit_quick_info, $edit_email, $edit_date, $edit_position, $message, $receiver_id = null, $sender_id = null, $receiver, $sender, $chat;


    public function openChat($sender_id, $receiver_id){
        $this->sender_id = $sender_id;
        $this->receiver_id = $receiver_id;
        $this->message = '';

        $this->receiver = User::find($receiver_id);

        $chat1 = Chats::where('sender_id', $sender_id)->where('receiver_id', $receiver_id)->first();
        $chat2 = Chats::where('sender_id', $receiver_id)->where('receiver_id', $sender_id)->first();
        $this->chat = $chat1 ?? $chat2;
        // $this->sender = User::find($sender_id);
    }
    public function closeChat(){
        $this->sender_id = null;
        $this->receiver_id = null;
    }

    public function sendMessage(){
        //find existing chat
        $chat1 = Chats::where('sender_id', $this->sender_id)->where('receiver_id', $this->receiver_id)->first();
        $chat2 = Chats::where('sender_id', $this->receiver_id)->where('receiver_id', $this->sender_id)->first();
        $chat = $chat1 ?? $chat2;
        if($chat){
            //push new message format 
            $mesaj_current = json_decode($chat->messages);
          
            array_push($mesaj_current, [
                'sender_id' => $this->sender_id,
                'receiver_id' => $this->receiver_id,
                'message' => $this->message,
                'time' => date("d-m-Y h:i:s"),
            ]);
            $chat->messages = json_encode($mesaj_current);
            $chat->save();
        } else {
            $chat = new Chats();
            $chat->sender_id = $this->sender_id;
            $chat->receiver_id = $this->receiver_id;
            $mesaj = [
                [
                    'sender_id' => $this->sender_id,
                    'receiver_id' => $this->receiver_id,
                    'message' => $this->message,
                    'time' => date("d-m-Y h:i:s"),
                ]
            ];
            $chat->messages = json_encode($mesaj);
            $chat->save();
        }

        $this->message = '';
        $chat1 = Chats::where('sender_id', $this->sender_id)->where('receiver_id', $this->receiver_id)->first();
        $chat2 = Chats::where('sender_id', $this->receiver_id)->where('receiver_id', $this->sender_id)->first();
        $this->chat = $chat1 ?? $chat2;
    }


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
