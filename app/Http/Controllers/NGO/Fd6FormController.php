<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fd6Form;
use App\Models\Fd6FormProkolpoArea;
use App\Models\NVisa;
use App\Models\SDGDevelopmentGoal;
use App\Models\Fd2Form;
use App\Models\Fd2FormOtherInfo;
use App\Models\Fd2AllFormLastYearDetail;
use App\Models\ExpectedResult;
use App\Models\DistrictWiseActivity;
use App\Models\NgoStatus;
use App\Models\Country;
use App\Models\Fd9Form;
use App\Models\ProkolpoDetail;
use App\Models\NgoDuration;
use App\Models\Fd9ForeignerEmployeeFamilyMemberList;
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
use App\Models\FdOneForm;
use App\Models\Fd6GovernanceAndTransparency;
use App\Models\Fd6ProjectManagement;
use App\Models\Fd6StepThree;
use App\Models\NgoRenewInfo;
use Illuminate\Support\Facades\App;
class Fd6FormController extends Controller
{
    public function index(){

        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $fd6FormList = Fd6Form::where('fd_one_form_id',$ngo_list_all->id)->latest()->get();
        $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
        $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->orderBy('id','desc')->first();

        return view('front.fd6Form.index',compact('ngoDurationLastEx','ngoDurationReg','ngo_list_all','fd6FormList'));
    }



    public function create(){

        $prokolpoAreaList = Fd6FormProkolpoArea::where('user_id',Auth::user()->id)
        ->where('upload_type',0)->get();

        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
        $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->orderBy('id','desc')->first();
        $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngo_list_all->id)->value('web_site_name');
        $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
        $districtList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();
        $cityCorporationList =  DB::table('civilinfos')->whereNotNull('city_orporation')
        ->groupBy('city_orporation')->select('city_orporation')->get();
        $subdDistrictList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();
        $thanaList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();

        return view('front.fd6Form.stepOneForm',compact('prokolpoAreaList','thanaList','subdDistrictList','cityCorporationList','districtList','divisionList','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));

    }


    public function getDistrictList(Request $request){


        $divisionList = $request->getMainValue;

        $districtList = DB::table('civilinfos')->where('division_bn',$divisionList)->groupBy('district_bn')
            ->select('district_bn')->get();

        $data = view('front.fd6Form.get_district_from_division',compact('districtList'))->render();
        return response()->json($data);


    }


    public function getUpozilaListNew(Request $request){

        $divisionList = $request->getMainValue;

        $upozilaList = DB::table('civilinfos')
        ->where('division_bn',$divisionList)->groupBy('thana_bn')
            ->select('thana_bn')->get();

        $data = view('front.fd6Form.getUpozilaListNew',compact('upozilaList'))->render();
        return response()->json($data);

    }





    public function getCityCorporationList(Request $request){


        $divisionList = $request->getMainValue;

        $cityCorporationList = DB::table('civilinfos')->where('division_bn',$divisionList)->whereNotNull('city_orporation')->groupBy('city_orporation')
            ->select('city_orporation')->get();

        $data = view('front.fd6Form.getCityCorporationList',compact('cityCorporationList'))->render();
        return response()->json($data);



    }


    public function getUpozilaList(Request $request){


        $districtList = $request->getMainValue;

        $upozilaList = DB::table('civilinfos')->where('district_bn',$districtList)
        ->whereNotNull('thana_bn')->groupBy('thana_bn')
            ->select('thana_bn')->get();

        $data = view('front.fd6Form.getUpozilaList',compact('upozilaList'))->render();
        return response()->json($data);


    }




    public function store(Request $request){

       // dd($request->all());
        $request->validate([

            'ngo_name' => 'required|string',
            'ngo_registration_date' => 'required|string',
            'ngo_last_renew_date' => 'required|string',
            'ngo_expiration_date' => 'required|string',
            'ngo_address' => 'required|string',
            'ngo_telephone_number' => 'required|string',
            'ngo_mobile_number' => 'required|string',
            'ngo_email_address' => 'required|string',
            'ngo_website' => 'required|string',
            'ngo_prokolpo_name' => 'required|string',
            'ngo_prokolpo_duration' => 'required|string',
            'ngo_prokolpo_start_date' => 'required|string',
            'ngo_prokolpo_end_date' => 'required|string',


        ]);

        //dd($request->all());

        try{
            DB::beginTransaction();

            $fdOneFormID = FdOneForm::where('user_id',Auth::user()->id)->first();

            $subject_all = implode(",",$request->subject_id);

            $fd6FormInfo = new Fd6Form();
            $fd6FormInfo->file_last_check_date = Date('Y-m-d', strtotime('+3 days'));
            $fd6FormInfo->fd_one_form_id =$fdOneFormID->id;
            $fd6FormInfo->ngo_name =$request->ngo_name;
            $fd6FormInfo->subject_id =$subject_all;
            $fd6FormInfo->status ='Review';
            $fd6FormInfo->ngo_registration_date =$request->ngo_registration_date;
            $fd6FormInfo->ngo_last_renew_date =$request->ngo_last_renew_date;
            $fd6FormInfo->ngo_expiration_date =$request->ngo_expiration_date;
            $fd6FormInfo->ngo_address =$request->ngo_address;
            $fd6FormInfo->ngo_telephone_number =$request->ngo_telephone_number;
            $fd6FormInfo->ngo_mobile_number =$request->ngo_mobile_number;
            $fd6FormInfo->ngo_email_address =$request->ngo_email_address;
            $fd6FormInfo->ngo_website =$request->ngo_website;
            $fd6FormInfo->ngo_prokolpo_name =$request->ngo_prokolpo_name;
            $fd6FormInfo->ngo_prokolpo_duration =$request->ngo_prokolpo_duration;
            $fd6FormInfo->ngo_prokolpo_start_date =$request->ngo_prokolpo_start_date;
            $fd6FormInfo->ngo_prokolpo_end_date =$request->ngo_prokolpo_end_date;
            // $fd6FormInfo->grants_received_from_abroad_first_year =$request->grants_received_from_abroad_first_year;
            // $fd6FormInfo->grants_received_from_abroad_second_year =$request->grants_received_from_abroad_second_year;
            // $fd6FormInfo->grants_received_from_abroad_third_year =$request->grants_received_from_abroad_third_year;
            // $fd6FormInfo->grants_received_from_abroad_fourth_year =$request->grants_received_from_abroad_fourth_year;
            // $fd6FormInfo->grants_received_from_abroad_fifth_year =$request->grants_received_from_abroad_fifth_year;
            // $fd6FormInfo->grants_received_from_abroad_total =$request->grants_received_from_abroad_total;
            // $fd6FormInfo->grants_received_from_abroad_comment =$request->grants_received_from_abroad_comment;
            // $fd6FormInfo->donations_made_by_foreign_donors_first_year =$request->donations_made_by_foreign_donors_first_year;
            // $fd6FormInfo->donations_made_by_foreign_donors_second_year =$request->donations_made_by_foreign_donors_second_year;
            // $fd6FormInfo->donations_made_by_foreign_donors_third_year =$request->donations_made_by_foreign_donors_third_year;
            // $fd6FormInfo->donations_made_by_foreign_donors_fourth_year =$request->donations_made_by_foreign_donors_fourth_year;
            // $fd6FormInfo->donations_made_by_foreign_donors_fifth_year =$request->donations_made_by_foreign_donors_fifth_year;
            // $fd6FormInfo->donations_made_by_foreign_donors_total =$request->donations_made_by_foreign_donors_total;
            // $fd6FormInfo->donations_made_by_foreign_donors_comment =$request->donations_made_by_foreign_donors_comment;
            // $fd6FormInfo->local_grants_first_year =$request->local_grants_first_year;
            // $fd6FormInfo->local_grants_second_year =$request->local_grants_second_year;
            // $fd6FormInfo->local_grants_third_year =$request->local_grants_third_year;
            // $fd6FormInfo->local_grants_fourth_year =$request->local_grants_fourth_year;
            // $fd6FormInfo->local_grants_fifth_year =$request->local_grants_fifth_year;
            // $fd6FormInfo->local_grants_donors_total =$request->local_grants_donors_total;
            // $fd6FormInfo->local_grants_donors_comment =$request->local_grants_donors_comment;
            // $fd6FormInfo->total_first_year =$request->total_first_year;
            // $fd6FormInfo->total_second_year =$request->total_second_year;
            // $fd6FormInfo->total_third_year =$request->total_third_year;
            // $fd6FormInfo->total_fourth_year =$request->total_fourth_year;
            // $fd6FormInfo->total_fifth_year =$request->total_fifth_year;
            // $fd6FormInfo->total_donors_total =$request->total_donors_total;
            // $fd6FormInfo->total_donors_comment =$request->total_donors_comment;
            // $fd6FormInfo->donor_organization_name =$request->donor_organization_name;
            // $fd6FormInfo->donor_organization_address =$request->donor_organization_address;
            // $fd6FormInfo->donor_organization_phone_mobile_email =$request->donor_organization_phone_mobile_email;
            // $fd6FormInfo->donor_organization_website =$request->donor_organization_website;
            // $fd6FormInfo->money_laundering_and_terrorist_financing =$request->money_laundering_and_terrorist_financing;
            // $fd6FormInfo->project_cost =$request->project_cost;
            // $fd6FormInfo->project_cost_ratio =$request->project_cost_ratio;
            // $fd6FormInfo->administrative_cost =$request->administrative_cost;
            // $fd6FormInfo->administrative_ratio =$request->administrative_ratio;
            // $fd6FormInfo->project_and_administrative_cost =$request->project_and_administrative_cost;
            // $fd6FormInfo->project_and_administrative_cost_ratio =$request->project_and_administrative_cost_ratio;
            // $fd6FormInfo->project_name =$request->project_name;
            // $fd6FormInfo->duration_of_project =$request->duration_of_project;
            // $fd6FormInfo->total_allocation_of_project =$request->total_allocation_of_project;
            // $fd6FormInfo->total_allocation_in_project_area =$request->total_allocation_in_project_area;
            // $fd6FormInfo->total_beneficiaries =$request->total_beneficiaries;
            // $fd6FormInfo->total_population_in_project_area =$request->total_population_in_project_area;
            // $fd6FormInfo->donor_organization_name_two =$request->donor_organization_name_two;

            // if ($request->hasfile('project_proposal_form')) {

            //     $filePath="FdSixForm";
            //     $file = $request->file('project_proposal_form');
            //     $fd6FormInfo->project_proposal_form =CommonController::pdfUpload($request,$file,$filePath);

            // }


            $fd6FormInfo->save();

            $input = $request->all();

            $fd6FormInfoId = $fd6FormInfo->id;


            $prokolpoDetail = new ProkolpoDetail();
            $prokolpoDetail->formId=$fd6FormInfoId;
            $prokolpoDetail->type='fd6';
            $prokolpoDetail->save();

            Fd6FormProkolpoArea::where('user_id',Auth::user()->id)
            ->where('upload_type',0)
       ->update([
           'upload_type' => 1,
           'fd6_form_id' =>$fd6FormInfoId
        ]);

            DB::commit();
            return redirect()->route('fd6StepTwo',base64_encode($fd6FormInfoId))->with('success','Added Successfuly');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }
    }


    public function edit($id){

        $fd6Id = base64_decode($id);

        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id) ->value('ngo_duration_start_date');
        $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->orderBy('id','desc')->first();
        $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngo_list_all->id)->value('web_site_name');
        $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
        $districtList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();
        $cityCorporationList = DB::table('civilinfos')->whereNotNull('city_orporation')->groupBy('city_orporation')->select('city_orporation')->get();
        $fd6FormList = Fd6Form::where('fd_one_form_id',$ngo_list_all->id)->where('id',$fd6Id)->latest()->first();
        $prokolpoAreaList = Fd6FormProkolpoArea::where('fd6_form_id',$fd6Id)->latest()->get();

