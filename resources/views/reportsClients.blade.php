        @extends('layouts.master')    
          @section('title')
          <title>Lista de Clientes</title>
          @endsection
          @section('script')
          
<script type="text/javascript">
    $( document ).ready(function() {
      $(".crearPdf").click(function() {

        var location=$("#location_id").val();
        var dealership=$("#dealership_id").val();
        
        window.location.href= "{{ URL::to('/')}}/crearPDF?location_id="+location+"&dealership_id="+dealership;
      });
      $(".sendform").change(function() {
        
       
        
        $.ajax({
            url: "{{ URL::to('/')}}/findClients",
            method: "GET",

            data: {
             
              
                location_id: $("#location_id").val(),
                dealership_id: $("#dealership_id").val(),
            },
            success: function(data) {
            //var obj = $.parseJSON(data);
               $(".trclient").remove();
           $.each(data, function(key, value) {
                    
        
            $("#productTable").append(
                "<tr class='trclient'>" +
                  "<td>"+value.name+"</td>" +
                  "<td>"+value.location+"</td>"+ 
                  "<td>"+value.dealership+"</td>" +
                "</tr>"
            );
                    
                   
                    
                   
                    
                });
                        
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
                    Clientes<br>
                <span> <button type="button" class="btn btn-info crearPdf">Descargar  Pdf</button> </span>
                </div>
                <div class="table-responsive">          
                  <table class="table"  id="productTable">
                    <thead>
                      <tr>
                                   <td> Nombre</td>
                                
                                     <td><select name="location_id" id="location_id" class="browser-default sendform custom-select">
                      <option value=""  selected>Filtrar por localidad</option>
                      @foreach ($list["Locations"] as $location)
                        
                                 <option value="{{ $location->id }}">{{ $location->location }}</option>
                                
                             
                        @endforeach
                     
                   
                    </select></td>
                                      <td>  <select name="dealership_id" id="dealership_id" class="browser-default sendform custom-select">
                      <option value=""  selected>Filtrar por Concesionario</option>
                      @foreach ($list["Dealerships"] as $dealership)
                        
                                 <option value="{{ $dealership->id }}">{{ $dealership->name }}</option>
                                
                             
                        @endforeach
                     
                   
                    </select></td>
                                 </tr>

                        @foreach ($list["Clients"] as $client)
                        
                                <tr class="trclient">
                                   <td> {{ $client->name }}</td>
                                
                                     <td>{{ $client->location->location }}</td>
                                     <td>{{ $client->dealership->name }}</td>
                                 </tr>
                                
                             
                        @endforeach
                      </ul>  
                   
              
            </div>
             @endsection