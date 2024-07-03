@extends('front.master.master')

@section('title')
{{ trans('fd9.fc1')}} | {{ trans('header.ngo_ab')}}
@endsection

@section('css')

@endsection

@section('body')
<section>

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="user_profile_dashboard_upper">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">

                                @if(empty(Auth::user()->image))
                                {{-- <img src="{{ asset('/') }}public/demo_315x315.jpg" alt="Admin"
                                     class="rounded-circle" width="100"> --}}
                                     @else
                                     {{-- <img src="{{ asset('/') }}{{ Auth::user()->image }}" alt="Admin"
                                     class="rounded-circle" width="100"> --}}
                                     @endif
                                <div class="mt-3">
                                    @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                    <h4>{{ $ngo_list_all->organization_name_ban }}</h4>
                                    @else
                                    <h4>{{ $ngo_list_all->organization_name }}</h4>
                                    @endif
                                    {{-- <p class="text-secondary mb-1">{{ $ngo_list_all->name_of_head_in_bd }}</p>
                                    <p class="text-muted font-size-sm">{{ $ngo_list_all->organization_address }}</p> --}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="profile_link_box">
                            <a href="{{ route('dashboard') }}">
                                <p class="{{ Route::is('dashboard')  ? 'active_link' : '' }}"><i class="fa fa-user pe-2"></i>{{ trans('fd9.m1')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('nameChange') }}">
                                <p class="{{ Route::is('nameChange')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.m2')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('renew') }}">
                                <p class="{{ Route::is('renew')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.m3')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('fdNineForm.index') }}">
                                <p class="{{ Route::is('fdNineForm.index') || Route::is('fdNineForm.create') || Route::is('fdNineForm.create')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.nvisa')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('fdNineOneForm.index') }}">
                                <p class="{{ Route::is('fdNineOneForm.index') ||  Route::is('fdNineOneForm.create') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd09formone')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('fd6Form.index') }}">
                                <p class="{{ Route::is('fd6Form.index') ||  Route::is('fd6Form.create') || Route::is('fd6Form.view') || Route::is('fd2Form.create') || Route::is('fd2Form.index') || Route::is('fd6Form.edit') || Route::is('fd2Form.view') || Route::is('fd2Form.edit') || Route::is('addFd2Detail') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd6')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('fd7Form.index') }}">
                                <p class="{{ Route::is('fd7Form.index') ||  Route::is('fd7Form.create') || Route::is('fd7Form.view') || Route::is('addFd2DetailForFd7') || Route::is('editFd2DetailForFd7') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd7')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('fc1Form.index') }}">
                                <p class="{{ Route::is('fc1Form.index') ||  Route::is('fc1Form.create') || Route::is('fc1Form.view') || Route::is('addFd2DetailForFc1') || Route::is('editFd2DetailForFc1') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fc1')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('fc2Form.index') }}">
                                <p class="{{ Route::is('fc2Form.index') ||  Route::is('fc2Form.create') || Route::is('fc2Form.view') || Route::is('addFd2DetailForFc2') || Route::is('editFd2DetailForFc2') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fc2')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('fd3Form.index') }}">
                                <p class="{{ Route::is('fd3Form.index') ||  Route::is('fd3Form.create') || Route::is('fd3Form.view') || Route::is('addFd2DetailForFd3') || Route::is('editFd2DetailForFd3') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd3')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('fdFiveForm.index') }}">
                                <p class="{{ Route::is('fdFiveForm.index') ||  Route::is('fdFiveForm.create') || Route::is('fdFiveForm.view')  || Route::is('fdFiveForm.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd5')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('fdFourForm.index') }}">
                                <p class="{{ Route::is('fdFourForm.index') ||  Route::is('fdFourForm.create') || Route::is('fdFourForm.view')  || Route::is('fdFourForm.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fdFourForm.fdFourForm')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('fdFourOneForm.index') }}">
                                <p class="{{ Route::is('editFdFourFormData') || Route::is('addFdFourFormData') || Route::is('fdFourOneForm.index') ||  Route::is('fdFourOneForm.create') || Route::is('fdFourOneForm.view')  || Route::is('fdFourOneForm.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fdFourFormOne.fdFourOneForm')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('formNoFour.index') }}">
                                <p class="{{ Route::is('formNoFour.index') ||  Route::is('formNoFour.create') || Route::is('formNoFour.view')  || Route::is('formNoFour.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('formNoFour.formNoFour')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('formNoSeven.index') }}">
                                <p class="{{ Route::is('formNoSeven.index') ||  Route::is('formNoSeven.create') || Route::is('formNoSeven.view')  || Route::is('formNoSeven.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('formNoSeven.formNoSeven')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('formNoFive.index') }}">
                                <p class="{{ Route::is('formNoFive.index') ||  Route::is('formNoFive.create') || Route::is('formNoFive.view')  || Route::is('formNoFive.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('formNoFive.formNoFive')}}</p>
                            </a>
                        </div>


                        <div class="profile_link_box">
                            <a href="{{ route('complain.index') }}">
                                <p class="{{ Route::is('complain.index') ||  Route::is('complain.create') || Route::is('complain.view')  || Route::is('complain.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.complain')}}</p>
                            </a>
                        </div>
                        {{-- <div class="profile_link_box">
                            <a href="{{ route('duplicateCertificate.index') }}">
                                <p class="{{ Route::is('duplicateCertificate.index')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.cf1')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('approvalOfConstitution.index') }}">
                                <p class="{{ Route::is('approvalOfConstitution.index')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.cf2')}}</p>
                            </a>
                        </div>



                        <div class="profile_link_box">
                            <a href="{{ route('executiveCommitteeApproval.index') }}">
                                <p class="{{ Route::is('executiveCommitteeApproval.index')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.cf3')}}</p>
                            </a>
                        </div> --}}

                        <div class="profile_link_box">
                            <a href="{{ route('logout') }}">
                                <p class=""><i class="fa fa-cog pe-2"></i>{{ trans('fd9.l')}}</p>
                            </a>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-9 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="name_change_box">
                            <div class="step_box">
                                <ul class="process-model more-icon-preocess">
                                    <li >
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <p>এফসি - ১</p>
                                    </li>
                                    <li class="active visited">
                                        <i class="fa fa-file-text" aria-hidden="true"></i>
                                        <p>এফডি - ২</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-sm-12">
                                    <div class="others_inner_section">
                                        <h1>অর্থছাড়ের আবেদন ফরম</h1>
                                        <div class="notice_underline"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-3 card-custom-color">
                                <div class="card-body">

                                    <div class="form9_upper_box">
                                        <h3>এফডি -২ ফরম</h3>
                                        <h4>অর্থছাড়ের আবেদন ফরম</h4>
                                    </div>
                                    <form action="{{ route('storeFd2DetailForFc1') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                        @csrf


                                        <table class="table table-bordered" style="width:100%">

                                            <tr>
                                                <th style="text-align: center;" colspan="2">ক্র: নং:</th>
                                                <th style="text-align: center; width: 10%">বিবরণ</th>
                                                <th style="text-align: center;">তথ্যাদি</th>

                                            </tr>






   <!-- step three start -->

   <tr>
    <th style="text-align: center;" colspan="2">১.</th>
    <td style="font-weight:bold;text-align: center;" >সংস্থার নাম ও ঠিকানা <span style="color:red;">*</span></td>
    <th style="text-align: center;">
        <input type="text" required value="" name="ngo_name" class="form-control" id=""
                                                   placeholder="সংস্থার নাম">
                                                   <input type="text" required class="form-control mt-3" value="" name="ngo_address" id=""
                                                   placeholder="সংস্থার ঠিকানা">
    </th>

</tr>

<tr>
    <th style="text-align: center;" colspan="2">২.</th>
    <td style="font-weight:bold;text-align: center;" >প্রকল্পের নাম<span style="color:red;">*</span></td>
    <th style="text-align: center;">
        <input type="text" required value="" name="ngo_prokolpo_name" class="form-control" id=""
        placeholder="প্রকল্পের নাম">

    </th>

</tr>


<tr>
    <th style="text-align: center;" colspan="2">৩.</th>
    <td style="font-weight:bold;text-align: center;" >প্রকল্পের মেয়াদ<span style="color:red;">*</span></td>
    <th style="text-align: center;">
        <input type="text" required value="" name="ngo_prokolpo_duration" class="form-control" id=""
        placeholder="প্রকল্পের মেয়াদ">

        <input type="text" required value="" name="ngo_prokolpo_start_date" class="form-control datepickerOne mt-2" id=""
        placeholder="আরম্ভের তারিখ">

        <input type="text" required value="" name="ngo_prokolpo_end_date" class="form-control datepickerOne mt-2" id=""
        placeholder="সমাপ্তির তারিখ">

    </th>

</tr>

<tr>
    <th style="text-align: center;" colspan="2">৪.</th>
    <td style="font-weight:bold;text-align: center;" >প্রস্তাবিত অর্থছাড়ের পরিমাণ<span style="color:red;">*</span></td>
    <th style="text-align: center;">
        <input type="text" required class="form-control" id="" name="proposed_rebate_amount_bangladeshi_taka"
        placeholder="প্রস্তাবিত অর্থছাড়ের পরিমান (বাংলাদেশী টাকা )">

        <input type="text" required class="form-control mt-2" id="" name="proposed_rebate_amount_in_foreign_currency"
        placeholder="প্রস্তাবিত অর্থছাড়ের পরিমান (বৈদেশিক মুদ্রায় )">

    </th>

</tr>

<tr>
    <th style="text-align: center;" colspan="2">৫.</th>
    <td style="font-weight:bold;text-align: center;" >১ম/২য়/৩য়/৪র্থ বছরে ব্যাংক হতে উত্তোলিত অর্থের পরিমাণ<span style="color:red;">*</span></td>
    <th style="text-align: center;">
        <select required class="form-control" name="proposed_rebate_amount_in_foreign_currency"
                                                   placeholder="">
                                            <option value="">-নির্বাচন করুন-</option>
                                            <option value="1">১ম</option>
                                            <option value="2">২য়</option>
                                            <option value="3">৩য়</option>
                                            <option value="4">৪র্থ</option>
                                            </select>

                                            <input type="text" required class="form-control mt-2" id="" name="proposed_rebate_amount_in_foreign_currency"
                                            placeholder="ব্যাংক হতে উত্তোলিত অর্থের পরিমাণ">

    </th>

</tr>

<tr>
    <th style="text-align: center;" colspan="2" rowspan="2">৬.</th>
    <td style="font-weight:bold;" colspan="2">সংশ্লিষ্ট প্রকল্পের বিগত বছরের অর্জন<span style="color:red;">*</span></td>


</tr>
<tr>
    <td colspan="2">
        <div class="d-flex justify-content-between ">
            <div class="">


            </div>
            <div class="p-2">
                <button class="btn btn-primary btn-sm btn-custom" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" >
                     যুক্ত করুন
                </button>
            </div>
        </div>
        <div class="table-responsive">


            <table class="table table-bordered">
                <tr style="text-align: center">
                    <th rowspan="2">ক্রমিক নং</th>
                    <th rowspan="2">কার্যক্রমের নাম </th>
                    <th colspan="2">বিগত বছরের লক্ষ্যমাত্রা </th>
                    <th colspan="2">অর্জন(%) </th>
                    <th rowspan="2">উপকারভোগীর সংখ্যা </th>
                    <th rowspan="2">মন্তব্য (যদি থাকে)</th>
                    <th rowspan="2"></th>
                </tr>
                <tr style="text-align: center;">
                    <th>বাস্তব</th>
                    <th>আর্থিক </th>
                    <th>বাস্তব</th>
                    <th>আর্থিক </th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th colspan="7">মোট উপকারভোগীর সংখ্যা -</th>

                    <td></td>
                    <td></td>
                </tr>

            </table>

        </div>
        <input type="file" required class="form-control" value="" name="ngo_address" id=""
        placeholder="">
    </td>
</tr>
<tr>
    <th rowspan="3">৭.</th>
    <th></th>
    <th colspan="2">সংস্থার মাদার একাউন্ট সংক্রান্ত তথ্যাবলী</th>

</tr>
<tr>

    <th>(ক)</th>
    <th>ব্যাংকের নাম</th>
    <td><input type="text" required class="form-control" value="" name="ngo_address" id=""
        placeholder="ব্যাংকের নাম"></td>

</tr>
<tr>

    <th>(খ) </th>
    <th>ব্যাংকের ঠিকানা ও হিসাব নম্বর</th>
    <td>
        <input type="text" required value="" name="ngo_prokolpo_name" class="form-control" id=""
        placeholder="ব্যাংকের ঠিকানা">

        <input type="text" required value="" name="ngo_prokolpo_duration" class="form-control mt-2" id=""
        placeholder="ব্যাংকের হিসাব নম্বর">

    </td>

</tr>

<tr>
    <th style="text-align: center;" colspan="2">৮.</th>
    <td style="font-weight:bold;text-align: center;" >গুরুত্বপূর্ণ যেকোনো তথ্য</td>
    <td style="text-align: center;">
        <table class="table table-bordered" id="dynamicAddRemove">
            <tr>
                <th>ফাইলের নাম</th>
                <th>ফাইল</th>
                <th></th>
            </tr>
            <tr>
                <td><input type="text"  name="file_name[]" class="form-control" id=""
                           placeholder=""></td>
                <td><input type="file" name="file[]" accept=".pdf" class="form-control" id=""
                           placeholder=""></td>
                <td><a class="btn btn-primary" id="dynamic-ar"><i class="fa fa-plus"></i></a></td>
            </tr>
        </table>

    </td>

</tr>




                                        </table>


                                        <input type="hidden" name="fc1_form_id" value="{{ base64_encode($fc1Id) }}" />



                                    <div class="d-grid d-md-flex justify-content-md-end">
                                        <button type="button" class="btn btn-dark me-2"
                                                onclick="location.href = '{{ route('fc1FormStepThree',1) }}';">আগের পৃষ্ঠায় যান
                                        </button>
                                        <button type="submit" disabled class="btn btn-registration"
                                                >তথ্য জমা দিন
                                        </button>
                                    </div>

                                </form>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>

</section>
<!--modal-->
<div class="modal modal-xl fade" id="exampleModal"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">

                    সংশ্লিষ্ট প্রকল্পের বিগত বছরের অর্জনের বিবরণ

                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">


                            <div class="row">





                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">কার্যক্রমের নাম</label>
                                        <input type="text" name="upozila_name[]" class="form-control" id=""
                                        placeholder="">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">বিগত বছরের লক্ষ্যমাত্রা(বাস্তব)<span class="text-danger">*</span></label>
                                        <input type="text" required name="thana_name[]" class="form-control" id=""
                                        placeholder="" >
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">বিগত বছরের লক্ষ্যমাত্রা(আর্থিক)<span class="text-danger">*</span></label>
                                        <input type="text" required name="thana_name[]" class="form-control" id=""
                                        placeholder="" >
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">অর্জন(%)(বাস্তব)</label>
                                        <input type="text" name="municipality_name[]" class="form-control" id=""
                                        placeholder="">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">অর্জন(%)(আর্থিক)</label>
                                        <input type="text" name="ward_name[]" class="form-control" id=""
                                        placeholder="">
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">উপকারভোগীর সংখ্যা</label>
                                        <input type="text" name="ward_name[]" class="form-control" id=""
                                        placeholder="">
                                    </div>




                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">মন্তব্য<span class="text-danger">*</span></label>
                                        <textarea required name="beneficiaries_total[]" class="form-control" id="" placeholder=""></textarea>
                                    </div>

                            </div>
                            <a id="stepFiveAjax"  class="btn btn-registration">জমা দিন</a>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<!-- end modal -->

@endsection

@section('script')

<script>

    ///


        $(document).on('change', 'select.division_name', function () {

var main_id = $(this).attr('id');
var get_id_from_main = main_id.slice(13);
var getMainValue = $('#division_name'+get_id_from_main).val();

 // var getMainValue = $(this).val();

  //alert(getMainValue);


  $.ajax({
    url: "{{ route('getDistrictList') }}",
    method: 'GET',
    data: {getMainValue:getMainValue},
    success: function(data) {
      $("#district_name"+get_id_from_main).html('');
      $("#district_name"+get_id_from_main).html(data);
    }
    });

// });


$.ajax({
    url: "{{ route('getCityCorporationList') }}",
    method: 'GET',
    data: {getMainValue:getMainValue},
    success: function(data) {
      $("#city_corparation_name"+get_id_from_main).html('');
      $("#city_corparation_name"+get_id_from_main).html(data);
    }
    });

});






    ///
$("#ngo_prokolpo_name").keyup(function(){
  var getMainValue = $(this).val();

  $('#project_name').val(getMainValue);

});


$("#ngo_prokolpo_duration").keyup(function(){
  var getMainValue = $(this).val();

  $('#duration_of_project').val(getMainValue);

});


$("#donor_organization_name").keyup(function(){
  var getMainValue = $(this).val();

  $('#donor_organization_name_two').val(getMainValue);

});








</script>




<script>
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><input type="text"  name="file_name[]" class="form-control" id=""placeholder=""></td><td><input type="file" name="file[]" accept=".pdf" class="form-control" id="" placeholder=""></td><td><button type="button" class="btn btn-outline-danger remove-input-field"><i class="bi bi-file-earmark-x-fill"></i></button></td></tr>');
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });

</script>

@endsection
