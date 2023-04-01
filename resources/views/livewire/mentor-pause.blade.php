<div>
    @if(auth()->user()->role_id ==2)
        @if(auth()->user()->pause == null || auth()->user()->pause == 0)
        <button type="button" wire:click="togglePause({{auth()->user()->id}})" title="Click to pause collaborations" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 w-full dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Opened for collab</button>
        @else
        <button type="button" wire:click="togglePause({{auth()->user()->id}})" title="Click to come back active" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 w-full">Closed for collab</button>
        @endif
    @endif
</div>
