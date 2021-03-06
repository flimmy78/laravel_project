@extends('common.layouts')

@section('title')
	新增
@stop

@section('content')
@include('common.message')
@include('common.validator')
{{-- 所有的错误提示 --}}
{{-- <div class="alert alert-danger">
	<ul>
		<li>姓名不能为空</li>
		<li>年龄只能为整数</li>
		<li>请选择性别</li>
	</ul>
</div> --}}

{{-- 自定义内容区域 --}}
<div class="panel panel-default">
	<div class="panel-heading">修改学生</div>
	<div class="panel-body">
		<form class="form-horizontal" method="post" action="">
		{{-- <form class="form-horizontal" method="post" action=""> --}}{{-- 不添加路径默认跳转到当前路径 --}}
			{{-- <input type="hidden" name="_token" value="{{csrf_token()}}"> --}}
			{{ csrf_field() }}
			<div class="form-group">
				<label for="name" class="col-sm-2 control-label">姓名</label>
				<div class="col-sm-5">
					<input type="text" name="Student[name]" class="form-control" 
					value="{{ old('Student')['name'] ? old('Student')['name'] : $student->name}}"
					id="name" placeholder="请输入学生姓名">
				</div>
				<div class="col-sm-5">
					<p class="form-control-static text-danger">{{ $errors->first('Student.name') }}</p>
				</div>
			</div>

			<div class="form-group">
				<label for="age" class="col-sm-2 control-label">年龄</label>
				<div class="col-sm-5">
					<input type="text" name="Student[age]" class="form-control" 
					value="{{ old('Student')['age'] ? old('Student')['age'] : $student->age }}" 
					id="age" placeholder="请输入学生年龄">
				</div>
				<div class="col-sm-5">
					<p class="form-control-static text-danger">{{ $errors->first('Student.age') }}</p>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">性别</label>
				<div class="col-sm-5">
					@foreach($student->getsex() as $key => $sex)
						<label class="radio-inline">
							<input type="radio" name="Student[sex]"
							{{ $student->sex == $key ? 'checked' : '' }} value="{{ $key }}">{{ $sex }}
						</label>
					@endforeach
					<!-- <label class="radio-inline">
						<input type="radio" name="Student[sex]" value="1">男
					</label>
					<label class="radio-inline">
						<input type="radio" name="Student[sex]" value="2">女
					</label> -->
				</div>
				<div class="col-sm-5">
					<p class="form-control-static text-danger">{{ $errors->first('Student.sex') }}</p>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-primary">提交</button>
				</div>
			</div>		
		</form>
	</div>	
</div>
@stop