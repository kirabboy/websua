@extends('layouts.master')

@section('title', 'Nạp điểm cho tài khoản admin')

@section('content')

<div class="container">
    <form action="{{route('napDiem')}}" method="POST">
    <div class="row">
        <div class="col-12 col-md-6">
            <p class="m-0 text-dark">Hiện tại tài khoản admin có 
				<span class="text-danger m-0">{{number_format($point_admin)}}</span> điểm</p>
            <input type="text" id="username" class="form-control" name="username"
				value="{{auth()->user()->id}}"
                placeholder="Nhập user name cần nạp điểm" hidden="true"/>
			<p class="text-danger m-0" id="checkUserName"></p>
			<p class="text-danger m-0" id="checkPoint"></p>
            
            <p class="m-0 text-dark">Nhập số điểm muốn nạp:<p>
            <input type="text" class="form-control" name="point" id="point"
                placeholder="Nhập số điểm muốn nạp" />
            <p> </p>

            <button type="submit" class="btn btn-dark" 
                style="width: 100%">Xác nhận</button>
        </div>
    </div>
    @csrf
    </form>
	<p> </p>
	<div class="row">
		<div class="col-12">
			<p class="text-dark text-uppercase text-center" style="font-size: 24px">
				Lịch sử nạp điểm</p>
		</div>
		<div class="col-12">
			<table style="width:100%">
				<thead>
					<th>STT</th>
					<th>Ngày nạp</th>
					<th>Điểm nạp</th>
				</thead>

				<tbody>
					@foreach ($lichsu_napdiem as $value)
					<tr>
						<td>{{$value->id}}</td>
						<td>{{$value->created_at}}</td>
						<td>{{number_format($value->point)}} điểm</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	
</div>

<script>
	$("#username").change(function(e) {
		console.log($(this).val());
		e.preventDefault();
		var username = $("#username").val();
        var point = $("#point").val();
		$.ajax({
			url: "{{asset('check-nap-diem')}}",
			type: 'GET',
			dataType: 'json',
			data: {id: username},
			success: function (response) {
				console.log(response)
				$('#checkUserName').html(response.id)
				$('#checkPoint').html(response.point)
			}
		})
	});
</script>

@endsection

