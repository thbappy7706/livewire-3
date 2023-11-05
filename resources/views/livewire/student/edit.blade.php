<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="lg:grid lg:grid-cols-12 lg:gap-x-5">
        <div class="space-y-6 sm:px-6 lg:px-0 lg:col-span-12">

            <div class="text-xl">Edit student</div>

            <div class="col-auto">
                <form wire:submit="update">
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">First
                                name</label>
                            <input wire:model="name" type="text" id="first_name"
                                   class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   placeholder="John">
                            <div class="text-red-600">@error('name') {{ $message }} @enderror</div>

                        </div>
                        <div>
                            <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 ">Email</label>
                            <input wire:model="email" type="email" id="email"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   placeholder="john.doe@company.com">
                            <div class="text-red-600">@error('email') {{ $message }} @enderror</div>

                        </div>


                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Upload
                                image</label>
                            <input wire:model="image"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   id="file_input" type="file">
                            <div class="text-red-600">@error('image') {{ $message }} @enderror</div>
                            @if (
                                                $student
                                                    ?->getMedia()
                                                    ?->last()
                                                    ?->getUrl())
                                <div class="col-span-6 sm:col-span-4">
                                    <img src="{{ $student?->getMedia()?->last()?->getUrl() }}"
                                         alt="{{ $student->name }}" width="90px"/>
                                </div>
                            @endif

                        </div>

                        <div>

                            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 ">Select
                                Class</label>
                            <select id="countries" wire:model.live="classes_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Choose a class</option>
                                @foreach($classes as $class)
                                    <option value="{{$class->id}}">{{$class->name}}</option>
                                @endforeach
                            </select>
                            <div class="text-red-600">@error('classes_id') {{ $message }} @enderror</div>

                        </div>


                        <div>

                            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 ">Select
                                Section</label>
                            <select id="countries" wire:model="section_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Choose a section</option>
                                @foreach($sections as $section)
                                    <option value="{{$section->id}}"> {{$section->name}}
                                        - {{$section->classes->name}}</option>
                                @endforeach
                            </select>

                            <div class="text-red-600">@error('section_id') {{ $message }} @enderror</div>
                        </div>

                    </div>

                    <a href="{{route('students.index')}}"
                       class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                        Cancel
                    </a>

                    <button type="submit"
                            class="ml-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Submit
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>



