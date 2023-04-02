<div>
    <h3 class="text-3xl font-bold dark:text-white mb-4">{{traduceri('add_translates')}}</h3>

    <div>
        <label for="key" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Key</label>
        <input type="text" id="key" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Key" required wire:model="key">
    </div> 
    <div>
        <label for="ro" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">RO</label>
        <input type="text" id="ro" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="RO" required wire:model="ro">
    </div> 
    <div>
        <label for="en" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">EN</label>
        <input type="text" id="en" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="EN" required wire:model="en">
    </div> 

    <button wire:click="addTranslate" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-5">
        <div>{{traduceri('submit')}}</div>
    </button>

    <div class="overflow-x-auto shadow-md sm:rounded-lg mt-6">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                Translates
            </caption>
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Key
                    </th>
                    <th scope="col" class="px-6 py-3">
                        RO
                    </th>
                    <th scope="col" class="px-6 py-3">
                        EN
                    </th>
                    <th scope="col" class="px-6 py-3 text-end">
                        {{traduceri('Action')}}
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($translates as $value)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        
                        <th scope="col" class="px-6 py-3">
                            {{$value->key}}
                        </th>
                        <th scope="col" class="px-6 py-3">
                            {{$value->ro}}
                        </th>
                        <th scope="col" class="px-6 py-3">
                            {{$value->en}}
                        </th>
                        <th scope="col" class="px-6 py-3 text-right">
                            <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline mr-2" wire:click="deleteTranslation({{$value->id}})">Delete</a>
                        </th>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
