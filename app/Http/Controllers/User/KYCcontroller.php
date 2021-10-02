<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\KYCModel;
use App\Models\User;
use App\Mail\Kyc\KycNew;
use App\Mail\Kyc\KycUpdate;
use Illuminate\Support\Facades\Mail;
// use ZipArchive;

class KYCcontroller extends Controller
{
    private  $countries = [
        "Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe"
    ];

    public function index(){
        $user_kyc = KYCModel::where('user_id', auth()->user()->id)->get();

        return view('user.kycs.kycinit', ['kyc' => $user_kyc]);
    }
    
    public function show(){
        $user_kyc = KYCModel::where('user_id', auth()->user()->id)->get();
        if(auth()->user()->status == 'verified' || auth()->user()->status == 'unverified'){
            return view('user.kycs.kyc_update', ['countries' => $this->countries])->with('kyc', $user_kyc[0]);
        }else{
            return view('user.kycs.kyc_new', ['countries' => $this->countries]);
        }
    }
    
    public function kyc(Request $request){

        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required',
            'dob' => 'required|date',
            'gender' => 'required',
            'country' => 'required',
            'state' => 'required|string',
            'city' => 'required',
            'zip' => 'required',
            'address' => 'required',
            'type' => 'required',
            'front_doc' => 'required|file|max:10000',
            'back_doc' => 'required|file|max:10000',
            'user_doc' => 'required|file|max:10000',
        ]);

        $year = explode("-", $request->dob)[0];
        $valid_year = (date('Y') - 18);
        $phoneCheck = KYCModel::where('phone', $request->phone)->get();
        $allowed = ['png', 'jpeg', 'jpg', 'svg'];

        if(!in_array($request->country, $this->countries)){
            return back()->withInput()->with('error', 'Please choose a valid country');
        }elseif($year > $valid_year){
            return back()->withInput()->with('error', 'Please must be more than 18 to continue');
        }elseif(count($phoneCheck) > 0){
            return back()->withInput()->with('error', 'Phone number has been used already');
        }elseif(strtolower($request->email) != strtolower(auth()->user()->email)){
            return back()->withInput()->with('error', 'Your email does not match your current used email');
        }elseif(!in_array($request->front_doc->extension(), $allowed)){
            return back()->withInput()->with('error', 'Your documents must be in image format (.png, .jpeg, .jpg, .svg)');
        }elseif(!in_array($request->back_doc->extension(), $allowed)){
            return back()->withInput()->with('error', 'Your documents must be in image format (.png, .jpeg, .jpg, .svg)');
        }elseif(!in_array($request->user_doc->extension(), $allowed)){
            return back()->withInput()->with('error', 'Your documents must be in image format (.png, .jpeg, .jpg, .svg)');
        }else{
            if($request->use){
                $this->updateUser($request);
            }

            $store = $this->makeFile($request);

            Mail::to(auth()->user()->email)->send(new KycNew());
            // return $request;
            return back()->with('success', 'Your KYC Application has been submitted successfully');
        }
    }

    public function updateUser($request){
        $user = User::find(auth()->user()->id);
        $user->phone = $request->phone;
        $user->dob = $request->dob;
        $user->nationality = $request->country;
        $user->state = $request->state;
        $user->save();
    }

    public function makeFile($request){
        $folder= "kyc_".auth()->user()->id."_".mt_rand(1000, 1000000);

        $fileContent = "First-Name: ".$request->first_name."\n";
        $fileContent .= "Last-Name: ".$request->last_name."\n";
        $fileContent .= "Email: ".$request->email."\n";
        $fileContent .= "Phone Number: ".$request->phone."\n";
        $fileContent .= "Date Of Birth: ".$request->dob."\n";
        $fileContent .= "Gender: ".$request->gender."\n";
        $fileContent .= "Facebook Link: ".$request->facebook."\n";
        $fileContent .= "Country: ".$request->country."\n";
        $fileContent .= "State: ".$request->state."\n";
        $fileContent .= "City: ".$request->city."\n";
        $fileContent .= "Zip Code: ".$request->zip."\n";
        $fileContent .= "Address 1: ".$request->address."\n";
        $fileContent .= "Phone Number: ".$request->phone."\n\n\n";
 


        $txtFile = Storage::put('kycs/'.$folder."/info.txt", $fileContent);
        $front_name = "front_".mt_rand(100,10000).".".$request->file('front_doc')->extension();
        $back_name = "back_".mt_rand(100,10000).".".$request->file('back_doc')->extension();
        $user_name = "user_".mt_rand(100,10000).".".$request->file('user_doc')->extension();

        $front = Storage::putFileAs(
            "kycs/".$folder, $request->file('front_doc') , $front_name
        );

        $back = Storage::putFileAs(
            "kycs/".$folder, $request->file('back_doc') , $back_name
        );

        $user = Storage::putFileAs(
            "kycs/".$folder, $request->file('user_doc') , $user_name
        );
        $this->store($request, $folder);   
    }

    public function store($request, $folder){
        $new_kyc = new KYCModel();
        $new_kyc->user_id  = auth()->user()->id; 
        $new_kyc->firstname  = $request->first_name; 
        $new_kyc->lastname  = $request->last_name; 
        $new_kyc->email  = $request->email; 
        $new_kyc->phone  = $request->phone; 
        $new_kyc->dob  = $request->dob;
        $new_kyc->gender  = $request->gender; 
        $new_kyc->address = $request->address; 
        $new_kyc->city  = $request->city; 
        $new_kyc->state  = $request->state; 
        $new_kyc->zip  = $request->zip; 
        $new_kyc->country  = $request->country; 
        $new_kyc->type = $request->type;
        $new_kyc->folder  = $folder;
        $new_kyc->save();


        $user = User::find(auth()->user()->id);
        $user->status = 'unverified';
        $user->save();
    }


    public function kycUpdate(Request $request){
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required',
            'dob' => 'required|date',
            'gender' => 'required',
            'country' => 'required',
            'state' => 'required|string',
            'city' => 'required',
            'zip' => 'required',
            'address' => 'required',
        ]);

        $year = explode("-", $request->dob)[0];
        $valid_year = (date('Y') - 18);
        $phoneCheck = KYCModel::where('phone', $request->phone)->get();
        $allowed = ['png', 'jpeg', 'jpg', 'svg'];

        if(!in_array($request->country, $this->countries)){
            return back()->withInput()->with('error', 'Please choose a valid country');
        }elseif($year > $valid_year){
            return back()->withInput()->with('error', 'Please must be more than 18 to continue');
        }elseif(strtolower($request->email) != strtolower(auth()->user()->email)){
            return back()->withInput()->with('error', 'Your email does not match your current used email');
        }else{
            $this->checkFiles($request->front_doc, $allowed);
            $this->checkFiles($request->back_doc, $allowed);
            $this->checkFiles($request->user_doc, $allowed);
            $this->updateUserKyc($request);
            if(isset($request->front_doc) || isset($request->back_doc) ||  isset($request->user_doc)){
                return $this->updateFiles($request);
            }

            Mail::to(auth()->user()->email)->send(new KycUpdate());
            return back()->with('success', 'KYC Application updated successfully');
        }
    }

    public function checkFiles($file, $allowed){
        if($file){
            if(!in_array($file->extension(), $allowed)){
                return back()->withInput()->with('error', 'Your documents must be in image format (.png, .jpeg, .jpg, .svg)');
            }
        }
    }

    public function updateFiles($request){
            $request->validate([
                'front_doc' => 'required',
                'back_doc' => 'required',
                'user_doc' => 'required',
                'type' => 'required',
            ]);

            $folder = KYCModel::where('user_id', auth()->user()->id)->get()[0]['folder'];

            $files = Storage::allFiles('kycs/'.$folder);
            foreach($files as $file){
                Storage::delete($file);
            }

            $front_name = "front_".mt_rand(100,10000).".".$request->file('front_doc')->extension();
            $back_name = "back_".mt_rand(100,10000).".".$request->file('back_doc')->extension();
            $user_name = "user_".mt_rand(100,10000).".".$request->file('user_doc')->extension();
    
            $front = Storage::putFileAs(
                "kycs/".$folder, $request->file('front_doc') , $front_name
            );
    
    
            $back = Storage::putFileAs(
                "kycs/".$folder, $request->file('back_doc') , $back_name
            );
    
    
            $user = Storage::putFileAs(
                "kycs/".$folder, $request->file('user_doc') , $user_name
            );
            
            
            return back()->with('success', 'KYC Application updated successfully');
    }
    
    public function updateUserKyc($request){
        $kyc = KYCModel::where('user_id', auth()->user()->id)->get()[0];

        $kyc->firstname  = $request->first_name; 
        $kyc->lastname  = $request->last_name; 
        $kyc->email  = $request->email; 
        $kyc->phone  = $request->phone; 
        $kyc->dob  = $request->dob;
        $kyc->gender  = $request->gender; 
        $kyc->address  = $request->address; 
        $kyc->city  = $request->city; 
        $kyc->state  = $request->state; 
        $kyc->zip  = $request->zip; 
        $kyc->country  = $request->country; 
        $kyc->type = $request->type;
        $kyc->status = 'changed';
        $kyc->save();
    }
}
