<div class="bg-white mt-12 rounded-lg shadow-lg">
    <div class="p-6 border-b border-gray-200">
        <h5 class="text-xl font-semibold">{{ $user->name }}</h5>
    </div>
    <div class="p-6">

        @if ($errors->any())
            <div class="bg-red-500 text-white p-3 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('avatar.update') }}" method="post" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <!-- X-XSRF-TOKEN -->
            <div class="flex justify-center">
                @if($user->avatar)
                    <img src="{{ Storage::url($user->avatar) }}" class="rounded-full max-w-38 max-h-38">
                @else
                    <img src="/images/avatar.png" class="rounded-full max-w-38 max-h-38">
                @endif
            </div>

            <div>
                <label for="avatar" class="block text-sm font-medium text-gray-700">Wybierz avatar ...</label>
                <input
                    type="file"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    id="avatar"
                    name="avatar"
                >
                @error('avatar')
                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Zapisz dane</button>
                {{-- <a href="{{ route('user.profile') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Anuluj</a> --}}
            </div>
        </form>
    </div>
</div>
