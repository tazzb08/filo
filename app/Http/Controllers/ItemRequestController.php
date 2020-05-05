<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\itemrequest;

class ItemRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $itemrequestQuery = itemrequest::all();
      if (Gate::denies('isAdmin')) {
          $itemrequestQuery=$itemrequestQuery->where('userid', auth()->user()->id);
        }
      return view('itemrequests.index', array('itemrequests'=>$itemrequestQuery));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('itemrequests.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // form validation
      $itemrequest = $this->validate(request(), [
      'requestedItem' => 'required',
      'date' => 'required',
      'requester' => 'required',
      'reason' => 'required',
      ]);
      // create a Vehicle object and set its values from the input
      $itemRequest = new itemrequest;
      $itemRequest->userid = $request->user()->id;
      $itemRequest->requestedItem = $request->input('requestedItem');
      $itemRequest->date = $request->input('date');
      $itemRequest->reason = $request->input('reason');
      $itemRequest->requester = $request->input('requester');
      $itemRequest->created_at = now();
      // save the Vehicle object
      $itemRequest->save();
      // generate a redirect HTTP response with a success message
      return back()->with('success', 'Request has been made!');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      if (Gate::denies('isAdmin')) {
        return abort('403');
        }
      $itemrequest = itemrequest::find($id);
      return view('itemrequests.show',compact('itemrequest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      if (Gate::denies('isAdmin')) {
        return abort('403');
        }
      $itemrequest = itemrequest::find($id);
      return view('itemrequests.edit',compact('itemrequest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      if (Gate::denies('isAdmin')) {
        return abort('403');
        }
      $itemrequest = itemrequest::find($id);
      $this->validate(request(), [
      'status' => 'required',
      ]);
      $itemrequest->status = $request->input('status');
      $itemrequest->updated_at = now();
      $itemrequest->save();
      return redirect('request/index')->with('success','Request has been updated !');
        //
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      if (Gate::denies('isAdmin')) {
        return abort('403');
        }
      $itemrequest = itemrequest::find($id);
      $itemrequest->delete();
      return redirect('request/index')->with('success','Request has been deleted');
        //
    }
}
