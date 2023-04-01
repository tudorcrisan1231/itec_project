<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Termwind\Components\Dd;

class EmployeeMatches extends Component
{
    public $mentors, $isOpen, $mentor,$employees2, $employee;
    public function removeMatch($mentor_id, $employee_id){
        //delete employee from mentor
        $mentor = User::find($mentor_id);
        $mentor_buddies = json_decode($mentor->buddys);
        

        $mentor_buddies = array_diff($mentor_buddies, [$employee_id]);
        $mentor_buddies_new = [];
        foreach($mentor_buddies as $buddy){
            array_push($mentor_buddies_new, $buddy);
        }
 
        $mentor->buddys = json_encode($mentor_buddies_new);
        


        //delete mentor from employee
        $employee = User::find($employee_id);
        $employee_buddies = json_decode($employee->buddys);
        

        $employee_buddies = array_diff($employee_buddies, [$mentor_id]);
       

        $employee_buddies_new = [];
        foreach($employee_buddies as $buddy){
            array_push($employee_buddies_new, $buddy);
        }
 
        $employee->buddys = json_encode($employee_buddies_new);
        $mentor->save();
        $employee->save();
        return redirect('/');
    }

    public function toggleModal(){
        $this->isOpen = !$this->isOpen;
    }

    public function saveMatches(){
        $mentor = User::find($this->mentor);
        $employee = User::find($this->employee);
        $mentor_buddies = json_decode($mentor->buddys);
        $employee_buddies = json_decode($employee->buddys);
        
        if(!in_array($this->employee, $mentor_buddies) && !in_array($this->mentor, $employee_buddies)){
            array_push($mentor_buddies, $this->employee);
            array_push($employee_buddies, $this->mentor);
            $mentor->buddys = json_encode($mentor_buddies);
            $employee->buddys = json_encode($employee_buddies);
            $employee->save();
            $mentor->save();
        }
        return redirect('/');
        // dd(, $this->employee);
    }

    public function mount(){

        $this->mentor = User::where('role_id', 2)->first()->id;
        $this->employee = User::where('role_id', 3)->first()->id;
    }

    public function render()
    {
        $this->mentors = User::where('role_id', 2)->get();
        $this->employees2 = User::where('role_id', 3)->get();

        return view('livewire.employee-matches');
    }
}
