<div>
    <h3 class="text-3xl font-bold dark:text-white mb-4">All mentor - new employee matches:</h3>

    <ol class="space-y-4 text-gray-500 list-decimal list-inside dark:text-gray-400">
        @foreach ($mentors as $mentor)
        <li>
            <b>{{$mentor->name}}</b> - {{$mentor->email}}
            <ul class="pl-5 mt-2 space-y-1 list-disc list-inside">
                @php
                    if($mentor->buddys){
                        $employees_ids = json_decode($mentor->buddys); 
                        $employees = App\Models\User::whereIn('id', $employees_ids)->get();
                    }
                    
                @endphp
                @foreach ($employees as $employee)
                    <li class="flex items-center">
                        <div>{{$employee->name}} - {{$employee->email}}  </div>
                        <svg wire:click="removeMatch({{$mentor->id}}, {{$employee->id}})" class="w-4 h- cursor-pointer ml-3 text-red-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path>
                        </svg>


                    </li>
                @endforeach
            </ul>
        </li>
        @endforeach

    </ol>
    
    <button type="button" class="text-white bg-blue-700 mt-8 mb-4 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" wire:click="toggleModal">Add new matches</button>
 
    @if($isOpen)
        <div>
            <div>
                <label for="years" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mentor</label>
                <select id="yeaars" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" wire:model="mentor">
                    @foreach ($mentors as $mentor)
                        <option value="{{$mentor->id}}">{{$mentor->name}} - {{$mentor->email}}</option>
                    @endforeach
                  </select>
            </div>

            <div class="mt-4">
                <label for="years" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Employee</label>
                <select id="yeaars" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" wire:model="employee">
                   
                    @foreach ($employees2 as $employe)
                        <option value="{{$employe->id}}">{{$employe->name}} - {{$employe->email}}</option>
                    @endforeach
                  </select>
            </div>

            <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" wire:click="toggleModal">Close</button>

            <button type="button" class="focus:outline-none text-white bg-green-700 mt-6 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" wire:click="saveMatches()">Save</button>

        </div>
    @endif

</div>
