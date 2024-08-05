<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
use App\Models\File;
use App\Models\Categories;
 
class MultiFileUploadController extends Controller
{
    public function index()
    {
        $categories = Categories::All();
        return view('multiple-files-upload', compact('categories'));
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
     $file->path = '1';
     $file->rate = $request->input('rate');
     $file->details = $request->input('details');
     $file->category = $request->input('category');
     $file->title = $request->input('title');
     $file->save();
     
    return back()->with('status', 'Data Your files has been successfully added');
 
    }

    public function tourpackage($id, Request $request){
        $trpackage = File::find($id);
        return view('pages.tourpackage', compact('trpackage'));
    }
}