<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Image Collection') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($errors->any())
                        <div class="text">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('url-image.update', $data->id) }}" method="post"  enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <img src="{{ $data->getFirstMediaUrl('*') }}" alt="">
                        <input type="text" name="name" placeholder="name" value="{{ $data->name }}">
                        <input type="text" name="author" placeholder="author" value="{{ $data->author }}">
                        <input type="text" name="url" placeholder="url" value="{{ $data->url }}">
                        <button type="submit" class="bg-blue-300 text-blue-800 px-4 py-2 rounded-md my-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
