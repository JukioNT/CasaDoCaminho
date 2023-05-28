@if(session()->get('danger'))
    <div class="alert alert-danger">
        {{session()->get('danger')}}
    </div><br/>
@elseif(session()->get('success'))
    <div class="alert alert-success">
        {{session()->get('success')}}
    </div><br>
@endif