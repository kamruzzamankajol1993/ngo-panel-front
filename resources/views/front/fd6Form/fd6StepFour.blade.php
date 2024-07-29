@extends('front.master.master')

@section('title')
{{ trans('fd9.fd6')}} | {{ trans('header.ngo_ab')}}
@endsection

@section('css')
<style>

    .alertify .ajs-body .ajs-content {
        font-weight: bolder;
        color:red;
        font-size: 20px;
    }

    .alertify .ajs-header{

        color:red;
        font-size: 20px;

    }

    .alertify .ajs-footer .ajs-buttons .ajs-button{

        background-color: #006A4E;
        color: #fff;

    }

</style>
<style>
    .ui-widget.ui-widget-content {
    top: 160px !important;
    }
</style>
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
                                <p class="{{ Route::is('fd6StepFour') || Route::is('fd6StepThree') || Route::is('fd6StepTwo') ||  Route::is('fd6Form.index') ||  Route::is('fd6Form.create') || Route::is('fd6Form.view') || Route::is('fd2Form.create') || Route::is('fd2Form.index') || Route::is('fd6Form.edit') || Route::is('fd2Form.view') || Route::is('fd2Form.edit')? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd6')}}</p>
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
                                    <li class="active ">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <p>এফডি - ৬</p>
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
                                        <h1>প্রকল্প প্রস্তাব ফরম</h1>
                                        <div class="notice_underline"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-3 card-custom-color">
                                <div class="card-body">
                                    <div class="form9_upper_box">
                                        <h3>এফডি - ৬ ফরম </h3>
                                        <h4>প্রকল্প প্রস্তাব ফরম</h4>
                                    </div>

                                    <form action="{{ route('fd6StepFourMainPost') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                        @csrf
                                        <input type="hidden" name="fd6Id" id="fd6Id" value="{{ $fd6Id }}"/>
                                        <input type="hidden" id="expenseId" value="1"/>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <table class="table table-bordered">

  <!--FD06 Section Shonglognni-->

  <tr>
    <td colspan="4">
        <h3 class="text-center mt-2">সংলগ্নী ‘’ক’’</h3>
    </td>
</tr>
<tr>
    <td rowspan="2" style="width:40px;">ক)</td>
    <td colspan="3"> পার্টনার এনজিও/সংস্থার বিস্তারিত তথ্য</td>
</tr>

<tr>
    <td colspan="3">
        <div class="d-flex justify-content-end">
            <a class="btn btn-custom mb-3" data-bs-toggle="modal"
                    data-bs-target="#PartnerNGO">নতুন
                পার্টনার এনজিও
                যুক্ত করুন
        </a>
        </div>
        <table class="table table-bordered">
            <tr>
                <th>পার্টনার এনজিওর নাম ও ঠিকানা (টেলিফোন, মোবাইল, ইমেইল
                    নম্বরসহ)
                </th>
                <th>এনজিও ব্যুরোর নিবন্ধন নং ও মেয়াদ :</th>
                <th>পার্টনার এনজিও /সংস্থা কর্তৃক বাস্তবায়িতব্য
                    কার্যক্রমসমূহ (বিস্তারিত)
                </th>
                <th>কর্ম এলাকা (সম্ভাব্য ইউনিয়ন/ওয়ার্ড পর্যন্ত)</th>
                <th>বাজেট</th>
                <th>সম্পাদনের সময়সীমা</th>
                <th>উপকারভোগী</th>
            </tr>
            <tr>
                <td>
                    <ul>
                        <li>পার্টনার এনজিওর নাম:</li>
                        <li>ঠিকানা:</li>
                        <li>টেলিফোন:</li>
                        <li>মোবাইল:</li>
                        <li>ইমেইল</li>
                    </ul>
                </td>
                <td>
                    <ul>
                        <li>এনজিও ব্যুরোর নিবন্ধন নং :</li>
                        <li>মেয়াদ:</li>
                    </ul>
                </td>
                <td>X</td>
                <td>X</td>
                <td>X</td>
                <td>X</td>
                <td>X</td>
            </tr>
        </table>
    </td>
</tr>
<tr>
    <td rowspan="8" style="width:40px;">খ)</td>
    <td colspan="3">মোট অনুদানের পরিমান</td>
</tr>
<tr>
    <td style="width:40px;">০১</td>
    <td>নগদ</td>
    <td>
        <input class="form-control" type="text" placeholder="নগদ">
    </td>
</tr>
<tr>
    <td style="width:40px;">০২</td>
    <td>কৌশলগত সহযোগিতা (বিস্তারিত বিবরণ)</td>
    <td>
        <input class="form-control" type="text"
               placeholder="কৌশলগত সহযোগিতা (বিস্তারিত বিবরণ)">
    </td>
