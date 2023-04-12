
<div class="overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
            You are logged in as: <i>{{$user_type}}</i>

            <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">
                @if($user_type == 'Manager')
                Table of users
                @elseif($user_type == 'Old employee')
                Your buddies:
                @elseif($user_type == 'New employee')
                Your mentors:
                @endif
            </p>
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
                            $role_id = "New employee";
                        } else {
                            $role_id = "Mentor";
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
                                @if(auth()->user()->role_id != 2 )
                                    <input type="text"  wire:model="edit_position" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @else
                                    {{$user->position}}
                                @endif
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
                                <a href="/profile/{{$user->id}}" class="underline">{{$user->name}}</a>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{$user->email}}
                            </th>
                            <th scope="col" class="px-6 py-3 flex items-center">
                                <div>{{$user->quick_info}}</div>
                                
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{$user->position}}
                            </th>
                            
                            <th scope="col" class="px-6 py-3">
                                {{$user->start_date}} ({{$years}} years)
                            </th>

                            <td class="px-6 py-4 text-right flex items-center justify-end">
                                <svg wire:click="openChat({{auth()->user()->id}}, {{$user->id}})" style="width: 20px; height:20px;" class="mr-3" xmlns="http://www.w3.org/2000/svg" width="256" height="256" viewBox="0 0 256 256"><path fill="currentColor" d="M140 128a12 12 0 1 1-12-12a12 12 0 0 1 12 12Zm-56-12a12 12 0 1 0 12 12a12 12 0 0 0-12-12Zm88 0a12 12 0 1 0 12 12a12 12 0 0 0-12-12Zm60 12a104 104 0 0 1-152.88 91.82l-34.05 11.35a16 16 0 0 1-20.24-20.24l11.35-34.05A104 104 0 1 1 232 128Zm-16 0a88 88 0 1 0-164.19 44.06a8 8 0 0 1 .66 6.54L40 216l37.4-12.47a7.85 7.85 0 0 1 2.53-.42a8 8 0 0 1 4 1.08A88 88 0 0 0 216 128Z"/></svg>
                                @if(auth()->user()->role_id != 3 )
                                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"  wire:click="editUser({{$user->id}})" >Edit</a>
                                @endif
                            </td>
                        @endif
                          
                    </tr>
                    
                @endforeach
                @if(count($users)==0 && auth()->user()->role_id == 3)
                    <td colspan="7" class="px-6 py-4 text-center">
                        <p class="text-gray-400">No mentors found, please contact your manager!</p>
                    </td>
                @endif
            @endif

        </tbody>
    </table>


    <div class="absolute right-10 bottom-0 w-4/5 sm:w-80 h-80 rounded text-xs text-gray-700 bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
        <div class="flex items-center justify-between p-2 font-bold bg-gray-300 dark:bg-gray-900 rounded">
            <div>
                Tudor Crisan
            </div>
            <svg class="cursor-pointer" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M18.3 5.71a.996.996 0 0 0-1.41 0L12 10.59L7.11 5.7A.996.996 0 1 0 5.7 7.11L10.59 12L5.7 16.89a.996.996 0 1 0 1.41 1.41L12 13.41l4.89 4.89a.996.996 0 1 0 1.41-1.41L13.41 12l4.89-4.89c.38-.38.38-1.02 0-1.4z"/></svg>
        </div>


        <div>
            <label for="chat" class="sr-only">Your message</label>
            <div class="flex items-center px-1 py-2 rounded-lg bg-gray-50 dark:bg-gray-700">
                <textarea id="chat" rows="1" class="block mx-2 p-1.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your message..."></textarea>
                    <button type="submit" class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                    <svg aria-hidden="true" class="w-6 h-6 rotate-90" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path></svg>
                    <span class="sr-only">Send message</span>
                </button>
            </div>
        </div>
    </div>
</div>
