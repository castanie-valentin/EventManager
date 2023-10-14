<x-app-layout>

        <form class="min-h-screen flex flex-col sm:justify-center items-center pt-4 sm:pt-0 bg-gray-100 dark:bg-gray-900"
                  action="{{route('event.store')}}">
            @csrf
            <div class="w-full sm:max-w-md mt-4 px-4 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                <div>
                    <x-input-label class="text-white mt-3" for="name">Name of the event</x-input-label>
                    <x-text-input class=" w-full" id="name" name="name"/>
                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                </div>
                <div>
                    <x-input-label class="text-white mt-3" for="name">Theme of the event</x-input-label>
                    <x-text-input class="w-full" id="name" name="theme"/>
                    <x-input-error :messages="$errors->get('theme')" class="mt-2"/>
                </div>
                <div>
                    <x-input-label class="text-white mt-3" for="name">Location of the event</x-input-label>
                    <x-text-input class="w-full" id="name" name="location"/>
                    <x-input-error :messages="$errors->get('location')" class="mt-2"/>
                </div>
                <div>
                    <x-input-label class="text-white mt-3" for="description">Description of th event</x-input-label>
                    <textarea
                        name="description"
                        placeholder="{{ __('What\'s on your mind?') }}"
                        class="dark:bg-gray-900 dark:border-gray-700 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    >{{ old('description') }}</textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                </div>
                <div>
                    <x-input-label class="text-white  mt-3" for="event_date">Date of the event</x-input-label>
                    <x-text-input data-provide="datepicker" data-date-format="dd-mm-yyyy" id="event_date" type="date"
                           name="dateOfEvent" value="<?php echo date('Y-m-d'); ?>"/>
                </div>
            </div>

            <x-primary-button type="submit" class="mt-4">Validé</x-primary-button>
        </form>

</x-app-layout>
