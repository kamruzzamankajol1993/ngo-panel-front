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
use App\Models\FormNoFiveAreaDetail;
use App\Models\FormNoFiveStepTwo;
use App\Models\FormNoFiveStepThree;
use App\Models\FormNoFiveStepFour;
use App\Models\FormNoFiveStepFive;
use App\Models\FormNoFiveOther;
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
            $formNoFiveStepTwoData = FormNoFiveStepTwo::where('form_no_fives_id',$decode_id)->get();

            return view('front.formNoFive.formNoFiveStepTwo',compact('formNoFiveStepTwoData','decode_id','ngo_list_all','ngoDurationReg','divisionList'));

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

            $formNoFiveStepThreeData = FormNoFiveStepThree::where('form_no_fives_id',$decode_id)->get();
            $formFiveData = FormNoFive::where('id',$decode_id)->latest()->first();

            return view('front.formNoFive.formNoFiveStepThree',compact('formFiveData','formNoFiveStepThreeData','decode_id','ngo_list_all','ngoDurationReg','divisionList'));

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

            $formNoFiveStepFourData = FormNoFiveStepFour::where('form_no_fives_id',$decode_id)->get();
            $formFiveData = FormNoFive::where('id',$decode_id)->latest()->first();

            return view('front.formNoFive.formNoFiveStepFour',compact('formFiveData','formNoFiveStepFourData','decode_id','ngo_list_all','ngoDurationReg','divisionList'));

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


            $formNoFiveStepFiveOther= FormNoFiveOther::where('form_no_fives_id',$decode_id)->get();
            $formNoFiveStepFiveData = FormNoFiveStepFive::where('form_no_fives_id',$decode_id)->get();
            $formFiveData = FormNoFive::where('id',$decode_id)->latest()->first();

            return view('front.formNoFive.formNoFiveStepFive',compact('formFiveData','formNoFiveStepFiveData','formNoFiveStepFiveOther','decode_id','ngo_list_all','ngoDurationReg','divisionList'));

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }


    }


    public function store(Request $request){

        $request->validate([

            'prokolpo_name' => 'required|string',
            'prokolpo_duration' => 'required|string',
            'ngo_registration_number' => 'required|string',
            'ngo_registration_date' => 'required|string',
            'approved_estimated_expenditure_year_wise' => 'required|string',
            'received_money_during_report' => 'required|string',
            'report_year' => 'required|string',
            'percentage_of_achievement_during_project' => 'required|string',
            'prokolpo_araea' => 'required|string',

        ]);

        try{
            DB::beginTransaction();

            $fdOneFormID = FdOneForm::where('user_id',Auth::user()->id)->first();

            $formNoFiveInfo = new FormNoFive();
            $formNoFiveInfo->file_last_check_date = Date('Y-m-d', strtotime('+3 days'));
            $formNoFiveInfo->fd_one_form_id =$fdOneFormID->id;
            $formNoFiveInfo->prokolpo_name =$request->prokolpo_name;
            $formNoFiveInfo->prokolpo_duration =$request->prokolpo_duration;
            $formNoFiveInfo->status ='submit_process';
            $formNoFiveInfo->ngo_registration_number =$request->ngo_registration_number;
            $formNoFiveInfo->ngo_registration_date =$request->ngo_registration_date;
            $formNoFiveInfo->approved_estimated_expenditure_year_wise =$request->approved_estimated_expenditure_year_wise;
            $formNoFiveInfo->received_money_during_report =$request->received_money_during_report;
            $formNoFiveInfo->report_year =$request->report_year;
            $formNoFiveInfo->percentage_of_achievement_during_project =$request->percentage_of_achievement_during_project;
            $formNoFiveInfo->prokolpo_araea =$request->prokolpo_araea;
            $formNoFiveInfo->save();

            $input = $request->all();
            $divisionName = $input['division_name'];
            $formNoFiveInfoId = $formNoFiveInfo->id;

            foreach($divisionName as $key => $divisionName){
                $form= new FormNoFiveAreaDetail();
                $form->form_no_fives_id=$formNoFiveInfoId;
                $form->division_name=$input['division_name'][$key];
                $form->district_name=$input['district_name'][$key];
                $form->city_corparation_name=$input['city_corparation_name'][$key];

                if(empty($input['upozila_name'][$key])){


                }else{

                    $form->upozila_name=$input['upozila_name'][$key];
                }


                if(empty($input['thana_name'][$key])){


                }else{

                    $form->thana_name=$input['thana_name'][$key];
                }



                if(empty($input['municipality_name'][$key])){


                }else{

                    $form->municipality_name=$input['municipality_name'][$key];
                }



                if(empty($input['ward_name'][$key])){


                }else{

                    $form->ward_name=$input['ward_name'][$key];
                }

                $form->save();
            }

            DB::commit();
            return redirect()->route('formNoFiveStepTwo',base64_encode($formNoFiveInfoId))->with('success','Added Successfuly');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }



    }





    public function formNoFiveStepTwoPost(Request $request){

        //dd($request->all());

        $request->validate([

            'sector_of_annexure_C' => 'required|string',
            'sector_wise_budget' => 'required|string',
            'activities_and_objectives' => 'required|string',
            'activity_wise_segmented_budget' => 'required|string',
            'activity_based_achievement_targets' => 'required|string',
            'activity_based_actual_costing' => 'required|string',
            'accounts_payable_total_actual_expenditure' => 'required|string',
            'cumulative_progress_during_reporting_in_real' => 'required|string',
            'cumulative_progress_during_reporting_in_financial' => 'required|string',

        ]);


       // dd($request->id);
        try{
            DB::beginTransaction();

            $formNoFiveInfo = new FormNoFiveStepTwo();
            $formNoFiveInfo->form_no_fives_id =$request->id;
            $formNoFiveInfo->sector_of_annexure_C =$request->sector_of_annexure_C;
            $formNoFiveInfo->sector_wise_budget =$request->sector_wise_budget;
            $formNoFiveInfo->activities_and_objectives =$request->activities_and_objectives;
            $formNoFiveInfo->activity_wise_segmented_budget =$request->activity_wise_segmented_budget;
            $formNoFiveInfo->activity_based_achievement_targets =$request->activity_based_achievement_targets;
            $formNoFiveInfo->activity_based_actual_costing =$request->activity_based_actual_costing;
            $formNoFiveInfo->accounts_payable_total_actual_expenditure =$request->accounts_payable_total_actual_expenditure;
            $formNoFiveInfo->cumulative_progress_during_reporting_in_real =$request->cumulative_progress_during_reporting_in_real;
            $formNoFiveInfo->cumulative_progress_during_reporting_in_financial =$request->cumulative_progress_during_reporting_in_financial;
            $formNoFiveInfo->comment =$request->comment;
            $formNoFiveInfo->save();

            $input = $request->all();
            $formNoFiveInfoId = $formNoFiveInfo->id;

            DB::commit();
            return redirect()->route('formNoFiveStepTwo',base64_encode($request->id))->with('success','Added Successfuly');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }

    }


    public function formNoFiveStepFourPost(Request $request){

        $request->validate([

            'approval_file_of_Bureau' => 'required|file',
            'land_and_transport_detail' => 'required|string'

        ]);

        try{
            DB::beginTransaction();

            $formNoFiveInfo = FormNoFive::find($request->id);
            $formNoFiveInfo->land_and_transport_detail =$request->land_and_transport_detail;
            if ($request->hasfile('approval_file_of_Bureau')) {

                $filePath="FormNoFive";
                $file = $request->file('approval_file_of_Bureau');
                $formNoFiveInfo->approval_file_of_Bureau =CommonController::pdfUpload($request,$file,$filePath);

            }
            $formNoFiveInfo->save();

            $input = $request->all();
            $formNoFiveInfoId = $formNoFiveInfo->id;

            DB::commit();
            return redirect()->route('formNoFiveStepFive',base64_encode($request->id))->with('success','Added Successfuly');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }


    }


    public function formNoFiveStepThreePost(Request $request){

        $request->validate([

            'district_name' => 'required|string',
            'upazila_name' => 'required|string',
            'total_allocation_for_upazila' => 'required|string',
            'total_actual_cost' => 'required|string',

        ]);


        try{
            DB::beginTransaction();

            $formNoFiveInfo = new FormNoFiveStepThree();
            $formNoFiveInfo->form_no_fives_id =$request->id;
            $formNoFiveInfo->district_name =$request->district_name;
            $formNoFiveInfo->upazila_name =$request->upazila_name;
            $formNoFiveInfo->total_allocation_for_upazila =$request->total_allocation_for_upazila;
            $formNoFiveInfo->total_actual_cost =$request->total_actual_cost;
            $formNoFiveInfo->save();

            $input = $request->all();
            $formNoFiveInfoId = $formNoFiveInfo->id;

            DB::commit();
            return redirect()->route('formNoFiveStepThree',base64_encode($request->id))->with('success','Added Successfuly');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }


    }


    public function formNoFiveStepThreeExtra(Request $request){

            $formNoFiveInfo = FormNoFive::find($request->decode_id);
            $formNoFiveInfo->prokolpo_name_one =$request->prokolpo_name_one;
            $formNoFiveInfo->reporting_period =$request->reporting_period;
            $formNoFiveInfo->save();

           return  $url = url('formNoFiveStepFour/'.base64_encode($request->decode_id));


    }


    public function formNoFiveStepFourPostAjax(Request $request){

            $formNoFiveInfo = new FormNoFiveStepFour();
            $formNoFiveInfo->form_no_fives_id =$request->decode_id;
            $formNoFiveInfo->description_of_property =$request->wealth_descrip;
            $formNoFiveInfo->sub_property =$request->sub_property;
            $formNoFiveInfo->quantity =$request->quantity;
            $formNoFiveInfo->collect_date =$request->collect_date;
            $formNoFiveInfo->real_buying_price =$request->real_buying_price;
            $formNoFiveInfo->fund_source =$request->fund_source;
            $formNoFiveInfo->what_is_it_used_for =$request->what_is_it_used_for;
            $formNoFiveInfo->place =$request->place;
            $formNoFiveInfo->assets_sold_transferred_number_or_quantity =$request->assets_sold_transferred_number_or_quantity;
            $formNoFiveInfo->quantity_during_start_of_organization =$request->quantity_during_start_of_organization;
            $formNoFiveInfo->total_during_start_of_organization =$request->total_during_start_of_organization;
            $formNoFiveInfo->current_status =$request->current_status;
            $formNoFiveInfo->save();


            $formNoFiveInfoList = FormNoFiveStepFour::where('form_no_fives_id',$request->decode_id)->get();

            $data = view('front.formNoFive.formNoFiveStepFourPostAjax',compact('formNoFiveInfoList'))->render();
            return response()->json($data);


    }
}
