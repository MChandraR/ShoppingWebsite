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
       <tr style=" vertical-align: middle;">
            <td style="text-align:center;">{{$datas['id']}}</td>
            <td><b>[{{$datas['user_id']}}]</b> {{$datas['name']}}</td>
            <td><b>[{{$datas['produk_id'] }}]</b> {{$datas['nama']}}</td>
            <td style="text-align:center;">{{$datas['jumlah']}}</td>
            <td>{{$datas['status']}}</td>
            <td style="width:15rem;">
                <form action="{{route('admin.deleteproduct')}}" method="post">
                    @csrf
                    <input type="text" name="id" value="{{$datas['id']}}" hidden></input>
                    @if($datas['status']=="pending" || $datas['status']=="Pending")
                    <button class="btn bg-primary" type="submit">Accept</button>
                    @else
                    <button class="btn bg-danger" type="submit">Cancel</button>
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