@if($isLink)
    <a href="{{ $url }}" class="inline-block bg-gray-500 hover:bg-gray-600 text-white font-bold py-3 px-4 rounded focus:outline-none focus:shadow-outline-grey active:bg-gray-800">
        {{ $label }}
    </a>
@else
    <button type="submit" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-3 px-4 rounded focus:outline-none focus:shadow-outline-grey active:bg-gray-800">
        {{ $label }}
    </button>
@endif
