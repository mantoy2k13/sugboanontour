<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\File;
use App\Models\Categories;
use Illuminate\Support\Facades\DB;
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

    public function movies(){
        $title = 'movies';
         return view('pages.movies', compact('title', 'title'));
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

    public function scammer(){
        $title = 'scammers';
        return view('pages.scammer',['title' => $title]);
    }

    public function storescammer(Request $request){
         $this->validate($request, [
            
            'name_scammer' => 'required',
            'location_address' => 'required',
            'details_scammer' => 'required'
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
     $file->name = json_encode($files); // image sa scammer/rentanga
     $file->path = $request->input('name_scammer'); // name sa scammer
     $file->title = $request->input('location_address');// location sa scammer
     $file->category = 8;
     $file->rate = 0;
     $file->details = $request->input('details_scammer'); // detalye sa scammer
     $file->book_status = 1;
     
     $file->save();
     
    return redirect('/')->with('success', 'Ang scammer na post na  ');
    }

/*
sa mga car owner diha inyoha nani
LF VIOS karon
09618857583 
labangon area
1700 ang rate inyo nani
Tawagi ni
*/
    public function scammerlists(){
        $title = 'Listahan sa scammer';
        $name = 'c';
        $scammers = DB::table('cars')
         ->select(
            'c.vehicle_name as name',
            'c.path as img',
            'c.location as location',
            'c.book_date as rate',
            'c.year as year',
            'c.vehicle_type as vehicle_type',
            'c.model as model',
            'c.id as id',
            'c.book_status as book_status',
            'c.transmission_type as t_type',
            'c.fuel_type as f_type',
            'u.phone as phone',
            'u.name as full_name',
            'u.role as role'
        )
        ->where([
    ['category', '=', 8],
    ['path', 'LIKE', '%' .$name. '%']
  ])
        ->get();
        return view('pages.scammerlists', ['title' => $title, 'scammers' => $scammers]);
    }
}