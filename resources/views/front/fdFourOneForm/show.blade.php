@extends('front.master.master')

@section('title')
সিএ ফার্ম কতৃক প্রদেয় প্রতিবেদন | {{ trans('header.ngo_ab')}}
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
                                <p class="{{ Route::is('fd6Form.index') ||  Route::is('fd6Form.create') || Route::is('fd6Form.show') || Route::is('fd2Form.create') || Route::is('fd2Form.index') || Route::is('fd6Form.edit') || Route::is('fd2Form.show') || Route::is('fd2Form.edit')? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd6')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('fd7Form.index') }}">
                                <p class="{{ Route::is('fd7Form.index') ||  Route::is('fd7Form.create') || Route::is('fd7Form.show') || Route::is('addFd2DetailForFd7') || Route::is('editFd2DetailForFd7') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd7')}}</p>
                            </a>
                        </div>


                        <div class="profile_link_box">
                            <a href="{{ route('fc1Form.index') }}">
                                <p class="{{ Route::is('fc1Form.index') ||  Route::is('fc1Form.create') || Route::is('fc1Form.show') || Route::is('addFd2DetailForFc1') || Route::is('editFd2DetailForFc1') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fc1')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('fc2Form.index') }}">
                                <p class="{{ Route::is('fc2Form.index') ||  Route::is('fc2Form.create') || Route::is('fc2Form.show') || Route::is('addFd2DetailForFc2') || Route::is('editFd2DetailForFc2') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fc2')}}</p>
                            </a>
                        </div>


                        <div class="profile_link_box">
                            <a href="{{ route('fd3Form.index') }}">
                                <p class="{{ Route::is('fd3Form.index') ||  Route::is('fd3Form.create') || Route::is('fd3Form.show') || Route::is('addFd2DetailForFd3') || Route::is('editFd2DetailForFd3') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd3')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('fdFiveForm.index') }}">
                                <p class="{{ Route::is('fdFiveForm.index') ||  Route::is('fdFiveForm.create') || Route::is('fdFiveForm.show')  || Route::is('fdFiveForm.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd5')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('fdFourOneForm.index') }}">
                                <p class="{{ Route::is('editFdFourFormData') || Route::is('addFdFourFormData') || Route::is('fdFourOneForm.index') ||  Route::is('fdFourOneForm.create') || Route::is('fdFourOneForm.show')  || Route::is('fdFourOneForm.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fdFourFormOne.fdFourOneForm')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('formNoFour.index') }}">
                                <p class="{{ Route::is('formNoFour.index') ||  Route::is('formNoFour.create') || Route::is('formNoFour.show')  || Route::is('formNoFour.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('formNoFour.formNoFour')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('formNoSeven.index') }}">
                                <p class="{{ Route::is('formNoSeven.index') ||  Route::is('formNoSeven.create') || Route::is('formNoSeven.show')  || Route::is('formNoSeven.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('formNoSeven.formNoSeven')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('formNoFive.index') }}">
                                <p class="{{ Route::is('formNoFive.index') ||  Route::is('formNoFive.create') || Route::is('formNoFive.show')  || Route::is('formNoFive.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('formNoFive.formNoFive')}}</p>
                            </a>
                        </div>


                        <div class="profile_link_box">
                            <a href="{{ route('complain.index') }}">
                                <p class="{{ Route::is('complain.index') ||  Route::is('complain.create') || Route::is('complain.show')  || Route::is('complain.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.complain')}}</p>
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

                        @include('flash_message')

                          <!-- new code start --->

                  <div class="d-flex justify-content-between mt-3">
                    <div class="">


                    </div>
                    <div class="">



                        @if($fdFourOneFormList->status == 'Ongoing' || $fdFourOneFormList->status == 'Accepted')

                                        @else

                                        <button type="button" data-toggle="tooltip" data-placement="top" title="আবেদন এনজিওতে পাঠান" onclick="editTag({{ $fdFourOneFormList->id}})" class="btn btn-info">
                                            <i class="fa fa-send-o"></i>
                                        </button>

                                            <form id="delete-form-{{ $fdFourOneFormList->id }}" action="{{ route('fdFourOneSend',base64_encode($fdFourOneFormList->id)) }}" method="get" style="display: none;">

                                                @csrf


                                            </form>

                        <button class="btn btn-primary" onclick="location.href = '{{ route('fdFourOneForm.edit',base64_encode($fdFourOneFormList->id)) }}';" data-toggle="tooltip" data-placement="top" title="{{ trans('message.update')}}"><i class="fa fa-edit"></i></button>
                        @endif


                    </div>
                </div>

                <!-- new code end -->

                        <div class="form9_upper_box">
                            <h3>এফডি - ৪(১)  ফরম </h3>
                            <h4>সিএ ফার্ম কতৃক প্রদেয় প্রতিবেদন</h4>
                        </div>
                        <table class="table table-bordered">
                            <tr>
                                <td>প্রকল্পের নাম</td>
                                <td>: {{ $fdFourOneFormList->prokolpo_name }}</td>
                            </tr>
                            <tr>
                                <td>প্রকল্প অনুমোদনের স্বারক নং ও তারিখ</td>
                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFourOneFormList->prokolpo_permission_sarok_no.' ও '.$fdFourOneFormList->prokolpo_permission_sarok_date) }}</td>
                            </tr>
                            <tr>
                                <td>প্রকল্প বর্ষ</td>
                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFourOneFormList->prokolpo_year) }}</td>
                            </tr>
                            <tr>
                                <td>ছাড়কৃত অর্থের পরিমাণ ও তারিখ (বাংলাদেশী মুদ্রায় খরচ ) </td>
                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFourOneFormList->prokolpo_amount_sarkrito_bangla_amount. ' ও '.$fdFourOneFormList->prokolpo_amount_sarkrito_date	) }}</td>
                            </tr>
                            <tr>
                                <td>গৃহীত অর্থের পরিমাণ ও তারিখ</td>
                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFourOneFormList->prokolpo_amount_grihito. ' ও '.$fdFourOneFormList->prokolpo_amount_grihito_date	) }}</td>
                            </tr>

                        </table>
                        <div class="form9_upper_box">
                            <h3>খরচের খাতসমূহের বিস্তারিত বিবরণ</h3>
                        </div>
                        <table class="table table-bordered">
                            <tr>

                                <th >খরচের খাতসমূহের বিস্তারিত(প্রকল্প বিবরণ এ প্রদত্ত এফডি -৬ অনুযায়ী )</th>
                                <th >অনুমোদিত বাজেট অনুযায়ী অর্থের পরিমাণ</th>
                                <th >প্রকৃত ব্যয়</th>
                                <th >পার্থক্য </th>
                                <th >শতকরা হার (%)</th>
                                <th >পার্থক্য এর  কারণ</th>
                            </tr>
                            @foreach($fdFourOneFormExpenditorSector as $prokolpoAreaListAll)

                            <tr>

                                <td>{{ $prokolpoAreaListAll->expenditure_sectors }}</td>
                                <td>{{ $prokolpoAreaListAll->approved_budget_money }}</td>
                                <td>{{ $prokolpoAreaListAll->actual_cost }}</td>
                                <td>{{ $prokolpoAreaListAll->difference }} </td>
                                <td>{{ $prokolpoAreaListAll->percentage }} </td>
                                <td>{{ $prokolpoAreaListAll->reason_for_the_difference	 }} </td>
                            </tr>

                            @endforeach
                        </table>

                    </div>
                </div>
                <div class="card mt-5">
                    <div class="card-body">
                        <div class="form9_upper_box">
                            <h3>এফডি - ৪ ফরম </h3>
                            <h4>সিএ ফার্ম কতৃক প্রদেয় প্রত্যয়নপত্র</h4>
                        </div>
                        <table class="table table-borderless">
                            <tr>
                                <td>এনজিও'র নাম</td>
                                <td>: {{ $fdFourFormList->ngo_name }}</td>
                            </tr>
                            <tr>
                                <td>নিবন্ধন নম্বর</td>
                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFourFormList->registration_number) }}</td>
                            </tr>

                            <tr>
                                <td>টেলিফোন </td>
                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFourFormList->ngo_telephone) }}</td>
                            </tr>

                            <tr>
                                <td>ইমেইল ঠিকানা</td>
                                <td>: {{ $fdFourFormList->ngo_email }}</td>
                            </tr>
                            <tr>
                                <td>ওয়েবসাইট</td>
                                <td>: {{ $fdFourFormList->ngo_website }}</td>
                            </tr>
                            <tr>
                                <td>প্রকল্প নাম ও প্রকল্পের মেয়াদকাল</td>
                                <td>: {{ $fdFourFormList->prokolpo_name.' ও '.$fdFourFormList->prokolpo_duration_one }}</td>
                            </tr>

                            <tr>
                                <td>নিরীক্ষায় বিবেচ্য সময়কাল</td>
                                <td>: {{ $fdFourFormList->exam_time}}</td>
                            </tr>

                            <tr>
                                <td>বর্ষের প্রারম্ভিক জের</td>
                                <td>: {{ $fdFourFormList->start_balance}}</td>
                            </tr>

                            <tr>
                                <td>নিরীক্ষা বর্ষে গৃহীত বৈদেশিক অনুদান</td>
                                <td>: {{ $fdFourFormList->foreign_grant_taken_exam_year}}</td>
                            </tr>

                            <tr>
                                <td>নিরীক্ষা বর্ষে ব্যয়িত বৈদেশিক অনুদান</td>
                                <td>: {{ $fdFourFormList->foreign_grant_cost_exam_year}}</td>
                            </tr>

                            <tr>
                                <td>নিরীক্ষা বর্ষ শেষে অবশিষ্ট বৈদেশিক অনুদান</td>
                                <td>: {{ $fdFourFormList->foreign_grant_remaining_exam_year}}</td>
                            </tr>


                        </table>

                    </div>
                </div>

            </div>
        </div>

    </div>

</section>


@endsection

@section('script')
<script type="text/javascript">
    function editTag(id) {
        swal({
            title: '{{ trans('notification.success_one')}}',
            text: "{{ trans('notification.success_two')}}",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'হ্যাঁ, এটি পাঠান !',
            cancelButtonText: '{{ trans('notification.success_four')}}',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
        }).then((result) => {
            if (result.value) {


                event.preventDefault();
                document.getElementById('delete-form-'+id).submit();


            } else if (
                // Read more about handling dismissals
                result.dismiss === swal.DismissReason.cancel
            ) {
                swal(
                    '{{ trans('notification.success_five')}}',
                    'আপনার আবেদন পাঠানো হয়নি :)',
                    'error'
                )
            }
        })
    }
</script>

@endsection
