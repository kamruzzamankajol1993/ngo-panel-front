@extends('front.master.master')

@section('title')
{{ trans('formNoSeven.formNoSeven')}} | {{ trans('header.ngo_ab')}}
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

                            <div class="row">
                                <div class="col-lg-12 col-sm-12">
                                    <div class="others_inner_section">
                                        <h1>প্রকল্প বাস্তবায়ন সম্পর্কিত প্রত্যয়নপত্র</h1>
                                        <div class="notice_underline"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-3 card-custom-color">
                                <div class="card-body">
                                    <form action="{{ route('formNoSeven.store') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                        @csrf
                                    <div class="form9_upper_box">
                                        <h3>{{ trans('formNoSeven.formNoSeven')}}</h3>
                                        <h4>প্রকল্প বাস্তবায়ন সম্পর্কিত প্রত্যয়নপত্রের ছক</h4>
                                    </div>

                                    <!-- step one start -->

                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12">

                                            <div class="card">
                                                <div class="card-header">
                                                    <center>এনজিও সংক্রান্ত তথ্য</center>
                                                </div>

                                                <div class="card-body">

                                                    <div class="row">
                                                        <div class="mb-3 col-lg-6">
                                                            <label for="" class="form-label">এনজিও'র নাম <span style="color:red;">*</span></label>
                                                            <input type="text" required name="ongoing_prokolpo_name" class="form-control" id=""
                                                                   placeholder="">
                                                        </div>
                                                        <div class="mb-3 col-lg-6">
                                                            <label for="" class="form-label">এনজিও'র ঠিকানা <span style="color:red;">*</span></label>
                                                            <input type="text" required name="total_prokolpo_cost" class="form-control" id=""
                                                                   placeholder="">
                                                        </div>
                                                        <div class="mb-3 col-lg-12">
                                                            <label for="" class="form-label">মন্তব্য</label>
                                                            <textarea required name="date_of_bureau_approval" class="form-control" id=""
                                                                   placeholder=""></textarea>
                                                        </div>

                                                    </div>
                                                    <hr style="height:2px;background-color:#075E24 !important;">

                                                    <div class="row mt-2">

                                                        <div class="others_inner_section">
                                                            <h6>এনজিও প্রধানের তথ্যাদি</h6>
                                                            <div class="notice_underline"></div>
                                                        </div>


                                                        <div class="mb-3 col-lg-6 mt-3">
                                                            <label for="" class="form-label">নাম <span style="color:red;">*</span></label>
                                                            <input type="text" required name="ongoing_prokolpo_name" class="form-control" id=""
                                                                   placeholder="">
                                                        </div>
                                                        <div class="mb-3 col-lg-6 mt-3">
                                                            <label for="" class="form-label">পদবি <span style="color:red;">*</span></label>
                                                            <input type="text" required name="total_prokolpo_cost" class="form-control" id=""
                                                                   placeholder="">
                                                        </div>

                                                        <div class="mb-3 col-lg-6">
                                                            <label for="" class="form-label">দাপ্তরিক মোবাইল নম্বর <span style="color:red;">*</span></label>
                                                            <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                            type = "number"
                                                            maxlength = "11" data-parsley-required minlength="11"  data-parsley-trigger=“keyup” required name="total_prokolpo_cost" class="form-control" id=""
                                                                   placeholder="">
                                                        </div>

                                                        <div class="mb-3 col-lg-6">
                                                            <label for="" class="form-label"> ইমেইল এড্রেস <span style="color:red;">*</span></label>
                                                            <input type="email" required name="total_prokolpo_cost" class="form-control" id=""
                                                                   placeholder="">
                                                        </div>

                                                        <div class="mb-3 col-lg-12">
                                                            <label for="" class="form-label">মন্তব্য</label>
                                                            <textarea required name="date_of_bureau_approval" class="form-control" id=""
                                                                   placeholder=""></textarea>
                                                        </div>

                                                    </div>

                                                    <hr style="height:2px;background-color:#075E24 !important;">

                                                    <div class="row mt-2">


                                                        <div class="mb-3 col-lg-6">
                                                            <label for="" class="form-label">এনজিও নিবন্ধন নম্বর <span style="color:red;">*</span></label>
                                                            <input type="text" required name="ongoing_prokolpo_name" class="form-control" id=""
                                                                   placeholder="">
                                                        </div>
                                                        <div class="mb-3 col-lg-6">
                                                            <label for="" class="form-label">এনজিও নিবন্ধনের তারিখ <span style="color:red;">*</span></label>
                                                            <input type="text" required name="total_prokolpo_cost" class="form-control datepicker" id=""
                                                                   placeholder="">
                                                        </div>

                                                        <div class="mb-3 col-lg-6">
                                                            <label for="" class="form-label">সর্বশেষ নবায়নের তারিখ <span style="color:red;">*</span></label>
                                                            <input type="text" required name="total_prokolpo_cost" class="form-control datepicker" id=""
                                                                   placeholder="">
                                                        </div>


                                                        <div class="mb-3 col-lg-6">
                                                            <label for="" class="form-label">এনজিও মেয়াদকাল  <span style="color:red;">*</span></label>
                                                            <input type="text" required name="ongoing_prokolpo_name" class="form-control" id=""
                                                                   placeholder="">
                                                        </div>

                                                        <div class="mb-3 col-lg-12">
                                                            <label for="" class="form-label">মন্তব্য</label>
                                                            <textarea required name="date_of_bureau_approval" class="form-control" id=""
                                                                   placeholder=""></textarea>
                                                        </div>

                                                    </div>

                                                    <hr style="height:2px;background-color:#075E24 !important;">


                                                    <div class="row mt-2">

                                                        <div class="others_inner_section">
                                                            <h6>জেলা/আঞ্চলিক  অফিসের দায়িত্বপ্রাপ্ত এনজিও কর্মকর্তার তথ্যাদি </h6>
                                                            <div class="notice_underline"></div>
                                                        </div>


                                                        <div class="mb-3 col-lg-6 mt-3">
                                                            <label for="" class="form-label">নাম <span style="color:red;">*</span></label>
                                                            <input type="text" required name="ongoing_prokolpo_name" class="form-control" id=""
                                                                   placeholder="">
                                                        </div>
                                                        <div class="mb-3 col-lg-6 mt-3">
                                                            <label for="" class="form-label">পদবি <span style="color:red;">*</span></label>
                                                            <input type="text" required name="total_prokolpo_cost" class="form-control" id=""
                                                                   placeholder="">
                                                        </div>

                                                        <div class="mb-3 col-lg-6">
                                                            <label for="" class="form-label">দাপ্তরিক মোবাইল নম্বর <span style="color:red;">*</span></label>
                                                            <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                            type = "number"
                                                            maxlength = "11" data-parsley-required minlength="11"  data-parsley-trigger=“keyup” required name="total_prokolpo_cost" class="form-control" id=""
                                                                   placeholder="">
                                                        </div>

                                                        <div class="mb-3 col-lg-6">
                                                            <label for="" class="form-label"> ইমেইল এড্রেস <span style="color:red;">*</span></label>
                                                            <input type="email" required name="total_prokolpo_cost" class="form-control" id=""
                                                                   placeholder="">
                                                        </div>

                                                        <div class="mb-3 col-lg-12">
                                                            <label for="" class="form-label">মন্তব্য</label>
                                                            <textarea required name="date_of_bureau_approval" class="form-control" id=""
                                                                   placeholder=""></textarea>
                                                        </div>

                                                    </div>


                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <!-- step one end --->


                                    <!-- step two start -->


                                    <div class="row mt-2">
                                        <div class="col-lg-12 col-sm-12">

                                            <div class="card">
                                                <div class="card-header">
                                                    <center>প্রকল্প সংক্রান্ত তথ্য</center>
                                                </div>

                                                <div class="card-body">
                                                    <div class="row mt-2">
                                                    <div class="mb-3 col-lg-4">
                                                        <label for="" class="form-label">প্রকল্পের নাম <span style="color:red;">*</span></label>
                                                        <input type="text" required name="ongoing_prokolpo_name" class="form-control" id=""
                                                               placeholder="">
                                                    </div>
                                                    <div class="mb-3 col-lg-4">
                                                        <label for="" class="form-label">প্রকল্পের মেয়াদকাল <span style="color:red;">*</span></label>
                                                        <input type="text" required name="total_prokolpo_cost" class="form-control" id=""
                                                               placeholder="">
                                                    </div>

                                                    <div class="mb-3 col-lg-4">
                                                        <label for="" class="form-label">প্রকল্পের টাকার পরিমাণ <span style="color:red;">*</span></label>
                                                        <input type="text" required name="total_prokolpo_cost" class="form-control" id=""
                                                               placeholder="">
                                                    </div>

                                                    <div class="mb-3 col-lg-12">
                                                        <label for="" class="form-label">মন্তব্য</label>
                                                        <textarea required name="date_of_bureau_approval" class="form-control" id=""
                                                               placeholder=""></textarea>
                                                    </div>

                                                    </div>

                                                    <hr style="height:2px;background-color:#075E24 !important;">


                                                    <div class="row mt-2">

                                                        <div class="mb-3 col-lg-4">
                                                            <label for="" class="form-label">প্রকল্প অনুমোদনের তারিখ <span style="color:red;">*</span></label>
                                                            <input type="text" required name="ongoing_prokolpo_name" class="form-control datepicker" id=""
                                                                   placeholder="">
                                                        </div>

                                                        <div class="mb-3 col-lg-4">
                                                            <label for="" class="form-label">স্মারক নম্বর <span style="color:red;">*</span></label>
                                                            <input type="text" required name="ongoing_prokolpo_name" class="form-control" id=""
                                                                   placeholder="">
                                                        </div>


                                                        <div class="mb-3 col-lg-4">
                                                            <label for="" class="form-label">প্রত্যয়নপত্র প্রদানের বছর / সময় <span style="color:red;">*</span></label>
                                                            <input type="text" required name="ongoing_prokolpo_name" class="form-control" id=""
                                                                   placeholder="">
                                                        </div>

                                                        <div class="mb-3 col-lg-12">
                                                            <label for="" class="form-label">মন্তব্য</label>
                                                            <textarea required name="date_of_bureau_approval" class="form-control" id=""
                                                                   placeholder=""></textarea>
                                                        </div>

                                                    </div>

                                                    <hr style="height:2px;background-color:#075E24 !important;">

                                                    <div class="row mt-2">

                                                        <div class="mb-3 col-lg-12">
                                                            <label for="" class="form-label">প্রকল্পের উদ্দেশ্য <span style="color:red;">*</span></label>
                                                            <input type="text" required name="ongoing_prokolpo_name" class="form-control" id=""
                                                                   placeholder="">
                                                        </div>
                                                        <div class="mb-3 col-lg-12">
                                                            <label for="" class="form-label">মন্তব্য</label>
                                                            <textarea required name="date_of_bureau_approval" class="form-control" id=""
                                                                   placeholder=""></textarea>
                                                        </div>
                                                    </div>

                                                    <hr style="height:2px;background-color:#075E24 !important;">

                                                    <div class="row mt-2">

                                                        <div class="mb-3 col-lg-12">
                                                            <label for="" class="form-label">জেলা/উপজেলায় ব্যুরো কতৃক অনুমোদিত প্রকল্পের কপি স্থানীয় প্রশাসন কতৃক গ্রহণের তারিখ<span style="color:red;">*</span></label>
                                                            <input type="text" required name="ongoing_prokolpo_name" class="form-control datepicker" id=""
                                                                   placeholder="">
                                                        </div>
                                                        <div class="mb-3 col-lg-12">
                                                            <label for="" class="form-label">মন্তব্য</label>
                                                            <textarea required name="date_of_bureau_approval" class="form-control" id=""
                                                                   placeholder=""></textarea>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                    <!-- step Two end -->


                                    <!-- step three start -->


                                    <div class="row mt-2">
                                        <div class="col-lg-12 col-sm-12">

                                            <div class="card">
                                                <div class="card-header">
                                                    <center>তার এখতিয়ারাধীন এলাকার সংশ্লিষ্ট তথ্য</center>
                                                </div>

                                                <div class="card-body">

                                                    <div class="row mt-2">

                                                        <div class="mb-3 col-lg-4">
                                                            <label for="" class="form-label">তাঁর জেলা/উপজেলায় প্রকল্পের জন্য বরাদ্দ <span style="color:red;">*</span></label>
                                                            <input type="text" required name="ongoing_prokolpo_name" class="form-control" id=""
                                                                   placeholder="">
                                                        </div>

                                                        <div class="mb-3 col-lg-4">
                                                            <label for="" class="form-label">বহুবর্ষী প্রকল্পের ক্ষেত্রে আলোচ্য বর্ষে বরাদ্দ <span style="color:red;">*</span></label>
                                                            <input type="text" required name="ongoing_prokolpo_name" class="form-control" id=""
                                                                   placeholder="">
                                                        </div>

                                                        <div class="mb-3 col-lg-4">
                                                            <label for="" class="form-label">বহুবর্ষী প্রকল্পের ক্ষেত্রে আলোচ্য বর্ষে প্রকৃত ব্যয়<span style="color:red;">*</span></label>
                                                            <input type="text" required name="ongoing_prokolpo_name" class="form-control" id=""
                                                                   placeholder="">
                                                        </div>

                                                        <div class="mb-3 col-lg-6">
                                                            <label for="" class="form-label">প্রকল্পে প্রত্যক্ষ উপকারভোগীর সংখ্যা <span style="color:red;">*</span></label>
                                                            <input type="text" required name="ongoing_prokolpo_name" class="form-control" id=""
                                                                   placeholder="">
                                                        </div>

                                                        <div class="mb-3 col-lg-6">
                                                            <label for="" class="form-label">প্রকল্পে পরোক্ষ  উপকারভোগীর সংখ্যা (প্রযোজ্য ক্ষেত্রে) <span style="color:red;">*</span></label>
                                                            <input type="text" required name="ongoing_prokolpo_name" class="form-control" id=""
                                                                   placeholder="">
                                                        </div>
                                                        <div class="mb-3 col-lg-12">
                                                            <label for="" class="form-label">মন্তব্য</label>
                                                            <textarea required name="date_of_bureau_approval" class="form-control" id=""
                                                                   placeholder=""></textarea>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                    <!-- step Three end -->


                                    <!-- step three start -->


                                    <div class="row mt-2">
                                        <div class="col-lg-12 col-sm-12">

                                            <div class="card">
                                                <div class="card-header">
                                                    <center>জেলা প্রশাসন/উপজেলা প্রশাসন সংক্রান্ত</center>
                                                </div>

                                                <div class="card-body">

                                                    <div class="row mt-2">

                                                        <div class="mb-3 col-lg-12">
                                                            <label for="" class="form-label">স্থানীয় প্রশাসন কতৃক কত বার প্রকল্পটি পরিদর্শন করা হয়েছে <span style="color:red;">*</span></label>
                                                            <input type="text" required name="ongoing_prokolpo_name" class="form-control" id=""
                                                                   placeholder="">
                                                        </div>

                                                        <div class="mb-3 col-lg-6">
                                                            <label for="" class="form-label">পরিদর্শনকারী কর্মকর্তার নাম  <span style="color:red;">*</span></label>
                                                            <input type="text" required name="ongoing_prokolpo_name" class="form-control" id=""
                                                                   placeholder="">
                                                        </div>

                                                        <div class="mb-3 col-lg-6">
                                                            <label for="" class="form-label">পরিদর্শনকারী কর্মকর্তার পদবি  <span style="color:red;">*</span></label>
                                                            <input type="text" required name="ongoing_prokolpo_name" class="form-control" id=""
                                                                   placeholder="">
                                                        </div>

                                                        <div class="mb-3 col-lg-6">
                                                            <label for="" class="form-label">পরিদর্শনকারী কর্মকর্তার মোবাইল নম্বর  <span style="color:red;">*</span></label>
                                                            <input type="text" required name="ongoing_prokolpo_name" class="form-control" id=""
                                                                   placeholder="">
                                                        </div>

                                                        <div class="mb-3 col-lg-6">
                                                            <label for="" class="form-label">পরিদর্শনকারী কর্মকর্তার ইমেইল এড্রেস <span style="color:red;">*</span></label>
                                                            <input type="text" required name="ongoing_prokolpo_name" class="form-control" id=""
                                                                   placeholder="">
                                                        </div>

                                                        <div class="mb-3 col-lg-12">
                                                            <label for="" class="form-label">মন্তব্য</label>
                                                            <textarea required name="date_of_bureau_approval" class="form-control" id=""
                                                                   placeholder=""></textarea>
                                                        </div>

                                                    </div>

                                                    <hr style="height:2px;background-color:#075E24 !important;">

                                                    <div class="row mt-2">

                                                        <div class="mb-3 col-lg-12">
                                                            <label for="" class="form-label">উপকারভোগী নির্বাচনে স্থানীয় প্রশাসনকে সম্পৃক্ত করা হয়েছে কিনা, হয়ে থাকলে তার সংক্ষিপ্ত বিবরণী <span style="color:red;">*</span></label>
                                                            <textarea required name="date_of_bureau_approval" class="form-control" id=""
                                                            placeholder=""></textarea>
                                                        </div>

                                                        <div class="mb-3 col-lg-12">
                                                            <label for="" class="form-label">মন্তব্য</label>
                                                            <textarea required name="date_of_bureau_approval" class="form-control" id=""
                                                                   placeholder=""></textarea>
                                                        </div>



                                                    </div>

                                                    <hr style="height:2px;background-color:#075E24 !important;">

                                                    <div class="row mt-2">

                                                        <div class="mb-3 col-lg-12">
                                                            <label for="" class="form-label">এনজিও প্রতিনিধি জেলা/উপজেলায় এনজিও বিষয়ক সমন্বয় সভায় নিয়মিত অংশগ্রহণ করেন কিনা <span style="color:red;">*</span></label>
                                                            <input type="text" required name="ongoing_prokolpo_name" class="form-control" id=""
                                                                   placeholder="">
                                                        </div>

                                                        <div class="mb-3 col-lg-12">
                                                            <label for="" class="form-label">মন্তব্য</label>
                                                            <textarea required name="date_of_bureau_approval" class="form-control" id=""
                                                                   placeholder=""></textarea>
                                                        </div>

                                                    </div>

                                                    <hr style="height:2px;background-color:#075E24 !important;">

                                                    <div class="row mt-2">

                                                        <div class="mb-3 col-lg-12">
                                                            <label for="" class="form-label">এনজিও বিষয়ক ব্যুরোর অনুমোদন পত্রের শর্তাদি যথাযথভাবে প্রতিপালিত হয়েছে কিনা <span style="color:red;">*</span></label>
                                                            <input type="text" required name="ongoing_prokolpo_name" class="form-control" id=""
                                                                   placeholder="">
                                                        </div>

                                                        <div class="mb-3 col-lg-12">
                                                            <label for="" class="form-label">মন্তব্য</label>
                                                            <textarea required name="date_of_bureau_approval" class="form-control" id=""
                                                                   placeholder=""></textarea>
                                                        </div>

                                                    </div>

                                                    <hr style="height:2px;background-color:#075E24 !important;">

                                                    <div class="row mt-2">

                                                        <div class="mb-3 col-lg-12">
                                                            <label for="" class="form-label">পার্টনার এনজিও হলে মূল এনজিও বিষয়ক তথ্যাদি (প্রযোজ্য ক্ষেত্রে) <span style="color:red;">*</span></label>
                                                            <input type="text" required name="ongoing_prokolpo_name" class="form-control" id=""
                                                                   placeholder="">
                                                        </div>

                                                        <div class="mb-3 col-lg-12">
                                                            <label for="" class="form-label">মন্তব্য</label>
                                                            <textarea required name="date_of_bureau_approval" class="form-control" id=""
                                                                   placeholder=""></textarea>
                                                        </div>

                                                    </div>

                                                    <hr style="height:2px;background-color:#075E24 !important;">

                                                    <div class="row mt-2">

                                                        <div class="mb-3 col-lg-6">
                                                            <label for="" class="form-label">মূল এনজিও'র নাম  <span style="color:red;">*</span></label>
                                                            <input type="text" required name="ongoing_prokolpo_name" class="form-control" id=""
                                                                   placeholder="">
                                                        </div>

                                                        <div class="mb-3 col-lg-6">
                                                            <label for="" class="form-label">মূল এনজিও'র ঠিকানা <span style="color:red;">*</span></label>
                                                            <input type="text" required name="ongoing_prokolpo_name" class="form-control" id=""
                                                                   placeholder="">
                                                        </div>

                                                        <div class="mb-3 col-lg-12">
                                                            <label for="" class="form-label">মন্তব্য</label>
                                                            <textarea required name="date_of_bureau_approval" class="form-control" id=""
                                                                   placeholder=""></textarea>
                                                        </div>

                                                    </div>


                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                    <!-- step Three end -->


                                     <!-- step four start -->


                                     <div class="row mt-2">
                                        <div class="col-lg-12 col-sm-12">

                                            <div class="card">
                                                <div class="card-header">
                                                    <center>প্রকল্পের অর্জিত লক্ষ্যমাত্রা বিষয়ক</center>
                                                </div>

                                                <div class="card-body">


                                                    <div class="row mt-2">

                                                        <div class="mb-3 col-lg-12">
                                                            <label for="" class="form-label">প্রকল্প সমাপনী প্রতিবেদন /বার্ষিক প্রতিবেদনে জেলা প্রশাসক/উপজেলা নির্বাহী অফিসারের প্রতিস্বাক্ষর গ্রহণ করা হয়েছে কিনা<span style="color:red;">*</span></label>
                                                            <input type="text" required name="ongoing_prokolpo_name" class="form-control" id=""
                                                                   placeholder="">
                                                        </div>

                                                        <div class="mb-3 col-lg-12">
                                                            <label for="" class="form-label">বাস্তবায়িত প্রকল্প সম্পর্কে মতামত <span style="color:red;">*</span></label>
                                                            <textarea required name="date_of_bureau_approval" class="form-control" id=""
                                                            placeholder=""></textarea>
                                                        </div>

                                                        <div class="mb-3 col-lg-12">
                                                            <label for="" class="form-label">বাস্তবায়িত প্রকল্প সম্পর্কে সুপারিশ (প্রত্যয়নকারী কর্মকর্তার স্বহস্তে লিখা কাম্য)<span style="color:red;">*</span></label>
                                                            <textarea required name="date_of_bureau_approval" class="form-control" id=""
                                                            placeholder=""></textarea>
                                                        </div>

                                                        <div class="mb-3 col-lg-12">
                                                            <label for="" class="form-label">মন্তব্য</label>
                                                            <textarea required name="date_of_bureau_approval" class="form-control" id=""
                                                                   placeholder=""></textarea>
                                                        </div>

                                                    </div>


                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                    <!-- step four end -->



                                     <!-- step five start -->


                                     <div class="row mt-2">
                                        <div class="col-lg-12 col-sm-12">

                                            <div class="card">
                                                <div class="card-header">
                                                    <center>অন্যান্য তথ্য</center>
                                                </div>

                                                <div class="card-body">

                                                    <div class="row mt-2">

                                                        <div class="mb-3 col-lg-6">
                                                            <label for="" class="form-label">জেলা<span style="color:red;">*</span></label>
                                                            <input type="text" required name="ongoing_prokolpo_name" class="form-control" id=""
                                                                   placeholder="">
                                                        </div>

                                                        <div class="mb-3 col-lg-6">
                                                            <label for="" class="form-label">উপজেলা<span style="color:red;">*</span></label>
                                                            <input type="text" required name="ongoing_prokolpo_name" class="form-control" id=""
                                                                   placeholder="">
                                                        </div>


                                                        <div class="mb-3 col-lg-6">
                                                            <label for="" class="form-label">স্মারক নম্বর<span style="color:red;">*</span></label>
                                                            <input type="text" required name="ongoing_prokolpo_name" class="form-control" id=""
                                                                   placeholder="">
                                                        </div>


                                                        <div class="mb-3 col-lg-6">
                                                            <label for="" class="form-label">জমাদানের তারিখ<span style="color:red;">*</span></label>
                                                            <input type="text" required name="ongoing_prokolpo_name" class="form-control" id=""
                                                                   placeholder="">
                                                        </div>

                                                        <div class="mb-3 col-lg-12">
                                                            <label for="" class="form-label">অনুলিপি</label>
                                                            <textarea required name="date_of_bureau_approval" class="form-control" id=""
                                                                   placeholder=""></textarea>
                                                        </div>

                                                    </div>




                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                    <!-- step five end -->


                                    <!-- step six start -->


                                    <div class="row mt-2">
                                        <div class="col-lg-12 col-sm-12">

                                            <div class="card">
                                                <div class="card-header">
                                                    <center>অতিরিক্ত তথ্য (যদি থাকে)</center>
                                                </div>

                                                <div class="card-body">


                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                    <!-- step six end -->






                                    <div class="d-grid d-md-flex justify-content-md-end mt-4">
                                        <button type="submit" class="btn btn-registration"
                                                >জমা দিন
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


@endsection

@section('script')



@endsection
