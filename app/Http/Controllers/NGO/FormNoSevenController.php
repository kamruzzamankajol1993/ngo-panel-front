<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use DB;
use PDF;
use DateTime;
use DateTimezone;
use Response;
use App\Http\Controllers\NGO\CommonController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Session;
use App\Models\FormNoSeven;
use App\Models\FormNoSevenStepTwo;
use App\Models\FormNoSevenStepThree;
use App\Models\FormNoSevenStepFour;
use App\Models\FormNoSevenFive;
use App\Models\FdOneForm;
class FormNoSevenController extends Controller
{
    public function index(){
        try{
            $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
            $formNoSevenList = FormNoSeven::where('fd_one_form_id',$ngo_list_all->id)->latest()->get();

            return view('front.formNoSeven.index',compact('ngo_list_all','formNoSevenList'));

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }
    }


    public function create(){

        try{

            $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();

            return view('front.formNoSeven.create',compact('ngo_list_all'));

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }
    }
}
