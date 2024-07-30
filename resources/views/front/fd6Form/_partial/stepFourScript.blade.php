<script>

$(document).on('click', '#partnerNgoPost', function () {

var fd6Id = $('#fd6Id').val();

if(!$('#division_name0').val()){

   alertify.alert('Error', 'বিভাগ  সম্পর্কিত তথ্য দিন');

}else if(!$('#district_name0').val()){

   alertify.alert('Error', 'জেলা সম্পর্কিত তথ্য দিন');

}else if(!$('#thana_name0').val()){

   alertify.alert('Error', 'থানা সম্পর্কিত তথ্য দিন');

}else if(!$('#municipality_name0').val()){

alertify.alert('Error', 'পৌরসভা/ইউনিয়ন সম্পর্কিত তথ্য দিন');

}else if(!$('#ward_name0').val()){

alertify.alert('Error', 'ওয়ার্ড সম্পর্কিত তথ্য দিন');

}else if(!$('#partner_ngo_name0').val()){

   alertify.alert('Error', 'পার্টনার এনজিওর নাম সম্পর্কিত তথ্য দিন');

}else if(!$('#partner_ngo_address0').val()){

  alertify.alert('Error', 'পার্টনার এনজিওর ঠিকানা সম্পর্কিত তথ্য দিন');

}else if(!$('#partner_ngo_telephone0').val()){

   alertify.alert('Error', 'পার্টনার এনজিওর টেলিফোন সম্পর্কিত তথ্য দিন');

}else if(!$('#partner_ngo_mobile0').val()){

   alertify.alert('Error', 'পার্টনার এনজিওর মোবাইল সম্পর্কিত তথ্য দিন');

}else if(!$('#partner_ngo_email0').val()){

   alertify.alert('Error', 'পার্টনার এনজিওর ইমেইল সম্পর্কিত তথ্য দিন');

}else if(!$('#partner_ngo_reg_name0').val()){

     alertify.alert('Error', 'পার্টনার এনজিওর নিবন্ধন নং সম্পর্কিত তথ্য দিন');

}else if(!$('#partner_ngo_duration0').val()){

alertify.alert('Error', 'পার্টনার এনজিওর মেয়াদ সম্পর্কিত তথ্য দিন');

}else if(!$('#partner_ngo_work_detail0').val()){

alertify.alert('Error', 'বাস্তবায়িতব্য কার্যক্রমসমূহ সম্পর্কিত তথ্য দিন');

}else if(!$('#budget_detail0').val()){

alertify.alert('Error', 'বাজেট সম্পর্কিত তথ্য দিন');

}else if(!$('#execution_deadline0').val()){

alertify.alert('Error', 'সম্পাদনের সময়সীমা সম্পর্কিত তথ্য দিন');

}else if(!$('#beneficiary0').val()){

alertify.alert('Error', 'উপকারভোগী সম্পর্কিত তথ্য দিন');

}else{

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    var partner_ngo_name = $('#partner_ngo_name0').val();
    var division_name = $('#division_name0').val();
    var district_name = $('#district_name0').val();
    var city_corparation_name = $('#city_corparation_name0').val();
    var upozila_name = $('#upozila_name0').val();
    var thana_name = $('#thana_name0').val();
    var municipality_name = $('#municipality_name0').val();
    var ward_name =$('#ward_name0').val();

    var partner_ngo_address =$('#partner_ngo_address0').val();
    var partner_ngo_telephone =$('#partner_ngo_telephone0').val();
    var partner_ngo_mobile =$('#partner_ngo_mobile').val();
    var partner_ngo_email =$('#partner_ngo_email0').val();
    var partner_ngo_reg_name =$('#partner_ngo_reg_name').val();
    var partner_ngo_duration = $('#partner_ngo_duration0').val();

    var partner_ngo_work_detail = $('#partner_ngo_work_detail0').val();
    var budget_detail = $('#budget_detail0').val();
    var execution_deadline = $('#execution_deadline0').val();
    var beneficiary = $('#beneficiary0').val();


    $.ajax({
url: "{{ route('partnerDataPost') }}",
method: 'post',
data: {
fd6Id:fd6Id,
partner_ngo_name:partner_ngo_name,
division_name:division_name,
district_name:district_name,
city_corparation_name:city_corparation_name,
upozila_name:upozila_name,
thana_name:thana_name,
municipality_name:municipality_name,
ward_name:ward_name,
partner_ngo_address:partner_ngo_address,
partner_ngo_telephone:partner_ngo_telephone,
partner_ngo_mobile:partner_ngo_mobile,
partner_ngo_email:partner_ngo_email,
partner_ngo_reg_name:partner_ngo_reg_name,
partner_ngo_duration:partner_ngo_duration,
partner_ngo_work_detail:partner_ngo_work_detail,
budget_detail:budget_detail,
execution_deadline:execution_deadline,
beneficiary:beneficiary
},
success: function(data) {

$('#PartnerNGO').modal('hide');

alertify.set('notifier','position', 'top-center');
alertify.success('Data Added Successfully');

$('#partner_ngo_name0').val('');
$('#division_name0').val('');
$('#district_name0').val('');
$('#city_corparation_name0').val('');
$('#upozila_name0').val('');
$('#thana_name0').val('');
$('#municipality_name0').val('');
$('#ward_name0').val('');
$('#partner_ngo_address0').val('');
$('#partner_ngo_telephone0').val('');
$('#partner_ngo_mobile').val('');
$('#partner_ngo_email0').val('');
$('#partner_ngo_reg_name').val('');
$('#partner_ngo_duration0').val('');
$('#partner_ngo_work_detail0').val('');
$('#budget_detail0').val('');
$('#execution_deadline0').val('');
 $('#beneficiary0').val('');

$("#tableAjaxDataPartner").html('');
$("#tableAjaxDataPartner").html(data);



},
beforeSend: function(){
$('#pageloader').show()
},
complete: function(){
$('#pageloader').hide();
}
});

}

});

