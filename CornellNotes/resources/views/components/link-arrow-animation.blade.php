<a href="{{ isset($url) ? $url : '' }}" class="flex justify-between items-center {{ isset($class) ? $class : '' }}">
    <span class="text-sm text-white {{ isset($class) ? $class : '' }}">{{ $slot }}</span>
    <span class="-translate-x-4 opacity-0 text-2xl transition duration-300 group-hover:opacity-100 group-hover:translate-x-0 {{ isset($class) ? $class : '' }}">&RightArrow;</span>
</a>