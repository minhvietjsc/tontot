$(document).ready(function () {
// save ad
    $('.save-add').click(function () {

        var ev = $(this);
        console.log(ev.attr('data-action'));
        ev.find('.fa-spinner').removeClass('hidden');

        var ad_id = ev.attr('data-id');
        var action = ev.attr('data-action');

        $.get(base_url+'/save-add', {id:ad_id, action:action}, function(data){
            if(data!=''){
                ev.find('.fa-spinner').addClass('hidden');

                if(action == 'ins') {
                    ev.attr('data-action', 'del');
                    ev.find('.text').html('Đã lưu thêm');
                    ev.find('.fa').removeClass('fa-star-o').addClass('fa-star');
                }else{
                    ev.attr('data-action', 'ins');
                    ev.find('.text').html('Lưu thêm');
                    ev.find('.fa').addClass('fa-star-o').removeClass('fa-star');
                }

            }
        });
        //return false;
    });


    //Auto Close Timer
    $('.sync_contacts').on('change', function () {

        $('#loading').show();

        if ($('.sync_contacts').is(':checked')) {
            var sync = 1;
            var message = 'Đồng bộ hóa danh bạ của bạn được bật thành công!';
        } else {
            var sync = 0;
            var message = 'Đồng bộ hóa danh bạ của bạn đã được tắt thành công!';
        }
        var link = base_url + '/sync_stats';

        $.post(link, {sync: sync}, function (result) {
            $('#loading').show();
            if (result == 1) {
                swal('Success!', message, 'success');
            }
            $('#loading').hide();
        });


        //var intv = setInterval(function(){
        //    $('#loading').hide();
        //    swal('Success!', 'Your contacts synchronized successfully. ', 'success' );
        //    clearInterval(intv);
        //}, 5000);

    });

    $('.category-leftbar-item')
    .mouseover(function() {
        $('.category-leftbar').addClass('li-hover');
        $('.category-box-child').addClass('active');
        $('.category-leftbar-item').removeClass('active');
        $(this).addClass('active');
        $('#cat-id-active').val($(this).data('id'));
        $.ajax({
            type: 'GET',
            url: $('#get_category_child').val() + '/' + $(this).data('id'),
            dataType: 'json',
            success: function (rsp) {
                $('.category-box-child').html(rsp);
            }
        });
    })
    .mouseout(function() {
        $('.category-leftbar').removeClass('li-hover');
        $('.category-box-child').removeClass('active');
        $(this).removeClass('active');
    });

    $('.category-box-child')
    .mouseover(function() {
        $('.category-leftbar').addClass('li-hover');
        $('.category-leftbar-item[data-id="' + $('#cat-id-active').val() + '"]').addClass('active');
    })
    .mouseout(function() {
        $('.category-leftbar').removeClass('li-hover');
        $('.category-leftbar-item[data-id="' + $('#cat-id-active').val() + '"]').addClass('active');
    });

    $(window).scroll(function(){
        if($(window).scrollTop() > 110) {
            $('.header-top').addClass('scroll-fixed');
        } else {
            $('.header-top').removeClass('scroll-fixed');
        }
    });

});


function refreshTable() {
    $('#load_datatable').DataTable().ajax.reload();
}

