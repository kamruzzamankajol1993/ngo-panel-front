@extends('front.master.master')

@section('title')
বিদেশ থেকে প্রাপ্ত জিনিসপত্র /দ্রব্যসামগ্র্রীর সংরক্ষণ সংক্রান্ত ফরম | {{ trans('header.ngo_ab')}}
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
                                    <h4>{{ $ngoListAll->organization_name_ban }}</h4>
                                    @else
                                    <h4>{{ $ngoListAll->organization_name }}</h4>
                                    @endif
                                    {{-- <p class="text-secondary mb-1">{{ $ngoListAll->name_of_head_in_bd }}</p>
                                    <p class="text-muted font-size-sm">{{ $ngoListAll->organization_address }}</p> --}}

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
                            <a href="{{ route('duplicateCertificate.index')}}">
                                <p class="{{ Route::is('duplicateCertificate.index') ||  Route::is('duplicateCertificate.create') || Route::is('duplicateCertificate.show') || Route::is('duplicateCertificate.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.cf1')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('approvalOfConstitution.index') }}">
                                <p class="{{ Route::is('approvalOfConstitution.index') ||  Route::is('approvalOfConstitution.create') || Route::is('approvalOfConstitution.show') || Route::is('approvalOfConstitution.edit')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.cf2')}}</p>
                            </a>
                        </div>



                        <div class="profile_link_box">
                            <a href="{{ route('executiveCommitteeApproval.index') }}">
                                <p class="{{ Route::is('executiveCommitteeApproval.index') ||  Route::is('executiveCommitteeApproval.create') || Route::is('executiveCommitteeApproval.show') || Route::is('executiveCommitteeApproval.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.cf3')}}</p>
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

            <?php
