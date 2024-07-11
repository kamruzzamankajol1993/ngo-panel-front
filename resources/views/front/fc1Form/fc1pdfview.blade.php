<!DOCTYPE html>
<html>
<head>
    <title>এফসি - ১ ফরম</title>

    <style>

        body {
         /* font-family: 'bangla', sans-serif; */
            font-size: 14px;
            height: 11in;
            width: 8.5in;
        }
        table
        {
            width: 100%;
        }



        .pdf_header
        {
            width: 100%;
            text-align: center;
            margin-bottom: 20px;
        }

        .pdf_header h5
        {
            font-size: 20px;
            font-weight: bold;
            padding: 0;
            margin: 0;
        }

        .pdf_header p
        {
            font-size: 14px;
            line-height: 1.3;
            padding: 0;
            margin: 0;
        }
      table td
      {
        vertical-align: top;
      }
        .first_table
        {
            text-align: center;
            margin-bottom: 30px;
        }
        /* .bt
      	{
			font-family: 'banglabold', sans-serif;
		} */

        .number_section
        {
            width: 15px !important;
        }

      .padding-left
      {
        padding-left: 18px;
      }
      .custom_table_border
      {
        border-collapse: collapse;
        width: 100%;
      }
      .custom_table_border tr th,
      .custom_table_border tr td
            {
                border: 1px solid black;
                text-align: center;
            }
    </style>
