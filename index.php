

<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$conn = mysqli_connect('localhost', 'root', '', 'waterlevel');
mysqli_set_charset($conn, 'UTF8');
    $sql1 = "SELECT * FROM thong_tin_tram";
    $results = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($results) > 0) {
        $arrTram = array();
        while ($row = mysqli_fetch_assoc($results)) {
            $arrTram[] = $row;

        }
    }
    foreach ($arrTram as $valuess) {
        $sql3 = 'SELECT * FROM muc_nuoc where ma_tram='.$valuess['ma_tram'].' ORDER BY id DESC LIMIT 1 ';
        $results1 = mysqli_query($conn, $sql3);
        if (mysqli_num_rows($results) > 0) {
            while ($row = mysqli_fetch_assoc($results1)) {
                $arrMucNuoc[] = $row;

            }
        }
        foreach ($arrMucNuoc as $valuee) {
            if ($valuess['ma_tram'] == $valuee['ma_tram']){
              if ($valuee['muc_nuoc']>=$valuess['cap_bao_dong_1']&&$valuee['muc_nuoc']<=$valuess['cap_bao_dong_2']) {
                    $color = "#FFFF00";
                }elseif ($valuee['muc_nuoc']>$valuess['cap_bao_dong_2']&&$valuee['muc_nuoc']<=$valuess['cap_bao_dong_3']){
                    $color = "#ffe23f";
                }elseif ($valuee['muc_nuoc']>$valuess['cap_bao_dong_3']){
                  $color = "#ff1414";
              }else{
                  $color = "#00FF00";
              }
              $sql2='UPDATE thong_tin_tram SET color = "'.$color.'" WHERE ma_tram = '.$valuee['ma_tram'].' ';
                mysqli_query($conn, $sql2);
            }else{
                 $color = "#00FF00";
                $sql4='UPDATE thong_tin_tram SET color = "'.$color.'" WHERE ma_tram = '.$valuess['ma_tram'].' ';
                mysqli_query($conn, $sql4);
            }
        }
    }

$sql = "SELECT * FROM thong_tin_tram ";
$data = array();
$results = mysqli_query($conn, $sql);
if (mysqli_num_rows($results) > 0) {
    while ($row = mysqli_fetch_assoc($results)) {
        $data[] = $row;
//        $datajs= json_encode($row);
    }
}

?>
<!DOCTYPE html >
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Bản đồ</title>
    <style>
        #over_map {
            position: absolute;
            background-color: transparent;
            top: 10px;
            left: 10px;
            z-index: 99;
            background: white;
        }
        #right_map {
            
            position: absolute;
            background-color: transparent;
            top: 10px;
            right: 30px;
            z-index: 99;
            background: white;
        }
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 100%;
        }

        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="css\trambom.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.vi.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

</head>
<html>
<body>
<div id="map"></div>
<div id="over_map" style="width: 40px;">
    <div class="container" style="width: 330px;">
        <div class="row" style="width: 350px;">
        <div class="single category">
            <h3 class="side-title">Danh sách biểu đồ</h3>
            <ul class="list-unstyled">
                <?php foreach ($data as $key => $values) { ?>
                    <li name="thongtintram" value="<?php echo $values['ma_tram']; ?>"><b><?php echo $values['stt'] ?>.</b> </b><b>TRẠM <?php echo $values['ma_tram']; ?>
                            : <?php echo $values['ten_tram']; ?></b>
                        <button style="height: 30px; margin-top: 5px;text-align: center;" data-info ="TRẠM <?php echo $values['ma_tram']; ?>:<?php echo $values['ten_tram']; ?>" data-matram ="<?php echo $values['ma_tram']; ?>" type="submit" class="right xembieudo btn btn-outline-primary" data-toggle="modal" data-target="bd-example-modal-lg" matram="<?php echo $key; ?>">Xem Biểu Đồ
                        </button>
                    </li>
                <input type="hidden" id="ma_tram_bom" data-info ="TRẠM <?php echo $values['ma_tram']; ?>:<?php echo $values['ten_tram']; ?>" class="form-control1" value="">
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
</div>
<div id="right_map">
    <button onclick="window.location.href='admin/Login.php'" style="font-size: 80%;border-radius: 5rem;letter-spacing: .1rem;font-weight: bold;padding: 1rem;transition: all 0.2s;width: 102px;float: right;" class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Đăng Nhập</button>
</div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">biểu đồ mức nước</h4>
            </div>
            <div class="modal-body">
                <input type="text" id="datepicker1" class="form-control1" value="">
                <input type="text" id="datepicker2"  class="form-control1" value="">
                <input type="hidden" id="ngay_xem_1" class="form-control1" value="">
            </div>
            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<script>
    function initMap() {
        <?php foreach ($data as $key =>$value){?>
        var <?php echo $value['name_tram'] ?> =
        {
            info:'<div class="info_tram">' +
            '<div class="matram" data-matram="<?php echo $value['ma_tram']; ?>"><b>TRẠM:<?php echo $value['ma_tram']; ?> <?php echo $value['ten_tram']; ?></b> </div> ' +
            '<div>Mức Nước Báo Động 1: <?php echo $value['cap_bao_dong_1']; ?>(m) ' +
            '<div>Mức Nước Báo Động 2:<?php echo $value['cap_bao_dong_2']; ?>(m) ' +
            '<div>Mức Nước Báo Động 3:<?php echo $value['cap_bao_dong_3']; ?>(m)' +
            '<div><p>vi do :<?php echo $value['lat']; ?></p>' +
            '<p>kinh do:<?php echo $value['lon']; ?></p>' +
            '</div>' +
            '<hr>' +
            '<div class="xem_muc_nuoc"></div>',
                lat
        : <?php echo $value['lat']?> ,
            lon: <?php echo $value['lon'] ?>
                }
        ;
        <?php } ?>
        var locations = [
            <?php foreach ($data as $key =>$value){?>
            [<?php echo $value['name_tram'] ?>.info, <?php echo $value['name_tram'] ?>.lat, <?php echo $value['name_tram'] ?>.
        lon, <?php echo $value['stt'] ?>," <?php echo $value['color'] ?>",
    ],
        <?php } ?>
    ]
        ;
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 8,
            center: new google.maps.LatLng(21.0459328, 105.6951007),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
        });
        var infowindow = new google.maps.InfoWindow({});
        var marker, i;
        for (i = 0; i < locations.length; i++) {
            var labels = ""+ (i + 1);
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                label:{text: labels,
                       color : "#FFFFFF"
                    },
                icon: {
                    path: google.maps.SymbolPath.CIRCLE,
                    scale: 15,
                    fillColor: locations[i][4],
                    fillOpacity: 1.0,
                    strokeWeight: 2,
                    strokeOpacity: 0.8,
                    // strokeColor:"red",
                    rotation: 30
                },
                map: map,

            });
            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                return function () {
                    infowindow.setContent(locations[i][0]);

                    infowindow.open(map, marker,);
                    var maTram = $('.matram').data('matram');
                    $.ajax({
                        url: 'action.php',
                        type: 'POST',
                        data: {
                            'MaTram' : maTram,
                            'mode' : 'XemMucNuoc'
                        },  success: function (data) {
                            var  valueMucNuoc=  data.DataMucNuoc;
                            $('.xem_muc_nuoc').html(valueMucNuoc);

                        },
                    });
                }
            })(marker, i));
        }
    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCoXKdRGEd75CKBV6xAaaD-gSFLC0w9E5A&callback=initMap">
</script>
<script type='text/javascript' src='js/tramBom.js'></script>
</body>
</html>