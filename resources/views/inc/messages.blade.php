@if(count($errors)> 0)
    @foreach ($errors->all() as $error)
        <div>
                {{$error}}
        </div>
    @endforeach
@endif

@if (session('success'))
        <div>
            {{session('success')}}
        </div>      
@endif

@if (session('duplicate'))
    <div>
        {{session('duplicate')}}
    </div>      
@endif