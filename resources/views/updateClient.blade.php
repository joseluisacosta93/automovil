        @extends('layouts.master')    
          @section('title')
          <title>Editar Clientes</title>
          @endsection
          @section('script')
          
<script type="text/javascript">
    $( document ).ready(function() {
 
    $(".sendform").click(function() {
        
       
        id=$(this).attr('data-value');
        $.ajax({
            url: "{{ URL::to('/')}}/editClient",
            method: "POST",

            data: {

                _token:$("input[name='_token']").val(),
                nameclient: $("#name_"+id).val(),
                id: id,
                location_id: $("#location_id_"+id).val(),
                dealership_id: $("#dealership_id_"+id).val(),
            },
            success: function(data) {
            if(data.name){
             swal('Felicidades!','El Cliente: ' + data.name+' ha sido actualizado correctamente' ,'success');
               
          
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
    @section('content')
    <body>

            <div class="content">
                <div class="title m-b-md">
                   Modificar Clientes
                </div>
                <div class="table-responsive">          
                  <table class="table">
                    <thead>
                      <tr>
                                   <td> Nombre</td>
                                
                                     <td>Localidad</td>
                                      <td>Concesionario</td>
                                      <td>Guardar Cambios</td>

                                 </tr>
                        @foreach ($list["Clients"] as $client)
                        
                                <tr>
                                   <td> <input type="text" value="{{ $client->name }}" id="name_{{ $client->id }}"></td>
                                
                                     <td> <select name="location_id" id="location_id_{{ $client->id }}" class="browser-default custom-select">
                      <option value="{{ $client->location_id }}"  selected="selected">{{ $client->location->location }}</option>
                      @foreach ($list["Locations"] as $location)
                        
                                 <option value="{{ $location->id }}">{{ $location->location }}</option>
                                
                             
                        @endforeach</td>
                                     <td> <select name="dealership_id" id="dealership_id_{{ $client->id }}" class="browser-default custom-select">
                      <option value="{{ $client->dealership_id }}"  selected="selected">{{ $client->dealership->name }}</option>
                      @foreach ($list["Dealerships"] as $dealership)
                        

                                 <option value="{{ $dealership->id }}">{{ $dealership->name }}</option>
                                  @endforeach</td>
                                     <td><i data-value="{{ $client->id }}" class="far fa-save sendform"></i></td>

                                 </tr>
                                
                             
                        @endforeach
                        {{ csrf_field() }}
                      </ul>  
                   
              
            </div>
             @endsection