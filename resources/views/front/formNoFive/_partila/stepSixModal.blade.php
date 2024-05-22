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
                            <input type="hidden" class="form-control" value="{{ $decode_id }}" name="id"  id="">
                            <div class="row">



                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">কর্মকর্তা/কর্মচারীর নাম<span class="text-danger">*</span> </label>
                                    <input name="date_of_join" required type="text" class="form-control">
                                </div>


                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">কর্মকর্তা/কর্মচারীর জাতীয়তা<span class="text-danger">*</span> </label>
                                    <input name="date_of_join" required type="text" class="form-control">
                                </div>


                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">কর্মকর্তা/কর্মচারীর পদ<span class="text-danger">*</span> </label>
                                    <input name="date_of_join" required type="text" class="form-control datepickerOne">
                                </div>

                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">কর্মকর্তা/কর্মচারীর দায়িত্ব<span class="text-danger">*</span> </label>
                                    <input name="date_of_join" required type="text" class="form-control">
                                </div>


                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">কর্মকর্তা/কর্মচারীর শিক্ষাগত যোগ্যতা<span class="text-danger">*</span> </label>
                                    <input name="date_of_join" required type="text" class="form-control">
                                </div>


                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">কর্মকর্তা/কর্মচারীর অভিজ্ঞতা <span class="text-danger">*</span> </label>
                                    <input name="date_of_join" required type="text" class="form-control">
                                </div>

                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">কর্মকর্তা/কর্মচারীর বয়স <span class="text-danger">*</span> </label>
                                    <input name="date_of_join" required type="text" class="form-control">
                                </div>


                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">কর্মকর্তা/কর্মচারীর বেতন <span class="text-danger">*</span> </label>
                                    <input name="date_of_join" required type="text" class="form-control">
                                </div>

                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">কর্মকর্তা/কর্মচারীর অন্যান্য ভাতা/সুবিধাদি<span class="text-danger">*</span> </label>
                                    <input name="date_of_join" required type="text" class="form-control">
                                </div>

                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <label for="" class="form-label">কর্মকর্তা/কর্মচারীর সংস্থায় চাকুরীর মেয়াদ<span class="text-danger">*</span> </label>
                                    <input name="date_of_join" required type="text" class="form-control">
                                </div>

                                <div class="col-lg-12 col-sm-12 mb-3">
                                    <label for="" class="form-label">কর্মকর্তা/কর্মচারীর অন্য কোনো প্রকল্প থেকে/গৃহীত আর্থিক বা অন্যান্য সুবিধার বর্ণনা <span class="text-danger">*</span> </label>
                                    <input name="date_of_join" required type="text" class="form-control">
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
