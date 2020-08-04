$(document).ready(function () {
    if ($('[name="object"]').val()){
        $('.treeview-menu').html('');

    }
    $(document).on('click', '.sort', function () {
        var sort = $(this).attr('id');
        var order = $(this).data('order');
        if(order == 'desc'){
            $('#'+sort).data('order','asc');
        }else{
            $('#'+sort).data('order','desc');
        }
        var object = $('.object').val();
        $.ajax({
            url:"http://localhost:8080/mvc/index.php?object="+object+"&action=list&sort="+sort+"&order="+order,
            type : "POST",
            data :{sort:sort ,order:order},
            success : function (data) {
                $('.content-header').html(data);
                $('#'+sort+'').append();
            }
            /*success: function(response){

                $("#empTable tr:not(:first)").remove();

                $("#empTable").append(response);
                if(sort == "asc"){
                    $("#sort").val("desc");
                }else{
                    $("#sort").val("asc");
                }

            }*/
        });
    });
    $('.submit').on('click',function () {
        var mucNuocHienTai = $('[name="muc_nuoc_hien_tai"]').val();
        var mucNuocNew = $('#muc_nuoc').val();
        if(mucNuocHienTai ==""){
            return true;
        }else {
            var soSanhMucNuoc = (mucNuocNew / mucNuocHienTai);
            var soSanhMucNuoc1 = (mucNuocHienTai / mucNuocNew)
            if (soSanhMucNuoc >= 2) {
                alert("Mức nước vượt mức cho phép");
                return false;
            }
            if (soSanhMucNuoc1 >= 2) {
                alert("Mức nước dưới mức cho phép");
                return false;
            }
        }

    });
});
