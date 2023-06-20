<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="main">
    <h2>Admin Pengiriman </h2> <br>
    <a onclick="filterData('All')" class="btn bg-primary color-white" style="margin-bottom:1rem;">Belum Dikirim : {{count($totalBelumDikirim)}}</a>
    <a onclick="filterData('Pending')" class="btn bg-warning" style="margin-bottom:1rem;">Dikirim : {{count($totalDikirim)}}</a>
    <a onclick="filterData('Accepted')"class="btn bg-success" style="margin-bottom:1rem;">Delivered : {{count($totalSampai)}}</a>
    <table class="table table-striped" style="width:95%;">
    <thead>
        <tr>
        <th scope="col" style="text-align:center;">ID</th>
        <th scope="col">User_Id</th>
        <th scope="col">Produk_ID</th>
        <th scope="col" style="text-align:center;">Jumlah</th>
        <th scope="col">Alamat</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
        <th scope="col">Batalkan</th>
        </tr>
    </thead>
    <tbody>
       @if(isset($transactionData))
       @foreach($transactionData as $datas)
       <tr style=" vertical-align: middle; " class="table_data" status="{{$datas['status']}}">
            <td style="text-align:center;">{{$datas['id']}}</td>
            <td><b>[{{$datas['user_id']}}]</b> {{$datas['name']}}</td>
            <td><b>[{{$datas['produk_id'] }}]</b> {{$datas['nama']}}</td>
            <td style="text-align:center;">{{$datas['jumlah']}}</td>
            <td >{{$datas['alamat']}}</td>
            <td>{{$datas['status'] == 'Accepted' ? 'Menunggu Dikirim' : $datas['status'] }}</td>
            <td style="width:8rem; height:2rem;">
                <form action="{{route('admin.prosestransaksi')}}" method="post">
                    @csrf
                    <input name="pesananID" value="{{$datas['id']}}" hidden></input>
                    @if($datas['status']=="Accepted" || $datas['status']=="accepted")
                    <a style="width:7rem;" pesananID="{{$datas['id']}}" act="Dikirim" class="btn bg-primary proses" id="prosesPesanan" >Kirim</a>
                    @elseif($datas['status']=="Dikirim" || $datas['status']=="dikirim")
                    <a style="width:7rem;" pesananID="{{$datas['id']}}" act="Delivered" class="btn bg-success proses" id="prosesPesanan" >Selesai</a>
                    @else
                    <a style="width:7rem;" class="btn bg-danger-subtle" >No Action</button>
                    @endif
                </form>
                
            </td>
            <td style="width:5rem; height:2rem;">
            <center>
                @if($datas['status']!="Delivered")
                <a pesananID="{{$datas['id']}}" act="Cancelled" class="btn bg-danger proses" id="prosesPesanan" >X</a>
                @endif
            </center>
            </td>
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
    var prosesRoute = "{{route('admin.prosespengiriman')}}";
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
                    loadForm(prosesRoute);
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