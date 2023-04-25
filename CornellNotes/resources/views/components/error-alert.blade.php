@if (session('error'))

<div class="flex items-center justify-center">
    <div id="error-alert" class="alert alert-error inline-block w-auto text-center text-white bg-red-500 rounded-3xl m-2 p-3 mx-auto">
        {{ session('error') }}
    </div>
</div>
<script>
    setTimeout(function(){
        document.getElementById("error-alert").remove();
    }, 1500);
</script>
@endif