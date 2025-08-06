<x-app-layout>
    <div class="p-4">
        <div class="max-w-3xl mx-auto sm:p-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">

                {{-- User Avatar --}}
                <h1 class="text-5xl mb-4">{{$post->title}}</h1>
                <div class="flex gap-4">
                   <x-user-avatar :user='$post->user' size='w-16 h-16'>
                   </x-user-avatar>
                    <div>
                        <x-follow-ctr :user="$post->user" class="flex gap-2">
                            <a href="{{route('profile.show', $post->user->username)}}" class="hover:underline">
                                {{$post->user->username}}    
                            </a>
                            &middot;
                            @if ($post->user->id != auth()->user()->id)
                                <button class="ml-4" x-text="following ? 'Unfollow' : 'Follow'" :class="following ? 'text-red-700' : 'text-emerald-700' " @click="follow()"></button>    
                            @endif
                            
                        </x-follow-ctr>
                        <div class="flex text-gray-700 gap-2 text-sm">
                            {{
                                $post->readTime()
                            }} min read
                            &middot;
                            {{
                                $post->created_at->format('M d, Y')
                            }}
                            </span>
                        </div>
                    </div>
                </div>
                {{-- User Avatar --}}


                {{-- Clap Section --}}
                <x-clapp-button :post="$post"></x-clapp-button>                    
                {{-- Clap Section --}}


                {{-- Content --}}
                <div class="mt-4">
                    <img src="{{$post->imageUrl()}}" alt="" class="w-full">
                    <div class="mt-4">
                        {{
                            $post->content
                        }}
                    </div>
                </div>
                {{-- Content --}}

                <div class="mt-8">
                    <span class="px-4 py-2 bg-gray-200 rounded-2xl">
                        {{$post->category->name}}
                    </span>
                </div>
                <div>
                    <x-clapp-button :post="$post">                    
                    </x-clap-button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>