
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
            You are logged in as: <i>{{$user_type}}</i>
            <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Table of users</p>
        </caption>
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Type
                </th>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Quick info
                </th>
                <th scope="col" class="px-6 py-3">
                    Position
                </th>
                <th scope="col" class="px-6 py-3">
                    Company time
                </th>
                <th scope="col" class="px-6 py-3 text-end">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @if($users)
            @foreach ($users as $user)
                @php
                    $start_date = strtotime($user->start_date);
                    $now = time();
                    $years = date('Y', $now) - date('Y', $start_date);

                    if($years <= 1){
                        $role_id = "New";
                    } else {
                        $role_id = "Old";
                    }
                @endphp
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    @if($edit_user == $user->id)
                        <th scope="col" class="px-6 py-3">
                            {{$role_id}}
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <input type="text" wire:model="edit_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <input type="text"  wire:model="edit_email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <input type="text"  wire:model="edit_quick_info" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <input type="text"  wire:model="edit_position" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        
                        <th scope="col" class="px-6 py-3">
                            @if(auth()->user()->role_id == 1)
                            <input type="date" wire:model="edit_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @else
                            {{$user->start_date}} ({{$years}} years)
                            @endif
                        </th>

                        <td class="px-6 py-4 text-right">
                            <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline mr-2" wire:click="cancelEdit()">Cancel</a>
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" wire:click="saveUser({{$user->id}})">Save</a>
                        </td>
                    @else
                        <th scope="col" class="px-6 py-3">
                            {{$role_id}}
                        </th>
                        <th scope="col" class="px-6 py-3">
                            {{$user->name}}
                        </th>
                        <th scope="col" class="px-6 py-3">
                            {{$user->email}}
                        </th>
                        <th scope="col" class="px-6 py-3">
                            {{$user->quick_info}}
                        </th>
                        <th scope="col" class="px-6 py-3">
                            {{$user->position}}
                        </th>
                        
                        <th scope="col" class="px-6 py-3">
                            {{$user->start_date}} ({{$years}} years)
                        </th>

                        <td class="px-6 py-4 text-right">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" wire:click="editUser({{$user->id}})">Edit</a>
                        </td>
                    @endif

                   
                </tr>
                
            @endforeach
            @endif

        </tbody>
    </table>
</div>
