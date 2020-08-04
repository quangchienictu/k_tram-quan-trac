$(document).ready(function () {
    new Date().toLocaleTimeString();
    //confix ngày giờ theo thời gian việt nam
    $("#datepicker1").datepicker(
        {
            format: 'dd-mm-yyyy',
            autoclose: true,
            language: 'vi',
            "setDate": new Date(),
            timeFormat: 'hh:mm'
        });
    $("#datepicker2").datepicker(
        {
            format: 'dd-mm-yyyy',
            autoclose: true,
            language: 'vi',
            "setDate": new Date(),
            timeFormat: 'hh:mm'
        });

        //hiển thị from xem biểu đồ
    $("#datepicker1").datepicker("setDate", new Date());
    var datatime = new Date().toLocaleTimeString();
    $('.xembieudo').on('click', function () {
        var MaTram = $("#ma_tram_bom").val();
        var infoTram = this.dataset.info;
        var matram =this.dataset.matram;
        $(".modal-title").text(infoTram);
        $('#ma_tram_bom').attr('value',matram);
        $("#myModal").modal('show');
        var NgayDo = $("#datepicker1").datepicker("setDate", new Date()).val();
        var NgayDo = $("#datepicker2").datepicker("setDate", new Date()).val();
    });
    //sử lý jquery xem biểu đồ
    $('#datepicker1').on('change',function () {
        var NgayDo1 =$("#datepicker1").val();
        $('#ngay_xem_1').attr('value',NgayDo1);
    });
    $('#datepicker2').on('change',function () {
        var NgayDo = $("#datepicker2").val();
        var MaTram = $("#ma_tram_bom").val();
        var NgayDo1 =$("#ngay_xem_1").val();
        //call ajax về php
        $.ajax({
            url: 'action.php',
            type: 'POST',
            data: {
                'NgayDo': NgayDo,
                'MaTram' : MaTram,
                'NgayDo1' :NgayDo1,
                'mode' : 'MucNuocDinhKy'
            },
            success: function (data) {
                var dataMucNuoc = data[0];
                var dataBaoDong = data[1];
                //xử lý code từ php trả về
                var dataPoints = [];
                var dataPoints1 = [];
                var dataPoints2 = [];
                var dataPoints3 = [];
                //truyền dữ liệu vào x,y
                for (var i = 0; i < dataMucNuoc.length; i++) {
                    for (var j = 0; j < dataBaoDong.length; j++) {
                        var d = new Date(dataMucNuoc[i].ngay_do + " " + dataMucNuoc[i].thoi_gian_do);
                        dataPoints.push({
                            showInLegend: true,
                            x: d,
                            y: Number(dataMucNuoc[i].muc_nuoc),
                        })
                        dataPoints1.push({
                            showInLegend: true,
                            x: d,
                            y:Number(dataBaoDong[j].cap_bao_dong_1)
                        })
                        dataPoints2.push({
                            showInLegend: true,
                            x: d,
                            y: Number(dataBaoDong[j].cap_bao_dong_2)
                        })
                        dataPoints3.push({
                            showInLegend: true,
                            x: d,
                            y:Number(dataBaoDong[j].cap_bao_dong_3)
                        })
                    }
                }
                var chart = new CanvasJS.Chart("chartContainer",
                    {
                        animationEnabled: true,
                        toolTip:{
                            shared: true
                        },
                        theme: "light2",
                        title: {
                            text: "biểu đồ mức nước"
                        },
                        axisX: {

                        },
                        axisY: {
                            includeZero: false
                        },
                        data: [{
                            name: "Mức Nước",
                            type: "spline",
                            showInLegend: true,
                            xValueFormatString: "H m s",
                            dataPoints: dataPoints
                        }, {
                            name: "Mức Nước Báo Động 1",
                            type: "spline",
                            showInLegend: true,
                            xValueFormatString: "H m s",
                            dataPoints: dataPoints1
                        },
                            {
                                name: "Mức Nước Báo Động 2",
                                type: "spline",
                                showInLegend: true,
                                xValueFormatString: "H m s",
                                dataPoints: dataPoints2
                            }, {
                                name: "Mức Nước Báo Động 3",
                                type: "spline",
                                color: "#FF0000",
                                showInLegend: true,
                                xValueFormatString: "H m s",
                                dataPoints: dataPoints3
                            }]
                    });

                chart.render();
            },
        });
    });
});
// xem mức nước với mức nucows trung bình
$(document).on('change', '#datepicker', function () {
    var NgayXem = $("#datepicker").val();
    var TgXem = $('[data-time="time"]').val();
    var MaTram =$('.matram').attr('ma-tram');
    $.ajax({
        url: 'action.php',
        type: 'POST',
        data: {
            'NgayXem': NgayXem,
            'TgXem' : TgXem,
            'MaTram' : MaTram,
            'mode' : 'XemMucNuoc'
        },
        success: function (data) {
            var MucNuocTb = eval(data.DataMucNuocTB.join('+'))/data.DataMucNuocTB.length
            var  valueMucNuoc=  data.DataMucNuoc.muc_nuoc;
            $('.muc_nuoc').attr('value',valueMucNuoc);
            $('.muc_nuoc_tb').attr('value',MucNuocTb);
        },
    });


});