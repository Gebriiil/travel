@if(session('message') != null )
<div class="note note-success">
    <h3 class="text-center">{{    session('message') }} </h3>
</div>
@endif