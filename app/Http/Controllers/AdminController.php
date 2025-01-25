<?php

namespace App\Http\Controllers;

use App\Models\type;
use Illuminate\Routing\Redirector;
use Symfony\Component\Console\Application;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\service;
use App\Models\subService;
use App\Models\Slide;
use App\Models\HomeContent;
use App\Models\Customers;
use App\Models\AboutContent;
use App\Models\User;
use App\Models\Plan;

use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function login(Request $request): Redirector|Application|RedirectResponse
    {
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){
         return redirect()->route('Dashboard');

        }
        return redirect("login")->withSuccess('Login details are not valid');

    }
    public function companyform()
    {
        $types=type::all();
        return view('ADMIN.AddCompany',['Types'=>$types]);
    }
    public function index()
    {
        return view('ADMIN.dashboard');
    }
        public function services(){

        $services = service::all();
        return view('admin.services',['services' => $services]);

    }

    public function addservice(Request $request){
        
        $validate_data = $request->validate([
        'key' => 'required|unique:services,key',
        'title' => 'required',
        'description' => 'required',
        'imagePath' => 'required' 
        ]);

        
        $service = new service; 

        $service->key = $validate_data['key'];
        $service->title = $validate_data['title'];
        $service->description = $validate_data['description'];


        if ($request->hasFile('imagePath')) {
            $image = $request->file('imagePath');
            $imagePath =  $image->getClientOriginalName();
            $image->move(public_path('images/services'), $imagePath);
            $service->imagePath = 'images/services/' . $imagePath;
        }
        $service->save();


        return redirect()->back(); 
    }

    public function editservice($id){
        
        $service = service::find($id);
        return view('admin.editservice', ["service" => $service]);

    }

    public function updateservice(Request $request,$id){

        $validate_data = $request->validate([
            'key' => 'required|unique:services,key,'.$id,
            'title' => 'required',
            'description' => 'required',
            'imagePath' => 'image'
        ]);

        $service = service::find($id);

        $serviceData = [
            'key' => $validate_data['key'],
            'title' => $validate_data['title'],
            'description' => $validate_data['description']
        ];

        if ($request->hasFile('imagePath')) {

            if ($service->image) {
                Storage::delete($service->imagePath);
            }
    
            $image = $request->file('imagePath');
            $imagePath =  $image->getClientOriginalName();
            $image->move(public_path('images/services'), $imagePath);
            $serviceData['imagePath'] = 'images/services/' . $imagePath;
        }
        // dd($service);

        $service->update($serviceData);

        return redirect('/admin/services');

    }
    public function deleteservice($id){
        $service = service::find($id);
        $service->delete();

        return redirect()->back();
    }

    public function slides(){

        $slides = Slide::all();
        return view('admin.slides',['slides' => $slides]);
    
    }

    public function addslide(Request $request){
      
        $validate_data = $request->validate([
        'title' => 'required',
        'subtitle' => 'required',
        'title2' => '',
        'paragraph1' => 'required',
        'title3' => '',
        'paragraph2' => '',
        'image' => 'required' 
        ]);

        
        $slide = new Slide; 

        $slide->title = $validate_data['title'];
        $slide->subtitle = $validate_data['subtitle'];
        $slide->title2 = $validate_data['title2'];
        $slide->paragraph1 = $validate_data['paragraph1'];
        $slide->title3 = $validate_data['title3'];
        $slide->paragraph2 = $validate_data['paragraph2'];


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath =  $image->getClientOriginalName();
            $image->move(public_path('images/slides'), $imagePath);
            $slide->image = 'images/slides/' . $imagePath;
        }
        $slide->save();
        return redirect('/'); 
    }

    public function editslide($id){

        $slide = Slide::find($id);
        return view('admin.editslide',['slide' => $slide]);

    }

    public function updateslide(Request $request, $id) {

        $validate_data = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'title2' => '',
            'paragraph1' => 'required',
            'title3' => '',
            'paragraph2' => '',
            'image' => 'image'  
        ]);
    
        $slide = Slide::find($id);
    
        $slideData = [
            'title' => $validate_data['title'],
            'subtitle' => $validate_data['subtitle'],
            'title2' => $validate_data['title2'],
            'paragraph1' => $validate_data['paragraph1'],
            'title3' => $validate_data['title3'],
            'paragraph2' => $validate_data['paragraph2']
        ];
    
        if ($request->hasFile('image')) {

            if ($slide->image) {
                Storage::delete($slide->image);
            }
    
            $image = $request->file('image');
            $imagePath =  $image->getClientOriginalName();
            $image->move(public_path('images/slides'), $imagePath);
            $slideData['image'] = $imagePath;
        }
    
        $slide->update($slideData);
    
        return redirect('/admin/slides');
    }
    
    public function home(){
        $customers = Customers::all();
        $content = HomeContent::find(1);
        return view('admin.home', ['content' => $content, 'customers' => $customers]);

    }

    public function edithome(Request $request){

        $validate_data = $request->validate([
            'title' => 'required',
            'text' => 'required',
            'image' => 'image'
        ]);

        $content = HomeContent::find(1);
        $contentData= [
            'title' => $validate_data['title'],
            'text' => $validate_data['text']
        ];
        if ($request->hasFile('image')) {

            if ($content->image) {
                Storage::delete($content->image);
            }
    
            $image = $request->file('image');
            $imagePath =  $image->getClientOriginalName();
            $image->move(public_path(), $imagePath);
            $contentData['image'] = $imagePath;
        }

        $content->update($contentData);

        return redirect()->back();

    }

    public function addcustomer(Request $request){
        $validate_data = $request->validate([
            'image' => 'required' 
            ]);
            
        $customer = new Customers;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath =  $image->getClientOriginalName();
            $image->move(public_path('images/customers'), $imagePath);
            $customer->image = 'images/customers/' . $imagePath;
        }
        
        $customer->save();

        return redirect()->back();
    }

    public function deletecustomer($id){

        $customer = Customers::find($id);
        $customer->delete();

        return redirect()->back();
    }

    public function solutions(){
        $services = service::all();
        $solutions = subService::all();
        foreach ($services as $service) {
            $solutionsForService = [];
        
            foreach ($solutions as $solution) {
                if ($solution->service_key == $service->key) {
                    $solutionsForService[] = [
                        'name' => $solution->name,
                        'icon' => $solution->icon,
                        'key' => $solution->sub_key
                    ];
                }
            }
        
            $service['solutions'] = $solutionsForService;
        }
        
        return view('admin.solutions', ["services" => $services]);
    }

    public function addsolution(Request $request){
        $validate_data = $request->validate([
            'service_key' => 'required',
            'sub_key' => 'required|unique:sub_services,sub_key',
            'name' => 'required',
            'icon' => 'required|image',
            'title' => 'required',
            'text' => 'required',
            'image' => 'required|image',
            'title1' => '',
            'text1' => '',
            'image1' => 'image',
            'title2' => '',
            'text2' => '',
            'image2' => 'image'
        ]);

        $solution = new subService;

        $solution->service_key = $validate_data['service_key'];
        $solution->sub_key = $validate_data['sub_key'];
        $solution->name = $validate_data['name'];
        $solution->title = $validate_data['title'];
        $solution->text = $validate_data['text'];
        $solution->image = $validate_data['image'];
        $solution->title1 = $validate_data['title1'];
        $solution->text1 = $validate_data['text1'];
        $solution->title2 = $validate_data['title2'];
        $solution->text2 = $validate_data['text2'];

        if ($request->hasFile('icon')) {
            $image = $request->file('icon');
            $imagePath =  $image->getClientOriginalName();
            $image->move(public_path('images/solutions'), $imagePath);
            $solution->icon = 'images/solutions/' . $imagePath;
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath =  $image->getClientOriginalName();
            $image->move(public_path('images/solutions'), $imagePath);
            $solution->image = 'images/solutions/' . $imagePath;
        }

        if ($request->hasFile('image1')) {
            $image = $request->file('image1');
            $imagePath =  $image->getClientOriginalName();
            $image->move(public_path('images/solutions'), $imagePath);
            $solution->image1 = 'images/solutions/' . $imagePath;
        }else{
            $solution->image1 = null;
        }

        if ($request->hasFile('image2')) {
            $image = $request->file('image2');
            $imagePath =  $image->getClientOriginalName();
            $image->move(public_path('images/solutions'), $imagePath);
            $solution->image2 = 'images/solutions/' . $imagePath;
        }else{
            $solution->image2 = null;
        }

        // dd($solution);
        $solution->save();

        return redirect("/services/{$solution->service_key}/{$solution->sub_key}");

    }

    public function editsolution($service,$solution){

        $solution = subService::where('service_key',$service)->where('sub_key',$solution)->first();
        if(!$solution){
            return view('notfound');
        }

        $services = service::all();
        return view('admin.editsolution', ['solution' => $solution, 'services' => $services ]);
    }
    
    public function updatesolution(Request $request,$service,$solution){
        $solution = subService::where('service_key', $service)->where('sub_key', $solution)->first();


        $validate_data = $request->validate([
            'service_key' => 'required',
            'sub_key' => 'required|unique:sub_services,sub_key,'.$solution->id,
            'name' => 'required',
            'icon' => 'image',
            'title' => 'required',
            'text' => 'required',
            'image' => 'image',
            'title1' => '',
            'text1' => '',
            'image1' => 'image',
            'title2' => '',
            'text2' => '',
            'image2' => 'image'
        ]);

        $solutionData= [
            'service_key' => $validate_data['service_key'],
            'sub_key' => $validate_data['sub_key'],
            'name' => $validate_data['name'],
            'title' => $validate_data['title'],
            'text' => $validate_data['text'],
            'title1' => $validate_data['title1'],
            'text1' => $validate_data['text1'],
            'title2' => $validate_data['title2'],
            'text2' => $validate_data['text2']
        ];

        if ($request->hasFile('icon')) {
            
            if ($solution->icon) {
                Storage::delete($solution->icon);
            }
 
            $image = $request->file('icon');
            $imagePath =  $image->getClientOriginalName();
            $image->move(public_path('images/solutions'), $imagePath);
            $solutionData['icon'] = 'images/solutions/' . $imagePath;
        }

        if ($request->hasFile('image')) {

            if ($solution->image) {
                Storage::delete($solution->image);
            }

            $image = $request->file('image');
            $imagePath =  $image->getClientOriginalName();
            $image->move(public_path('images/solutions'), $imagePath);
            $solutionData['image'] = 'images/solutions/' . $imagePath;
        }

        if ($request->hasFile('image1')) {

            if ($solution->image1) {
                Storage::delete($solution->image1);
            }

            $image = $request->file('image1');
            $imagePath =  $image->getClientOriginalName();
            $image->move(public_path('images/solutions'), $imagePath);
            $solutionData['image1'] = 'images/solutions/' . $imagePath;
        }

        if ($request->hasFile('image2')) {

            if ($solution->image2) {
                Storage::delete($solution->image2);
            }

            $image = $request->file('image2');
            $imagePath =  $image->getClientOriginalName();
            $image->move(public_path('images/solutions'), $imagePath);
            $solutionData['image2'] = 'images/solutions/' . $imagePath;
        }

        $solution->update($solutionData);

        return redirect("/services/{$solution->service_key}/{$solution->sub_key}");

    }

    public function aboutus(){
        
        $content = AboutContent::find(1);
        return view('admin.aboutus', ['content' => $content]);
    }

    public function editabout(Request $request){
        $validate_data = $request->validate([
            'title' => 'required',
            'text1' => 'required',
            'text2' => 'required',
            'image' => 'image'
        ]);

        $content = AboutContent::find(1);
        $contentData= [
            'title' => $validate_data['title'],
            'text1' => $validate_data['text1'],
            'text2' => $validate_data['text2']
        ];

        if ($request->hasFile('image')) {

            if ($content->image) {
                Storage::delete($content->image);
            }
    
            $image = $request->file('image');
            $imagePath =  $image->getClientOriginalName();
            $image->move(public_path(), $imagePath);
            $contentData['image'] = $imagePath;
        }

        $content->update($contentData);

        return redirect('/aboutus');
    }

    public function pricing(){
        $plans = Plan::all();
        return view('admin.pricing', ['plans' => $plans]);
    }

    public function addplan(Request $request){
        $validate_data = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'currency' => '',
            'features' => 'required'
        ]);
        
        $plan = new Plan;

        $plan->name = $validate_data['name'];
        $plan->price = $validate_data['price'];
        $plan->currency = $validate_data['currency'];
        $plan->features = $validate_data['features'];

        $plan->save();

        return redirect()->back();
    }

    public function editplan($id){
        $plan = Plan::find($id);
        return view('admin.editplan', ['plan' => $plan]);
    }

    public function updateplan(Request $request,$id){
        $validate_data = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'currency' => '',
            'features' => 'required'
        ]);

        $plan = Plan::find($id);

        $plan->update([
            'name' => $validate_data['name'],
            'price' => $validate_data['price'],
            'currency' => $validate_data['currency'],
            'features' => $validate_data['features']
        ]);

        return redirect('/admin/pricing');
    }

    public function deleteplan($id){
        $plan = Plan::find($id);
        $plan->delete();

        return redirect()->back();
    }


}
