<div>
    {{-- Success is as dangerous as failure. --}} 
    <h1 class="mb-4 text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4sxl text-center dark:text-white"><mark class="px-2 text-white bg-blue-600 rounded dark:bg-blue-500">{{$profile_data->name}}'s</mark> profile</h1>

    <div class="text-lg text-gray-900 dark:text-white flex items-center gap-4 mb-4">
        <div>Name:</div>
        @if($editProfile)
            <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Nume" required wire:model="edit_name">
            @else
            <div class=" text-gray-500 dark:text-gray-400">{{$profile_data->name}}</div>
        @endif
        
    </div>

   <div class="text-lg text-gray-900 dark:text-white flex items-center gap-4 mb-4">
        <div>Email:</div>
        
        @if($editProfile)
            <input type="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Email" required wire:model="edit_email">
            @else
            <div class=" text-gray-500 dark:text-gray-400">{{$profile_data->email}}</div>
        @endif
    </div> 

    <div class="text-lg text-gray-900 dark:text-white flex items-center gap-4 mb-4">
        <div>Quick info:</div>
        
        @if($editProfile)
            <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Quick info" required wire:model="edit_quickInfo">
            @else
            <div class=" text-gray-500 dark:text-gray-400">{{$profile_data->quick_info}}</div>
        @endif
    </div>

    <div class="text-lg text-gray-900 dark:text-white flex items-center gap-4 mb-4">
        <div>Position:</div>
        <div class=" text-gray-500 dark:text-gray-400 capitalize">{{$profile_data->position}}</div>
    </div>
    @if($profile_data->start_date)
        @php
            $start_date = strtotime($profile_data->start_date);
            $now = time();
            $years = date('Y', $now) - date('Y', $start_date);
        @endphp
        <div class="text-lg text-gray-900 dark:text-white flex items-center gap-4 mb-4">
            <div>Time in company:</div>
        
            <div class=" text-gray-500 dark:text-gray-400 capitalize">{{$profile_data->start_date}} ({{$years}} years)</div>
        </div>
    @endif
    @php
        $extra_data = json_decode($profile_data->info, true);
    @endphp
    @if($extra_data)
        <div class="text-lg text-gray-900 dark:text-white flex items-center gap-4 mb-4">
            <div>Worked industries:</div>
        
            @foreach ($extra_data['industries_worked'] as $value)
            <div class=" text-gray-500 dark:text-gray-400 capitalize">{{$worked_industries[$value]}},</div>
            @endforeach
        </div>

        <div class="text-lg text-gray-900 dark:text-white flex items-center gap-4 mb-4">
            <div>Confortable stack:</div>
            <div class=" text-gray-500 dark:text-gray-400 capitalize">{{$extra_data['confortable_stack']}}</div>
        </div>

        <div class="text-lg text-gray-900 dark:text-white flex items-center gap-4 mb-4">
            <div>Frontend framework:</div>
        
            @foreach ($extra_data['front_framework'] as $value)
            <div class=" text-gray-500 dark:text-gray-400 capitalize">{{$value}},</div>
            @endforeach
        </div>

        <div class="text-lg text-gray-900 dark:text-white flex items-center gap-4 mb-4">
            <div>Backend framework:</div>
        
            @foreach ($extra_data['back_framework'] as $value)
            <div class=" text-gray-500 dark:text-gray-400 capitalize">{{$value}},</div>
            @endforeach
        </div>

        <div class="text-lg text-gray-900 dark:text-white flex items-center gap-4 mb-4">
            <div>Communication style:</div>
        
            <div class=" text-gray-500 dark:text-gray-400 capitalize">{{$communication_style[(int)$extra_data['communication_style']]}}</div>
        </div>
    @endif

    @if(auth()->user()->id == $profile_data->id)
        @if($editProfile)
            <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" wire:click="cancelEdit()">Cancel edit</button>
            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" wire:click="saveData()">Save</button>
            @else
            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" wire:click="editProfile({{$profile_data->id}})">Edit basic data</button>
        @endif
        
        

        @if(auth()->user()->role_id == 3 )
        <button type="button" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" wire:click="editExtraProfile({{$profile_data->id}})">Edit extra data</button>

        @endif
    @endif

    @if(auth()->user()->role_id == 1)
        <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" wire:click="toggleDelete">Delete user</button>

        @if($showDelete)
            <div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50  p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full flex items-center justify-center">
                <div class="relative w-full h-full max-w-md md:h-auto">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button" wire:click="toggleDelete" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-6 text-center">
                            <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this?</h3>
                            <button data-modal-hide="popup-modal"  wire:click="deleteUser({{$profile_data->id}})" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2" >
                                Yes, I'm sure
                            </button>
                            <button wire:click="toggleDelete" data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif
</div>
