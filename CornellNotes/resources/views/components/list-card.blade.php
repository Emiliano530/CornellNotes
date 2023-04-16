<a href="{{ $url ?? '' }}">
<div class="container p-0 mt-4 bg-gray-900 hover:bg-cyan-500 border-2 hover:bg-opacity-50 bg-opacity-50 rounded-3xl">
    <div class="grid grid-cols-2 w-full bg-transparent">
    <div class="p-8 text-left rounded-l-3xl">
        {{ $col1 }}
    </div>
    <div class="p-8 text-right rounded-r-3xl">
        <span class="inline-flex items-center font-medium text-blue-600 dark:text-green-500 dark:hover:text-green-300 hover:underline">
        {{ $slot }}
        <svg aria-hidden="true" class="w-5 h-5 ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </span>
    </div>
    </div>
</div>
</a>