$fdOneFormid = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->first();
$name_change_list = DB::table('document_for_duplicate_certificates')->where('fd_one_form_id',$fdOneFormid->id)->latest()->value('status');




            ?>
            <div class="col-lg-9 col-md-6 col-sm-12">

                @include('flash_message')

                <div class="card">
                    <div class="card-body">

                        <div class="form9_upper_box">
                            <h3>এফডি - ৫ ফরম</h3>
                            <h4 style="font-weight:bold;">বিদেশ থেকে প্রাপ্ত জিনিসপত্র /দ্রব্যসামগ্র্রীর সংরক্ষণ সংক্রান্ত ফরম </h4>
                        </div>

                        <form method="post" action="{{ route('fdFiveForm.store') }}" enctype="multipart/form-data" id="form" data-parsley-validate="">

                            @csrf

                            <div class="row">
                                <div class="col-lg-12 col-sm-12">


                                    <table class="table table-bordered" style="width:100%">

                                        <tr>
                                            <th style="text-align: center;">ক্র: নং:</th>
                                            <th style="text-align: center; width: 25%">বিবরণ</th>
                                            <th style="text-align: center;">তথ্যাদি</th>

                                        </tr>

                                        <tr>
                                            <th style="text-align: center;" >(০১)</th>
                                            <th>এনজিও সংক্রান্ত তথ্য <span style="text-align: center;">(০২)</span></th>
                                            <th style="text-align: center;">(০৩)</th>

                                        </tr>

                                        <tr>
                                            <th style="text-align: center;">১.</th>
                                            <td style="text-align: center;">সংস্থার নাম, ঠিকানা (টেলিফোন ,মোবাইল, ইমেইল ও ওয়েবসাইটসহ) <span style="color:red;">*</span>:</td>
                                            <th style="text-align: center;">
                                                <div class="row">



                                                    <div class="mb-3 col-lg-12">



                                                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))


                                                <input type="text" placeholder="এনজিও'র নাম" required name="ngo_name" value="{{ $ngoListAll->organization_name_ban }}" class="form-control" id=""
                                                placeholder="">

                                                @else


                                                <input type="text" placeholder="এনজিও'র নাম" required name="ngo_name" value="{{ $ngoListAll->organization_name }}" class="form-control" id=""
                                                placeholder="">


                                                @endif



                                                    </div>
                                                    <div class="mb-3 col-lg-12">

                                                        <input type="text" placeholder="সংস্থার ঠিকানা" required name="ngo_address" class="form-control" value="{{ $ngoListAll->organization_address }}" id=""
                                                               >
                                                    </div>

                                                    <div class="mb-3 col-lg-12">

                                                        <input type="text" placeholder="টেলিফোন" required name="ngo_telephone_number" value="{{ $ngoListAll->tele_phone_number }}" class="form-control" id=""
                                                               >
                                                    </div>
                                                    <div class="mb-3 col-lg-12">

                                                        <input placeholder="মোবাইল নম্বর" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        type = "number" required
                                                        maxlength = "11" data-parsley-required minlength="11"  data-parsley-trigger=“keyup” name="ngo_mobile_number" value="{{ $ngoListAll->phone }}" class="form-control" id=""
                                                              >
                                                    </div>
                                                    <div class="mb-3 col-lg-12">

                                                        <input placeholder="ইমেইল ঠিকানা" type="text" required name="ngo_email" class="form-control" id=""
                                                               value="{{ $ngoListAll->email }}">
                                                    </div>

                                                    @if(empty($ngoListAll->web_site_name))
                                                    <div class="mb-3 col-lg-12">

                                                        <input placeholder="ওয়েবসাইট" type="text" required value="{{ $renewWebsiteName }}" name="ngo_website" class="form-control" id=""
                                                              >
                                                    </div>
                                                    @else
                                                    <div class="mb-3 col-lg-12">

                                                        <input placeholder="ওয়েবসাইট" type="text" required value="{{ $ngoListAll->web_site_name }}" name="ngo_website" class="form-control" id=""
                                                               >
                                                    </div>

                                                    @endif
                                                </div>
                                            </th>

                                        </tr>
                                      <!-- step one start  -->







                                        <tr>
                                            <th style="text-align: center;" rowspan="2">২.</th>

                                            <td style="font-weight:bold;" colspan="2">গ্রহণকৃত সামগ্রী/ দ্রব্য সামগ্রীর বিস্তারিত বিবরণ
                                            </div>
                                        </td>


                                        </tr>
                                        <tr>

                                            {{-- <td style="text-align: center;">ক.</td> --}}
                                            <td colspan="3" >

                                                <div class="d-flex justify-content-between ">
                                                    <div class="p-2">


                                                    </div>
                                                    <div class="p-2">
                                                        <button class="btn btn-primary btn-sm btn-custom" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" >
                                                             যুক্ত করুন
                                                        </button>
                                                    </div>
                                                </div>
                                                    <div class="table-responsive">


                                                        <table class="table table-bordered">
                                                            <tr>
                                                                <th colspan="7">গ্রহনসংক্রান্ত তথ্যাদি</th>
                                                            </tr>
                                                            <tr style="text-align: center;">
                                                                <th>তারিখ</th>
                                                                <th>যে উৎস থেকে জিনিসপত্র/ দ্রব্যসামগ্রী গ্রহণ করা হয়েছে, তার নাম ও ঠিকানা</th>
                                                                <th>গ্রহণের প্রকৃত (শুল্কমূক্তভাবে /শুল্ক পরিশোধ করে গ্রহণকৃত)</th>
                                                                <th>জিনিসপত্র দ্রব্যসামগ্রী গ্রহণের উদ্দেশ্য</th>
                                                                <th>গ্রহণকৃত সামগ্রীর পরিমান</th>
                                                                <th>গ্রহণকৃত জিনিসপত্র/ দ্রব্যসামগ্রীর আনুমানিক মূল্য</th>
                                                                <th>প্রতিশ্রুতি প্রদানের তারিখ ও ব্যুরো হতে প্রকল্প অনুমোদনের তারিখ</th>
                                                            </tr>

                                                            <tr>
                                                                <td>১</td>
                                                                <td>২</td>
                                                                <td>৩</td>
                                                                <td>৪</td>
                                                                <td>৫</td>
                                                                <td>৬</td>
                                                                <td>৭</td>
                                                            </tr>

                                                        </table>
                                                    </div>

                                                    <div class="d-flex justify-content-between ">
                                                        <div class="p-2">


                                                        </div>
                                                        <div class="p-2">
                                                            <button class="btn btn-primary btn-sm btn-custom" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal121" >
                                                                 যুক্ত করুন
                                                            </button>
                                                        </div>
                                                    </div>

                                                    <div class="table-responsive">


                                                        <table class="table table-bordered">
                                                            <tr>
                                                                <th colspan="6">ব্যবহার/বিবরণ </th>
                                                            </tr>
                                                            <tr style="text-align: center;">
                                                                <th>সংস্থার ব্যবহারের পরিমাণ</th>
                                                                <th>যাকে প্রদান করা হয়েছে তাঁর বিবরণ প্রদানের কারণ </th>
                                                                <th>কোন মালামাল বিক্রয় করা হয়ে থাকলে তার বিবরণ (ব্যুরোর অনুমোদনপত্র সংযুক্ত করতে হবে)</th>
                                                                <th>কোন মালামাল হস্তান্তর করা হয়ে থাকলে তার বিবরণ (ব্যুরোর অনুমোদনপত্র সংযুক্ত করতে হবে)</th>
                                                                <th>যে মাধ্যমে মালামাল বাংলাদেশে প্রবেশ করেছে তার বিবরণ (ব্যুরো অনুমোদনপত্র সংযুক্ত করতে হবে)</th>
                                                                <th>অবশিষ্ট মালামালের বিবরণ (যদি থাকে)</th>
                                                            </tr>

                                                            <tr>
                                                                <td>৮</td>
                                                                <td>৯</td>
                                                                <td>১০</td>
                                                                <td>১১</td>
                                                                <td>১২</td>
                                                                <td>১৩</td>
                                                            </tr>

                                                        </table>
                                                    </div>


                                    </td>


                                        </tr>


                                        <!-- step three end -->



                                    </table>


                                    <div class="mb-3 col-lg-12 mt-3">

                                        <div class="card">

                                            <div class="card-header">
                                                আবেদনকারীর তথ্যাদি

                                            </div>
                                            <div class="card-body">

                                                  <!--new code for ngo-->
                                     <div class="mb-3">
                                        <label for="" class="form-label"> আবেদনকারীর নাম: <span class="text-danger">*</span></label>
                                             <input type="text" data-parsley-required  name="chief_name"  class="form-control" id="mainName" placeholder="আবেদনকারীর নাম">
                                        </div>

                                        <div class="mb-3">
                                            <label for="" class="form-label"> আবেদনকারীর পদবি: <span class="text-danger">*</span></label>
                                            <input type="text" data-parsley-required  name="chief_desi"  class="form-control"  placeholder="আবেদনকারীর পদবি">
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

                                </div>
                            </div>


                            <div class="d-grid d-md-flex justify-content-md-end">
                                <button type="submit" disabled class="btn btn-registration"
                                        >জমা দিন
                                </button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<!--modal-->