</head>
<body>

    <div class="pdf_header">
        <h5>এফসি - ১ ফরম</h5>
        <p>এককালীন অনুদান গ্রহণের আবেদন ফরম</p>

    </div>

     <!-- step one start -->



     <div class="row">
        <div class="col-lg-12 col-sm-12">

            <table class="table table-borderless" style="width:100%">



                <tr>
                    <th style="font-weight:bold;">১. </th>
                    <td style="font-weight:bold;text-align:left;" colspan="2">সংস্থার নাম, ঠিকানা (ফোন ,মোবাইল, ইমেইল ও ওয়েবসাইটসহ) :</td>
                    <td style="">

                        {{ $fc1FormList->ngo_name }}, {{ $ngo_list_all->organization_address }}, {{ $ngo_list_all->tele_phone_number }}, {{ $ngo_list_all->phone }}, {{ $ngo_list_all->email }} ও {{$fc1FormList->ngo_website}}

                    </td>

                </tr>
              <!-- step one start  -->



                <!-- step two strat --->

                <tr>
                    <th style="text-align: center;" rowspan="4">২.</th>

                    <td style="font-weight:bold;text-align:left;" colspan="2">প্রকল্পের মেয়াদ</td>
                    <td></td>

                </tr>

                <tr>

                    <td style="text-align: center;">ক.</td>
                    <td> আরম্ভের তারিখ </td>
                    <td>{{ $fc1FormList->ngo_prokolpo_start_date }}</td>

                </tr>
                <tr>

                    <td style="text-align: center;">খ.</td>
                    <td>সমাপ্তির তারিখ</td>
                    <td>{{ $fc1FormList->ngo_prokolpo_end_date }}</td>

                </tr>

                <tr>

                    <td style="text-align: center;">গ.</td>
                    <td>প্রকল্পের ধরণ  </td>
                    <td>

                        <?php
                        $subjectIdList  = explode(",",$fc1FormList->subject_id);
                        $subjectListMain = DB::table('project_subjects')->whereIn('id',$subjectIdList)->select('name')
                        ->get();

                        ?>
                      @foreach($subjectListMain as $key=>$subjectListMains)

                    @if(count($subjectListMain) == 1 )

                    {{ $subjectListMains->name }}

                    @else

                    @if(count($subjectListMain) == ($key+1))
                    {{ $subjectListMains->name }}

                    @else

                    {{ $subjectListMains->name }},

                    @endif

                    @endif

                    @endforeach

                </td>

                </tr>





                <!-- step two end --->

                <!-- step three start -->

                <tr>
                    <th style="text-align: center;" rowspan="2">৩.</th>
                    <td style="font-weight:bold;" colspan="3">অনুদান গ্রহণের উদ্দেশ্য</td>


                </tr>
                <tr>
                    <td colspan="3">


                        {!! $fc1FormList->purpose_of_donation !!}




                           @if(empty($fc1FormList->purpose_of_donation_pdf))


                           @else


                           <?php

                           $file_path = url($fc1FormList->purpose_of_donation_pdf);
                           $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                           $extension = pathinfo($file_path, PATHINFO_EXTENSION);




                           ?>
                            <b>{{ $filename.'.'.$extension }}</b>
                            @endif
                    </td>
                </tr>
              <!-- step one start  -->

                <tr>
                    <th style="text-align: center;" rowspan="4">৪.</th>

                    <td style="font-weight:bold;" colspan="2">কর্ম এলাকা ও বাজেট</td>
                    <td></td>

                </tr>
                <tr>

                    {{-- <td style="text-align: center;">ক.</td> --}}
                    <td colspan="3" rowspan="3">

                        <div class="table-responsive" id="tableAjaxDatapro">

                            <table class="table table-bordered">

                                <tr style="text-align: center;">
                                    <th >ক. কর্ম এলাকা (জেলা ও উপজেলা উল্লেখসহ) </th>
                                    <th >খ. বিস্তারিত বাজেট বিবরণী (জেলা ও উপজেলাভিত্তিক ) </th>
                                    <th >গ. মোট উপকারভোগীর সংখ্যা</th>

                                </tr>

                                @foreach($prokolpoAreaList as $prokolpoAreaListAll)
                                <tr>
                                    <td><span>বিভাগ: {{ $prokolpoAreaListAll->division_name }}
                                        <br>

                                        জেলা: {{ $prokolpoAreaListAll->district_name }}
                                        <br>

                                        @if($prokolpoAreaListAll->city_corparation_name == 'অনুগ্রহ করে নির্বাচন করুন')

                                        @else
                                        সিটি কর্পোরেশন: {{ $prokolpoAreaListAll->city_corparation_name }}
                                        <br>
                                        @endif

                                        @if($prokolpoAreaListAll->upozila_name == 'অনুগ্রহ করে নির্বাচন করুন')

                                        @else
                                        উপজেলা: {{ $prokolpoAreaListAll->upozila_name }} <br>
                                        @endif

                                        থানা: {{ $prokolpoAreaListAll->thana_name }} <br>
                                        পৌরসভা: {{ $prokolpoAreaListAll->municipality_name }} <br>
                                        ওয়ার্ড: {{ $prokolpoAreaListAll->ward_name }}

                                    </span></td>
                                    <td><span>

                                        প্রকল্পের ধরণ: {{ DB::table('project_subjects')->where('id',$prokolpoAreaListAll->prokolpo_type)->value('name')}}
                                        <br>
                                        বরাদ্দকৃত বাজেট: {{ $prokolpoAreaListAll->allocated_budget }}
                                    </span>

                                        </td>
                                    <td>{{ $prokolpoAreaListAll->number_of_beneficiaries }}</td>

                                </tr>
                                @endforeach

                            </table>
                        </div>

            </td>


                </tr>
                <tr>
                </tr>

                <tr>
                </tr>

                <!-- step three end -->

                <!-- step four start --->

                <tr>
                    <th style="text-align: center;" rowspan="19">৫.</th>

                    <th style="" colspan="3">যে বৈদেশিক উৎস থেকে অনুদান গ্রহণ করা হবে তার বিবরণ</th>

                </tr>



                <tr >

                    <td style="text-align: center;">অ.</td>
                    <th>ব্যক্তির ক্ষেত্রে</th>
                    <td>

                    </td>

                </tr>

                <tr>

                    <td style="text-align: center;">ক.</td>
                    <td>পূর্ণ নাম </td>
                    <td>{{ $fc1FormList->foreigner_donor_full_name }}</td>

                </tr>

                <tr>

                    <td style="text-align: center;">খ.</td>
                    <td>পেশা </td>
                    <td>{{ $fc1FormList->foreigner_donor_occupation }}</td>

                </tr>

                <tr>

                    <td style="text-align: center;">গ.</td>
                    <td>যোগাযোগের ঠিকানা </td>
                    <td>{{ $fc1FormList->foreigner_donor_address }}</td>

                </tr>

                <tr>

                    <td style="text-align: center;">ঘ.</td>
                    <td>টেলিফোন, ফ্যাক্স ও ইমেইল নম্বর </td>
                    <td>

                            {{ $fc1FormList->foreigner_donor_telephone_number }}, {{ $fc1FormList->foreigner_donor_fax }} ও {{ $fc1FormList->foreigner_donor_email }}


                    </td>

                </tr>

                <tr>

                    <td style="text-align: center;">ঙ.</td>
                    <td>জাতীয়তা/নাগরিকত্ব </td>
                    <td>{{ $fc1FormList->foreigner_donor_nationality }}</td>

                </tr>

                <tr>

                    <td style="text-align: center;">চ.</td>
                    <td>মানিলন্ডারিং এবং সন্ত্রাসে অর্থায়ন প্রতিরোধে নিমিত্ত
                        United Nations Security Council’s Resolution (UNSCR)
                        কর্তৃক প্রকাশিত তালিকার সংগে দাতার তথ্য যাচাই করা হয়েছে কিনা </td>
                    <td>{{ $fc1FormList->foreigner_donor_is_verified }}</td>

                </tr>

                <tr>



                    <td style="text-align: center;">ছ.</td>
                    <td>উক্ত তালিকাভুক্ত ব্যক্তি/ ব্যক্তিবর্গ/ সংস্থার সাথে দাতার সংশ্লিষ্টতা আছে কিনা </td>
                    <td>{{ $fc1FormList->foreigner_donor_is_affiliatedrict }}</td>

                </tr>
                <tr>
                    <td style="text-align: center;"> আ.</td>
                <th>সংস্থার ক্ষেত্রে</th>
                <td>

                </td>

            </tr>