///////////
$(document).on('click', '#employeeInfoPost', function () {

    var fd6Id = $('#fd6Id').val();

    if(!$('#name0').val()){

alertify.alert('Error', 'নাম  সম্পর্কিত তথ্য দিন');

}else if(!$('#designation0').val()){

alertify.alert('Error', 'পদবি সম্পর্কিত তথ্য দিন');

}else if(!$('#nationality0').val()){

alertify.alert('Error', 'জাতীয়তা সম্পর্কিত তথ্য দিন');

}else if(!$('#duration0').val()){

alertify.alert('Error', 'মেয়াদ (জনমাস) সম্পর্কিত তথ্য দিন');

}else if(!$('#educational_qualification0').val()){

alertify.alert('Error', 'শিক্ষাগত যোগ্যতা সম্পর্কিত তথ্য দিন');

}else if(!$('#experience0').val()){

alertify.alert('Error', 'অভিজ্ঞতা সম্পর্কিত তথ্য দিন');

}else if(!$('#responsibility0').val()){

alertify.alert('Error', 'দায়িত্বসমূহ সম্পর্কিত তথ্য দিন');

}else if(!$('#salary_from_this_project0').val()){

alertify.alert('Error', 'বেতন-ভাতাদি(এই প্রকল্প হতে) সম্পর্কিত তথ্য দিন');

}else if(!$('#salary_from_other_project0').val()){

alertify.alert('Error', 'বেতন-ভাতাদি(অন্যান্য প্রকল্প হতে) সম্পর্কিত তথ্য দিন');

}else{
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    var name = $('#name0').val();
    var designation = $('#designation0').val();
    var nationality = $('#nationality0').val();
    var duration = $('#duration0').val();
    var educational_qualification = $('#educational_qualification').val();
    var experience = $('#experience0').val();
    var responsibility = $('#responsibility0').val();
    var salary_from_this_project =$('#salary_from_this_project0').val();
    var salary_from_other_project =$('#salary_from_other_project0').val();


    $.ajax({
url: "{{ route('employeeDataPost') }}",
method: 'get',
data: {
fd6Id:fd6Id,
name:name,
designation:designation,
nationality:nationality,
duration:duration,
educational_qualification:educational_qualification,
experience:experience,
responsibility:responsibility,
salary_from_this_project:salary_from_this_project,
salary_from_other_project:salary_from_other_project
},
success: function(data) {

$('#ProkolppoKormokorta').modal('hide');

alertify.set('notifier','position', 'top-center');
alertify.success('Data Added Successfully');

        $('#name0').val('');
        $('#designation0').val('');
        $('#nationality0').val('');
        $('#duration0').val('');
        $('#educational_qualification').val('');
        $('#experience0').val('');
        $('#responsibility0').val('');
        $('#salary_from_this_project0').val('');
        $('#salary_from_other_project0').val('');

$("#tableAjaxDataEmployee").html('');
$("#tableAjaxDataEmployee").html(data);



},
beforeSend: function(){
$('#pageloader').show()
},
complete: function(){
$('#pageloader').hide();
}
});

}

});
</script>