<div class="modal modal-xl fade" id="exampleModal121"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">

                    বিবরণী

                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">


                            <div class="row">



                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">সংস্থার ব্যবহারের পরিমাণ</label>
                                        <input type="text" name="upozila_name[]" class="form-control" id=""
                                        placeholder="">
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">যাকে প্রদান করা হয়েছে তাঁর বিবরণ প্রদানের কারণ<span class="text-danger">*</span></label>
                                        <textarea required name="beneficiaries_total[]" class="form-control summernote" id="" placeholder="">
                                        </textarea>
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">কোন মালামাল বিক্রয় করা হয়ে থাকলে তার বিবরণ<span class="text-danger">*</span></label>
                                        <textarea required name="beneficiaries_total[]" class="form-control summernote" id="" placeholder="">
                                        </textarea>
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">কোন মালামাল বিক্রয় করা হয়ে থাকলে তার অনুমোদনপত্র সংযুক্ত করতে হবে</label>
                                        <input type="file" name="upozila_name[]" class="form-control" id=""
                                        placeholder="">
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">কোন মালামাল হস্তান্তর করা হয়ে থাকলে তার বিবরণ <span class="text-danger">*</span></label>
                                        <textarea required name="beneficiaries_total[]" class="form-control summernote" id="" placeholder="">
                                        </textarea>
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">কোন মালামাল হস্তান্তর করা হয়ে থাকলে তার অনুমোদনপত্র সংযুক্ত করতে হবে</label>
                                        <input type="file" name="upozila_name[]" class="form-control" id=""
                                        placeholder="">
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">যে মাধ্যমে মালামাল বাংলাদেশে প্রবেশ করেছে তার বিবরণ<span class="text-danger">*</span></label>
                                        <textarea required name="beneficiaries_total[]" class="form-control summernote" id="" placeholder="">
                                        </textarea>
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">যে মাধ্যমে মালামাল বাংলাদেশে প্রবেশ করেছে তার অনুমোদনপত্র সংযুক্ত করতে হবে</label>
                                        <input type="file" name="upozila_name[]" class="form-control" id=""
                                        placeholder="">
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">অবশিষ্ট মালামালের বিবরণ (যদি থাকে)<span class="text-danger">*</span></label>
                                        <textarea required name="beneficiaries_total[]" class="form-control summernote" id="" placeholder="">
                                        </textarea>
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

