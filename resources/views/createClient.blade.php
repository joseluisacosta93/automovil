        @extends('layouts.master')    
          @section('title')
          <title>Crear Cliente</title>
          @endsection
          @section('script')
          
<script type="text/javascript">
    $( document ).ready(function() {
 
    $(".sendform").click(function() {
        
       
        
        $.ajax({
            url: "{{ URL::to('/')}}/create",
            method: "POST",

            data: {
                _token:$("input[name='_token']").val(),
                nameclient: $("#nameclient").val(),
                location_id: $("#location_id").val(),
                dealership_id: $("#dealership_id").val(),
            },
            success: function(data) {
            if(data.name){
             swal('Felicidades!','El Cliente: ' + data.name+' ha sido agregado correctamente' ,'success');
               
             $('#form')[0].reset();
             }else{
                console.log(data)
            swal('Lo sentimos', data.errorInfo[2] ,'error');
                
             } 
            }
        });
        
    });
      
});
</script>
   @endsection
    </head>
  
    @section('content')
    <body>

       
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                
                <form method="post" id="form" action="">
                    {{ csrf_field() }}
                  <div class="form-group">
                    <label for="nameclient">Nombre del Cliente</label>
                    <input type="text" class="form-control" name="nameclient" id="nameclient"  >
                    
              
                  
                    <label for="location_id">Localidad</label>
                    <select name="location_id" id="location_id" class="browser-default custom-select">
                      <option value="" disabled selected>Seleccione su localidad</option>
                      @foreach ($list["Locations"] as $location)
                        
                                 <option value="{{ $location->id }}">{{ $location->location }}</option>
                                
                             
                        @endforeach
                     
                   
                    </select>
                    <label for="dealership_id">Concesionario</label>
                    <select name="dealership_id" id="dealership_id" class="browser-default custom-select">
                      <option value="" disabled selected>Seleccione su concesionario</option>
                      @foreach ($list["Dealerships"] as $dealership)
                        
                                 <option value="{{ $dealership->id }}">{{ $dealership->name }}</option>
                                
                             
                        @endforeach
                     
                   
                    </select>
                 
                 
                  <button type="button" class="btn btn-primary sendform">Submit</button>
                      </div>
                </form>
                   
              
            </div>
        </div>
 @endsection