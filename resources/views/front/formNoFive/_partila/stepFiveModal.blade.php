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

                            <input type="hidden" class="form-control" value="{{ $decode_id }}" name="id"  id="decode_id">
                            <div class="row">



                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">কর্মকর্তা কর্মচারীর নাম<span class="text-danger">*</span> </label>
                                    <input id="name_of_the_officer" name="name_of_the_officer" required type="text" class="form-control">
                                </div>


                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">কর্মকর্তা কর্মচারীর পদবি<span class="text-danger">*</span> </label>
                                    <input id="designation_of_the_officer" name="designation_of_the_officer" required type="text" class="form-control">
                                </div>


                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">যোগদানের তারিখ<span class="text-danger">*</span> </label>
                                    <input id="joining_date" name="joining_date" required type="text" class="form-control datepickerOne">
                                </div>

                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">যে দেশ ভ্রমণ করেছে তার নাম<span class="text-danger">*</span> </label>
                                    <input id="travel_country" name="travel_country" required type="text" class="form-control">
                                </div>


                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">সভা, প্রশিক্ষণ সেমিনার আয়োজনকারী প্রতিষ্ঠানের নাম <span class="text-danger">*</span> </label>
                                    <input id="organizing_organization_name" name="organizing_organization_name" required type="text" class="form-control">
                                </div>


                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">সভা, প্রশিক্ষণ সেমিনার আয়োজনকারী প্রতিষ্ঠানের ঠিকানা<span class="text-danger">*</span> </label>
                                    <input id="organizing_organization_address" name="organizing_organization_address" required type="text" class="form-control">
                                </div>

                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">প্রশিক্ষণ কোর্সের নাম <span class="text-danger">*</span> </label>
                                    <input id="name_of_training_course" name="name_of_training_course" required type="text" class="form-control">
                                </div>


                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">কোর্সের মেয়াদ <span class="text-danger">*</span> </label>
                                    <input id="course_duration" name="course_duration" required type="text" class="form-control">
                                </div>

                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">মোট ব্যয়<span class="text-danger">*</span> </label>
                                    <input id="total_expense" name="total_expense" required type="text" class="form-control">
                                </div>

                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">ব্যয়ের উৎস (দাতা সংস্থার নাম)<span class="text-danger">*</span> </label>
                                    <input id="name_of_donor_organization" name="name_of_donor_organization" required type="text" class="form-control">
                                </div>

                                <div class="col-lg-12 col-sm-12 mb-3">
                                    <label for="" class="form-label">ব্যয়ের উৎস (দাতা সংস্থার দেশ)<span class="text-danger">*</span> </label>
                                    <input id="country_name_of_donor_organization" name="country_name_of_donor_organization" required type="text" class="form-control">
                                </div>

                            </div>
                            <button id="stepFiveAjax"  class="btn btn-registration">জমা দিন</button>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<!-- end modal -->