<tr>

                    <td style="text-align: center;">ক.</td>
                    <td>সংস্থার নাম </td>
                    <td>{{ $fc1FormList->organization_name }}</td>

                </tr>


                <tr>

                    <td style="text-align: center;">খ.</td>
                    <td>অফিস/ সংস্থার ঠিকানা </td>
                    <td>{{$fc1FormList->organization_address }}</td>

                </tr>

                <tr>

                    <td style="text-align: center;">গ.</td>
                    <td>টেলিফোন, ফ্যাক্স নম্বর </td>
                    <td>{{ $fc1FormList->organization_telephone_number }}, {{ $fc1FormList->organization_fax }}</td>

                </tr>

                <tr>

                    <td style="text-align: center;">ঘ.</td>
                    <td>ই-মেইল ও ওয়েবসাইট </td>
                    <td>{{ $fc1FormList->organization_email }} ও {{ $fc1FormList->organization_website }}</td>

                </tr>

                <tr>

                    <td style="text-align: center;">ঙ.</td>
                    <td>মানিলন্ডারিং এবং সন্ত্রাসে অর্থায়ন প্রতিরোধে নিমিত্ত
                        United Nations Security Council’s Resolution (UNSCR)
                        কর্তৃক প্রকাশিত তালিকার সংগে দাতার তথ্য যাচাই করা হয়েছে কিনা </td>
                    <td>
                        {{ $fc1FormList->organization_is_verified }}

                    </td>

                </tr>

                <tr>

                    <td style="text-align: center;">চ.</td>
                    <td>উক্ত তালিকাভুক্ত ব্যক্তি/ ব্যক্তিবর্গ/ সংস্থার সাথে দাতার সংশ্লিষ্টতা আছে কিনা </td>
                    <td>
                        {{ $fc1FormList->relation_with_donor }}

                    </td>

                </tr>

                <tr>



                    <td style="text-align: center;">ছ.</td>
                    <td>প্রধান নির্বাহী কর্মকর্তার নাম ও পদবি </td>
                    <td>
                       {{ $fc1FormList->organization_ceo_name }}
                       ও
                        {{ $fc1FormList->organization_ceo_designation }}

                    </td>

                </tr>


        <tr>
            <td style="text-align: center;">জ.</td>
                <td>বাংলাদেশের জন্য দায়িত্ব প্রাপ্ত নির্বাহীর নাম ও পদবি </td>
                <td>{{ $fc1FormList->organization_name_of_executive_responsible_for_bd }} ও {{ $fc1FormList->organization_name_of_executive_responsible_for_bd_designation }} </td>

            </tr>


            <tr>
                <td style="text-align: center;">ঝ.</td>
                    <td>সংস্থার উদ্দেশ্যসমূহ </td>
                    <td>{!! $fc1FormList->objectives_of_the_organization !!}</td>

                </tr>
                <!-- steap four end -->

                <!-- step five start -->

                <tr>
                    <th style="text-align: center;" rowspan="2">৬.</th>

                    <td style="font-weight:bold;" colspan="3">প্রতিশ্রতিপত্র আছে কি না <br> (কাজের নাম,অর্থের পরিমাণ ও মেয়াদকাল সুস্পষ্টভাবে উল্লেখপূর্বক কপি সংযুক্ত  করতে হবে)</td>


                </tr>

                <tr>


                    <td colspan="3">

                       {{ $fc1FormList->bond_paper_available_or_not }}, {{ $fc1FormList->bond_paper_work_name }}, {{ $fc1FormList->bond_paper_amount }}, {{ $fc1FormList->bond_paper_duration }}


