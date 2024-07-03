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
                                <p class="{{ Route::is('fd6Form.index') ||  Route::is('fd6Form.create') || Route::is('fd6Form.view') || Route::is('fd2Form.create') || Route::is('fd2Form.index') || Route::is('fd6Form.edit') || Route::is('fd2Form.view') || Route::is('fd2Form.edit')? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd6')}}</p>
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
                                    <li class="active visited">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <p>এফসি - ১ </p>
                                    </li>
                                    <li>
                                        <i class="fa fa-file-text" aria-hidden="true"></i>
                                        <p>এফডি - ২</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-sm-12">
                                    <div class="others_inner_section">
                                        <h1>এককালীন অনুদান গ্রহণের আবেদন ফরম</h1>
                                        <div class="notice_underline"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-3 card-custom-color">
                                <div class="card-body">
                                    <div class="form9_upper_box">
                                        <h3>এফসি -১ ফরম</h3>
                                        <h4>এককালীন অনুদান গ্রহণের আবেদন ফরম</h4>
                                    </div>

                                    <form action="{{ route('fc1Form.store') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                        @csrf
                                     <!-- step one start -->

                                     <div class="row">
                                        <div class="col-lg-12 col-sm-12">

                                            <table class="table table-bordered" style="width:100%">

                                                <!-- step one start  -->

                                                  <tr>
                                                      <th style="text-align: center;" rowspan="4">১০.</th>

                                                      <td style="font-weight:bold;" colspan="2">ইতোপূর্বে গৃহীত অনুদানের বিবরণ</td>
                                                      <td> <div class="d-flex justify-content-between ">
                                                          <div class="p-2">


                                                          </div>
                                                          <div class="p-2">
                                                              <button class="btn btn-primary btn-sm btn-custom" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" >
                                                                   যুক্ত করুন
                                                              </button>
                                                          </div>
                                                      </div></td>

                                                  </tr>
                                                  <tr>

                                                      {{-- <td style="text-align: center;">ক.</td> --}}
                                                      <td colspan="3" rowspan="3">

                                                          <div class="table-responsive">
                                                            <table class="table table-bordered">
                                                                <tr style="text-align: center">
                                                                    <th rowspan="2">ক্র : নং :</th>
                                                                    <th rowspan="2">উদ্দেশ্য / কার্যক্রম</th>
                                                                    <th rowspan="2">এনজিও বিষয়ক ব্যুরো কর্তৃক অনুমোদনের স্বারক নম্বর ও তারিখ</th>
                                                                    <th rowspan="2">দাতা সংস্থার নাম</th>
                                                                    <th rowspan="2">টাকার পরিমাণ </th>
                                                                    <th rowspan="2">অডিট রিপোর্ট দাখিল এবং ব্যুরো কতৃক গৃহীত হয়েছে কিনা</th>
                                                                    <th rowspan="2">সমাপ্তি প্রতিবেদন দাখিল করা হয়েছে কিনা?</th>
                                                                    <th rowspan="2">স্থানীয়  প্রশাসনের প্রত্যয়ন পত্র দাখিল করা হয়েছে কিনা ?</th>
                                                                    <th rowspan="2">মন্তব্য</th>
                                                                    <th></th>
                                                                </tr>


                                                            </table>

                                                          </div>



                                                  </span>


                                              </td>


                                                  </tr>

                                                  <tr>

                                                  </tr>
                                                  <tr>

                                                  </tr>


                                                  <tr>
                                                    <th style="text-align: center;" rowspan="4">১১.</th>

                                                    <td style="font-weight:bold;" colspan="2">গুরুত্বপূর্ণ অন্য কোনো তথ্য (যদি থাকে):
                                                    </td>
                                                    <td> </td>

                                                </tr>
                                                <tr>

                                                    {{-- <td style="text-align: center;">ক.</td> --}}
                                                    <td colspan="3" rowspan="3">

                                                        <div class="table-responsive">


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
                                                        </div>






                                            </td>


                                                </tr>

                                                <tr>

                                                </tr>
                                                <tr>

                                                </tr>


                                                  <!-- step three end -->



                                              </table>


                                        </div>

                                        <div class="mb-3 col-lg-12 mt-3">

                                            <div class="card">

                                                <div class="card-header">
                                                    প্রধান নির্বাহীর তথ্যাদি

                                                </div>
                                                <div class="card-body">

                                                      <!--new code for ngo-->
                                         <div class="mb-3">
                                            <label for="" class="form-label">{{ trans('mview.ttTwo')}}: <span class="text-danger">*</span></label>
                                                 <input type="text" data-parsley-required  name="chief_name"  class="form-control" id="mainName" placeholder="{{ trans('mview.ttTwo')}}">
                                            </div>

                                            <div class="mb-3">
                                                <label for="" class="form-label">{{ trans('mview.ttThree')}}: <span class="text-danger">*</span></label>
                                                <input type="text" data-parsley-required  name="chief_desi"  class="form-control"  placeholder="{{ trans('mview.ttThree')}}">
                                            </div>



                                            <div class="mb-3">
                                                <label for="" class="form-label">{{ trans('zoom.digitalSignature')}}: <span class="text-danger">*</span>
                                                    <span class="text-danger"><b style="font-size: 12px;">(Dimension:(300*80) , Size:Max 60 KB & Image Format:PNG)</b></span></label>
                                    <br>
                                                    <button type="button" class="btn btn-custom btn-sm next_button btn22">{{ trans('zoom.upload')}}</button>
                                    <br>
                                                <input type="hidden" required  name="image_base64">
                                                <div class="croppedInput mt-2">

                                                </div>
                                                <!-- new code for image cropper start --->
                                                @include('front.signature_modal.sign_main_modal')
                                                <!-- new code for image cropper end -->

                                            </div>


                                            <div class="mb-3">
                                                <label for="" class="form-label">{{ trans('zoom.digitalSeal')}}: <span class="text-danger">*</span>
                                                    <span class="text-danger"><b style="font-size: 12px;">(Dimension:(300*100) , Size:Max 80 KB & Image Format:PNG)</b> </label></span>
                                                 <br>
                                                <button type="button" class="btn btn-custom btn-sm next_button btn22ss">{{ trans('zoom.upload')}}</button>

                                                <input type="hidden" required  name="image_seal_base64">
                                                <div class="croppedInputss mt-2">

                                                </div>
                                                <!-- new code for image cropper start --->
                                                @include('front.signature_modal.seal_main_modal')
                                                <!-- new code for image cropper end -->
                                            </div>
                                            <!-- end new code -->

                                                </div>
                                            </div>



                                        </div>

                                        <div class="col-lg-12 col-sm-12 mt-3">

                                            <span style="font-weight:bold;">সংযুক্তি <br> ১। </span>

                                            <div class="row">

                                                <div class="mb-3 col-lg-6">
                                                    <label for="" class="form-label"> দাতার প্রতিশ্রুতি পত্র </label>
                                                    <input type="file" name="bank_address" class="form-control" id=""
                                                           placeholder="">
                                                </div>
                                                <div class="mb-3 col-lg-6">
                                                    <label for="" class="form-label">দাতা সংস্থার প্রতিশ্রুতি পত্র </label>
                                                    <input type="file" name="bank_account_name" class="form-control" id=""
                                                           placeholder="">
                                                </div>

                                            </div>
                                            <span style="font-weight:bold;">২। </span>
                                            <div class="row">
                                            <div class="mb-3 col-lg-12">
                                                <label for="" class="form-label">ইতোপূর্বে সমাপ্ত প্রকল্পের অডিট রিপোর্ট ব্যুরো হতে গ্রহণের প্রমাণক</label>
                                                <input type="file" name="bank_address" class="form-control" id=""
                                                       placeholder="">
                                            </div>
                                            <div class="mb-3 col-lg-6">
                                                <label for="" class="form-label">সমাপনী প্রতিবেদন</label>
                                                <input type="file" name="bank_account_name" class="form-control" id=""
                                                       placeholder="">
                                            </div>

                                            <div class="mb-3 col-lg-6">
                                                <label for="" class="form-label">প্রশাসনিক প্রত্যয়নপত্র</label>
                                                <input type="file" name="bank_account_name" class="form-control" id=""
                                                       placeholder="">
                                            </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- step one end --->

                                    <div class="d-grid d-md-flex justify-content-md-end">
                                        <a href="{{ route('fc1FormStepTwo',1) }}" class="btn btn-danger"
                                                >পূর্ববর্তী পৃষ্ঠায় যান
                                    </a>
                                        <a href="{{ route('addFd2DetailForFc1',1) }}" style="margin-left:10px;" class="btn btn-registration"
                                                >পরবর্তী পৃষ্ঠা
                                </a>
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
<!-- modal start --->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">{{ trans('oldorg.digiSign')}}</h5>

            </div>
            <div class="modal-body">
                <div class="img-container">
                    <div class="row">
                        <div class="col-md-8">
                            <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                        </div>
                        <div class="col-md-4">
                            <div class="preview"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="crop">Crop</button>
            </div>
        </div>
    </div>
