<!--modal-->
<div class="modal modal-xl fade" id="exampleModalSix"  aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <form action="{{ route('formNoFiveStepThreePost') }}" method="post" enctype="multipart/form-data" id="form"  data-parsley-validate="">
                            @csrf
                            <input type="hidden" class="form-control" value="{{ $decode_id }}" name="id"  id="decode_id">
                            <div class="row">



                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">কর্মকর্তা/কর্মচারীর নাম<span class="text-danger">*</span> </label>
                                    <input id="name_of_the_officer_depend_on_salary" name="name_of_the_officer_depend_on_salary" required type="text" class="form-control">
                                </div>


                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">কর্মকর্তা/কর্মচারীর জাতীয়তা<span class="text-danger">*</span> </label>
                                    <input id="nationality_of_the_officer_depend_on_salary" name="nationality_of_the_officer_depend_on_salary" required type="text" class="form-control">
                                </div>


                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">কর্মকর্তা/কর্মচারীর পদ<span class="text-danger">*</span> </label>
                                    <input id="designation_of_the_officer_depend_on_salary" name="designation_of_the_officer_depend_on_salary" required type="text" class="form-control">
                                </div>

                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">কর্মকর্তা/কর্মচারীর দায়িত্ব<span class="text-danger">*</span> </label>
                                    <input id="responsbility_of_the_officer_depend_on_salary" name="responsbility_of_the_officer_depend_on_salary" required type="text" class="form-control">
                                </div>


                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">কর্মকর্তা/কর্মচারীর শিক্ষাগত যোগ্যতা<span class="text-danger">*</span> </label>
                                    <input id="education_of_the_officer_depend_on_salary" name="education_of_the_officer_depend_on_salary" required type="text" class="form-control">
                                </div>


                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">কর্মকর্তা/কর্মচারীর অভিজ্ঞতা <span class="text-danger">*</span> </label>
                                    <input id="experience_of_the_officer_depend_on_salary" name="experience_of_the_officer_depend_on_salary" required type="text" class="form-control">
                                </div>

                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">কর্মকর্তা/কর্মচারীর বয়স <span class="text-danger">*</span> </label>
                                    <input id="age_of_the_officer_depend_on_salary" name="age_of_the_officer_depend_on_salary" required type="text" class="form-control">
                                </div>


                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">কর্মকর্তা/কর্মচারীর বেতন <span class="text-danger">*</span> </label>
                                    <input id="salary_of_the_officer_depend_on_salary" name="salary_of_the_officer_depend_on_salary" required type="text" class="form-control">
                                </div>

                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">কর্মকর্তা/কর্মচারীর অন্যান্য ভাতা/সুবিধাদি<span class="text-danger">*</span> </label>
                                    <input id="other_allowances_or_benefits_of_the_officer_depend_on_salary" name="other_allowances_or_benefits_of_the_officer_depend_on_salary" required type="text" class="form-control">
                                </div>

                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">কর্মকর্তা/কর্মচারীর সংস্থায় চাকুরীর মেয়াদ<span class="text-danger">*</span> </label>
                                    <input id="job_duration_of_the_officer_depend_on_salary" name="job_duration_of_the_officer_depend_on_salary" required type="text" class="form-control">
                                </div>

                                <div class="col-lg-12 col-sm-12 mb-3">
                                    <label for="" class="form-label">কর্মকর্তা/কর্মচারীর অন্য কোনো প্রকল্প থেকে/গৃহীত আর্থিক বা অন্যান্য সুবিধার বর্ণনা <span class="text-danger">*</span> </label>
                                    <input id="financial_benefit_received_from_any_other_scheme" name="financial_benefit_received_from_any_other_scheme" required type="text" class="form-control">
                                </div>

                                <div class="col-lg-12 col-sm-12 mb-3">
                                    <label for="" class="form-label">মন্তব্য</label>
                                    <textarea name="comment"  class="form-control" id="comment" placeholder=""></textarea>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-registration">জমা দিন</button>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<!-- end modal -->