</tr>
<tr>
    <td style="width:40px;">০৩</td>
    <td> পণ্য/দ্রব্য সহযোগিতা</td>
    <td>
        <input class="form-control" type="text"
               placeholder=" পণ্য/দ্রব্য সহযোগিতা ">
    </td>
</tr>
<tr>
    <td style="width:40px;">০৪</td>
    <td>অন্যান্য</td>
    <td>
        <input class="form-control" type="text"
               placeholder="অন্যান্য  ">
    </td>
</tr>
<tr>
    <td style="width:40px;">০৫</td>
    <td>প্রকল্প বাস্তবায়নাধীন এলাকা</td>
    <td>
        <input class="form-control" type="text"
               placeholder="প্রকল্প বাস্তবায়নাধীন এলাকা  ">
    </td>
</tr>
<tr>
    <td style="width:40px;">০৬</td>
    <td> উল্লেখযোগ্য অন্যান্য তথ্য</td>
    <td>
        <input class="form-control" type="text"
               placeholder=" উল্লেখযোগ্য অন্যান্য তথ্য ">
    </td>
</tr>
<tr>
    <td style="width:40px;">০৭</td>
    <td>চুক্তিপত্রের কপি</td>
    <td>
        <input class="form-control" type="text"
               placeholder="চুক্তিপত্রের কপি ">
    </td>
</tr>

<!--FD06 Section Shonglognni kh-->

<tr>
    <td colspan="4">
        <h3 class="text-center mt-2">সংলগ্নী ‘’খ’’</h3>
    </td>
</tr>
<tr>
    <td rowspan="2" style="width:40px;">১</td>
    <td colspan="3"> প্রকল্পের কর্মকর্তা-কর্মচারীদের বিস্তারিত বিবরণ
        (দেশি ও বিদেশী উভয়ই)
    </td>
</tr>
<tr>
    <td colspan="3">
        <div class="d-flex justify-content-end">
            <a class="btn btn-custom mb-3" data-bs-toggle="modal"
                    data-bs-target="#ProkolppoKormokorta">নতুন
                প্রকল্পের কর্মকর্তা-কর্মচারী
                যুক্ত করুন
        </a>
        </div>
        <table class="table table-bordered">
            <tr>
                <td rowspan="2">নাম ও পদবি</td>
                <td rowspan="2">জাতীয়তা</td>
                <td rowspan="2">মেয়াদ (জনমাস)</td>
                <td rowspan="2">শিক্ষাগত যোগ্যতা</td>
                <td rowspan="2">অভিজ্ঞতা</td>
                <td rowspan="2">দায়িত্বসমূহ</td>
                <td colspan="2">বেতন-ভাতাদি</td>
            </tr>
            <tr>
                <td>এই প্রকল্প হতে</td>
                <td>অন্যান্য প্রকল্প হতে</td>
            </tr>
            <tr>
                <td>
                    <ul>
                        <li>নাম:</li>
                        <li>পদবি:</li>
                    </ul>
                </td>
                <td>X</td>
                <td>X</td>
                <td>X</td>
                <td>X</td>
                <td>X</td>
                <td>X</td>
                <td>X</td>
            </tr>
        </table>

        <small>টীকা : বেতন ভাতাদি বলতে বেতন , বাড়ী ভাড়া , চিকিৎসা ও
            বেতনের সাথে সংশ্লিষ্ট অন্যান্য সকল আর্থিক সুবিধা অন্তর্ভুক্ত
            হবে। বেতন-ভাতাদি বাংলাদেশী টাকায় মাসভিত্তিক দেখতে হবে।
            রুকল্প -২০২১ এর আলোকে অধিক কর্মসংস্থানের মাধ্যমে দ্রুত
            দারিদ্র হ্রাসের লক্ষ্যে বিদেশী নাগরিক নিয়োগ নিরুৎসাহিত করা
            হয়েছে। প্রকল্পের চাহিদা মোতাবেক উচ্চতর টেকনিক্যাল/ বেশেষায়িত
            বাংলাদেশি বিশেষজ্ঞ পাওয়া না গেলেই শুধুমাত্র বিদেশী বিশেষজ্ঞ
            বিবেচ্য। </small>

    </td>
</tr>

<!--FD06 Section Shonglognni Ga-->

<tr>
    <td colspan="4">
        <h3 class="text-center mt-2">সংলগ্নী ‘’গ’’</h3>
    </td>
</tr>

<tr>
    <td colspan="4"> নির্মাণ কাজের বিস্তারিত বিবরণ (প্রযোজ্যক্ষেত্রে )
        <br>
        (ভৌত নির্মাণের বিস্তারিত বর্ণনা)
    </td>
</tr>

