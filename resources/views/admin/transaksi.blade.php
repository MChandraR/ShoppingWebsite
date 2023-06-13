<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="main">
    <h2>Admin Pembelian </h2> <br>
    <a href="" class="btn bg-warning">Pesanan pending : {{count($totalPending)}}</a>
    <a href="" class="btn bg-success">Pesanan diproses : {{count($totalAcc)}}</a><br><br>
    <table class="table table-striped" style="width:95%;">
    <thead>
        <tr>
        <th scope="col" style="text-align:center;">ID</th>
        <th scope="col">User_Id</th>
        <th scope="col">Produk_ID</th>
        <th scope="col" style="text-align:center;">Jumlah</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
       @if(isset($transactionData))
       @foreach($transactionData as $datas)
       <tr style=" vertical-align: middle; ">
            <td style="text-align:center;">{{$datas['id']}}</td>
            <td><b>[{{$datas['user_id']}}]</b> {{$datas['name']}}</td>
            <td><b>[{{$datas['produk_id'] }}]</b> {{$datas['nama']}}</td>
            <td style="text-align:center;">{{$datas['jumlah']}}</td>
            <td>{{$datas['status']}}</td>
            <td style="width:8rem; height:2rem;">
                <form action="{{route('admin.prosestransaksi')}}" method="post">
                    @csrf
                    <input name="pesananID" value="{{$datas['id']}}" hidden></input>
                    @if($datas['status']=="pending" || $datas['status']=="Pending")
                    <button pesananID="{{$datas['id']}}" act="Accept" class="btn bg-primary" id="prosesPesanan" type="submit">Accept</button>
                    @elseif($datas['status']=="accepted" || $datas['status']=="Accepted")
                    <button pesananID="{{$datas['id']}}" act="Cancel" class="btn bg-danger" id="prosesPesanan" type="submit">Cancel</button>
                    @else
                    <a class="btn bg-danger-subtle" >No Action</button>
                    @endif
                </form>
                
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
    var prosesRoute = "{{route('admin.prosestransaksi')}}";

    //membuat method untuk memproses pesanan oleh admin 
    if(prosesBtn!=null){
        prosesBtn.addEventListener('click',(e)=>{
            e.preventDefault();
            pesananID = prosesBtn.getAttribute("pesananID");
            action = prosesBtn.getAttribute("act");
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
                if(pembelian_route != null || loadForm != null){
                    console.log("sucess");
                    loadForm(pembelian_route);
                }
            });
        });
    }


</script>