<!--modal-->
<div class="modal modal-xl fade" id="exampleModal"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">

                    বিবরণী

                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">


                            <div class="row">



                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">তারিখ</label>
                                        <input type="text" name="upozila_name[]" class="form-control" id=""
                                        placeholder="">
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">যে উৎস থেকে জিনিসপত্র/ দ্রব্যসামগ্রী গ্রহণ করা হয়েছে, তার নাম <span class="text-danger">*</span></label>
                                        <input type="text" required name="thana_name[]" class="form-control" id=""
                                        placeholder="" >
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">যে উৎস থেকে জিনিসপত্র/ দ্রব্যসামগ্রী গ্রহণ করা হয়েছে, তার ঠিকানা</label>
                                        <input type="text" name="municipality_name[]" class="form-control" id=""
                                        placeholder="">
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">গ্রহণের প্রকৃত (শুল্কমূক্তভাবে গ্রহণকৃত)</label>
                                        <input type="text" name="ward_name[]" class="form-control" id=""
                                        placeholder="">
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">গ্রহণের প্রকৃত (শুল্ক পরিশোধ করে গ্রহণকৃত)<span class="text-danger">*</span></label>
                                        <input type="text" required name="allocated_budget[]" class="form-control" id="" placeholder="">
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">জিনিসপত্র দ্রব্যসামগ্রী গ্রহণের উদ্দেশ্য<span class="text-danger">*</span></label>
                                        <textarea required name="beneficiaries_total[]" class="form-control summernote" id="" placeholder="">
                                        </textarea>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">গ্রহণকৃত সামগ্রীর পরিমান<span class="text-danger">*</span></label>
                                        <input type="text" required name="beneficiaries_total[]" class="form-control" id="" placeholder="">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">গ্রহণকৃত জিনিসপত্র/ দ্রব্যসামগ্রীর আনুমানিক মূল্য<span class="text-danger">*</span></label>
                                        <input type="text" required name="beneficiaries_total[]" class="form-control" id="" placeholder="">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">প্রতিশ্রুতি প্রদানের তারিখ<span class="text-danger">*</span></label>
                                        <input type="text" required name="beneficiaries_total[]" class="form-control" id="" placeholder="">
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">ব্যুরো হতে প্রকল্প অনুমোদনের তারিখ<span class="text-danger">*</span></label>
                                        <input type="text" required name="beneficiaries_total[]" class="form-control" id="" placeholder="">
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

@endsection
