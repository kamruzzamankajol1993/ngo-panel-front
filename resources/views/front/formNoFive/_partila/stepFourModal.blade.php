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

                                <div class="col-lg-12 col-sm-12 mb-3">
                                    <label for="" class="form-label">সম্পদ / সম্পত্তির বিবরণ<span class="text-danger">*</span> </label>
                                    {{-- <textarea name="other_occupation"  class="form-control" id="" placeholder=""></textarea> --}}

                                    <select name="date_of_join" required type="text" class="form-control" id="wealth_descrip">
                                        <option value="">--- অনুগ্রহ করে নির্বাচন করুন ---</option>
                                        <option value="স্থাবর">স্থাবর</option>
                                        <option value="অস্থাবর">অস্থাবর</option>
                                    </select>


                                </div>

                                <div class="col-lg-12 col-sm-12 mb-3" id="secondWealth">

                                </div>

                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">পরিমাণ /সংখ্যা<span class="text-danger">*</span> </label>
                                    <input name="date_of_join" required type="text" class="form-control">
                                </div>


                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">প্রাপ্তি/সংগ্রহের তারিখ <span class="text-danger">*</span> </label>
                                    <input name="date_of_join" required type="text" class="form-control datepickerOne">
                                </div>


                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">প্রকৃত ক্রয় মূল্য<span class="text-danger">*</span> </label>
                                    <input name="date_of_join" required type="text" class="form-control">
                                </div>

                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">অর্থের উৎস<span class="text-danger">*</span> </label>
                                    <input name="date_of_join" required type="text" class="form-control">
                                </div>


                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">কি কাজে ব্যবহৃত হতেছে<span class="text-danger">*</span> </label>
                                    <input name="date_of_join" required type="text" class="form-control">
                                </div>


                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">অবস্থান(স্থান)<span class="text-danger">*</span> </label>
                                    <input name="date_of_join" required type="text" class="form-control">
                                </div>

                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">বিক্রিত স্থান্তরিত সম্পদ (সংখ্যা /পরিমাণ )<span class="text-danger">*</span> </label>
                                    <input name="date_of_join" required type="text" class="form-control">
                                </div>




                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">সংস্থার শুরু হতে প্রতিবেদনকাল পর্যন্ত ক্রম পুঞ্জীভূত (সংখ্যা /পরিমাণ )<span class="text-danger">*</span> </label>
                                    <input name="date_of_join" required type="text" class="form-control">
                                </div>

                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">সংস্থার শুরু হতে প্রতিবেদনকাল পর্যন্ত ক্রম পুঞ্জীভূত সর্বমোট ক্রয়মূল্য<span class="text-danger">*</span> </label>
                                    <input name="date_of_join" required type="text" class="form-control">
                                </div>

                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">বর্তমান অবস্থা <span class="text-danger">*</span> </label>
                                    <select name="date_of_join" required type="text" class="form-control">
                                        <option value="সচল" selected>সচল</option>
                                        <option value="অচল">অচল</option>
                                    </select>
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
