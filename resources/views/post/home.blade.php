<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="py-4">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-category-tabs>
                    No Category
                </x-category-tabs>
            </div>
            <div class="mt-8 text-gray-900">   
                @forelse ($posts as $post)
                    {{-- <div class="flex bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 mb-8">   
                        <div class="p-5 flex-1">
                            <a href="#">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{$post->title}}
                                </h5>
                            </a>
                            <div class="mb-3 font-normal text-gray-700 dark:text-gray-400"> 
                                {{Str::words($post->content)}}
                            </div>
                            <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                Read more
                                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmls='http://www.w4.org/2000/svg' fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                </svg>
                            </a>
                        </div>
                        <a href="#">
                            <img class="w-48 h-full object-cover rounded-t-lg" src="https://flowbite.com/docs/images/blog/image-1.jpg" alt="#" />
                        </a>
                    </div> --}}
                    <x-post-item :post="$post"></x-post-item>
                @empty
                    <div class="text-center">No Post Available</div>     
                @endforelse       
            </div>
            {{$posts->links('vendor.pagination.simple-tailwind')}}
        </div>
    </div>
    {{-- {{$posts->links('pagination::simple-bootstrap-4')}} --}}
</x-app-layout>
