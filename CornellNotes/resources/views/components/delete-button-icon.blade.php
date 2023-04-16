<form method="POST" action="{{ $url }}" accept-charset="UTF-8" style="display:inline">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
    <button type="submit" title="Delete Note" onclick="return confirm(&quot;¿Estás seguro? Se eliminará definitivamente&quot;)">
        {{ $slot }}
    </button>
</form>