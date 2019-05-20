        @extends('layouts.master')    
          @section('title')
          <title>Lista de Clientes</title>
          @endsection

    @section('content')
    
    <body>

            <div class="content">
                <div class="title m-b-md">
                    Clientes
                </div>
                <div class="table-responsive">          
                  <table class="table">
                    <thead>
                      <tr>
                                   <td> Nombre</td>
                                
                                     <td>Localidad</td>
                                      <td>Concesionario</td>
                                 </tr>
                        @foreach ($allClients as $client)
                        
                                <tr>
                                   <td> {{ $client->name }}</td>
                                
                                     <td>{{ $client->location->location }}</td>
                                     <td>{{ $client->dealership->name }}</td>
                                 </tr>
                                
                             
                        @endforeach
                      </ul>  
                   
              
            </div>
             @endsection