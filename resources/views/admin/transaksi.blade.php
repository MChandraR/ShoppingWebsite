<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="main">
    <h2>Admin Pembelian </h2> <br><br>
    <table class="table table-striped" style="width:95%;">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">User_Id</th>
        <th scope="col">Produk_ID</th>
        <th scope="col">Jumlah</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
       @if(isset($transactionData))
       @foreach($transactionData as $datas)
       <tr>
            <td>{{$datas['id']}}</td>
            <td>{{$datas['user_id']}}</td>
            <td>{{$datas['produk_id']}}</td>
            <td>{{$datas['jumlah']}}</td>
            <td>{{$datas['status']}}</td>
            <td style="width:15rem;">
                <form action="{{route('admin.deleteproduct')}}" method="post">
                    @csrf
                    <input type="text" name="id" value="{{$datas['id']}}" hidden></input>
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