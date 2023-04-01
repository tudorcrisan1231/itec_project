
<div>
    
    <div class="space-y-6" >
        <h5 class="text-xl font-medium text-gray-900 dark:text-white">For matching users with the same work type you need to complete the form below as a <mark class="px-2 text-white bg-blue-600 rounded dark:bg-blue-500">{{$user_type}}</mark>.</h5>
        <div>
            <label for="years" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">How many years of work experince do you have?</label>
            <select id="yeaars" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" wire:model="work_years">
                <option value="0">Less than 1 year</option>
                <option value="1">1-3 years</option>
                <option value="2">3-5 years</option>
                <option value="3">5-10 years</option>
                <option value="4">More than 10 years</option>
              </select>
        </div>
        <div>
            <label for="password1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">In what industries have you worked?</label>
            <div class="flex items-center">
                <input id="checked-checkbox1" type="checkbox" value="0" wire:model="industries_worked" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="checked-checkbox1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tehnology</label>
            </div>
            <div class="flex items-center">
                <input id="checked-checkbox2" type="checkbox" value="1" wire:model="industries_worked" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="checked-checkbox2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Healthcare</label>
            </div>
            <div class="flex items-center">
                <input id="checked-checkbox3" type="checkbox" value="2" wire:model="industries_worked" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="checked-checkbox3" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Finance</label>
            </div>
            <div class="flex items-center">
                <input id="checked-checkbox4" type="checkbox" value="3" wire:model="industries_worked" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="checked-checkbox4" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Education</label>
            </div>
            <div class="flex items-center">
                <input id="checked-checkbox5" type="checkbox" value="4" wire:model="industries_worked" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="checked-checkbox5" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Retail</label>
            </div>
            <div class="flex items-center">
                <input id="checked-checkbox6" type="checkbox" value="5" wire:model="industries_worked" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="checked-checkbox6" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Other</label>
            </div>
        </div>

        <div>
            <label for="years" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Are you confortable as front end dev or back end?</label>
            <div class="flex items-center">
                <input id="default-radio-1" type="radio" value="front" wire:model="confortable_stack"  name="default-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Frontend</label>
            </div>
            <div class="flex items-center">
                <input id="default-radio-2" type="radio" value="back" wire:model="confortable_stack"  name="default-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-radio-2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Backend</label>
            </div>
            <div class="flex items-center">
                <input id="default-radio-3" type="radio" value="both" wire:model="confortable_stack"  name="default-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-radio-3" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Both</label>
            </div>
        </div>


        @if($confortable_stack == 'front')
            <div>
                <label for="password1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Which frontend framework are you confortable to?</label>
                <div class="flex items-center">
                    <input id="checked-checkbox7" type="checkbox" value="react" wire:model="front_framework" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="checked-checkbox7" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">React</label>
                </div>
                <div class="flex items-center">
                    <input id="checked-checkbox8" type="checkbox" value="angular" wire:model="front_framework" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="checked-checkbox8" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Angular</label>
                </div>
                <div class="flex items-center">
                    <input id="checked-checkbox9" type="checkbox" value="vue" wire:model="front_framework" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="checked-checkbox9" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Vue</label>
                </div>
                
                <div class="flex items-center">
                    <input id="checked-checkbox10" type="checkbox" value="other" wire:model="front_framework" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="checked-checkbox10" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Other</label>
                </div>
            </div>
        @elseif($confortable_stack == 'back')
            <div>
                <label for="password1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Which backend framework are you confortable to?</label>
                <div class="flex items-center">
                    <input id="checked-checkbox7" type="checkbox" value="node" wire:model="back_framework" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="checked-checkbox7" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Node.js</label>
                </div>
                <div class="flex items-center">
                    <input id="checked-checkbox8" type="checkbox" value="django"  wire:model="back_framework" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="checked-checkbox8" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Django</label>
                </div>
                <div class="flex items-center">
                    <input id="checked-checkbox9" type="checkbox" value="ruby"  wire:model="back_framework" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="checked-checkbox9" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ruby on rails</label>
                </div>
                
                <div class="flex items-center">
                    <input id="checked-checkbox10" type="checkbox" value="other" wire:model="back_framework" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="checked-checkbox10" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Other</label>
                </div>
            </div>
        @else
            <div>
                <label for="password1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Which frontend framework are you confortable to?</label>
                <div class="flex items-center">
                    <input id="checked-checkbox7" type="checkbox" value="react" wire:model="front_framework" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="checked-checkbox7" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">React</label>
                </div>
                <div class="flex items-center">
                    <input id="checked-checkbox8" type="checkbox" value="angular" wire:model="front_framework" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="checked-checkbox8" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Angular</label>
                </div>
                <div class="flex items-center">
                    <input id="checked-checkbox9" type="checkbox" value="vue" wire:model="front_framework" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="checked-checkbox9" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Vue</label>
                </div>
                
                <div class="flex items-center">
                    <input id="checked-checkbox10" type="checkbox" value="other" wire:model="front_framework" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="checked-checkbox10" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Other</label>
                </div>
            </div>
            

            <div>
                <label for="password1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Which programming lang are you confortable with?</label>
                <div class="flex items-center">
                    <input id="checked-checkbox7_programming" type="checkbox" value="node" wire:model="back_framework" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="checked-checkbox7_programming" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Java</label>
                </div>
                <div class="flex items-center">
                    <input id="checked-checkbox8_programming" type="checkbox" value="django"  wire:model="back_framework" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="checked-checkbox8_programming" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Python</label>
                </div>
                <div class="flex items-center">
                    <input id="checked-checkbox9_programming" type="checkbox" value="ruby"  wire:model="back_framework" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="checked-checkbox9_programming" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ruby</label>
                </div>
                
                <div class="flex items-center">
                    <input id="checked-checkbox10_programming" type="checkbox" value="other" wire:model="back_framework" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="checked-checkbox10_programming" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Other</label>
                </div>
            </div>
        @endif


        <div>
            <label for="years" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">What is your communication style?</label>
            <div class="flex items-center">
                <input id="default-radio-communication-1" type="radio" value="0" wire:model="communication_style"   name="default-radio-communication" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-radio-communication-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Assertive</label>
            </div>
            <div class="flex items-center">
                <input id="default-radio-communication-2" type="radio" value="1" wire:model="communication_style"  name="default-radio-communication" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-radio-communication-2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Passive</label>
            </div>
            <div class="flex items-center">
                <input id="default-radio-communication-3" type="radio" value="2" wire:model="communication_style"  name="default-radio-communication" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-radio-communication-3" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Aggresive</label>
            </div>
        </div>





        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" wire:click="submitForm({{auth()->user()->id}})">
            <div wire:loading.remove>Submit form</div>

            <svg wire:loading xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><circle cx="12" cy="2" r="0" fill="currentColor"><animate attributeName="r" begin="0" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(45 12 12)"><animate attributeName="r" begin="0.125s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(90 12 12)"><animate attributeName="r" begin="0.25s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(135 12 12)"><animate attributeName="r" begin="0.375s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(180 12 12)"><animate attributeName="r" begin="0.5s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(225 12 12)"><animate attributeName="r" begin="0.625s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(270 12 12)"><animate attributeName="r" begin="0.75s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(315 12 12)"><animate attributeName="r" begin="0.875s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle></svg>
        </button>
        
    </div>
</div>
