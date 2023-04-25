@if (session('success'))
<div class="flex items-center justify-center">
    <div id="success-alert" class="alert alert-success inline-block w-auto text-center text-white bg-green-500 rounded-3xl m-2 p-3 mx-auto">
        {{ session('success') }}
    </div>
</div>
<script>
    setTimeout(function(){
        document.getElementById("success-alert").remove();
    }, 1500);
</script>
@endif