<?php

namespace App\Http\Controllers;
use App\Client;
use PDF;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function find(Request $request)
    {
        $Clients = \App\Client::orderBy('clients.id','DESC')

        ->join('locations', 'locations.id', '=', 'clients.location_id')
        ->join('dealerships', 'dealerships.id', '=', 'clients.dealership_id')
        ->select('dealerships.name as dealership','locations.location as location','clients.name as name')
        ->statu_id(2)
        ->location_id($request->input('location_id'))
        ->dealership_id($request->input('dealership_id'))
        ->get();
         return response()->json($Clients);
    }

    

     public function reports()
    
    {
        
        $Clients = \App\Client::orderBy('id','DESC')->statu_id(2)->get();
        
        $Locations = \App\Location::all();
        
        $Dealerships = \App\Dealership::all();
         $list = array('Clients' =>  $Clients,'Locations' =>  $Locations,'Dealerships' =>  $Dealerships);
         return view('reportsClients', ['list' => $list]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
            $Client = new \App\Client;
            $Client->name = $request->input('nameclient');
            $Client->location_id = $request->input('location_id');
            $Client->dealership_id = $request->input('dealership_id');
            $Client->statu_id=1;
        try {
        
            $Client->save();
            return response()->json($Client);
        } catch (\Exception $e) {
            return response()->json($e);
        }
       

   
    }
    public function crearPDF(Request $request){
         
      
       $Clients = \App\Client::orderBy('clients.id','DESC')

        
        ->statu_id(2)
        ->location_id($request->input('location_id'))
        ->dealership_id($request->input('dealership_id'))
        ->get();
       
      $pdf = PDF::loadView('crearPDF',['allClients' => $Clients]);
      //  return $pdf->stream('crearPDF', array('Attachment'=>0)); 

      
      return $pdf->download('reporte.pdf');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function createClient(Request $request)
    {
        $Locations = \App\Location::all();
        
        $Dealerships = \App\Dealership::all();
        $list = array('Locations' =>  $Locations,'Dealerships' =>  $Dealerships);
         return view('createClient', ['list' => $list]);
    }
    public function store(Request $request)
    {
        $Clients = \App\Client::orderBy('id','DESC')->statu_id(2)->get();
        

         return view('storeClient', ['allClients' => $Clients]);
    }


    public function showForDelete()
    {
        $Clients = \App\Client::orderBy('id','DESC')->statu_id(2)->get();
        

         return view('selectDeleteClient', ['allClients' => $Clients]);
    }
    public function deleteClient(Request $request)
    {
         $Client = \App\Client::find($request->input('id'));

                $Client->statu_id = 2;   
        
        try {

                    $Client->save();
                    return response()->json($Client);
                } catch (\Exception $e) {
                    return response()->json($e);
                }
         
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
       

         try {
         $Client = \App\Client::find($request->input('id'));

        $Client->name = $request->input('nameclient');
        $Client->location_id = $request->input('location_id');
        $Client->dealership_id = $request->input('dealership_id');
            $Client->save();
            return response()->json($Client);
        } catch (\Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update( )
    {
        
        $Clients = \App\Client::orderBy('id','DESC')->statu_id(2)->get();
        $Locations = \App\Location::all();
        
        $Dealerships = \App\Dealership::all();
        $list = array('Clients' =>  $Clients,'Locations' =>  $Locations,'Dealerships' =>  $Dealerships);

         return view('updateClient', ['list' => $list]);
    }
    
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
