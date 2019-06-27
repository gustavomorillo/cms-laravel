<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use Illuminate\Support\Facades\Session;
class AdminPhotosController extends Controller
{
    public function index()
    {

    	$photos = Photo::all();

    	return view('admin.photos.index', compact('photos'));
    }

    public function create()
    {

    	return view('admin.photos.create');

    }

     public function store(request $request)
    {


        	$file = $request->file('file');

            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            Photo::create(['file'=>$name]);

            return redirect('admin/photos');

        
        }
    public function destroy($id)
    {
    	$photo = Photo::findOrFail($id);

    	if(is_file(public_path() . $photo->file)){

    	$photo->delete();
    	
    	} else {

        $photo->delete();
    	
    	}
    	Session::flash('deleted_photo', 'The photo has been deleted');

    	return redirect('/admin/photos');
    	
  

    }
}
