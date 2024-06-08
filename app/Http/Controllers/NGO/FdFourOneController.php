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
use App\Models\FdFourOneExpenditureSector;
use App\Models\FdOneForm;
use App\Models\FdFourOneForm;
use App\Models\FdFourForm;
class FdFourOneController extends Controller
{
    public function index(){
        try{
            $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')
            ->where('user_id',Auth::user()->id)->value('ngo_type');
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
            $fdFourOneFormList = FdFourOneForm::where('fd_one_form_id',$ngo_list_all->id)
            ->latest()->get();

            return view('front.fdFourOneForm.index',compact('ngo_list_all','fdFourOneFormList'));

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }



    }


    public function show($id){
        try{

            $decode_id = base64_decode($id);

            $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')
            ->where('user_id',Auth::user()->id)->value('ngo_type');
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();

            $fdFourOneFormList = FdFourOneForm::where('id',$decode_id)
            ->latest()->first();


            $fdFourFormList = FdFourForm::where('fd_four_one_form_id',$decode_id)
            ->latest()->first();

            $fdFourOneFormExpenditorSector = FdFourOneExpenditureSector::where('fd_four_one_id',$decode_id)->latest()->get();




            return view('front.fdFourOneForm.show',compact('fdFourOneFormExpenditorSector','fdFourFormList','ngo_list_all','fdFourOneFormList'));

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }



    }

    public function create(){

        try{

            $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();

            $districtList = DB::table('civilinfos')->groupBy('district_bn')
            ->select('district_bn')->get();

            return view('front.fdFourOneForm.create',compact('ngo_list_all','districtList'));

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }
    }

    public function edit($id){


        try{

            $decode_id = base64_decode($id);

            //dd($decode_id);

            $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();

            $districtList = DB::table('civilinfos')->groupBy('district_bn')
            ->select('district_bn')->get();

            $fdFourOneFormList = FdFourOneForm::where('id',$decode_id)
            ->first();

            $fdFourOneFormExpenditorSector = FdFourOneExpenditureSector::where('fd_four_one_id',$decode_id)
            ->latest()->get();

            return view('front.fdFourOneForm.edit',compact('fdFourOneFormList','fdFourOneFormExpenditorSector','ngo_list_all','districtList'));

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }

    }


    public function store(Request $request){

        //dd($request->all());

        $request->validate([

            'prokolpo_name' => 'required|string',
            'prokolpo_permission_sarok_no' => 'required|string',
            'prokolpo_permission_sarok_date' => 'required|string',
            'prokolpo_year' => 'required|string',
            'prokolpo_amount_sarkrito_bangla_amount' => 'required|string',
            'prokolpo_amount_grihito' => 'required|string',
            'prokolpo_amount_grihito_date' => 'required|string',
            'prokolpo_amount_sarkrito_date' => 'required|string',
        ]);

        try{
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();

            $fdFourOneForm = new FdFourOneForm();
            $fdFourOneForm->status = 'Review';
            $fdFourOneForm->file_last_check_date = Date('Y-m-d', strtotime('+3 days'));
            $fdFourOneForm->prokolpo_name = $request->prokolpo_name;
            $fdFourOneForm->prokolpo_permission_sarok_no = $request->prokolpo_permission_sarok_no;
            $fdFourOneForm->prokolpo_permission_sarok_date = $request->prokolpo_permission_sarok_date;
            $fdFourOneForm->prokolpo_year = $request->prokolpo_year;
            $fdFourOneForm->prokolpo_amount_sarkrito_bangla_amount = $request->prokolpo_amount_sarkrito_bangla_amount;
            $fdFourOneForm->prokolpo_amount_sarkrito_date = $request->prokolpo_amount_sarkrito_date;
            $fdFourOneForm->prokolpo_amount_grihito = $request->prokolpo_amount_grihito;
            $fdFourOneForm->prokolpo_amount_grihito_date =$request->prokolpo_amount_grihito_date;
            $fdFourOneForm->fd_one_form_id = $ngo_list_all->id;
            $fdFourOneForm->save();


            $fdFourOneFormId = $fdFourOneForm->id;

            $input = $request->all();
            $expenditure_sectors = $input['expenditure_sectors'];


            foreach($expenditure_sectors as $key => $expenditure_sectors){

                $form= new FdFourOneExpenditureSector();
                $form->fd_four_one_id = $fdFourOneFormId;
                $form->expenditure_sectors=$input['expenditure_sectors'][$key];
                $form->approved_budget_money=$input['approved_budget_money'][$key];
                $form->actual_cost=$input['actual_cost'][$key];
                $form->difference=$input['difference'][$key];
                $form->percentage=$input['percentage'][$key];
                $form->reason_for_the_difference=$input['reason_for_the_difference'][$key];
                $form->save();
            }





            return redirect()->route('addFdFourFormData',base64_encode($fdFourOneFormId))->with('success','Added Successfully');

        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }

    }

    public function update(Request $request,$id){



        try{
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();

            $fdFourOneForm = FdFourOneForm::find($id);
            $fdFourOneForm->prokolpo_name = $request->prokolpo_name;
            $fdFourOneForm->prokolpo_permission_sarok_no = $request->prokolpo_permission_sarok_no;
            $fdFourOneForm->prokolpo_permission_sarok_date = $request->prokolpo_permission_sarok_date;
            $fdFourOneForm->prokolpo_year = $request->prokolpo_year;
            $fdFourOneForm->prokolpo_amount_sarkrito_bangla_amount = $request->prokolpo_amount_sarkrito_bangla_amount;
            $fdFourOneForm->prokolpo_amount_sarkrito_date = $request->prokolpo_amount_sarkrito_date;
            $fdFourOneForm->prokolpo_amount_grihito = $request->prokolpo_amount_grihito;
            $fdFourOneForm->prokolpo_amount_grihito_date =$request->prokolpo_amount_grihito_date;
            $fdFourOneForm->fd_one_form_id = $ngo_list_all->id;
            $fdFourOneForm->save();


            $fdFourOneFormId = $fdFourOneForm->id;

            $input = $request->all();
            $expenditure_sectors = $input['expenditure_sectors'];

            FdFourOneExpenditureSector::where('fd_four_one_id',$fdFourOneFormId)->delete();
            foreach($expenditure_sectors as $key => $expenditure_sectors){

                $form= new FdFourOneExpenditureSector();
                $form->fd_four_one_id = $fdFourOneFormId;
                $form->expenditure_sectors=$input['expenditure_sectors'][$key];
                $form->approved_budget_money=$input['approved_budget_money'][$key];
                $form->actual_cost=$input['actual_cost'][$key];
                $form->difference=$input['difference'][$key];
                $form->percentage=$input['percentage'][$key];
                $form->reason_for_the_difference=$input['reason_for_the_difference'][$key];
                $form->save();
            }





            return redirect()->route('addFdFourFormData',base64_encode($fdFourOneFormId))->with('success','Added Successfully');

        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }

    }

    public function fdFourOneSend($id){

        try{


        $formNoFourInfo = FdFourOneForm::find(base64_decode($id));
        $formNoFourInfo->status ='Ongoing';
        $formNoFourInfo->save();

        return redirect()->back()->with('success','Send Successfuly');

        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }

    }
}
