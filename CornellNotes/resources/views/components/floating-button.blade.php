@if(isset($url))
<div class="fixed bottom-0 right-0 mb-4 mr-8">
  <a href="{{ $url ?? '' }}">
    <button {{ $event ?? '' }} class=" group flex items-center focus:outline-none focus:ring-2 focus:ring-indigo-500 hover:translate-x-5 dark:hover:bg-green-700 dark:bg-green-900 dark:focus:bg-green-900 dark:active:bg-green-900 text-white font-bold py-3 px-3 rounded-full overflow-hidden">
      <div class="w-6 h-6 text-white group-hover:inline-block">
        {{ $icon }}
      </div>
      <span class="hidden group-hover:inline-block ml-2 text-sm transition-all duration-500">{{ $slot }}</span>
    </button>
  </a>
</div>
@else
<div class="fixed bottom-0 right-0 mb-4 mr-8">
    <button {{ $event ?? '' }} class=" group flex items-center focus:outline-none focus:ring-2 focus:ring-indigo-500 hover:translate-x-5 dark:hover:bg-green-700 dark:bg-green-900 dark:focus:bg-green-900 dark:active:bg-green-900 text-white font-bold py-3 px-3 rounded-full overflow-hidden">
      <div class="w-6 h-6 text-white group-hover:inline-block">
        {{ $icon }}
      </div>
      <span class="hidden group-hover:inline-block ml-2 text-sm transition-all duration-500">{{ $slot }}</span>
    </button>
</div>
@endif  

