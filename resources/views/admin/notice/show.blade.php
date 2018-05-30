@extends('admin.layout.index')

@section('content')
<div class="mws-panel grid_7" >
	<div class="mws-panel-header">
    	<span>公告详情</span>
    </div>
    <div class="mws-panel-body">
        <p>{{$data->notice_content}}</p>
    </div>
</div>
<div class="btn-toolbar">
    <a href="/admin/notice"><button type="button" class="btn btn-success btn-large" style="width:200px;margin-left: 20px">返 回</button>
   	</a>
</div>
@endsection