</div>
<!--  modal end -->

<!--modal-->
<div class="modal modal-xl fade" id="exampleModal"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">

                    ইতোপূর্বে গৃহীত অনুদানের বিবরণ

                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">


                            <div class="row">





                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">উদ্দেশ্য / কার্যক্রম</label>
                                        <input type="text" name="upozila_name[]" class="form-control" id=""
                                        placeholder="">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">এনজিও বিষয়ক ব্যুরো কর্তৃক অনুমোদনের স্বারক নম্বর <span class="text-danger">*</span></label>
                                        <input type="text" required name="thana_name[]" class="form-control" id=""
                                        placeholder="" >
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">এনজিও বিষয়ক ব্যুরো কর্তৃক অনুমোদনের তারিখ<span class="text-danger">*</span></label>
                                        <input type="text" required name="thana_name[]" class="form-control" id=""
                                        placeholder="" >
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">দাতা সংস্থার নাম</label>
                                        <input type="text" name="municipality_name[]" class="form-control" id=""
                                        placeholder="">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">টাকার পরিমাণ</label>
                                        <input type="text" name="ward_name[]" class="form-control" id=""
                                        placeholder="">
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">অডিট রিপোর্ট দাখিল এবং ব্যুরো কতৃক গৃহীত হয়েছে কিনা</label>
                                        <input type="text" name="ward_name[]" class="form-control" id=""
                                        placeholder="">
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">সমাপ্তি প্রতিবেদন দাখিল করা হয়েছে কিনা?</label>
                                        <input type="text" name="ward_name[]" class="form-control" id=""
                                        placeholder="">
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">স্থানীয় প্রশাসনের প্রত্যয়ন পত্র দাখিল করা হয়েছে কিনা ?</label>
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
@include('front.zoomButtonImage')
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


@endsection
