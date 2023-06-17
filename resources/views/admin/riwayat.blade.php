<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="main">
    <h2>Riwayat Pembelian </h2> <br>
    <a onclick="filterData('Selesai')" class="btn bg-primary color-white" style="margin-bottom:1rem;">Selesai : {{$totalSelesai }}</a>
    <a onclick="filterData('Delivered')" class="btn bg-success" style="margin-bottom:1rem;">Delivered : {{$totalSampai}}</a>
    <a onclick="filterData('Cancelled')"class="btn bg-danger" style="margin-bottom:1rem;">Cancelled : {{$totalCancel}}</a>
    <table class="table table-striped" style="width:95%;">
    <thead>
        <tr>
        <th scope="col" style="text-align:center;">ID</th>
        <th scope="col">User</th>
        <th scope="col">Produk</th>
        <th scope="col" style="text-align:center;">Jumlah</th>
        <th scope="col">Status</th>
        <th scope="col">Tgl-Pesan</th>
        </tr>
    </thead>
    <tbody>
       @if(isset($dataRiwayat))
       @foreach($dataRiwayat as $datas)
       <tr style=" vertical-align: middle; " class="table_data" status="{{$datas['status']}}">
            <td style="text-align:center;">{{$datas['id']}}</td>
            <td><b>[{{$datas['user_id']}}]</b> {{$datas['name']}}</td>
            <td>{{$datas['nama']}}</td>
            <td style="text-align:center;">{{$datas['jumlah']}}</td>
            <td>{{$datas['status']}}</td>
            <td>{{$datas['tanggal_pesanan']}}</td>
       </tr>
       @endforeach
       @endif
    </tbody>
    </table>
</div>
</div>
</body>
</html>

<script>
    var prosesBtn = document.getElementById("prosesPesanan");
    var pesananID = "";
    var action = "";
    var prosesRoute = "{{route('admin.prosestransaksi')}}";
    var table_data = document.getElementsByClassName("table_data");
    $( ".proses" ).each(function(index) {
        $(this).on("click", function(){
            pesananID = $(this).attr("pesananID");
            action = $(this).attr("act");
            console.log("Memproses id Pesanan : " + pesananID);

            $.ajaxSetup({
                headers : {
                    'X-CSRF-TOKEN' : $('input[name="_token"]').attr('value')
                }
            });
            $.ajax({
                url:prosesRoute,
                method :'POST',
                data : {
                    pesananID : pesananID,
                    action : action
                }
                
            }).done(function( result ) {
                console.log(result);
                if(result.message=="success"){
                    console.log("sucess");
                    loadForm(pembelian_route);
                }
            }).fail(()=>{
                alert("Error : Internal server error !");

            });
        });
    });


    var filterData = (key)=>{
        key = key.toLowerCase();
        console.log(key);
        console.log(table_data.length);
        for(var i=0;i<table_data.length ;i++){
            if(key.includes("all")){
                table_data[i].style.display = 'table-row'; 
            }else{
                var status = table_data[i].getAttribute("status").toLowerCase();
                if(status.includes(key)){
                    table_data[i].style.display = 'table-row'; 
                }else{
                    table_data[i].style.display = 'none'; 
                }
            }
        }
    };


</script>