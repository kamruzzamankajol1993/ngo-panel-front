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
                        <form action="{{ route('formNoFiveStepThreePost') }}" method="post" enctype="multipart/form-data" id="form"  data-parsley-validate="">
                            @csrf
                            <input type="hidden" class="form-control" value="{{ $decode_id }}" name="id"  id="">
                            <div class="row">



                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">কর্মকর্তা কর্মচারীর নাম<span class="text-danger">*</span> </label>
                                    <input name="date_of_join" required type="text" class="form-control">
                                </div>


                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">কর্মকর্তা কর্মচারীর পদবি<span class="text-danger">*</span> </label>
                                    <input name="date_of_join" required type="text" class="form-control">
                                </div>


                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">যোগদানের তারিখ<span class="text-danger">*</span> </label>
                                    <input name="date_of_join" required type="text" class="form-control datepickerOne">
                                </div>

                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">যে দেশ ভ্রমণ করেছে তার নাম<span class="text-danger">*</span> </label>
                                    <input name="date_of_join" required type="text" class="form-control">
                                </div>


                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">সভা, প্রশিক্ষণ সেমিনার আয়োজনকারী প্রতিষ্ঠানের নাম <span class="text-danger">*</span> </label>
                                    <input name="date_of_join" required type="text" class="form-control">
                                </div>


                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">সভা, প্রশিক্ষণ সেমিনার আয়োজনকারী প্রতিষ্ঠানের ঠিকানা<span class="text-danger">*</span> </label>
                                    <input name="date_of_join" required type="text" class="form-control">
                                </div>

                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">প্রশিক্ষণ কোর্সের নাম <span class="text-danger">*</span> </label>
                                    <input name="date_of_join" required type="text" class="form-control">
                                </div>


                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">কোর্সের মেয়াদ <span class="text-danger">*</span> </label>
                                    <input name="date_of_join" required type="text" class="form-control">
                                </div>

                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">মোট ব্যয়<span class="text-danger">*</span> </label>
                                    <input name="date_of_join" required type="text" class="form-control">
                                </div>

                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">ব্যয়ের উৎস (দাতা সংস্থার নাম)<span class="text-danger">*</span> </label>
                                    <input name="date_of_join" required type="text" class="form-control">
                                </div>

                                <div class="col-lg-12 col-sm-12 mb-3">
                                    <label for="" class="form-label">ব্যয়ের উৎস (দাতা সংস্থার দেশ)<span class="text-danger">*</span> </label>
                                    <input name="date_of_join" required type="text" class="form-control">
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
