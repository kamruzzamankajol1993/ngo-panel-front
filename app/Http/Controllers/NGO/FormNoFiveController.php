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
use App\Models\FormNoFive;
use App\Models\FdOneForm;
use App\Models\NgoDuration;
class FormNoFiveController extends Controller
{
    public function index(){
        try{
            $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
            $formNoFiveList = FormNoFive::where('fd_one_form_id',$ngo_list_all->id)->latest()->get();

            return view('front.formNoFive.index',compact('ngo_list_all','formNoFiveList'));

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }
    }


    public function create(){

        try{

            $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
            $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
            $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
            return view('front.formNoFive.create',compact('ngo_list_all','ngoDurationReg','divisionList'));

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }
    }


    public function formNoFiveStepTwo($id){


        try{

            $decode_id = base64_decode($id);

            $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
            $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
            $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
            return view('front.formNoFive.formNoFiveStepTwo',compact('decode_id','ngo_list_all','ngoDurationReg','divisionList'));

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }


    }

    public function formNoFiveStepThree($id){


        try{

            $decode_id = base64_decode($id);

            $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
            $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
            $divisionList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();
            return view('front.formNoFive.formNoFiveStepThree',compact('decode_id','ngo_list_all','ngoDurationReg','divisionList'));

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }


    }


    public function formNoFiveStepFour($id){


        try{

            $decode_id = base64_decode($id);

            $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
            $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
            $divisionList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();
            return view('front.formNoFive.formNoFiveStepFour',compact('decode_id','ngo_list_all','ngoDurationReg','divisionList'));

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }


    }

    public function formNoFiveStepFive($id){


        try{

            $decode_id = base64_decode($id);

            $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
            $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
            $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
            return view('front.formNoFive.formNoFiveStepFive',compact('decode_id','ngo_list_all','ngoDurationReg','divisionList'));

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }


    }
}
