<x-app-layout>
    <div class="p-4">
        <div class="max-w-3xl mx-auto sm:p-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
            <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                @dump($errors->all())
                @csrf

                <!--Image-->

                <div>
                    <x-input-label for="image" :value="__('Image')" />
                    <x-text-input id="title" class="block mt-1 w-full p-1 " type="
                    file" name="image" :value="old('image')"  autofocus/>
                    <p>{{old('image')}}</p>
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>

                <!--Title-->

                <div class="mt-4">
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" autofocus/>
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <!--Category-->

                <div class="mt-4">
                    <x-input-label for="category_id" :value="__('Catagory')" />
                    <select name="category_id" id="category_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        <option value="" selected disabled>Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" @selected(old('category_id') == $category->id)>
                                {{$category->name}}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                </div>

                <!--Content-->

                <div class="mt-4">
                    <x-input-label for="content" :value="__('Content')" />
                    <x-input-text-area id="content" class="block mt-1 w-full" type="text" name="content" :value="old('content')" >
                        {{old('content')}}
                    </x-input-text-area>
                    <x-input-error :messages="$errors->get('content')" class="mt-2" />
                </div>
                
                <x-primary-button class="mt-4">
                    Submit
                </x-primary-button>
            </form>
            </div>
        </div>
    </div>
</x-app-layout>