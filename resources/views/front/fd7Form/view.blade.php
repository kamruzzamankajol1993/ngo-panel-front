@extends('front.master.master')

@section('title')
{{ trans('fd9.fd7')}} | {{ trans('header.ngo_ab')}}
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
                                <p class="{{ Route::is('fd6Form.index') ||  Route::is('fd6Form.create') || Route::is('fd6Form.show') || Route::is('fd2Form.create') || Route::is('fd2Form.index') || Route::is('fd6Form.edit') || Route::is('fd2Form.view') || Route::is('fd2Form.edit')? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd6')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('fd7Form.index') }}">
                                <p class="{{ Route::is('fd7Form.index') ||  Route::is('fd7Form.create') || Route::is('fd7Form.show') || Route::is('addFd2DetailForFd7') || Route::is('editFd2DetailForFd7') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd7')}}</p>
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

                            <!-- new code start --->

                  <div class="d-flex justify-content-between mt-3">
                    <div class="">


                    </div>
                    <div class="">



                        @if($fd7FormList->status == 'Ongoing' || $fd7FormList->status == 'Accepted')

                                        @else



                        <button class="btn btn-primary" onclick="location.href = '{{ route('fd7Form.edit',base64_encode($fd7FormList->id)) }}';" data-toggle="tooltip" data-placement="top" title="{{ trans('message.update')}}"><i class="fa fa-edit"></i></button>
                        @endif


                    </div>
                </div>

                <!-- new code end -->

                        <div class="form9_upper_box">
                            <h3>এফডি-৭ ফরম</h3>
                            <h4>দুর্যোগকালীন ও দুর্যোগ পরবর্তী জরুরি ত্রাণ সহায়তা কার্যক্রম/ প্রকল্প প্রস্তাব ফরম</h4>
                        </div>
                        <table class="table table-bordered">
                            <tr>
                                <td>এনজিও'র নাম</td>
                                <td>: {{ $fd7FormList->ngo_name }}</td>
                            </tr>
                            <tr>
                                <td>ঠিকানা</td>
                                <td>: {{ $fd7FormList->ngo_address }}</td>
                            </tr>

                            <tr>
                                <td>নিবন্ধন নম্বর</td>
                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd7FormList->ngo_registration_number) }}</td>
                            </tr>
                            <tr>
                                <td>ব্যুরোর নিবন্ধন তারিখ </td>
                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd7FormList->ngo_registration_date) }}</td>
                            </tr>
                            <tr>
                                <td>প্রস্তাবিত প্রকল্পের নাম</td>
                                <td>: {{ $fd7FormList->ngo_prokolpo_name }}</td>
                            </tr>

                        </table>

                        <div class="form9_upper_box">
                            <h3>অর্থ বা ত্রাণ-সামগ্রীর উৎস <br>
                                দাতা সংস্থার প্রতিশ্রুতিপত্র</h3>
                        </div>

                        <table class="table table-bordered">
                            <tr>
                                <td>দাতা সংস্থার বিবরণ</td>
                                <td>: {{ $fd7FormList->donor_organization_description }}</td>
                            </tr>
                            <tr>
                                <td>প্রধান নির্বাহী কর্মকর্তা/ দাতা</td>
                                <td>: {{ $fd7FormList->donor_organization_chief_type }}</td>
                            </tr>

                            <tr>
                                <td>নাম</td>
                                <td>: {{ $fd7FormList->donor_organization_chief_name }}</td>
                            </tr>
                            <tr>
                                <td>দাতা সংস্থার নাম</td>
                                <td>: {{ $fd7FormList->donor_organization_name }}</td>
                            </tr>
                            <tr>
                                <td>যোগাযোগগের ঠিকানা</td>
                                <td>: {{ $fd7FormList->donor_organization_address }}</td>
                            </tr>

                            <tr>
                                <td>টেলিফোন</td>
                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd7FormList->donor_organization_phone) }}</td>
                            </tr>


                            <tr>
                                <td>ইমেইল</td>
                                <td>: {{ $fd7FormList->donor_organization_email }}</td>
                            </tr>

                            <tr>
                                <td>ওয়েবসাইট</td>
                                <td>: {{ $fd7FormList->donor_organization_website }}</td>
                            </tr>

                        </table>

                        <div class="form9_upper_box">
                            <h3>দাতা সংস্থার প্রতিশ্রুতিপত্র</h3>
                        </div>

                        <table class="table table-bordered">
                            <tr>
                                <td>চলমান প্রকল্পের নাম</td>
                                <td>: {{ $fd7FormList->ongoing_prokolpo_name }}</td>
                            </tr>
                            <tr>
                                <td>মোট ব্যায়</td>
                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd7FormList->total_prokolpo_cost) }}</td>
                            </tr>

                            <tr>
                                <td>ব্যুরোর অনুমোদনের তারিখ</td>
                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd7FormList->date_of_bureau_approval) }}</td>
                            </tr>
                            <tr>
                                <td>অনুমোদনপত্র সংযুক্ত করতে হবে</td>
                                <td>:<a href="{{ route('authorizationLetter',$fd7FormList->id) }}" target="_blank" class="btn btn-success">View</a></td>
                            </tr>
                            <tr>
                                <td>মূল প্রকল্পের শতকরা কতভাগ এই প্রকল্পের ব্যায় করা হয়</td>
                                <td>: {{ $fd7FormList->percentage_of_the_original_project }}</td>
                            </tr>

                            <tr>
                                <td>চলমান প্রকল্পের উপর কোন বিরূপ প্রভাব ফেলবে কি না</td>
                                <td>: {{ $fd7FormList->adverse_impact_on_the_ongoing_project }}</td>
                            </tr>


                            <tr>
                                <td>দাতা সংস্থার প্রতিশ্রুতিপত্র (কপি সংযুক্ত করতে হবে)</td>
                                <td>:<a href="{{ route('letterFromDonorAgency',$fd7FormList->id) }}" target="_blank" class="btn btn-success">View</a></td>
                            </tr>



                        </table>


                        <div class="form9_upper_box">
                            <h3>প্রকল্প এলাকা</h3>
                        </div>
                        <table class="table table-bordered">
                            <tr>
                                <th>বিভাগ</th>
                                <th>জেলা/সিটি কর্পোরেশন</th>
                                <th>উপজেলা/থানা/পৌরসভা/ওয়ার্ড</th>
                                <th>প্রকল্পের ধরণ</th>
                                <th>বরাদ্দকৃত বাজেট</th>
                                <th>মোট উপকারভোগীর সংখ্যা</th>
                            </tr>
                            @foreach($prokolpoAreaList as $prokolpoAreaListAll)
                          @include('front.include.globalTableView')
                            @endforeach
                        </table>

                        <div class="form9_upper_box">
                            <h3>কার্যক্রমের মেয়াদকাল</h3>
                        </div>


                        <table class="table table-bordered">
                            <tr>
                                <td>আরম্ভের তারিখ</td>
                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd7FormList->ngo_prokolpo_start_date) }}</td>
                            </tr>
                            <tr>
                                <td>সমাপ্তির তারিখ</td>
                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd7FormList->ngo_prokolpo_end_date) }}</td>
                            </tr>

                        </table>


                        <table class="table table-bordered">
                            <tr>
                                <td>দুর্যোগকালীন ও দুর্যোগ পরবর্তী জরুরি ত্রাণ সহায়তা কার্যক্রম/ প্রকল্প প্রস্তাব ফরম পিডিএফ /এফডি -৭ ফরম </td>
                                <td>: <a href="{{ route('reliefAssistanceProjectProposalPdf',$fd7FormList->id) }}" target="_blank" class="btn btn-success">View</a></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="card mt-5">
                    <div class="card-body">
                        <div class="form9_upper_box">
                            <h3>এফডি -২ ফরম</h3>
                            <h4>অর্থছাড়ের আবেদন ফরম</h4>
                        </div>
                        <table class="table table-borderless">
                            <tr>
                                <td>সংস্থার নাম</td>
                                <td>: {{ $fd2FormList->ngo_name }}</td>
                            </tr>
                            <tr>
                                <td>সংস্থার ঠিকানা</td>
                                <td>: {{ $fd2FormList->ngo_address }}</td>
                            </tr>
                            <tr>
                                <td>প্রকল্প নাম</td>
                                <td>: {{ $fd2FormList->ngo_prokolpo_name }}</td>
                            </tr>
                            <?php
                            $subjectIdList  = explode(",",$fd7FormList->subject_id);
                            $subjectListMain = DB::table('project_subjects')->whereIn('id',$subjectIdList)->select('name')
                            ->get();

                            ?>
                            <tr>
                                <td>প্রকল্পের বিষয়</td>
                                <td>:
                                     @foreach($subjectListMain as $key=>$subjectListMains)

                                     @if(count($subjectListMain) == 1 )

                                     {{ $subjectListMains->name }}

                                     @else

                                     @if(count($subjectListMain) == ($key+1))
                                     {{ $subjectListMains->name }} |

                                     @else

                                     {{ $subjectListMains->name }},

                                     @endif

                                     @endif

                                     @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td>কোন দেশীয় সংস্থা</td>
                                <td>: {{ $ngo_list_all->country_of_origin }}</td>
                            </tr>
                            <tr>
                                <td>প্রকল্প মেয়াদ </td>
                                <td>: {{ $fd2FormList->ngo_prokolpo_duration }}</td>
                            </tr>
                            <tr>
                                <td>আরম্ভের তারিখ </td>
                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2FormList->ngo_prokolpo_start_date) }}</td>
                            </tr>
                            <tr>
                                <td>সমাপ্তির তারিখ </td>
                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2FormList->ngo_prokolpo_end_date) }}</td>
                            </tr>
                            <tr>
                                <td>প্রস্তাবিত অর্থছাড়ের পরিমান (বাংলাদেশী টাকা )</td>
                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2FormList->proposed_rebate_amount_bangladeshi_taka) }}</td>
                            </tr>
                            <tr>
                                <td>প্রস্তাবিত অর্থছাড়ের পরিমান (বৈদেশিক মুদ্রায় )</td>
                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2FormList->proposed_rebate_amount_in_foreign_currency) }}</td>
                            </tr>
                            <tr>
                                <td>এফডি ২ ফর্ম আপলোড </td>
                                <td><a href="{{ route('downloadFd2DetailForFd7',$fd2FormList->id) }}" target="_blank" class="btn btn-success">View</a></td>
                            </tr>
                        </table>
                        <table class="table table-bordered">
                            <tr>
                                <th>ফাইলের নাম</th>
                                <th>ফাইল</th>
                            </tr>
                            @foreach($fd2OtherInfo as $fd2OtherInfoAll)
                            <tr>
                                <td>{{ $fd2OtherInfoAll->file_name }}</td>
                                <td><a href="{{ route('downloadFd2DetailForFd7Other',$fd2OtherInfoAll->id) }}" target="_blank" class="btn btn-success">View</a></td>
                            </tr>
                            @endforeach

                        </table>
                    </div>
                </div>

            </div>

             <!-- new code start --->

             <div class="d-flex justify-content-between mt-3">
                <div class="">


                </div>
                <div class="">



                    @if($fd7FormList->status == 'Ongoing' || $fd7FormList->status == 'Accepted')

                                    @else

                                    <button type="button" data-toggle="tooltip" data-placement="top" title="আবেদন এনজিওতে পাঠান" onclick="editTag({{ $fd7FormList->id}})" class="btn btn-info">
                                        এনজিওতে পাঠান <i class="fa fa-send-o"></i>
                                    </button>

                                        <form id="delete-form-{{ $fd7FormList->id }}" action="{{ route('finalFdSevenApplicationSubmit',base64_encode($fd7FormList->id)) }}" method="get" style="display: none;">

                                            @csrf


                                        </form>


                    @endif


                </div>
            </div>

            <!-- new code end -->
        </div>

    </div>

</section>


@endsection
@section('script')
<script type="text/javascript">
    function editTag(id) {
        swal({
            title: 'আপনি কি ফর্ম সাবমিট করতে চাচ্ছেন?',
            text: "সাবমিট বাটনে ক্লিক করলে, আর তথ্য সংশোধন করবেন না। আপনি কি রাজি?",
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
