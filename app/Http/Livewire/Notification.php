<?php

namespace App\Http\Livewire;

use App\Models\Notification as ModelsNotification;
use App\Models\User;
use Livewire\Component;
use Termwind\Components\Dd;

class Notification extends Component
{
    public $notifications;
    public function render()
    {
        $this->notifications = ModelsNotification::whereJsonContains('receiver_id', auth()->user()->id)->where('status', 0)->orderBy('created_at', 'desc')->get();

        return view('livewire.notification');
    }
}
