@section('message')
  
    @if(Session::has('success')) 
    <div class="alert alert-success"> 
        <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;{!! Session::get('success') !!} 
    </div> 
    @endif

    @if(Session::has('error')) 
    <div class="alert alert-danger"> 
        <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;{!! Session::get('error') !!} 
    </div> 
    @endif
    
    @if(Session::has('info')) 
    <div class="alert alert-info"> 
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;{!! Session::get('info') !!}  
    </div> 
    @endif
    
    @if(Session::has('warning')) 
    <div class="alert alert-warning"> 
        <span class="glyphicon glyphicon-alert" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;{!! Session::get('warning') !!} 
    </div> 
    @endif

    @if (isset($errors) and count($errors)>0 and !isset($hideErrors))
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

@show