<br>
                        @if(empty($fc1FormList->bond_paper_pdf))


                        @else


                        <?php

                        $file_path = url($fc1FormList->bond_paper_pdf);
                        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                        $extension = pathinfo($file_path, PATHINFO_EXTENSION);




                        ?>
                         <b>{{ $filename.'.'.$extension }}</b>
                         @endif

                    </td>

                </tr>

                <!-- step five end --->

                <!-- step six start -->

                <tr>
                    <th style="text-align: center;" rowspan="4">৭.</th>

                    <td style="font-weight:bold;" colspan="2">অনুদানের বিস্তারিত বিবরণ</td>
                    <td></td>

                </tr>

                <tr>

                    <td style="text-align: center;">ক.</td>
                    <td>  বৈদেশিক মুদ্রার পরিমান</td>
                    <td>{{$fc1FormList->organization_amount_of_foreign_currency }}</td>

                </tr>
                <tr>

                    <td style="text-align: center;">খ.</td>
                    <td>সমপরিমাণ বাংলাদেশী টাকা </td>
                    <td>{{ $fc1FormList->equivalent_amount_of_bd_taka }}</td>

                </tr>

                <tr>

                    <td style="text-align: center;">গ.</td>
                    <td>পণ্যসামগ্রী (বাংলাদেশী মুদ্রায় আনুমানিক মূল্য) </td>
                    <td>{{ $fc1FormList->commodities_value_in_bangladeshi_currency }}</td>

                </tr>

                <tr>
                    <th style="text-align: center;" rowspan="4">৮.</th>

                    <td style="font-weight:bold;" colspan="2">ব্যাংক সংক্রান্ত তথ্যাবলী</td>
                    <td></td>

                </tr>

                <tr>

                    <td style="text-align: center;">ক.</td>
                    <td>যে ব্যাংকের মাধ্যমে বৈদেশিক অনুদান গ্রহণ করতে ইচ্ছুক তার নাম ও ঠিকানা</td>
                    <td>
       {{ $fc1FormList->bank_name }} ও {{ $fc1FormList->bank_address }}

                    </td>

                </tr>
                <tr>

                    <td style="text-align: center;">খ.</td>
                    <td>ব্যাংক হিসাবের নাম</td>
                    <td>{{ $fc1FormList->bank_account_name }}</td>

                </tr>

                <tr>

                    <td style="text-align: center;">গ.</td>
                    <td>ব্যাংক হিসাব নম্বর</td>
                    <td>{{ $fc1FormList->bank_account_number }}</td>

                </tr>

                <!-- step six end -->

                <tr>
                    <th style="text-align: center;" rowspan="6">৯.</th>

                    <td style="font-weight:bold;" colspan="2"><span style="font-weight:bold;">বাজেট<br>
                        ক.খাতভিত্তিক ব্যয় বিভাজন </span></td>
                    <td></td>

                </tr>
                <tr>

                    {{-- <td style="text-align: center;">ক.</td> --}}
                    <td colspan="3" rowspan="3">

                        <div class="table-responsive" id="tableAjaxDatapro">

                            <table class="table table-bordered">
                                <tr style="text-align: center">
                                    <th>ক্র : নং :</th>
                                    <th>কার্যক্রম</th>
                                    <th>প্রাক্কলিত ব্যয় </th>
                                    <th>কর্ম এলাকা<br> (জেলা ,উপজেলা )</th>
                                    <th>সময়সীমা </th>
                                    <th>উপকারভোগীর সংখ্যা </th>

                                </tr>



                                <?php

                                $totalEstimatedExpense = 0;
                                $totalBenificiare = 0;

                                ?>

                                @foreach($sectorWiseExpenditureList as $key=>$sectorWiseExpenditureLists)


                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $sectorWiseExpenditureLists->activities }}</td>
                                    <td>{{ $sectorWiseExpenditureLists->estimated_expenses }}</td>
                                    <td>

                                        জেলা: {{ $sectorWiseExpenditureLists->work_area_district }}
                                        <br>


                                        উপজেলা: {{ $sectorWiseExpenditureLists->work_area_sub_district }}

                                    </td>
                                    <td>{{ $sectorWiseExpenditureLists->time_limit }}</td>
                                    <td>{{ $sectorWiseExpenditureLists->number_of_beneficiaries }}</td>


                                </tr>
                                <?php

                                $totalEstimatedExpense = $totalEstimatedExpense + $sectorWiseExpenditureLists->estimated_expenses;
                                $totalBenificiare = $totalBenificiare + $sectorWiseExpenditureLists->number_of_beneficiaries;

                                ?>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>মোট - {{ $totalEstimatedExpense }}</td>
                                    <td></td>
                                    <td></td>
                                    <td>মোট - {{ $totalBenificiare }}</td>

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

                    <td style="font-weight:bold;" colspan="2"><span style="font-weight:bold;">
                        খ.টেকসই উন্নয়ন অভিষ্ঠ (এসডিজি ) এর সাথে সম্পৃক্ততা</span></td>

                        <td></td>
                </tr>

                <tr>

                    <td colspan="3">

                        <div class="table-responsive" id="tableAjaxDataSDG">
                            <table class="table table-bordered">
                                <tr style="text-align: center">
                                    <th>অভিষ্ঠ(Goal)</th>
                                    <th>লক্ষ্যমাত্রা(Target)</th>
                                    <th>বাজেট বরাদ্দ </th>
                                    <th>যৌক্তিকতা </th>
                                    <th>মন্তব্য</th>

                                </tr>
                            @foreach($SDGDevelopmentGoal as $SDGDevelopmentGoals)
                                <tr>
                                    <td>{{ $SDGDevelopmentGoals->goal }}</td>
                                    <td>{{ $SDGDevelopmentGoals->target }}</td>
                                    <td>{{ $SDGDevelopmentGoals->budget_allocation }}</td>
                                    <td>{{ $SDGDevelopmentGoals->rationality }}</td>
                                    <td>{{ $SDGDevelopmentGoals->comment }}</td>

                                </tr>
                                @endforeach


                            </table>

                        </div>
                    </td>

                </tr>




                <!-- step three end -->

                <tr>
                    <th style="text-align: center;" rowspan="4">১০.</th>

                    <td style="font-weight:bold;" colspan="2">ইতোপূর্বে গৃহীত অনুদানের বিবরণ</td>
                    <td></td>

                </tr>
                <tr>

                    {{-- <td style="text-align: center;">ক.</td> --}}
                    <td colspan="3" rowspan="3">

                        <div class="table-responsive" id="tableAjaxDataDOnor">

                            <table class="table table-bordered">
                                <tr style="text-align: center">
                                    <th >ক্র : নং :</th>
                                    <th >উদ্দেশ্য / কার্যক্রম</th>
                                    <th >এনজিও বিষয়ক ব্যুরো কর্তৃক অনুমোদনের স্বারক নম্বর ও তারিখ</th>
                                    <th >দাতা সংস্থার নাম</th>
                                    <th >টাকার পরিমাণ </th>
                                    <th >অডিট রিপোর্ট দাখিল এবং ব্যুরো কতৃক গৃহীত হয়েছে কিনা</th>
                                    <th >সমাপ্তি প্রতিবেদন দাখিল করা হয়েছে কিনা?</th>
                                    <th >স্থানীয়  প্রশাসনের প্রত্যয়ন পত্র দাখিল করা হয়েছে কিনা ?</th>
                                    <th >মন্তব্য</th>

                                </tr>

                                @foreach ($donationList as $key=>$donationLists)
                                <tr>

                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $donationLists->purpose_or_activities }}</td>
                                    <td>{{ $donationLists->registration_sarok_number }} ও {{ $donationLists->registration_date }}</td>

                                    <td>{{ $donationLists->donor_name }}</td>
                                    <td>{{ $donationLists->money_amount }}</td>
                                    <td>{{ $donationLists->audit_report }}</td>
                                    <td>{{ $donationLists->final_report }}</td>
                                    <td>{{ $donationLists->local_certificate }}</td>
                                    <td>{{ $donationLists->comment }}</td>


                                </tr>
                                @endforeach


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

                      @if(count($fc1OtherFileList) == 0)


                      @else


                          <div class="table-respnsive">
                              <table class="table table-bordered">
                                  @foreach($fc1OtherFileList as $key=>$fd2OtherInfoAll)
                                  <tr>
                                      <td>{{ $fd2OtherInfoAll->file_title }}</td>
                                      <td>

                                          <a target="_blank" href="{{ route('fcOneOtherPdfListdownload',$fd2OtherInfoAll->id) }}" class="btn btn-custom next_button btn-sm" >
                                          <i class="fa fa-download" aria-hidden="true"></i>
                                      </a>





                                  </td>
                                  </tr>
                                  @endforeach

                              </table>
                          </div>

                      @endif


          </td>


              </tr>

              <tr>

              </tr>
              <tr>

              </tr>


                <!-- step three end -->

                <tr>
                    <td colspan="4"><span style="font-weight:bold;">সংযুক্তি:</span></td>
                </tr>
                <tr>
                    <td colspan="3"><span style="font-weight:bold;">১। দাতার প্রতিশ্রুতি পত্র/দাতা সংস্থার প্রতিশ্রুতি পত্র</span></td>
                    <td> @if(empty($fc1FormList->donor_commitment_letter))


                        @else


                        <?php

                        $file_path = url($fc1FormList->donor_commitment_letter);
                        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                        $extension = pathinfo($file_path, PATHINFO_EXTENSION);




                        ?>
                         <b>{{ $filename.'.'.$extension }}</b>
                         @endif

                         @if(empty($fc1FormList->donor_agency_commitment_letter))


                         @else


                         <?php

                         $file_path = url($fc1FormList->donor_agency_commitment_letter);
                         $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                         $extension = pathinfo($file_path, PATHINFO_EXTENSION);




                         ?>
                          <b>{{ $filename.'.'.$extension }}</b>
                          @endif
                        </td>
                </tr>

                <tr>
                    <td colspan="3"><span style="font-weight:bold;">২। ইতোপূর্বে সমাপ্ত প্রকল্পের অডিট রিপোর্ট ব্যুরো হতে গ্রহণের প্রমাণক, সমাপনী প্রতিবেদন, প্রশাসনিক প্রত্যয়নপত্র</span></td>
                    <td>        @if(empty($fc1FormList->previous_audit_report))


                        @else


                        <?php

                        $file_path = url($fc1FormList->previous_audit_report);
                        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                        $extension = pathinfo($file_path, PATHINFO_EXTENSION);




                        ?>
                         <b>{{ $filename.'.'.$extension }}</b>
                         @endif

                         @if(empty($fc1FormList->last_final_report))


                         @else


                         <?php

                         $file_path = url($fc1FormList->last_final_report);
                         $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                         $extension = pathinfo($file_path, PATHINFO_EXTENSION);




                         ?>
                          <b>{{ $filename.'.'.$extension }}</b>
                          @endif

                          @if(empty($fc1FormList->administrative_certificate))


                                   @else


                                   <?php

                                   $file_path = url($fc1FormList->administrative_certificate);
                                   $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                   $extension = pathinfo($file_path, PATHINFO_EXTENSION);




                                   ?>
                                    <b>{{ $filename.'.'.$extension }}</b>
                                    @endif
                        </td>
                </tr>

            </table>

        <!-- end new code --->
        <h4 style="text-align:center; font-weight:bold; font-size:20px;">{{ trans('fd_one_step_one.tt_1')}}</h4>
        <p style="text-align: justify">আমি এই মর্মে ঘোষণা করছি যে, উপরোক্ত বিবরণ সত্য ও সঠিক । আমি স্থানীয় প্রশাসনকে ত্রাণ কার্যক্রম এবং কর্ম এলাকা  সম্পর্কে অবহিত করে এবং স্থানীয় প্রশাসনের সাথে কার্যক্রম সমন্বয় করে কার্যক্রমের দ্বৈততা পরিহার করিব । আমি কার্যক্রম সম্পন্ন হওয়ার ০২ (দুই) মাসের মধ্যে কার্যক্রম সমাপনী প্রতিবেদন সংশ্লিষ্ট সকলকে অবহিত করিব। </p>

        <table style=" margin-top: 15px;width:100%">

            <tr>
                <td style="text-align: right; padding-right: 14%" colspan="3"><img width="150" height="60" src="{{ asset('/') }}{{ $fc1FormList->digital_signature}}"/></td>
            </tr>
            <tr>
                <td style="text-align: right; padding-right: 14%" colspan="3"><img width="150" height="60" src="{{ asset('/') }}{{ $fc1FormList->digital_seal}}"/></td>
            </tr>
        </table>


        <table style=" margin-top: 10px;width:100%">
            <tr>
                <td style="text-align: right; padding-right: 17%" colspan="3">{{ trans('fd_one_step_one.tt_4')}}</td>
            </tr>
            <tr>
                <td style="width: 65%"></td>
                <td style="text-align: left; width:5%;">{{ trans('fd_one_step_one.tt_5')}}</td>
                <td style="width:30%; text-align: left;">: {{ $fc1FormList->chief_name }}</td>
            </tr>
            <tr>
                <td style="width: 65%"></td>
                <td style="text-align: left; width: 5%;">{{ trans('fd_one_step_one.tt_6')}}</td>
                <td style="width:30%; text-align: left;">: {{ $fc1FormList->chief_desi }}</td>
            </tr>

            <tr>
                <td style="width: 65%"></td>
                <td style="text-align: left; width: 5%;">{{ trans('fd_one_step_one.tt_7')}}</td>

                <td style="width:30%; text-align: left;">: {{  App\Http\Controllers\NGO\CommonController::englishToBangla($fc1FormList->created_at->format('d/m/Y')) }}</td>

            </tr>
        </table>

    </div>
    </div>
    <!-- step one end --->


</body>
</html>
