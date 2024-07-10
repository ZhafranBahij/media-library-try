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
                    <a href="{{ route('url-image.create') }}" class="bg-blue-300 text-blue-800 px-4 py-2 rounded-md my-2">Create +</a>
                    <table class="table-fixed">
                        <thead>
                          <tr>
                            <th>Action</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Name Chara</th>
                            <th>Author</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $item)
                                <tr>
                                    <td>
                                        <a href="{{ route('url-image.edit', $item->id) }}" class="bg-yellow-300 text-yellow-800 px-4 py-2 rounded-md my-2">Edit</a>
                                        <form action="{{ route('url-image.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-300 text-red-800 px-4 py-2 rounded-md my-2">Delete</button>
                                        </form>
                                    </td>
                                    <td>
                                        <img src="{{ $item->getFirstMediaUrl('*') }}" alt="">
                                    </td>
                                    <td>{{ $item->getFirstMedia('*')->name }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->author }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
