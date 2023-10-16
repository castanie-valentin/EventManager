<x-app-layout>

    <form method="POST" class="mt-12 flex flex-col sm:justify-center items-center sm:pt-0 bg-gray-100 dark:bg-gray-900"
          action="{{route('event.update',['event'=>$event])}}">
        <h1 style="font-size: xx-large; font-weight: bolder" class="text-white">Modify the {{$event->name}} event !</h1>
        @csrf
        @method(('patch'))
        <div class="w-full sm:max-w-xl mt-4 px-4 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <div>
                <x-input-label class="text-white mt-3" for="name">Name of the event</x-input-label>
                <x-text-input :value="old('name', $event->name)" class=" w-full" id="name" name="name"/>
                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
            </div>
            <div>
                <x-input-label class="text-white mt-3" for="name">Theme of the event</x-input-label>
                <x-text-input :value="old('theme', $event->theme)" class="w-full" id="name" name="theme"/>
                <x-input-error :messages="$errors->get('theme')" class="mt-2"/>
            </div>
            <div>
                <x-input-label class="text-white mt-3" for="name">Location of the event</x-input-label>
                <x-text-input :value="old('location', $event->location)" class="w-full" id="name" name="location"/>
                <x-input-error :messages="$errors->get('location')" class="mt-2"/>
            </div>
            <div>
                <x-input-label class="text-white mt-3" for="description">Description of th event</x-input-label>
                <textarea
                    name="description"
                    class="text-white dark:bg-gray-900 dark:border-gray-700 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                >{{old('description', $event->description)}}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2"/>
            </div>
            <div>
                <x-input-label class="text-white mt-3" for="event_date">Date of the event</x-input-label>
                <x-text-input style="width: 40%" data-provide="datepicker" data-date-format="dd-mm-yyyy" id="event_date" type="date"
                              name="dateOfEvent" value="<?php echo date('Y-m-d'); ?>"/>
                <x-input-error :messages="$errors->get('dateOfEvent')" class="mt-2"/>
            </div>
        </div>

        <x-primary-button type="submit" class="mt-4">Submit</x-primary-button>
    </form>

</x-app-layout>
