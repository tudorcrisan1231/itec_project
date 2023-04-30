<?php

namespace App\Http\Livewire;

use App\Models\Notification;
use Livewire\Component;

class NavNotifications extends Component
{
    public $notification_count = 0;

    protected $listeners = [
        'notificationMarkedRead' => '$refresh', // refresh the component when an event is emitted
    ];

    public function render()
    {
        $this->notification_count = Notification::whereJsonContains('receiver_id', auth()->user()->id)->where('status', 0)->orderBy('created_at', 'desc')->count();
        return view('livewire.nav-notifications');
    }
}
