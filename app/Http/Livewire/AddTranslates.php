<?php

namespace App\Http\Livewire;

use App\Models\Translates;
use Livewire\Component;

class AddTranslates extends Component
{
    public $key, $ro,$en, $translates;
    public function addTranslate(){
        $translate = new Translates();
        $translate->key = $this->key;
        $translate->ro = $this->ro;
        $translate->en = $this->en;
        $translate->save();
        return redirect('/add-translates');
    }
    public function deleteTranslation($id){
        $translate = Translates::find($id);
        $translate->delete();
        return redirect('/add-translates');
    }
    public function render()
    {
        $this->translates = Translates::all();
        return view('livewire.add-translates');
    }
}
