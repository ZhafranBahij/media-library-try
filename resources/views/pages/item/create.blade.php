<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Item') }}
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
                    <form action="{{ route('item.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="name" placeholder="name">
                        <input type="text" name="description" placeholder="description">
                        <input type="file" name="file">
                        <button type="submit" class="bg-blue-300 text-blue-800 px-4 py-2 rounded-md my-2">Create +</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
