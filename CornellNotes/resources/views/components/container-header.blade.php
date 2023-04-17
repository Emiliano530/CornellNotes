@if(isset($col1) && isset($col2))
    <div class="grid grid-cols-2 w-full bg-transparent">
        <div class="p-8 text-left rounded-l-3xl">
            {{ $col1 ?? '' }}
        </div>
        <div class="p-8 text-right rounded-r-3xl">
            {{ $col2 ?? '' }}
        </div>
    </div>
@else
    <div class="grid w-full bg-transparent">
        <div class="p-8 text-center rounded-l-3xl {{ isset($class) ? $class : '' }}">
            {{ $col1 ?? '' }}
        </div>
    </div>
@endif