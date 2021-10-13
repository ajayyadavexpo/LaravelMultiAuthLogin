<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Posts Edit (<b>Author: </b> {{ $post->author->name }})
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
            
                    <form method="POST" action="{{ route('admin.posts.update',$post->id)}}">
                        @csrf
                        @method('PATCH')
                        <div class="flex-col flex py-3">
                            <label class="pb-2 text-gray-700 font-semibold">Title</label>
                            <input type="text" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" placeholder="title" name="title" value="{{ $post->title }}">
                        </div>
                        <div class="flex-col flex py-3">
                            <label class="pb-2 text-gray-700 font-semibold">Description</label>
                            <textarea type="text" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200" rows="9" placeholder="title" name="description">{{$post->description }}</textarea>
                        </div>

                        <button class="px-4 py-2 rounded text-white inline-block shadow-lg bg-blue-500 hover:bg-blue-600 focus:bg-blue-700" type="submit">Update</button>
                        
                    </form>


                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
