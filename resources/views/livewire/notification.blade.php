<div>
    <h1 class="mb-4 text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4sxl text-center dark:text-white"><mark class="px-2 text-white bg-blue-600 rounded dark:bg-blue-500">Notificari</mark></h1>

    
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Mesaj
                    </th>
                    <th scope="col" class="px-6 py-3">
                        De la
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Data
                    </th>
                   
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($notifications as $item)
                
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{traduceri($item->message)}}
                        </th>
                        <td class="px-6 py-4">
                            {{App\Models\User::find($item->sender_id)->name}}
                        </td>
                        <td class="px-6 py-4">
                            {{$item->data}}
                        </td>
                     
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Mark as read</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


</div>
