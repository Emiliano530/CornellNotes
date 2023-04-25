<form method="POST" action="{{ $url ?? ''}}" accept-charset="UTF-8" class="form-delete">
    {{ method_field('DELETE') }}
    {{ csrf_field() }}
    <button type="submit" title="Eliminar" onclick="return confirm(&quot;¿Seguro de querer eliminarlo?&quot;)">
        {{ $slot }}
    </button>
</form>
