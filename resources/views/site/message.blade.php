@if(session()->get('danger'))
    <div class="alert alert-danger" style="position: absolute;width: 100%;text-align: center;">
        {{session()->get('danger')}}
    </div><br/>
@elseif(session()->get('success'))
    <div class="alert alert-success" style="position: absolute;width: 100%;text-align: center;">
        {{session()->get('success')}}
    </div><br>
@endif