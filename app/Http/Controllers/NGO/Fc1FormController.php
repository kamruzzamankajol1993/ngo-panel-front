<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NVisa;
use App\Models\NgoStatus;
use App\Models\Country;
use App\Models\NgoDuration;
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
use App\Models\Fc1Form;
use App\Models\NgoRenewInfo;
use App\Models\Fd2FormForFc1Form;
use App\Models\Fd2Fc1OtherInfo;
use App\Models\ProkolpoArea;
use Illuminate\Support\Facades\App;
class Fc1FormController extends Controller
{
    public function index(){

        try{

        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $fc1FormList = Fc1Form::where('fd_one_form_id',$ngo_list_all->id)->latest()->get();
        $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
        $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->orderBy('id','desc')->first();

        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }
        return view('front.fc1Form.index',compact('ngoDurationLastEx','ngoDurationReg','ngo_list_all','fc1FormList'));
    }


    public function create(){

        try{

        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
        $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->orderBy('id','desc')->first();
        $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngo_list_all->id)->value('web_site_name');
        $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
        $districtList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();

        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }


        return view('front.fc1Form.create',compact('districtList','divisionList','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));

    }


    public function edit($id){

        try{

        $fd6Id = base64_decode($id);

        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
        $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->orderBy('id','desc')->first();
        $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngo_list_all->id)->value('web_site_name');

        $divisionList = DB::table('civilinfos')->groupBy('division_bn')
            ->select('division_bn')->get();

        $districtList = DB::table('civilinfos')->groupBy('district_bn')
            ->select('district_bn')->get();

        $cityCorporationList = DB::table('civilinfos')->whereNotNull('city_orporation')->groupBy('city_orporation')
            ->select('city_orporation')->get();

        $fc1FormList = Fc1Form::where('fd_one_form_id',$ngo_list_all->id)
            ->where('id',$fd6Id)->latest()->first();

        $prokolpoAreaList =ProkolpoArea::where('formId',$fd6Id)
        ->where('type','fcOne')->latest()->get();

        return view('front.fc1Form.edit',compact('prokolpoAreaList','cityCorporationList','districtList','fc1FormList','divisionList','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));

        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }
    }


    public function store(Request $request){

        $request->validate([

            'ngo_name' => 'required|string',
            'ngo_address' => 'required|string',
            'ngo_telephone_number' => 'required|string',
            'ngo_mobile_number' => 'required|string',
            'ngo_email' => 'required|string',
            'ngo_website' => 'required|string',
            'ngo_prokolpo_start_date' => 'required|string',
            'ngo_prokolpo_end_date' => 'required|string',
            'foreigner_donor_full_name' => 'required|string',
            'foreigner_donor_occupation' => 'required|string',
            'foreigner_donor_address' => 'required|string',
            'foreigner_donor_telephone_number' => 'required|string',
            'foreigner_donor_fax' => 'required|string',
            'foreigner_donor_email' => 'required|string',
            'foreigner_donor_nationality' => 'required|string',
            'foreigner_donor_is_verified' => 'required|string',
            'foreigner_donor_is_affiliatedrict' => 'required|string',
            'organization_name' => 'required|string',
            'organization_address' => 'required|string',
            'organization_telephone_number' => 'required|string',
            'organization_email' => 'required|string',
            'organization_fax' => 'required|string',
            'organization_website' => 'required|string',
            'organization_is_verified' => 'required|string',
            'organization_ceo_name' => 'required|string',
            'organization_ceo_designation' => 'required|string',
            'organization_name_of_executive_responsible_for_bd' => 'required|string',
            'organization_name_of_executive_responsible_for_bd_designation' => 'required|string',
            'objectives_of_the_organization' => 'required|string',
            'organization_letter_of_commitment' => 'required|string',
            'organization_name_of_the_job_amount_of_money_and_duration_pdf' => 'required|file',
            'organization_amount_of_foreign_currency' => 'required|string',
            'equivalent_amount_of_bd_taka' => 'required|string',
            'commodities_value_in_bangladeshi_currency' => 'required|string',
            'bank_name' => 'required|string',
            'bank_address' => 'required|string',
            'bank_account_name' => 'required|string',
            'bank_account_number' => 'required|string',

        ]);

        //dd($request->all());

        try{

            DB::beginTransaction();

        $fdOneFormID = FdOneForm::where('user_id',Auth::user()->id)->first();

        $subject_all = implode(",",$request->subject_id);

        $fc1FormInfo = new Fc1Form();
        $fc1FormInfo->file_last_check_date = Date('Y-m-d', strtotime('+3 days'));
        $fc1FormInfo->fd_one_form_id =$fdOneFormID->id;
        $fc1FormInfo->ngo_name =$request->ngo_name;
        $fc1FormInfo->subject_id =$subject_all;
        $fc1FormInfo->ngo_address =$request->ngo_address;
        $fc1FormInfo->ngo_telephone_number =$request->ngo_telephone_number;
        $fc1FormInfo->ngo_mobile_number =$request->ngo_mobile_number;
        $fc1FormInfo->ngo_email =$request->ngo_email;
        $fc1FormInfo->ngo_website =$request->ngo_website;
        $fc1FormInfo->ngo_prokolpo_start_date =$request->ngo_prokolpo_start_date;
        $fc1FormInfo->ngo_prokolpo_end_date =$request->ngo_prokolpo_end_date;
        $fc1FormInfo->ngo_district =$request->ngo_district;
        $fc1FormInfo->ngo_sub_district =$request->ngo_sub_district;
        $fc1FormInfo->total_number_of_beneficiaries =$request->total_number_of_beneficiaries;
        $fc1FormInfo->foreigner_donor_full_name =$request->foreigner_donor_full_name;
        $fc1FormInfo->foreigner_donor_occupation =$request->foreigner_donor_occupation;
        $fc1FormInfo->foreigner_donor_address =$request->foreigner_donor_address;
        $fc1FormInfo->foreigner_donor_telephone_number =$request->foreigner_donor_telephone_number;
        $fc1FormInfo->foreigner_donor_fax =$request->foreigner_donor_fax;
        $fc1FormInfo->foreigner_donor_email =$request->foreigner_donor_email;
        $fc1FormInfo->foreigner_donor_nationality =$request->foreigner_donor_nationality;
        $fc1FormInfo->foreigner_donor_is_verified =$request->foreigner_donor_is_verified;
        $fc1FormInfo->foreigner_donor_is_affiliatedrict =$request->foreigner_donor_is_affiliatedrict;
        $fc1FormInfo->organization_name =$request->organization_name;
        $fc1FormInfo->organization_address =$request->organization_address;
        $fc1FormInfo->organization_telephone_number =$request->organization_telephone_number;
        $fc1FormInfo->organization_email =$request->organization_email;
        $fc1FormInfo->organization_fax =$request->organization_fax;
        $fc1FormInfo->organization_website =$request->organization_website;
        $fc1FormInfo->organization_is_verified =$request->organization_is_verified;
        $fc1FormInfo->organization_ceo_name =$request->organization_ceo_name;
        $fc1FormInfo->organization_ceo_designation =$request->organization_ceo_designation;
        $fc1FormInfo->organization_name_of_executive_responsible_for_bd =$request->organization_name_of_executive_responsible_for_bd;
        $fc1FormInfo->organization_name_of_executive_responsible_for_bd_designation =$request->organization_name_of_executive_responsible_for_bd_designation;
        $fc1FormInfo->objectives_of_the_organization =$request->objectives_of_the_organization;
        $fc1FormInfo->relation_with_donor =$request->relation_with_donor;
        $fc1FormInfo->organization_letter_of_commitment =$request->organization_letter_of_commitment;
        $fc1FormInfo->organization_amount_of_foreign_currency =$request->organization_amount_of_foreign_currency;
        $fc1FormInfo->equivalent_amount_of_bd_taka =$request->equivalent_amount_of_bd_taka;
        $fc1FormInfo->commodities_value_in_bangladeshi_currency =$request->commodities_value_in_bangladeshi_currency;
        $fc1FormInfo->bank_name =$request->bank_name;
        $fc1FormInfo->bank_address =$request->bank_address;
        $fc1FormInfo->bank_account_name =$request->bank_account_name;
        $fc1FormInfo->bank_account_number =$request->bank_account_number;
        $fc1FormInfo->status ='Review';

        $filePath="FcOneForm";

        if ($request->hasfile('organization_name_of_the_job_amount_of_money_and_duration_pdf')) {

            $file = $request->file('organization_name_of_the_job_amount_of_money_and_duration_pdf');

            $fc1FormInfo->organization_name_of_the_job_amount_of_money_and_duration_pdf =CommonController::pdfUpload($request,$file,$filePath);

        }


        if ($request->hasfile('verified_fc_one_form')) {

            $file = $request->file('verified_fc_one_form');

            $fc1FormInfo->verified_fc_one_form =CommonController::pdfUpload($request,$file,$filePath);

        }

        $fc1FormInfo->save();
        $fc1FormInfoId = $fc1FormInfo->id;


        // ad new code strat


        $input = $request->all();

            $divisionName = $input['division_name'];



            foreach($divisionName as $key => $divisionName){
                $form= new ProkolpoArea();
                $form->formId=$fc1FormInfoId;
                $form->type='fcOne';
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

                $form->save();
            }

        // ad new code end

        DB::commit();
        return redirect()->route('addFd2DetailForFc1',base64_encode($fc1FormInfoId))->with('success','Added Successfuly');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }

    }





    public function update(Request $request,$id){

        try{
            DB::beginTransaction();

            $subject_all = implode(",",$request->subject_id);

        $fc1FormInfo = Fc1Form::find($id);
        $fc1FormInfo->ngo_name =$request->ngo_name;
        $fc1FormInfo->ngo_address =$request->ngo_address;
        $fc1FormInfo->subject_id =$subject_all;
        $fc1FormInfo->ngo_telephone_number =$request->ngo_telephone_number;
        $fc1FormInfo->ngo_mobile_number =$request->ngo_mobile_number;
        $fc1FormInfo->ngo_email =$request->ngo_email;
        $fc1FormInfo->ngo_website =$request->ngo_website;
        $fc1FormInfo->ngo_prokolpo_start_date =$request->ngo_prokolpo_start_date;
        $fc1FormInfo->ngo_prokolpo_end_date =$request->ngo_prokolpo_end_date;
        $fc1FormInfo->ngo_district =$request->ngo_district;
        $fc1FormInfo->ngo_sub_district =$request->ngo_sub_district;
        $fc1FormInfo->total_number_of_beneficiaries =$request->total_number_of_beneficiaries;
        $fc1FormInfo->foreigner_donor_full_name =$request->foreigner_donor_full_name;
        $fc1FormInfo->foreigner_donor_occupation =$request->foreigner_donor_occupation;
        $fc1FormInfo->foreigner_donor_address =$request->foreigner_donor_address;
        $fc1FormInfo->foreigner_donor_telephone_number =$request->foreigner_donor_telephone_number;
        $fc1FormInfo->foreigner_donor_fax =$request->foreigner_donor_fax;
        $fc1FormInfo->foreigner_donor_email =$request->foreigner_donor_email;
        $fc1FormInfo->foreigner_donor_nationality =$request->foreigner_donor_nationality;
        $fc1FormInfo->foreigner_donor_is_verified =$request->foreigner_donor_is_verified;
        $fc1FormInfo->foreigner_donor_is_affiliatedrict =$request->foreigner_donor_is_affiliatedrict;
        $fc1FormInfo->organization_name =$request->organization_name;
        $fc1FormInfo->organization_address =$request->organization_address;
        $fc1FormInfo->organization_telephone_number =$request->organization_telephone_number;
        $fc1FormInfo->organization_email =$request->organization_email;
        $fc1FormInfo->organization_fax =$request->organization_fax;
        $fc1FormInfo->organization_website =$request->organization_website;
        $fc1FormInfo->organization_is_verified =$request->organization_is_verified;
        $fc1FormInfo->organization_ceo_name =$request->organization_ceo_name;
        $fc1FormInfo->organization_ceo_designation =$request->organization_ceo_designation;
        $fc1FormInfo->organization_name_of_executive_responsible_for_bd =$request->organization_name_of_executive_responsible_for_bd;
        $fc1FormInfo->organization_name_of_executive_responsible_for_bd_designation =$request->organization_name_of_executive_responsible_for_bd_designation;
        $fc1FormInfo->objectives_of_the_organization =$request->objectives_of_the_organization;
        $fc1FormInfo->relation_with_donor =$request->relation_with_donor;
        $fc1FormInfo->organization_letter_of_commitment =$request->organization_letter_of_commitment;
        $fc1FormInfo->organization_amount_of_foreign_currency =$request->organization_amount_of_foreign_currency;
        $fc1FormInfo->equivalent_amount_of_bd_taka =$request->equivalent_amount_of_bd_taka;
        $fc1FormInfo->commodities_value_in_bangladeshi_currency =$request->commodities_value_in_bangladeshi_currency;
        $fc1FormInfo->bank_name =$request->bank_name;
        $fc1FormInfo->bank_address =$request->bank_address;
        $fc1FormInfo->bank_account_name =$request->bank_account_name;
        $fc1FormInfo->bank_account_number =$request->bank_account_number;


        $filePath="FcOneForm";

        if ($request->hasfile('organization_name_of_the_job_amount_of_money_and_duration_pdf')) {

            $file = $request->file('organization_name_of_the_job_amount_of_money_and_duration_pdf');

            $fc1FormInfo->organization_name_of_the_job_amount_of_money_and_duration_pdf =CommonController::pdfUpload($request,$file,$filePath);

        }

        if ($request->hasfile('verified_fc_one_form')) {

            $file = $request->file('verified_fc_one_form');

            $fc1FormInfo->verified_fc_one_form =CommonController::pdfUpload($request,$file,$filePath);

        }

        $fc1FormInfo->save();

        $fc1FormInfoId = $fc1FormInfo->id;


        // ad new code strat


        $input = $request->all();

            $divisionName = $input['division_name'];

            ProkolpoArea::where('formId',$fc1FormInfoId)->where('type','fcOne')->delete();

            foreach($divisionName as $key => $divisionName){
                $form= new ProkolpoArea();
                $form->formId=$fc1FormInfoId;
                $form->type='fcOne';
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

                $form->save();
            }

        // ad new code end


        DB::commit();
        return redirect()->route('editFd2DetailForFc1',base64_encode($fc1FormInfoId))->with('success','Updated Successfuly');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }

    }


    public function destroy($id){
        try{
            DB::beginTransaction();
        $admins = Fc1Form::find($id);
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


    public function finalFcOneApplicationSubmit($id){


        $new_data_add = Fc1Form::find(base64_decode($id));
        $new_data_add->status = 'Ongoing';
        $new_data_add->save();

        return redirect('/fc1Form')->with('success','Submit To Ngo Sucessfully');


    }




    public function show($id){

        $fc1Id = base64_decode($id);

        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
        $fd2FormList = Fd2FormForFc1Form::where('fd_one_form_id',$ngo_list_all->id)->where('fc1_form_id',$fc1Id)->latest()->first();
        $fd2OtherInfo = Fd2Fc1OtherInfo::where('fd2_form_for_fc1_form_id',$fd2FormList->id)->latest()->get();
        $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->orderBy('id','desc')->first();
        $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngo_list_all->id)->value('web_site_name');
        $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
        $districtList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();
        $cityCorporationList = DB::table('civilinfos')->whereNotNull('city_orporation')->groupBy('city_orporation')->select('city_orporation')->get();
        $fc1FormList = Fc1Form::where('fd_one_form_id',$ngo_list_all->id)->where('id',$fc1Id)->latest()->first();


        $prokolpoAreaList =ProkolpoArea::where('formId',$fc1Id)->where('type','fcOne')->latest()->get();

       return view('front.fc1Form.view',compact('prokolpoAreaList','fd2OtherInfo','fd2FormList','cityCorporationList','districtList','fc1FormList','divisionList','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));

   }


   public function fc1PdfDownload($id){


    $get_file_data = Fc1Form::where('id',$id)->value('organization_name_of_the_job_amount_of_money_and_duration_pdf');

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


   public function verifiedFcOneForm($id){

    $get_file_data = Fc1Form::where('id',$id)->value('verified_fc_one_form');

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

}
