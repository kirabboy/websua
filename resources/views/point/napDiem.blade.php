@extends('layouts.master')

@section('title', 'Cài đặt hoa hồng trực tiếp')

@section('content')

<div class="container">
    <form action="{{route('napDiem')}}" method="POST">
    <div class="row">
        <div class="col-6">
            <p class="m-0 text-dark">Nhập tên tài khoản nhận điểm: </p>
            <input type="text" id="username" class="form-control" name="username"
                placeholder="Nhập user name cần nạp điểm" />
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

