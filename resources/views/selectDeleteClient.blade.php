        @extends('layouts.master')    
          @section('title')
          <title>Eliminar Clientes</title>
          @endsection
          @section('script')
          
<script type="text/javascript">
    $( document ).ready(function() {
 
    $(".sendform").click(function() {
        
       Swal.fire({
        title: '¿Estas seguro?',
        text: "Se eliminara este registro!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si'
      }).then((result) => {/*
        if (result.value) {
          Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
          )
        }*/

         id=$(this).attr('data-value');
        $.ajax({
            url: "{{ URL::to('/')}}/deleteClient",
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
             swal('Felicidades!','El Cliente: '+ data.name+' ha sido eliminado correctamente' ,'success');
               
            $("#id_"+id).remove();
             }else{
                console.log(data)
            swal('Lo sentimos', data.errorInfo[2] ,'error');
                
             } 
            }
        });
      })
       
        
    });
      
});
</script>
   @endsection
    @section('content')
    <body>

            <div class="content">
                <div class="title m-b-md">
                   Eliminar Clientes
                </div>
                <div class="table-responsive">          
                  <table class="table">
                    <thead>
                      <tr>
                                   <td> Nombre</td>
                                
                                     <td>Localidad</td>
                                      <td>Concesionario</td>
                                      <td>Eliminar</td>

                                 </tr>
                        @foreach ($allClients as $client)
                        
                                <tr id="id_{{ $client->id }}">
                                   <td> {{ $client->name }}</td>
                                
                                     <td> {{ $client->location->location}} </td>
                                     <td>{{ $client->dealership->name }}</td>
                                     <td><i data-value="{{ $client->id }}" class="fa fa-trash sendform"></i></td>

                                 </tr>
                                
                             
                        @endforeach
                        {{ csrf_field() }}
                      </ul>  
                   
              
            </div>
             @endsection