// inactive ad
function inactive_ad(e){
    var id = $(x).data('id');
    if (id!='') {

        swal({
                title: "Bạn có chắc không?",
                text: "Bạn không thể khôi phục sau này.",
                type: "error",
                showCancelButton: true,
                cancelButtonClass: 'btn-default btn-md waves-effect',
                confirmButtonClass: 'btn-danger btn-md waves-effect waves-light',
                confirmButtonText: 'Xác nhận!'
            },
            function (isConfirm) {
                if (isConfirm) {
                    $("#loading").show();

                    $.post(link, {id: id, obj: obj}, function (result) {
                            //console.log(result);

                            // delete image gallery check to prevent error
                            if (obj != 'gallery') {
                                refreshTable();
                            }
                            if (result != '0') {
                                var data = JSON.parse(result);
                                if (data.type == 'success') {
                                    //hide gallery image
                                    if (obj == 'gallery') {
                                        $('#item_' + id).hide();
                                    }
                                    swal("Success!", data.msg, "success");
                                    if (obj == 'groups' || obj == 'group_fields' || obj == 'smtp_settings' || obj == 'sparkpost_settings' || obj == 'sendgrid_settings' || obj == 'activecampaign_settings' || obj == 'aweber_settings' || obj == 'getresponse_settings' || obj == 'mailchimp_settings') {
                                        location.reload();
                                    }
                                }
                                if (data.type == 'error') {
                                    swal("Error!", data.msg, "error");
                                }

                            } else {
                                swal("Error!", "Đã xảy ra sự cố.", "error");
                            }
                            $('#loading').hide();
                        }
                    );

                } else {
                    swal("Cancelled", "Hành động của bạn đã bị hủy!", "error");
                }
            }
        );

    } else {
        swal("Error!", "Không thể lấy dữ liệu. Vui lòng tải lại trang.", "error");
    }
}


// delete record
function deleteRow(x) {

    var id = $(x).data('id');
    var obj = $(x).data('obj');
    var link = $("#delete_link").val();

    if (id != '' && obj != '') {
        swal({
                title: "Bạn có chắc không?",
                text: "Bạn không thể khôi phục sau này.",
                type: "error",
                showCancelButton: true,
                cancelButtonClass: 'btn-default btn-md waves-effect',
                confirmButtonClass: 'btn-danger btn-md waves-effect waves-light',
                confirmButtonText: 'Xác nhận!'
            },
            function (isConfirm) {
                if (isConfirm) {
                    $("#loading").show();
                    $.post(link, {id: id, obj: obj}, function (result) {
                            //console.log(result);
                            // delete image gallery check to prevent error
                            if (obj != 'gallery') {
                                refreshTable();
                            }
                            if (obj == 'custom_page'){
                                $(x).parent().hide();
                            }
                            if (result != '0') {
                                var data = JSON.parse(result);
                                if (data.type == 'success') {
                                    //hide gallery image
                                    if (obj == 'gallery') {
                                        $('#item_' + id).hide();
                                    }
                                    swal("Success!", data.msg, "success");
                                    if (obj == 'groups' || obj == 'group_fields' || obj == 'chat') {
                                        location.reload();
                                    }
                                }
                                if (data.type == 'error') {
                                    swal("Error!", data.msg, "error");
                                }

                            } else {
                                swal("Error!", "Đã xảy ra sự cố.", "error");
                            }
                            $('#loading').hide();
                        }
                    );

                } else {
                    swal("Cancelled", "Hành động của bạn đã bị hủy!", "error");
                }
            }
        );

    } else {
        swal("Error!", "Không thể lấy dữ liệu. Vui lòng tải lại trang.", "error");
    }
}

function viewDetail(e) {
    let id = $(e).data('id');
    $.ajax({
        type: 'GET',
        url: base_url + '/view-detail-order/' + id,
        dataType: 'json',
        success: function(rsp) {
            $('#orderModal .modal-body').html(rsp.html);
            $('#orderModal #total').html(rsp.total);
            $('#orderModal').modal('show');
        }
    });
}

function changeStatus(e) {

    //$('#loading').show();
    var id = $(e).data('id');
    var obj = $(e).data('obj');
    var link = base_url + '/change-status';

    if (id != '' && obj != '') {
        let data = {id: id, obj: obj};
        if(obj == 'order') {
            let status = $(e).val();
            data['status'] = status;
        }
        $.post(link, data, function (result) {
                //$('#loading').hide();
                refreshTable();

            if(obj == 'user_ads'){
                var OBJ = $.parseJSON(result);
                console.log(OBJ);
                $('.total_active').html(OBJ.active);
                $('.total_inactive').html(OBJ.inactive);
            }

                if (result != '0') {
                    //toastr["success"]("Status Updated successfully!");
                } else {
                    //toastr["error"]("something went wrong. Please reload page and try again!");
                }
            }
        );
    }
}

function goBack() {
    window.history.back();
}


