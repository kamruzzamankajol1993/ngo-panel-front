<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use DB;
use PDF;
use Mpdf\Mpdf;
use DateTime;
use DateTimezone;
use Response;
use App\Http\Controllers\NGO\CommonController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Session;
use App\Models\FormNoFour;
use App\Models\FormNoFourSectorDetail;
use App\Models\FdOneForm;
use App\Models\FdFourForm;
use App\Models\NgoRenewInfo;
use App\Models\NgoDuration;
class FdFourFormController extends Controller
{
    public function addFdFourFormData($id){
        try{

            $decodeId = base64_decode($id);
            $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')
            ->where('user_id',Auth::user()->id)->value('ngo_type');
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();


            $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
        $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->orderBy('id','desc')->first();
        $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngo_list_all->id)->value('web_site_name');

            $fdFourFormList = FdFourForm::where('fd_one_form_id',$ngo_list_all->id)
            ->where('fd_four_one_form_id',$decodeId)
            ->first();

//dd(12);

            return view('front.fdFourForm.newAddForm',compact('renewWebsiteName','ngoDurationLastEx','ngoDurationReg','decodeId','ngo_list_all','fdFourFormList'));

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }
    }

    public function store(Request $request){

        //dd($request->all());


        $request->validate([

            'prokolpo_name' => 'required|string',
            'ngo_website' => 'required|string',
            'prokolpo_duration_one' => 'required|string',
            'exam_time' => 'required|string',
            'start_balance' => 'required|string',
            'foreign_grant_taken_exam_year' => 'required|string',
            'foreign_grant_cost_exam_year' => 'required|string',
            'foreign_grant_remaining_exam_year' => 'required|string',
        ]);

        try{
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();

            $fdFourOneForm = new FdFourForm();
            $fdFourOneForm->status = 'Review';
            $fdFourOneForm->file_last_check_date = Date('Y-m-d', strtotime('+3 days'));
            $fdFourOneForm->prokolpo_name = $request->prokolpo_name;
            $fdFourOneForm->ngo_name = $request->ngo_name;
            $fdFourOneForm->registration_number = $request->registration_number;
            $fdFourOneForm->ngo_telephone = $request->ngo_telephone;
            $fdFourOneForm->ngo_email = $request->ngo_email;
            $fdFourOneForm->ngo_website = $request->ngo_website;
            $fdFourOneForm->prokolpo_duration_one = $request->prokolpo_duration_one;
            $fdFourOneForm->exam_time =$request->exam_time;
            $fdFourOneForm->start_balance =$request->start_balance;
            $fdFourOneForm->foreign_grant_cost_exam_year =$request->foreign_grant_cost_exam_year;
            $fdFourOneForm->foreign_grant_taken_exam_year =$request->foreign_grant_taken_exam_year;
            $fdFourOneForm->foreign_grant_remaining_exam_year =$request->foreign_grant_remaining_exam_year;
            $fdFourOneForm->fd_one_form_id = $ngo_list_all->id;
            $fdFourOneForm->fd_four_one_form_id = $request->decodeId;
            $fdFourOneForm->save();


            $fdFourOneFormId = $fdFourOneForm->id;


            return redirect()->route('fdFourOneForm.show',base64_encode($request->decodeId))->with('success','Added Successfully');

        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }
    }

    public function update(Request $request,$id){



        try{
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();

            $fdFourOneForm = FdFourForm::find($id);
            $fdFourOneForm->prokolpo_name = $request->prokolpo_name;
            $fdFourOneForm->ngo_name = $request->ngo_name;
            $fdFourOneForm->registration_number = $request->registration_number;
            $fdFourOneForm->ngo_telephone = $request->ngo_telephone;
            $fdFourOneForm->ngo_email = $request->ngo_email;
            $fdFourOneForm->foreign_grant_cost_exam_year =$request->foreign_grant_cost_exam_year;
            $fdFourOneForm->ngo_website = $request->ngo_website;
            $fdFourOneForm->prokolpo_duration_one = $request->prokolpo_duration_one;
            $fdFourOneForm->exam_time =$request->exam_time;
            $fdFourOneForm->start_balance =$request->start_balance;
            $fdFourOneForm->foreign_grant_taken_exam_year =$request->foreign_grant_taken_exam_year;
            $fdFourOneForm->foreign_grant_remaining_exam_year =$request->foreign_grant_remaining_exam_year;
            $fdFourOneForm->fd_one_form_id = $ngo_list_all->id;
            $fdFourOneForm->fd_four_one_form_id = $request->decodeId;
            $fdFourOneForm->save();


            $fdFourOneFormId = $fdFourOneForm->id;


            return redirect()->route('fdFourOneForm.show',base64_encode($request->decodeId))->with('success','Added Successfully');

        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }
    }
}