<tr>
    <td style="width:40px;">ক)</td>
    <td colspan="2"> জমির মালিকানার প্রমাণক (নামজারী ও জমাখারিজ সহ )
    </td>
    <td>
        <input class="form-control" type="text"
               placeholder="জমির মালিকানার প্রমাণক (নামজারী ও জমাখারিজ সহ )   ">
    </td>
</tr>
<tr>
    <td style="width:40px;">খ)</td>
    <td colspan="2"> ভূমি উন্নয়ন কর পরিশোধের প্রমাণক (দাখিলা)</td>
    <td>
        <input class="form-control" type="text"
               placeholder=" ভূমি উন্নয়ন কর পরিশোধের প্রমাণক (দাখিলা) ">
    </td>
</tr>
<tr>
    <td style="width:40px;">গ)</td>
    <td colspan="2"> প্রকৌশল ডিজাইন (প্রকৌশলীর নাম, পদবীসহ সিল ও
        সাক্ষরসহ)
    </td>
    <td>
        <input class="form-control" type="text"
               placeholder="প্রকৌশল ডিজাইন (প্রকৌশলীর নাম, পদবীসহ সিল ও সাক্ষরসহ) ">
    </td>
</tr>
<tr>
    <td style="width:40px;">ঘ)</td>
    <td colspan="2"> নির্মাণের লে-আউট পান</td>
    <td>
        <input class="form-control" type="text"
               placeholder=" নির্মাণের লে-আউট পান ">
    </td>
</tr>
<tr>
    <td style="width:40px;">ঙ)</td>
    <td colspan="2"> প্রাক্কলিক ব্যয়</td>
    <td>
        <input class="form-control" type="text"
               placeholder=" প্রাক্কলিক ব্যয় ">
    </td>
</tr>

<!--FD06 Section Shonglognni Gha-->

<tr>
    <td colspan="4">
        <h3 class="text-center mt-2">সংলগ্নী ‘’ঘ’’</h3>
    </td>
</tr>

<tr>
    <td colspan="4"> প্রকল্প এলাকাসমূহে প্রকল্পের বিস্তারিত সাইনবোর্ড
        প্রদর্শন বিষয়ক তথ্যাদি :
    </td>
</tr>

<tr>
    <td style="width:40px;">ক)</td>
    <td colspan="2"> প্রকল্পের নাম</td>
    <td>
        <input class="form-control" type="text"
               placeholder="প্রকল্পের নাম   ">
    </td>
</tr>
<tr>
    <td style="width:40px;">খ)</td>
    <td colspan="2"> প্রকল্পের মেয়াদকাল</td>
    <td>
        <input class="form-control" type="text"
               placeholder="প্রকল্পের মেয়াদকাল">
    </td>
</tr>
<tr>
    <td style="width:40px;">গ)</td>
    <td colspan="2">প্রকল্পের মোট বরাদ্দ</td>
    <td>
        <input class="form-control" type="text"
               placeholder="প্রকল্পের মোট বরাদ্দ">
    </td>
</tr>
<tr>
    <td style="width:40px;">ঘ)</td>
    <td colspan="2">প্রকল্প এলাকায় মোট বরাদ্দ</td>
    <td>
        <input class="form-control" type="text"
               placeholder="প্রকল্প এলাকায় মোট বরাদ্দ ">
    </td>
</tr>
<tr>
    <td style="width:40px;">ঙ)</td>
    <td colspan="2"> মোট উপকারভোগীর সংখ্যা</td>
    <td>
        <input class="form-control" type="text"
               placeholder=" মোট উপকারভোগীর সংখ্যা">
    </td>
</tr>
<tr>
    <td style="width:40px;">চ)</td>
    <td colspan="2"> প্রকল্প এলাকায় মোট জনসংখ্যা</td>
    <td>
        <input class="form-control" type="text"
               placeholder=" প্রকল্প এলাকায় মোট জনসংখ্যা">
    </td>
</tr>
<tr>
    <td style="width:40px;">ছ)</td>
    <td colspan="2">দাতা সংস্থার নাম</td>
    <td>
        <input class="form-control" type="text"
               placeholder="দাতা সংস্থার নাম ">
    </td>
</tr>


                                                </table>
                                            </div>
                                        </div>


                                    <div class="d-grid d-md-flex justify-content-md-end">

                                        <a href="{{ route('fd6Form.edit',base64_encode($fd6Id)) }}" class="btn btn-danger"
                                        >পূর্ববর্তী পৃষ্ঠায় যান
                                     </a>

                                        <button type="submit" style="margin-left:10px;"  class="btn btn-registration"
                                                >পরবর্তী পৃষ্ঠা
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
@include('front.fd6Form._partial.partnerNgoModal')
@include('front.fd6Form._partial.employeeModal')
@endsection

@section('script')
@include('front.fd6Form._partial.script')
@endsection