        return view('front.fd6Form.edit',compact('cityCorporationList','districtList','prokolpoAreaList','fd6FormList','divisionList','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));

    }

    public function finalFdSixApplicationSubmit($id){


        $new_data_add = Fd6Form::find(base64_decode($id));
        $new_data_add->status = 'Ongoing';
        $new_data_add->save();

        return redirect('/fd6Form')->with('success','Submit To Ngo Sucessfully');


    }


    public function update(Request $request,$id){
        try{

            $subject_all = implode(",",$request->subject_id);

            DB::beginTransaction();

            $fd6FormInfo = Fd6Form::find($id);
            $fd6FormInfo->ngo_name =$request->ngo_name;
            $fd6FormInfo->subject_id =$subject_all;
            $fd6FormInfo->ngo_registration_date =$request->ngo_registration_date;
            $fd6FormInfo->ngo_last_renew_date =$request->ngo_last_renew_date;
            $fd6FormInfo->ngo_expiration_date =$request->ngo_expiration_date;
            $fd6FormInfo->ngo_address =$request->ngo_address;
            $fd6FormInfo->ngo_telephone_number =$request->ngo_telephone_number;
            $fd6FormInfo->ngo_mobile_number =$request->ngo_mobile_number;
            $fd6FormInfo->ngo_email_address =$request->ngo_email_address;
            $fd6FormInfo->ngo_website =$request->ngo_website;
            $fd6FormInfo->ngo_prokolpo_name =$request->ngo_prokolpo_name;
            $fd6FormInfo->ngo_prokolpo_duration =$request->ngo_prokolpo_duration;
            $fd6FormInfo->ngo_prokolpo_start_date =$request->ngo_prokolpo_start_date;
            $fd6FormInfo->ngo_prokolpo_end_date =$request->ngo_prokolpo_end_date;
            $fd6FormInfo->grants_received_from_abroad_first_year =$request->grants_received_from_abroad_first_year;
            $fd6FormInfo->grants_received_from_abroad_second_year =$request->grants_received_from_abroad_second_year;
            $fd6FormInfo->grants_received_from_abroad_third_year =$request->grants_received_from_abroad_third_year;
            $fd6FormInfo->grants_received_from_abroad_fourth_year =$request->grants_received_from_abroad_fourth_year;
            $fd6FormInfo->grants_received_from_abroad_fifth_year =$request->grants_received_from_abroad_fifth_year;
            $fd6FormInfo->grants_received_from_abroad_total =$request->grants_received_from_abroad_total;
            $fd6FormInfo->grants_received_from_abroad_comment =$request->grants_received_from_abroad_comment;
            $fd6FormInfo->donations_made_by_foreign_donors_first_year =$request->donations_made_by_foreign_donors_first_year;
            $fd6FormInfo->donations_made_by_foreign_donors_second_year =$request->donations_made_by_foreign_donors_second_year;
            $fd6FormInfo->donations_made_by_foreign_donors_third_year =$request->donations_made_by_foreign_donors_third_year;
            $fd6FormInfo->donations_made_by_foreign_donors_fourth_year =$request->donations_made_by_foreign_donors_fourth_year;
            $fd6FormInfo->donations_made_by_foreign_donors_fifth_year =$request->donations_made_by_foreign_donors_fifth_year;
            $fd6FormInfo->donations_made_by_foreign_donors_total =$request->donations_made_by_foreign_donors_total;
            $fd6FormInfo->donations_made_by_foreign_donors_comment =$request->donations_made_by_foreign_donors_comment;
            $fd6FormInfo->local_grants_first_year =$request->local_grants_first_year;
            $fd6FormInfo->local_grants_second_year =$request->local_grants_second_year;
            $fd6FormInfo->local_grants_third_year =$request->local_grants_third_year;
            $fd6FormInfo->local_grants_fourth_year =$request->local_grants_fourth_year;
            $fd6FormInfo->local_grants_fifth_year =$request->local_grants_fifth_year;
            $fd6FormInfo->local_grants_donors_total =$request->local_grants_donors_total;
            $fd6FormInfo->local_grants_donors_comment =$request->local_grants_donors_comment;
            $fd6FormInfo->total_first_year =$request->total_first_year;
            $fd6FormInfo->total_second_year =$request->total_second_year;
            $fd6FormInfo->total_third_year =$request->total_third_year;
            $fd6FormInfo->total_fourth_year =$request->total_fourth_year;
            $fd6FormInfo->total_fifth_year =$request->total_fifth_year;
            $fd6FormInfo->total_donors_total =$request->total_donors_total;
            $fd6FormInfo->total_donors_comment =$request->total_donors_comment;
            $fd6FormInfo->donor_organization_name =$request->donor_organization_name;
            $fd6FormInfo->donor_organization_address =$request->donor_organization_address;
            $fd6FormInfo->donor_organization_phone_mobile_email =$request->donor_organization_phone_mobile_email;
            $fd6FormInfo->donor_organization_website =$request->donor_organization_website;
            $fd6FormInfo->money_laundering_and_terrorist_financing =$request->money_laundering_and_terrorist_financing;
            $fd6FormInfo->project_cost =$request->project_cost;
            $fd6FormInfo->project_cost_ratio =$request->project_cost_ratio;
            $fd6FormInfo->administrative_cost =$request->administrative_cost;
            $fd6FormInfo->administrative_ratio =$request->administrative_ratio;
            $fd6FormInfo->project_and_administrative_cost =$request->project_and_administrative_cost;
            $fd6FormInfo->project_and_administrative_cost_ratio =$request->project_and_administrative_cost_ratio;
            $fd6FormInfo->project_name =$request->project_name;
            $fd6FormInfo->duration_of_project =$request->duration_of_project;
            $fd6FormInfo->total_allocation_of_project =$request->total_allocation_of_project;
            $fd6FormInfo->total_allocation_in_project_area =$request->total_allocation_in_project_area;
            $fd6FormInfo->total_beneficiaries =$request->total_beneficiaries;
            $fd6FormInfo->total_population_in_project_area =$request->total_population_in_project_area;
            $fd6FormInfo->donor_organization_name_two =$request->donor_organization_name_two;
            if ($request->hasfile('project_proposal_form')) {
                $filePath="FdSixForm";
                $file = $request->file('project_proposal_form');

                $fd6FormInfo->project_proposal_form =CommonController::pdfUpload($request,$file,$filePath);

            }

            $fd6FormInfo->save();

            $input = $request->all();

            $divisionName = $input['division_name'];

            $fd6FormInfoId = $fd6FormInfo->id;

            Fd6FormProkolpoArea::where('fd6_form_id',$fd6FormInfoId)->delete();

            foreach($divisionName as $key => $divisionName){
                $form= new Fd6FormProkolpoArea();
                $form->fd6_form_id=$fd6FormInfoId;
                $form->division_name=$input['division_name'][$key];
                $form->district_name=$input['district_name'][$key];
                $form->city_corparation_name=$input['city_corparation_name'][$key];

                if(empty($input['beneficiaries_total'][$key])){


                }else{

                    $form->number_of_beneficiaries=$input['beneficiaries_total'][$key];
                }

                if(empty($input['prokolpoType'][$key])){


                }else{

                    $form->prokolpo_type=$input['prokolpoType'][$key];
                }

                if(empty($input['allocated_budget'][$key])){


                }else{

                    $form->allocated_budget=$input['allocated_budget'][$key];
                }

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
        return redirect()->route('fd2Form.edit',base64_encode($fd6FormInfoId))->with('success','Updated Successfuly');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }
    }



    public function show($id){

        $fd6Id = base64_decode($id);

//dd($fd6Id);

        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
        $fd2FormList = Fd2Form::where('fd_one_form_id',$ngo_list_all->id)
        ->where('fd_six_form_id',$fd6Id)->latest()->first();


        $fd2OtherInfo = Fd2FormOtherInfo::where('fd2_form_id',$fd2FormList->id)->latest()->get();
        $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->orderBy('id','desc')->first();
        $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngo_list_all->id)->value('web_site_name');
        $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
        $districtList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();
        $cityCorporationList = DB::table('civilinfos')->whereNotNull('city_orporation')->groupBy('city_orporation')->select('city_orporation')->get();
        $fd6FormList = Fd6Form::where('fd_one_form_id',$ngo_list_all->id)->where('id',$fd6Id)->latest()->first();
        $prokolpoAreaList = Fd6FormProkolpoArea::where('fd6_form_id',$fd6Id)->latest()->get();

        return view('front.fd6Form.view',compact('fd2OtherInfo','fd2FormList','cityCorporationList','districtList','prokolpoAreaList','fd6FormList','divisionList','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));

    }


    public function destroy($id){
        try{
            DB::beginTransaction();

            $admins = Fd6Form::find($id);
            if (!is_null($admins)) {
                $admins->delete();
            }
            DB::commit();
            return back()->with('error','Deleted successfully!');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }
    }


    public function ProjectProposalFormPdfDownload($id){

        $get_file_data = Fd6Form::where('id',$id)->value('project_proposal_form');

        $file_path = url('public/'.$get_file_data);
        $filename  = pathinfo($file_path, PATHINFO_FILENAME);
        $file= public_path('/'). $get_file_data;
        $headers = array(
                  'Content-Type: application/pdf',
                );

        return Response::make(file_get_contents($file), 200, [
            'content-type'=>'application/pdf',
        ]);

    }

    public function showExpenseDataInModal(Request $request){

        $fd6FormList = Fd6Form::where('id',$request->fd6Id)->latest()->first();
        $prokolpoYearId = $request->get_id_from_main;
        $data = view('front.fd6Form._partial.showExpenseDataInModal',compact('fd6FormList','prokolpoYearId'))->render();
        return response()->json($data);

    }

    public function prokolpoAreaForFd6Update(Request $request){
        $form= Fd6FormProkolpoArea::find($request->mainId);
        $form->division_name=$request->division_name;
        $form->district_name=$request->district_name;
        $form->city_corparation_name=$request->city_corparation_name;
        $form->upozila_name=$request->upozila_name;
        $form->thana_name=$request->thana_name;
        $form->municipality_name=$request->municipality_name;
        $form->ward_name=$request->ward_name;
        $form->number_of_beneficiaries=$request->beneficiaries_total;
        $form->prokolpo_type=$request->prokolpoType;
        $form->allocated_budget=$request->allocated_budget;
        $form->save();

        if($request->mainEditId == 0){

        $prokolpoAreaList = Fd6FormProkolpoArea::where('user_id',Auth::user()->id)

        ->where('upload_type',0)->get();
        }else{

            $prokolpoAreaList = Fd6FormProkolpoArea::where('fd6_form_id',$request->mainEditId)

            ->get();


        }

        $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
        $districtList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();
        $cityCorporationList =  DB::table('civilinfos')->whereNotNull('city_orporation')
        ->groupBy('city_orporation')->select('city_orporation')->get();
        $subdDistrictList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();
        $thanaList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();

        $data = view('front.fd6Form._partial.prokolpoAreaTable',compact('thanaList','subdDistrictList','cityCorporationList','districtList','divisionList','prokolpoAreaList'))->render();
        return response()->json($data);

    }

    public function prokolpoAreaForFd6(Request $request){




        $form= new Fd6FormProkolpoArea();

        if($request->mainEditId == 0){
            $form->user_id =Auth::user()->id;
        $form->upload_type =0;
            }else{
                $form->fd6_form_id =$request->mainEditId;
                $form->user_id =Auth::user()->id;
                $form->upload_type =1;
            }
        $form->division_name=$request->division_name;
        $form->district_name=$request->district_name;
        $form->city_corparation_name=$request->city_corparation_name;
        $form->upozila_name=$request->upozila_name;
        $form->thana_name=$request->thana_name;
        $form->municipality_name=$request->municipality_name;
        $form->ward_name=$request->ward_name;
        $form->number_of_beneficiaries=$request->beneficiaries_total;
        $form->prokolpo_type=$request->prokolpoType;
        $form->allocated_budget=$request->allocated_budget;
        $form->save();

        if($request->mainEditId == 0){

        $prokolpoAreaList = Fd6FormProkolpoArea::where('user_id',Auth::user()->id)

        ->where('upload_type',0)->get();
        }else{

            $prokolpoAreaList = Fd6FormProkolpoArea::where('fd6_form_id',$request->mainEditId)

            ->get();


        }

        $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
        $districtList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();
        $cityCorporationList =  DB::table('civilinfos')->whereNotNull('city_orporation')
        ->groupBy('city_orporation')->select('city_orporation')->get();
        $subdDistrictList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();
        $thanaList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();

        $data = view('front.fd6Form._partial.prokolpoAreaTable',compact('thanaList','subdDistrictList','cityCorporationList','districtList','divisionList','prokolpoAreaList'))->render();
        return response()->json($data);



    }





    public function prokolpoAreaForFd6Delete(Request $request){

        $admins = Fd6FormProkolpoArea::find($request->id);
        if (!is_null($admins)) {
            $admins->delete();
        }

        if($request->mainEditId == 0){

            $prokolpoAreaList = Fd6FormProkolpoArea::where('user_id',Auth::user()->id)

            ->where('upload_type',0)->get();
            }else{

                $prokolpoAreaList = Fd6FormProkolpoArea::where('fd6_form_id',$request->mainEditId)

                ->get();


            }

        $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
        $districtList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();
        $cityCorporationList =  DB::table('civilinfos')->whereNotNull('city_orporation')
        ->groupBy('city_orporation')->select('city_orporation')->get();
        $subdDistrictList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();
        $thanaList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();

        $data = view('front.fd6Form._partial.prokolpoAreaTable',compact('thanaList','subdDistrictList','cityCorporationList','districtList','divisionList','prokolpoAreaList'))->render();
        return response()->json($data);


    }


    public function fd6StepTwo($id){



        $fd6Id = base64_decode($id);
        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
        $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->orderBy('id','desc')->first();
        $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngo_list_all->id)->value('web_site_name');
        $fd6FormList = Fd6Form::where('fd_one_form_id',$ngo_list_all->id)->where('id',$fd6Id)->latest()->first();
        $SDGDevelopmentGoal = SDGDevelopmentGoal::where('fc1_form_id',$fd6Id)
        ->where('type','fd6')
        ->latest()->get();
        $fd2AllFormLastYearDetail = Fd2AllFormLastYearDetail::where('main_id',$fd6Id)
        ->where('type','fd6')
        ->get();
        $expectedResultDetail = ExpectedResult::where('main_id',$fd6Id)
        ->where('type','fd6')
        ->get();
        $districtWiseList = DistrictWiseActivity::where('main_id',$fd6Id)
        ->where('type','fd6')
        ->latest()->get();

        $cityCorporationList =  DB::table('civilinfos')->whereNotNull('city_orporation')
        ->groupBy('city_orporation')->select('city_orporation')->get();

    $districtList = DB::table('civilinfos')->groupBy('district_bn')
    ->select('district_bn')->get();
    $subdDistrictList = DB::table('civilinfos')->groupBy('thana_bn')
    ->select('thana_bn')->get();

    $divisionList = DB::table('civilinfos')->groupBy('division_bn')
    ->select('division_bn')->get();
    $thanaList = DB::table('civilinfos')
    ->groupBy('thana_bn')->select('thana_bn')->get();

        return view('front.fd6Form.fd6StepTwo',compact('cityCorporationList','thanaList','districtWiseList','divisionList','subdDistrictList','districtList','expectedResultDetail','fd2AllFormLastYearDetail','SDGDevelopmentGoal','fd6FormList','fd6Id','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));
    }


    public function fd6StepThree($id){


        $fd6Id = base64_decode($id);
        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
        $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->orderBy('id','desc')->first();
        $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngo_list_all->id)->value('web_site_name');
        $fd6FormList = Fd6Form::where('fd_one_form_id',$ngo_list_all->id)->where('id',$fd6Id)->latest()->first();
        $SDGDevelopmentGoal = SDGDevelopmentGoal::where('fc1_form_id',$fd6Id)
        ->where('type','fd6')
        ->latest()->get();
        $fd2AllFormLastYearDetail = Fd2AllFormLastYearDetail::where('main_id',$fd6Id)
        ->where('type','fd6')
        ->get();
        $expectedResultDetail = ExpectedResult::where('main_id',$fd6Id)
        ->where('type','fd6')
        ->get();
        $districtWiseList = DistrictWiseActivity::where('main_id',$fd6Id)
        ->where('type','fd6')
        ->latest()->get();

        $cityCorporationList =  DB::table('civilinfos')->whereNotNull('city_orporation')
        ->groupBy('city_orporation')->select('city_orporation')->get();

    $districtList = DB::table('civilinfos')->groupBy('district_bn')
    ->select('district_bn')->get();
    $subdDistrictList = DB::table('civilinfos')->groupBy('thana_bn')
    ->select('thana_bn')->get();

    $divisionList = DB::table('civilinfos')->groupBy('division_bn')
    ->select('division_bn')->get();
    $thanaList = DB::table('civilinfos')
    ->groupBy('thana_bn')->select('thana_bn')->get();

        return view('front.fd6Form.fd6StepThree',compact('cityCorporationList','thanaList','districtWiseList','divisionList','subdDistrictList','districtList','expectedResultDetail','fd2AllFormLastYearDetail','SDGDevelopmentGoal','fd6FormList','fd6Id','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));

    }

    public function fd6StepFour($id){

        $fd6Id = base64_decode($id);
        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
        $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->orderBy('id','desc')->first();
        $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngo_list_all->id)->value('web_site_name');
        $fd6FormList = Fd6Form::where('fd_one_form_id',$ngo_list_all->id)->where('id',$fd6Id)->latest()->first();
        $SDGDevelopmentGoal = SDGDevelopmentGoal::where('fc1_form_id',$fd6Id)
        ->where('type','fd6')
        ->latest()->get();
        $fd2AllFormLastYearDetail = Fd2AllFormLastYearDetail::where('main_id',$fd6Id)
        ->where('type','fd6')
        ->get();
        $expectedResultDetail = ExpectedResult::where('main_id',$fd6Id)
        ->where('type','fd6')
        ->get();
        $districtWiseList = DistrictWiseActivity::where('main_id',$fd6Id)
        ->where('type','fd6')
        ->latest()->get();

        $cityCorporationList =  DB::table('civilinfos')->whereNotNull('city_orporation')
        ->groupBy('city_orporation')->select('city_orporation')->get();

    $districtList = DB::table('civilinfos')->groupBy('district_bn')
    ->select('district_bn')->get();
    $subdDistrictList = DB::table('civilinfos')->groupBy('thana_bn')
    ->select('thana_bn')->get();

    $divisionList = DB::table('civilinfos')->groupBy('division_bn')
    ->select('division_bn')->get();
    $thanaList = DB::table('civilinfos')
    ->groupBy('thana_bn')->select('thana_bn')->get();

        return view('front.fd6Form.fd6StepFour',compact('cityCorporationList','thanaList','districtWiseList','divisionList','subdDistrictList','districtList','expectedResultDetail','fd2AllFormLastYearDetail','SDGDevelopmentGoal','fd6FormList','fd6Id','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));

    }


    public function estimatedExpensesFd6Update(Request $request){

        if($request->prokolpo_year_grant == '১ম বছর'){


            $fd6FormInfo = Fd6Form::find($request->fd6Id);
            $fd6FormInfo->grants_received_from_abroad_first_year =$request->grants_received_from_abroad;
            $fd6FormInfo->donations_made_by_foreign_donors_first_year =$request->donations_made_by_foreign_donors;
            $fd6FormInfo->local_grants_first_year =$request->local_grants;
            $fd6FormInfo->prokolpo_year_grant_start_date_first =$request->prokolpo_year_grant_start_date;
            $fd6FormInfo->prokolpo_year_grant_end_date_first =$request->prokolpo_year_grant_end_date;


            if(empty($request->comment_grant)){

            }else{

            $fd6FormInfo->total_donors_comment =$request->comment_grant;
            }

            $fd6FormInfo->total_first_year =$request->grants_total;
            $fd6FormInfo->save();



        }elseif($request->prokolpo_year_grant == '২য় বছর'){

            $fd6FormInfo = Fd6Form::find($request->fd6Id);
            $fd6FormInfo->grants_received_from_abroad_second_year =$request->grants_received_from_abroad;
            $fd6FormInfo->donations_made_by_foreign_donors_second_year =$request->donations_made_by_foreign_donors;
            $fd6FormInfo->local_grants_second_year =$request->local_grants;
            $fd6FormInfo->prokolpo_year_grant_start_date_second =$request->prokolpo_year_grant_start_date;
            $fd6FormInfo->prokolpo_year_grant_end_date_second =$request->prokolpo_year_grant_end_date;
            if(empty($request->comment_grant)){

            }else{

            $fd6FormInfo->total_donors_comment =$request->comment_grant;
            }
            $fd6FormInfo->total_second_year =$request->grants_total;
            $fd6FormInfo->save();



        }elseif($request->prokolpo_year_grant == '৩য় বছর'){

            $fd6FormInfo = Fd6Form::find($request->fd6Id);
            $fd6FormInfo->grants_received_from_abroad_third_year =$request->grants_received_from_abroad;
            $fd6FormInfo->donations_made_by_foreign_donors_third_year =$request->donations_made_by_foreign_donors;
            $fd6FormInfo->local_grants_third_year =$request->local_grants;
            $fd6FormInfo->prokolpo_year_grant_start_date_third =$request->prokolpo_year_grant_start_date;
            $fd6FormInfo->prokolpo_year_grant_end_date_third =$request->prokolpo_year_grant_end_date;
            if(empty($request->comment_grant)){

            }else{

            $fd6FormInfo->total_donors_comment =$request->comment_grant;
            }
            $fd6FormInfo->total_third_year =$request->grants_total;
            $fd6FormInfo->save();

        }elseif($request->prokolpo_year_grant == '৪র্থ বছর'){


            $fd6FormInfo = Fd6Form::find($request->fd6Id);
            $fd6FormInfo->grants_received_from_abroad_fourth_year =$request->grants_received_from_abroad;
            $fd6FormInfo->donations_made_by_foreign_donors_fourth_year =$request->donations_made_by_foreign_donors;
            $fd6FormInfo->local_grants_fourth_year =$request->local_grants;
            $fd6FormInfo->prokolpo_year_grant_start_date_fourth =$request->prokolpo_year_grant_start_date;
            $fd6FormInfo->prokolpo_year_grant_end_date_fourth =$request->prokolpo_year_grant_end_date;
            $fd6FormInfo->total_donors_comment =$request->comment_grant;
            $fd6FormInfo->total_fourth_year =$request->grants_total;
            $fd6FormInfo->save();


        }elseif($request->prokolpo_year_grant == '৫ম বছর'){


            $fd6FormInfo = Fd6Form::find($request->fd6Id);
            $fd6FormInfo->grants_received_from_abroad_fifth_year =$request->grants_received_from_abroad;
            $fd6FormInfo->donations_made_by_foreign_donors_fifth_year =$request->donations_made_by_foreign_donors;
            $fd6FormInfo->local_grants_fifth_year =$request->local_grants;
            $fd6FormInfo->prokolpo_year_grant_start_date_fifth =$request->prokolpo_year_grant_start_date;
            $fd6FormInfo->prokolpo_year_grant_end_date_fifth =$request->prokolpo_year_grant_end_date;
            if(empty($request->comment_grant)){

            }else{

            $fd6FormInfo->total_donors_comment =$request->comment_grant;
            }
            $fd6FormInfo->total_fifth_year =$request->grants_total;
            $fd6FormInfo->save();

       }

       $fd6FormList = Fd6Form::where('id',$request->fd6Id)->latest()->first();

       $data = view('front.fd6Form.estimatedExpensesFd6',compact('fd6FormList'))->render();
        return response()->json($data);

    }


    public function estimatedExpensesFd6(Request $request){


        if($request->prokolpo_year_grant == '১ম বছর'){


            $fd6FormInfo = Fd6Form::find($request->fd6Id);
            $fd6FormInfo->grants_received_from_abroad_first_year =$request->grants_received_from_abroad;
            $fd6FormInfo->donations_made_by_foreign_donors_first_year =$request->donations_made_by_foreign_donors;
            $fd6FormInfo->local_grants_first_year =$request->local_grants;
            $fd6FormInfo->new_prokolpo_year =$request->prokolpo_year_grant;
            $fd6FormInfo->prokolpo_year_grant_start_date_first =$request->prokolpo_year_grant_start_date;
            $fd6FormInfo->prokolpo_year_grant_end_date_first =$request->prokolpo_year_grant_end_date;


            if(empty($request->comment_grant)){

            }else{

            $fd6FormInfo->total_donors_comment =$request->comment_grant;
            }

            $fd6FormInfo->total_first_year =$request->grants_total;
            $fd6FormInfo->save();



        }elseif($request->prokolpo_year_grant == '২য় বছর'){

            $fd6FormInfo = Fd6Form::find($request->fd6Id);
            $fd6FormInfo->grants_received_from_abroad_second_year =$request->grants_received_from_abroad;
            $fd6FormInfo->donations_made_by_foreign_donors_second_year =$request->donations_made_by_foreign_donors;
            $fd6FormInfo->local_grants_second_year =$request->local_grants;
            $fd6FormInfo->new_prokolpo_year =$request->prokolpo_year_grant;
            $fd6FormInfo->prokolpo_year_grant_start_date_second =$request->prokolpo_year_grant_start_date;
            $fd6FormInfo->prokolpo_year_grant_end_date_second =$request->prokolpo_year_grant_end_date;
            if(empty($request->comment_grant)){

            }else{

            $fd6FormInfo->total_donors_comment =$request->comment_grant;
            }
            $fd6FormInfo->total_second_year =$request->grants_total;
            $fd6FormInfo->save();



        }elseif($request->prokolpo_year_grant == '৩য় বছর'){

            $fd6FormInfo = Fd6Form::find($request->fd6Id);
            $fd6FormInfo->grants_received_from_abroad_third_year =$request->grants_received_from_abroad;
            $fd6FormInfo->donations_made_by_foreign_donors_third_year =$request->donations_made_by_foreign_donors;
            $fd6FormInfo->local_grants_third_year =$request->local_grants;
            $fd6FormInfo->new_prokolpo_year =$request->prokolpo_year_grant;
            $fd6FormInfo->prokolpo_year_grant_start_date_third =$request->prokolpo_year_grant_start_date;
            $fd6FormInfo->prokolpo_year_grant_end_date_third =$request->prokolpo_year_grant_end_date;
            if(empty($request->comment_grant)){

            }else{

            $fd6FormInfo->total_donors_comment =$request->comment_grant;
            }
            $fd6FormInfo->total_third_year =$request->grants_total;
            $fd6FormInfo->save();

        }elseif($request->prokolpo_year_grant == '৪র্থ বছর'){


            $fd6FormInfo = Fd6Form::find($request->fd6Id);
            $fd6FormInfo->grants_received_from_abroad_fourth_year =$request->grants_received_from_abroad;
            $fd6FormInfo->donations_made_by_foreign_donors_fourth_year =$request->donations_made_by_foreign_donors;
            $fd6FormInfo->local_grants_fourth_year =$request->local_grants;
            $fd6FormInfo->new_prokolpo_year =$request->prokolpo_year_grant;
            $fd6FormInfo->prokolpo_year_grant_start_date_fourth =$request->prokolpo_year_grant_start_date;
            $fd6FormInfo->prokolpo_year_grant_end_date_fourth =$request->prokolpo_year_grant_end_date;
            $fd6FormInfo->total_donors_comment =$request->comment_grant;
            $fd6FormInfo->total_fourth_year =$request->grants_total;
            $fd6FormInfo->save();


        }elseif($request->prokolpo_year_grant == '৫ম বছর'){


            $fd6FormInfo = Fd6Form::find($request->fd6Id);
            $fd6FormInfo->grants_received_from_abroad_fifth_year =$request->grants_received_from_abroad;
            $fd6FormInfo->donations_made_by_foreign_donors_fifth_year =$request->donations_made_by_foreign_donors;
            $fd6FormInfo->local_grants_fifth_year =$request->local_grants;
            $fd6FormInfo->new_prokolpo_year =$request->prokolpo_year_grant;
            $fd6FormInfo->prokolpo_year_grant_start_date_fifth =$request->prokolpo_year_grant_start_date;
            $fd6FormInfo->prokolpo_year_grant_end_date_fifth =$request->prokolpo_year_grant_end_date;
            if(empty($request->comment_grant)){

            }else{

            $fd6FormInfo->total_donors_comment =$request->comment_grant;
            }
            $fd6FormInfo->total_fifth_year =$request->grants_total;
            $fd6FormInfo->save();

       }

       $fd6FormList = Fd6Form::where('id',$request->fd6Id)->latest()->first();

       $data = view('front.fd6Form.estimatedExpensesFd6',compact('fd6FormList'))->render();
        return response()->json($data);

    }


    public function fd6ExpectedResultTarget(Request $request){

        $form= new ExpectedResult();
        $form->main_id=$request->fd6Id;
        $form->type='fd6';
        $form->multiplicative=$request->multiplicative;
        $form->number_reader=$request->number_reader;
        $form->duration=$request->duration;
        $form->save();

        $expectedResultDetail = ExpectedResult::where('main_id',$request->fd6Id)
        ->where('type','fd6')
        ->get();

        $data = view('front.fd6Form.fd6ExpectedResultTable',compact('expectedResultDetail'))->render();
        return response()->json($data);


    }

    public function fd6ExpectedResultUpdate(Request $request){

        $form= ExpectedResult::find($request->mainId);
        $form->multiplicative=$request->multiplicative;
        $form->number_reader=$request->number_reader;
        $form->duration=$request->duration;
        $form->save();

        $expectedResultDetail = ExpectedResult::where('main_id',$request->fd6Id)
        ->where('type','fd6')
        ->get();

        $data = view('front.fd6Form.fd6ExpectedResultTable',compact('expectedResultDetail'))->render();
        return response()->json($data);

    }

    public function fd6ExpectedResultDelete(Request $request){

        $admins = ExpectedResult::find($request->id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        $expectedResultDetail = ExpectedResult::where('main_id',$request->fd6Id)
        ->where('type','fd6')
        ->get();

        $data = view('front.fd6Form.fd6ExpectedResultTable',compact('expectedResultDetail'))->render();
        return response()->json($data);

    }


    public function fd6Target(Request $request){

        $form= new Fd2AllFormLastYearDetail();
        $form->upload_type =1;
        $form->main_id=$request->fd6Id;
        $form->type='fd6';
        $form->prokolpoName=$request->prokolpoName;
        $form->last_year_target_real=$request->last_year_target_real;
        $form->last_year_target_financial=$request->last_year_target_financial;
        $form->last_year_achievment_real=$request->last_year_achievment_real;
        $form->target_year=$request->target_year;
        $form->total_benificiari=$request->total_benificiari;
        $form->comment=$request->comment;
        $form->save();

        $fd2AllFormLastYearDetail = Fd2AllFormLastYearDetail::where('main_id',$request->fd6Id)
        ->where('type','fd6')
        ->get();

        $data = view('front.fd6Form.fd6TargetTable',compact('fd2AllFormLastYearDetail'))->render();
        return response()->json($data);

    }

    public function fd6TargetUpdate(Request $request){


        $form= Fd2AllFormLastYearDetail::find($request->mainId);
        $form->prokolpoName=$request->prokolpoName;
        $form->last_year_target_real=$request->last_year_target_real;
        $form->last_year_target_financial=$request->last_year_target_financial;
        $form->last_year_achievment_real=$request->last_year_achievment_real;
        $form->target_year=$request->target_year;
        $form->total_benificiari=$request->total_benificiari;
        $form->comment=$request->comment;
        $form->save();

        $fd2AllFormLastYearDetail = Fd2AllFormLastYearDetail::where('main_id',$request->fd6Id)
        ->where('type','fd6')
        ->get();

        $data = view('front.fd6Form.fd6TargetTable',compact('fd2AllFormLastYearDetail'))->render();
        return response()->json($data);

    }

    public function fd6TargetDelete(Request $request){


        $admins = Fd2AllFormLastYearDetail::find($request->id);
        if (!is_null($admins)) {
            $admins->delete();
        }

        $fd2AllFormLastYearDetail = Fd2AllFormLastYearDetail::where('main_id',$request->fd6Id)
        ->where('type','fd6')
        ->latest()->get();

        $data = view('front.fd6Form.fd6TargetTable',compact('fd2AllFormLastYearDetail'))->render();
        return response()->json($data);
    }


    public function districtWiseUpdate(Request $request){


        $form= DistrictWiseActivity::find($request->mainId);
        $form->division_name=$request->division_name;
        $form->district_name=$request->district_name;
        $form->city_corparation_name=$request->city_corparation_name;
        $form->upozila_name=$request->upozila_name;
        $form->thana_name=$request->thana_name;
        $form->municipality_name=$request->municipality_name;
        $form->ward_name=$request->ward_name;
        $form->prokolpo_time=$request->prokolpo_time;
        $form->target_year=$request->target_year;
        $form->last_year_target_real=$request->last_year_target_real;
        $form->last_year_target_financial=$request->last_year_target_financial;
        $form->activities=$request->activities;
        $form->total_budget=$request->total_budget;
        $form->comment=$request->comment;
        $form->save();

        $cityCorporationList =  DB::table('civilinfos')->whereNotNull('city_orporation')
        ->groupBy('city_orporation')->select('city_orporation')->get();

        $districtWiseList = DistrictWiseActivity::where('main_id',$request->fd6Id)
        ->where('type','fd6')
        ->latest()->get();

    $districtList = DB::table('civilinfos')->groupBy('district_bn')
    ->select('district_bn')->get();
    $subdDistrictList = DB::table('civilinfos')->groupBy('thana_bn')
    ->select('thana_bn')->get();

    $divisionList = DB::table('civilinfos')->groupBy('division_bn')
    ->select('division_bn')->get();

    $thanaList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();

        $data = view('front.fd6Form.districtWise',compact('cityCorporationList','thanaList','divisionList','subdDistrictList','districtList','districtWiseList'))->render();
        return response()->json($data);


    }


    public function districtWise(Request $request){


        $form= new DistrictWiseActivity();
        $form->main_id=$request->fd6Id;
        $form->type='fd6';
        $form->division_name=$request->division_name;
        $form->district_name=$request->district_name;
        $form->city_corparation_name=$request->city_corparation_name;
        $form->upozila_name=$request->upozila_name;
        $form->thana_name=$request->thana_name;
        $form->municipality_name=$request->municipality_name;
        $form->ward_name=$request->ward_name;
        $form->prokolpo_time=$request->prokolpo_time;
        $form->target_year=$request->target_year;
        $form->last_year_target_real=$request->last_year_target_real;
        $form->last_year_target_financial=$request->last_year_target_financial;
        $form->activities=$request->activities;
        $form->total_budget=$request->total_budget;
        $form->comment=$request->comment;
        $form->save();

        $cityCorporationList =  DB::table('civilinfos')->whereNotNull('city_orporation')
        ->groupBy('city_orporation')->select('city_orporation')->get();

        $districtWiseList = DistrictWiseActivity::where('main_id',$request->fd6Id)
        ->where('type','fd6')
        ->latest()->get();

    $districtList = DB::table('civilinfos')->groupBy('district_bn')
    ->select('district_bn')->get();
    $subdDistrictList = DB::table('civilinfos')->groupBy('thana_bn')
    ->select('thana_bn')->get();

    $divisionList = DB::table('civilinfos')->groupBy('division_bn')
    ->select('division_bn')->get();

    $thanaList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();

        $data = view('front.fd6Form.districtWise',compact('cityCorporationList','thanaList','divisionList','subdDistrictList','districtList','districtWiseList'))->render();
        return response()->json($data);

    }
    public function fd6FormStepTwoSDG(Request $request){

        $form= new SDGDevelopmentGoal();
        $form->fc1_form_id=$request->fd6Id;
        $form->type='fd6';
        $form->goal=$request->goal;
        $form->target=$request->target;
        $form->budget_allocation=$request->budget_allocation;
        $form->rationality=$request->rationality;
        $form->comment=$request->comment;
        $form->save();

        $SDGDevelopmentGoal = SDGDevelopmentGoal::where('fc1_form_id',$request->fd6Id)
        ->where('type','fd6')
        ->latest()->get();

        $data = view('front.fd6Form.fd6FormStepTwoSDG',compact('SDGDevelopmentGoal'))->render();
        return response()->json($data);
    }

    public function fd6FormStepTwoSDGUpdate(Request $request){

        $form= SDGDevelopmentGoal::find($request->mainId);
        $form->goal=$request->goal;
        $form->target=$request->target;
        $form->budget_allocation=$request->budget_allocation;
        $form->rationality=$request->rationality;
        $form->comment=$request->comment;
        $form->save();

        $SDGDevelopmentGoal = SDGDevelopmentGoal::where('fc1_form_id',$request->fd6Id)
        ->where('type','fd6')
        ->latest()->get();

        $data = view('front.fd6Form.fd6FormStepTwoSDG',compact('SDGDevelopmentGoal'))->render();
        return response()->json($data);

    }

    public function fd6FormStepTwoSDGDelete(Request $request){


        $admins = SDGDevelopmentGoal::find($request->id);
        if (!is_null($admins)) {
            $admins->delete();
        }

        $SDGDevelopmentGoal = SDGDevelopmentGoal::where('fc1_form_id',$request->fd6Id)
        ->where('type','fd6')
        ->latest()->get();

        $data = view('front.fd6Form.fd6FormStepTwoSDG',compact('SDGDevelopmentGoal'))->render();
        return response()->json($data);
    }


    public function districtWiseDelete(Request $request){

        $admins = DistrictWiseActivity::find($request->id);
        if (!is_null($admins)) {
            $admins->delete();
        }

        $districtWiseList = DistrictWiseActivity::where('main_id',$request->fd6Id)
        ->where('type','fd6')
        ->latest()->get();

        $cityCorporationList =  DB::table('civilinfos')->whereNotNull('city_orporation')
        ->groupBy('city_orporation')->select('city_orporation')->get();

        $districtList = DB::table('civilinfos')->groupBy('district_bn')
        ->select('district_bn')->get();
        $subdDistrictList = DB::table('civilinfos')->groupBy('thana_bn')
        ->select('thana_bn')->get();

        $divisionList = DB::table('civilinfos')->groupBy('division_bn')
        ->select('division_bn')->get();

        $thanaList = DB::table('civilinfos')->groupBy('thana_bn')
        ->select('thana_bn')->get();

        $data = view('front.fd6Form.districtWise',compact('cityCorporationList','thanaList','divisionList','subdDistrictList','districtList','districtWiseList'))->render();
        return response()->json($data);

    }


    public function fd6StepTwoMainPost(Request $request){


        try{
            //dd($request->all());
            DB::beginTransaction();

            $fd6FormInfo = Fd6Form::find($request->fd6Id);
            $fd6FormInfo->estimated_expenses =$request->estimated_expenses;
            $fd6FormInfo->donor_organization_name =$request->donor_organization_name;
            $fd6FormInfo->donor_organization_address =$request->donor_organization_address;
            $fd6FormInfo->donor_organization_phone_mobile_email =$request->donor_organization_phone_mobile_email;
            $fd6FormInfo->donor_organization_mobile =$request->donor_organization_mobile;
            $fd6FormInfo->donor_organization_email =$request->donor_organization_email;
            $fd6FormInfo->donor_organization_website =$request->donor_organization_website;
            $fd6FormInfo->money_laundering_and_terrorist_financing =$request->money_laundering_and_terrorist_financing;
            $fd6FormInfo->security_council_check =$request->security_council_check;
            $fd6FormInfo->introduction_and_background =$request->introduction_and_background;
            $fd6FormInfo->rationality_and_plan =$request->rationality_and_plan;
            $fd6FormInfo->rationale_project_araea =$request->rationale_project_araea;
            $fd6FormInfo->sdg_objective_file =$request->sdg_objective_file;

            if ($request->hasfile('estimated_expenses_file')) {
                $filePath="FdSixForm";
                $file = $request->file('estimated_expenses_file');

                $fd6FormInfo->estimated_expenses_file =CommonController::pdfUpload($request,$file,$filePath);

            }

            if ($request->hasfile('sdg_file')) {
                $filePath="FdSixForm";
                $file = $request->file('sdg_file');

                $fd6FormInfo->sdg_file =CommonController::pdfUpload($request,$file,$filePath);

            }

            if ($request->hasfile('target_from_perspective_file')) {
                $filePath="FdSixForm";
                $file = $request->file('target_from_perspective_file');

                $fd6FormInfo->target_from_perspective_file =CommonController::pdfUpload($request,$file,$filePath);

            }

            if ($request->hasfile('district_wise_activity_file')) {
                $filePath="FdSixForm";
                $file = $request->file('district_wise_activity_file');

                $fd6FormInfo->district_wise_activity_file =CommonController::pdfUpload($request,$file,$filePath);

            }

            $fd6FormInfo->save();

        DB::commit();
        return redirect()->route('fd6StepThree',base64_encode($fd6FormInfo->id))->with('success','Added Successfuly');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }

    }


    public function fd6StepThreeMainPost(Request $request){


        try{
            //dd($request->all());
            DB::beginTransaction();

            $fd6ProjectManagement = new Fd6ProjectManagement();
            $fd6ProjectManagement->fd6_form_id =$request->fd6Id;
            $fd6ProjectManagement->implementation_of_activities =$request->implementation_of_activities;
            $fd6ProjectManagement->associate_NGO_detail =$request->associate_NGO_detail;
            $fd6ProjectManagement->details_of_project_Officers_and_employees =$request->details_of_project_Officers_and_employees;
            $fd6ProjectManagement->construction_details =$request->construction_details;
            $fd6ProjectManagement->financial_sector_sub_sector_wise_allocation=$request->financial_sector_sub_sector_wise_allocation;
            $fd6ProjectManagement->project_sustained_and_managed =$request->project_sustained_and_managed;
            $fd6ProjectManagement->save();

            $fd6GovernanceAndTransparency = new Fd6GovernanceAndTransparency();
            $fd6GovernanceAndTransparency->fd6_form_id =$request->fd6Id;
            $fd6GovernanceAndTransparency->private_individuals_advice =$request->private_individuals_advice;
            $fd6GovernanceAndTransparency->govt_ongoing_activities =$request->govt_ongoing_activities;
            $fd6GovernanceAndTransparency->similar_project_run_previously =$request->similar_project_run_previously;
            $fd6GovernanceAndTransparency->project_in_form_no_eight =$request->project_in_form_no_eight;
            $fd6GovernanceAndTransparency->audit_report =$request->audit_report;
            $fd6GovernanceAndTransparency->annual_report =$request->annual_report;
            $fd6GovernanceAndTransparency->action_plan_with_budget =$request->action_plan_with_budget;
            $fd6GovernanceAndTransparency->beneficiary_database =$request->beneficiary_database;
            $fd6GovernanceAndTransparency->detailed_results_of_the_project =$request->detailed_results_of_the_project;
            $fd6GovernanceAndTransparency->complaints_detail =$request->complaints_detail;
            $fd6GovernanceAndTransparency->focal_point_name_mobile_email =$request->focal_point_name_mobile_email;
            $fd6GovernanceAndTransparency->online_training =$request->online_training;
            $fd6GovernanceAndTransparency->save();


            $fd6StepThree = new Fd6StepThree();
            $fd6StepThree->fd6_form_id =$request->fd6Id;
            $fd6StepThree->previous_project_detail =$request->previous_project_detail;
            $fd6StepThree->receipt_of_audit_report =$request->receipt_of_audit_report;
            $fd6StepThree->new_phase_project =$request->new_phase_project;
            $fd6StepThree->annual_allocation_to_beneficiaries =$request->annual_allocation_to_beneficiaries;
            $fd6StepThree->ratio_of_expenditure =$request->ratio_of_expenditure;
            $fd6StepThree->project_benifit =$request->project_benifit;

            if ($request->hasfile('detailed_budget_statement')) {
                $filePath="FdSixForm";
                $file = $request->file('detailed_budget_statement');

                $fd6StepThree->detailed_budget_statement =CommonController::pdfUpload($request,$file,$filePath);

            }

            if ($request->hasfile('project_implementation_cost')) {
                $filePath="FdSixForm";
                $file = $request->file('project_implementation_cost');

                $fd6StepThree->project_implementation_cost =CommonController::pdfUpload($request,$file,$filePath);

            }
            $fd6StepThree->save();

        DB::commit();
        return redirect()->route('fd6StepFour',base64_encode($request->fd6Id))->with('success','Added Successfuly');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }

    }
}
