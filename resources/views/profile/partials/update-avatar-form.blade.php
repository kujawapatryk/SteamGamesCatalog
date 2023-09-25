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
            <div>
                <div class="flex justify-center cursor-pointer" onclick="triggerFileInput()">
                    @if($user->avatar)
                        <img src="{{ Storage::url($user->avatar) }}" class="rounded-full max-w-38 max-h-38">
                    @else
                        <img src="/images/avatar.png" class="rounded-full max-w-38 max-h-38">
                    @endif
                </div>
            </div>

            <script>
                function triggerFileInput() {
                    document.getElementById('avatar').click();
                }
            </script>

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
                <x-btn label="Zapisz"></x-btn>
            </div>
        </form>
    </div>
</div>
