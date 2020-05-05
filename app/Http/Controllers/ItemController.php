<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $items = Item::all()->toArray();
      return view('items.index', compact('items'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('items.create');
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
      $item = $this->validate(request(), [
      'name' => 'required',
      'category' => 'required',
      'colour' => 'required',
      'location' => 'required',
      'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:500',
      ]);

      //Handles the uploading of the image
      if ($request->hasFile('image')){
        //Gets the filename with the extension
        $fileNameWithExt = $request->file('image')->getClientOriginalName();
        //just gets the filename
        $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        //Just gets the extension
        $extension = $request->file('image')->getClientOriginalExtension();
        //Gets the filename to store
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        //Uploads the image
        $path =$request->file('image')->storeAs('public/images', $fileNameToStore);
      }
      else {
        $fileNameToStore = 'noimage.jpg';
      }

      // create a Vehicle object and set its values from the input
      $item = new item;
      $item->name = $request->input('name');
      $item->category = $request->input('category');
      $item->colour = $request->input('colour');
      $item->date = $request->input('date');
      $item->location = $request->input('location');
      $item->description = $request->input('description');
      $item->email = $request->input('email');
      $item->created_at = now();
      $item->image = $fileNameToStore;

      // save the Vehicle object
      $item->save();
      // generate a redirect HTTP response with a success message
      return back()->with('success', 'Your item has been added!');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){

      $item = Item::find($id);
      return view('items.show',compact('item'));

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $item = Item::find($id);
      return view('items.edit',compact('item'));
        //
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
      $item = Item::find($id);

      $this->validate(request(), [
      'name' => 'required',
      'category' => 'required',
      'colour' => 'required',
      'location' => 'required',
      'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:500',
      ]);

      $item->name = $request->input('name');
      $item->category = $request->input('category');
      $item->colour = $request->input('colour');
      $item->date = $request->input('date');
      $item->location = $request->input('location');
      $item->description = $request->input('description');
      $item->email = $request->input('email');
      $item->updated_at = now();

      //Handles the uploading of the image
      if ($request->hasFile('image')){
      //Gets the filename with the extension
      $fileNameWithExt = $request->file('image')->getClientOriginalName();
      //just gets the filename
      $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
      //Just gets the extension
      $extension = $request->file('image')->getClientOriginalExtension();
      //Gets the filename to store
      $fileNameToStore = $filename.'_'.time().'.'.$extension;
      //Uploads the image
      $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
      } else {
      $fileNameToStore = 'noimage.jpg';
      }
      $item->image = $fileNameToStore;
      $item->save();
      return redirect('items')->with('success','Item has been updated!');


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
      $item = Item::find($id);
      $item->delete();
      return redirect('items')->with('success','Item has been deleted');
        //
    }
}
