<?php
namespace App\Http\Controllers;
use App\Models\Promises;
use App\Models\Tax;
use App\Models\Type;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Typedeal;
use App\Models\Sign;
use App\Models\Gallery;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function politika(Request $request){

        $sec = Sign::where('id', 1)->first();
         $sec_1 = Sign::where('id', 2)->first();

        return view('politika', ['sign' => $sec, 'sign_1' => $sec_1]);
    }

    public function usersogl(Request $request){

        $sec = Sign::where('id', 1)->first();
         $sec_1 = Sign::where('id', 2)->first();

        return view('usersogl', ['sign' => $sec, 'sign_1' => $sec_1]);
    }
    
    public function index(Request $request)
    {
         $data = Promises::Leftjoin("tax", "tax.id_tax", "premises.id")
                ->Leftjoin("types", "types.id_type", "premises.type_id")               
                ->where(["premises.id_typedeal" => 2, 'premises.isActive' => 'on'])
                ->get();

         $sec = Sign::where('id', 1)->first();
         $sec_1 = Sign::where('id', 2)->first();

        return view('index', ['sign' => $sec, 'sign_1' => $sec_1, 'data' => $data]);

    }

    public function blockrentid(Request $request){
        $data = Promises::Leftjoin("tax", "tax.id_tax", "premises.id")
                ->Leftjoin("types", "types.id_type", "premises.type_id")               
                ->where("premises.id",$_GET["id"])
                ->first();

        $images = Gallery::where('id_premises', $_GET["id"])->get();

        

$str = '<div class="default-popup__aligner"><div class="container popup-window"><a href="#" class="popup-window__close popup-window__close_JS"><i class="icon icon-close"></i></a>
                    <div class="row">
                        <div class="col-md-12">                         
                            <span class="popup-window__headline">Аренда офиса '.$data->areaMin.' <span> м<sup>2</sup></span> в бизнес-центре Аэродом</span>
                            <div class="popup-window__slider default-gallery-slider default-gallery-slider_JS">';
                           
                                        foreach($images as $d){

                                            $str .= '<div class="default-gallery-slider__cover" style="background-image: url(public/images/gallery/'.$d->image.');"></div>'; 
                                        }

                            $str .= '</div>
                            


                            <div class="popup-window__content">

                                

                                <div class="row">
                                    <div class="col-md-5 col-sm-7">
                                        <table class="characteristics-table">
                                            <tr>
                                                <td>Этаж:</td>
                                                <td>
                                                    '.$data['floor'].'                                               </td>
                                            </tr>
                                            <tr>
                                                <td>Арендуемая площадь:</td>
                                                <td>'.$data['areaMin'].' <span> м<sup>2</sup></span></td>
                                            </tr>
                                                                                        <tr>
                                                <td>Готовность:</td>
                                                <td>'.$data['isready'].'</td>
                                            </tr>
                                            <tr>
                                                <td>Планировка:</td>
                                                <td>'.$data['layout'].'</td>
                                            </tr>
                                            <tr>
                                                <td>Цена:</td>
                                                <td>'.$data['price'].' руб. за м<sup>2</sup> в год</td>
                                            </tr>
                                                                                        <tr>
                                                <td>Налогообложение:</td>
                                                <td>'.$data['tax_name'].'</td>
                                            </tr>
                                        </table>
                                    </div>


                                    <div class="col-md-1 col-sm-1"></div>
                                    <div class="col-md-3 col-sm-4">
                                        <div class="small-contacts-block small-contacts-block_colored" style="margin-bottom: 8px;padding: 15px;background: #32CD32">
                                            <a href="tel:+74994900592" class="default-contact-phone">Получить презентацию в Whatsapp</a>
                                            
                                        </div>
                                        <div class="small-contacts-block small-contacts-block_colored">
                                            <a href="tel:+74994900592" class="default-contact-phone">+7 (499) 490-05-92</a>
                                            <a href="#" class="default-contact-call JS-get-call-popup-open">Обратный звонок</a>
                                        </div>
                                                                            </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="/block/';
                                        if($_GET['type']  == 'sale') {$str .= 'sale';}
                                        else {$str .= 'rent';}
                                         $str .= '/'.$data['id'].'" class="default-dashed-link">Открыть в новом окне</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';


 

        return $str;

    }

    public function rent(Request $request){
        $data = Promises::Leftjoin("tax", "tax.id_tax", "premises.id")
                ->Leftjoin("types", "types.id_type", "premises.type_id")               
                ->where(["premises.id_typedeal" => 1, 'premises.isActive' => 'on'])
                ->get();
        
                $sec = Sign::where('id', 1)->first();

                if($sec->flag_sign == 1) return redirect('');

         $sec = Sign::where('id', 1)->first();
         $sec_1 = Sign::where('id', 2)->first();

        return view('rent', ['sign' => $sec, 'sign_1' => $sec_1, 'data' => $data]);
    }

     public function sale(Request $request){

         $data = Promises::Leftjoin("tax", "tax.id_tax", "premises.id")
                ->Leftjoin("types", "types.id_type", "premises.type_id")               
                ->where(["premises.id_typedeal" => 2, 'premises.isActive' => 'on'])
                ->get();
         $sec = Sign::where('id', 1)->first();
         $sec_1 = Sign::where('id', 2)->first();
         if($sec_1->flag_sign == 1) return redirect('');
        return view('sale', ['sign' => $sec, 'sign_1' => $sec_1, 'data' => $data]);
    }

     public function about(Request $request){

        $sec = Sign::where('id', 1)->first();
         $sec_1 = Sign::where('id', 2)->first();
        return view('about', ['sign' => $sec, 'sign_1' => $sec_1]);
    }

    public function contacts(Request $request){

        $sec = Sign::where('id', 1)->first();
         $sec_1 = Sign::where('id', 2)->first();
        return view('contacts', ['sign' => $sec, 'sign_1' => $sec_1]);
    }

     public function adminpanel(Request $request){

            if(Auth::check()){

                    return view('adminpanel/adminpanel');
                }else{
                    return redirect('adminpanel/login');
                }
        
    }
     public function adminlogin(Request $request){

        if ($request->isMethod('post')){
               $users = User::all();
                $data = $request->validate([
                    'email' => 'required|max:100',
                    'password' => 'required|max:255',
                ]);

                if(Auth::attempt(['email' => $data["email"], 'password' => $data["password"]])){
                    
                   return view('adminpanel/adminpanel');
                }
                else{
                    return redirect('adminpanel');
                }                
            }
            else{
                if(Auth::check()){
                    return view('adminpanel/adminpanel');
                }
                else{
                    return view('adminpanel/login');
                }
                
            }
        
    }
    public function logout(){
        if(Auth::check()){
            Auth::logout();
        }
        return redirect('adminpanel');
    }

    public function plosh1(Request $request){
        if(empty(auth()->user()->name) && auth()->user()->admin != 1){
            return redirect('');
        }
        $data = Sign::where('id', 1)->first();

        return view('adminpanel/plosh1', ['data' => $data]);
    }

     public function plosh2(Request $request){
        if(empty(auth()->user()->name) && auth()->user()->admin != 1){
            return redirect('');
        }
        $data = Sign::where('id', 2)->first();

        return view('adminpanel/plosh2', ['data' => $data]);
    }

    public function ajaxaddcheck(Request $request){
  
         Sign::where('id', 1)->update([
                'flag_header' => $request->id
        ]);
       
        return $request->id;
    }

    public function ajaxaddcheck1(Request $request){
  
         Sign::where('id', 1)->update([
                'flag_footer' => $request->id
        ]);
       
        return $request->id;
    }

    public function ajaxaddcheck2(Request $request){
  
         Sign::where('id', 1)->update([
                'flag_sign' => $request->id
        ]);
       
        return $request->id;
    }

     public function ajaxaddcheck3(Request $request){

        if($request->name == 'flag_header')
        {
            Sign::where('id', $request->idf)->update([
                'flag_header' => $request->id
            ]);
        }
        if($request->name == 'flag_footer')
        {
            Sign::where('id', $request->idf)->update([
                'flag_footer' => $request->id
            ]);
        }
        if($request->name == 'flag_sign')
        {
            Sign::where('id', $request->idf)->update([
                'flag_sign' => $request->id
            ]);
        }
         
       
        return $request->name;
    }

    public function plosh3(Request $request){
        if(empty(auth()->user()->name) && auth()->user()->admin != 1){
            return redirect('');
        }
        if ($request->isMethod('post')){
            $data = $request->validate([
                'areaMin' => '',
                'areaMax' => '',
                'isActive' => '',
                'crmId' => '',
                'type_id' => '',
                'floor' => '',
                'price' => '',
                'pricecur' => '',
                'id_typedeal' => '',
                'id_tax' => '',
                'isready' => '',
                'readydate' => '',
                'explcur' => '',
                'explprice' => '',
                'layout' => '',
                'lastsynctime' => '',
            ]);
            if(empty($request->isActive)){
                $data['isActive'] = 'off';
            }
            //print_r($data);
            //exit;
            Promises::where('id', $request->id)->update($data);
            return redirect('plosh3');
        }
        else{
        $data = Promises::select('premises.id','premises.areaMin','premises.areaMax','premises.isActive','premises.crmId','premises.crmId','premises.type_id','types.name_types','premises.floor', 'premises.price', 'premises.pricecur', 'premises.id_typedeal', 'typedeal.name_typedeal', 'premises.id_tax','tax.name_tax','premises.isready', 'premises.readydate', 'premises.explcur', 'premises.explprice', 'premises.layout', 'premises.lastsynctime')
                ->Leftjoin("tax", "tax.id_tax", "premises.id")
                ->Leftjoin("types", "types.id_type", "premises.type_id")     
                ->Leftjoin("typedeal", "premises.id_typedeal", "typedeal.id_typedeal")           
                ->get();
        $types = Type::all();
        $typedeal = Typedeal::all();
         $tax = Tax::all();
  
        return view('adminpanel/plosh3', ['data' => $data, 'types' => $types, 'typedeal' => $typedeal, 'tax' => $tax]);
        }
    }

    public function gallery(Request $request){
        if(empty(auth()->user()->name) && auth()->user()->admin != 1){
            return redirect('');
        }
        if ($request->isMethod('post')){
            if(isset($request->select_photo)){
                $gals = Gallery::where('id_premises', $request->id_gal)->get();
                 $promis = Promises::select('id')->get();
    
                return view('adminpanel/galarry', ['gallery' => $gals, 'promis' => $promis]);
            }else{
                 $id = $request->id;
            
                if ($request->hasfile('fileUpload')) {
                    $file = $request->file('fileUpload');
                    foreach($file as $f){
                        $extention = $f->getClientOriginalExtension();
                        
                        $filename = md5(microtime() . rand(0, 9999)) . '.' . $extention;
                        $f->move('images/gallery', $filename);
                        Gallery::create([
                            'id_premises' => $id,
                            'image' => $filename
                        ]);
                    }
                    return redirect('gallery');
                    
                }
                return redirect('gallery');
            }
        }else{
            $promis = Promises::select('id')->get();
            return view('adminpanel/galarry', ['promis' => $promis]);
        }
        
    }


    public function deletegallery(Request $request){
        if(empty(auth()->user()->name) && auth()->user()->admin != 1){
            return redirect('');
        }
        Gallery::where('id_gallery', $request->id)->delete();
        return redirect('gallery');
    }

    public function addprom(Request $request){
        if(empty(auth()->user()->name) && auth()->user()->admin != 1){
            return redirect('');
        }
        if ($request->isMethod('post')){
            $data = $request->validate([
                'areaMin' => '',
                'areaMax' => '',
                'isactive' => '',
                'crmId' => '',
                'type_id' => '',
                'floor' => '',
                'price' => '',
                'pricecur' => '',
                'id_typedeal' => '',
                'id_tax' => '',
                'isready' => '',
                'readydate' => '',
                'explcur' => '',
                'explprice' => '',
                'layout' => '',
                'lastsynctime' => '',
            ]);
            
            Promises::create($data);
            return redirect('addprom');
        }
        else{
        
        $types = Type::all();
        $typedeal = Typedeal::all();
        $tax = Tax::all();
  
        return view('adminpanel/addprom', ['types' => $types, 'typedeal' => $typedeal, 'tax' => $tax]);
        }
    }


    public function blockrentfromid($id){

        $data = Promises::where('id', $id)->first();
        $gals = Gallery::where('id_premises', $data->id)->get();
  
        $sec = Sign::where('id', 1)->first();
         $sec_1 = Sign::where('id', 2)->first();

        return view('rentsign', ['sign' => $sec, 'sign_1' => $sec_1, 'data' => $data, 'gals' => $gals]);
    }

    public function blocksellfromid($id){

        $data = Promises::where('id', $id)->first();
        $gals = Gallery::where('id_premises', $data->id)->get();
  
        $sec = Sign::where('id', 1)->first();
         $sec_1 = Sign::where('id', 2)->first();

        return view('sellsign', ['sign' => $sec, 'sign_1' => $sec_1, 'data' => $data, 'gals' => $gals]);
    }

    public function myprofile(Request $request){

        if(isset(auth()->user()->name) && auth()->user()->admin == 1){
            if ($request->isMethod('post')){
                $data = $request->validate([
                    'name' => '',
                    'email' => '',
                    'password' => ''
                ]);
                if(!isset($data['password'])){
                    User::where('id', auth()->user()->id)->update([
                        'email' => $data['email'],
                        'name' => $data['name']
                    ]);
                }
                return redirect('myprofile');

            }else{
                return view('adminpanel/myprofile');
            }
            
        }
        else{
            return redirect('');
        }
    }

    public function senadmail(Request $request){
        $name = $request->name;
        $email = $request->email;

        return json_encode(['success' => 1]);
    }
}
