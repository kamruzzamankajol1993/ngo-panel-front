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
                        <form action="{{ route('formNoFiveStepTwoPost') }}" method="post" enctype="multipart/form-data" id="form"  data-parsley-validate="">
                            @csrf
                            <input type="hidden" class="form-control" value="{{ $decode_id }}" name="id"  id="">
                            <div class="row">
                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">এনেক্সার - সি এর খাত<span class="text-danger">*</span> </label>
                                    <input name="staff_name" required type="text" class="form-control" id="">
                                </div>
                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">খাত ওয়ারী বাজেট<span class="text-danger">*</span> </label>
                                    <input name="staff_position" required type="text" class="form-control" id="">
                                </div>
                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">কার্যক্রম ও লক্ষ্যমাত্রা<span class="text-danger">*</span> </label>
                                    <input name="staff_address" required type="text" class="form-control" id="">
                                </div>

                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">কার্যক্রম ওয়ারী বিভাজিত বাজেট<span class="text-danger">*</span> </label>
                                    <input name="date_of_join" required type="text" class="form-control">
                                </div>

                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">কার্যক্রম ভিত্তিক অর্জিত লক্ষ্যমাত্রা<span class="text-danger">*</span> </label>
                                    <input type="text" name="other_occupation" required class="form-control" id="" placeholder="">
                                </div>

                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">কার্যক্রম ভিত্তিক প্রকৃত ব্যয়<span class="text-danger">*</span> </label>
                                    <input type="text" name="other_occupation" required class="form-control" id="" placeholder="">
                                </div>

                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">খাতওয়ারী মোট  প্রকৃত ব্যয়<span class="text-danger">*</span> </label>
                                    <input type="text" name="other_occupation" required class="form-control" id="" placeholder="">
                                </div>


                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">প্রতিবেদনকাল পর্যন্ত পুঞ্জীভূত অগ্রগতি বাস্তব<span class="text-danger">*</span> </label>
                                    <input type="text" name="other_occupation" required class="form-control" id="" placeholder="">
                                </div>

                                <div class="col-lg-12 col-sm-12 mb-3">
                                    <label for="" class="form-label">প্রতিবেদনকাল পর্যন্ত পুঞ্জীভূত অগ্রগতি আর্থিক<span class="text-danger">*</span> </label>
                                    <input type="text" name="other_occupation" required class="form-control" id="" placeholder="">
                                </div>


                                <div class="col-lg-12 col-sm-12 mb-3">
                                    <label for="" class="form-label">মন্তব্য</label>
                                    <textarea name="other_occupation"  class="form-control" id="" placeholder=""></textarea>
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
