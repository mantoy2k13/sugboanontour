<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\File;
use App\Models\Categories;

class MultiFileUploadController extends Controller
{
    public function index()
    {   
        $title = 'Files upload';
        $categories = Categories::All();
        return view('multiple-files-upload', compact('categories', 'title'));
        
    }
 
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'filenames' => 'required',
            'filenames.*' => 'image',
            'details' => 'required',
            'category' => 'required',
            'title' => 'required',
            'rate' => 'required'
    ]);
    
    $files = [];
    if($request->hasfile('filenames'))
     {
        foreach($request->file('filenames') as $file)
        {
            $name = time().rand(1,100).'.'.$file->extension();
            $file->move(public_path('files'), $name);  
            $files[] = $name;  
        }
      
     }
     
     $file= new File();
     $file->name = json_encode($files);
     $file->path = $request->input('accomodation');
     $file->user_id = $request->input('user_id');
     $file->rate = $request->input('rate');
     $file->details = $request->input('details');
     $file->category = $request->input('category');
     $file->title = $request->input('title');
     $file->book_status = 1;
     $file->save();
     
    return back()->with('success', 'Booking tour/rooms has been successfully ');
 
    }

    public function tourpackage($id, Request $request){
        $trpackage = File::find($id);
        $title = 'booking';
        return view('pages.tourpackage', compact('trpackage', 'title'));
    }

    public function delete($id, Request $request ){

        $data = File::find($id);
        $imgs_unlink = json_decode($data->name, true);
        
        foreach($imgs_unlink as $imgunlink){

            
            $path = public_path().'/files/'.$imgunlink;
            if (file_exists($path)) {
                unlink($path);
                
                $mssg = "Deleted files Successfully ";
            } else {
                
                $mssg = "Does not exists";
            }
        }
      
        $data->delete();
        return response()->json(['success' => $mssg]);
    }
}