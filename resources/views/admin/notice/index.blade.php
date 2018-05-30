@extends('admin.layout.index')

@section('content')	
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><i class="icon-table"></i> 公告列表</span>
    </div>
    <div class="mws-panel-body no-padding">
        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
		<form action="/admin/notice" method="get">
        	<div id="DataTables_Table_1_length" class="dataTables_length">
        		<label>显示
        			<select size="1" name="count" aria-controls="DataTables_Table_1">
	        			<option value="5" @if(isset($params) && !empty($params['count']) && $params['count'] == 5) selected @endif>5</option>
	        			<option value="10" @if(isset($params) && !empty($params['count']) && $params['count'] == 10) selected @endif>10</option>
	        			<option value="15" @if(isset($params) && !empty($params['count']) && $params['count'] == 15) selected @endif>15</option>
	        			<option value="20" @if(isset($params) && !empty($params['count']) && $params['count'] == 20) selected @endif>20</option>
        			</select>条
        		</label>
        	</div>
        	<div class="dataTables_filter" id="DataTables_Table_1_filter">
        		<label>关键字:<input type="text" aria-controls="DataTables_Table_1" name="notice_title" value="{{ $params['notice_title'] or '' }}">
        			<input type="submit" value="搜索"></label>
        	</div>
        </form>
        <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
            <thead>
                <tr role="row">
                	<th  role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 20px;">
                	公告编号
                	</th>
                	<th role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 120px;">
                	公告标题
                	</th>
                <!-- 	<th role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 120px;">
                	关键词
                	</th> -->
                	<th role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 80px;">
                	添加时间
                	</th>
                	<th role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 80px;">
                	修改时间
                	</th>
                	<th role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 30px;">
                	状态
                	</th>
                	<th role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 82px;">
                	操作
                	</th>
                </tr>
            </thead>
            
	        <tbody role="alert" aria-live="polite" aria-relevant="all" >
		        @foreach($data as $k=>$v)
		        	<tr class="even " style="border:1px solid #ddd;text-align: center" >
		                <td class=" ">{{ $v->id }}</td>
		                <td class=" ">{{ $v->notice_title}}</td>
		                <!-- <td class=" ">{{ $v->notice_content}}</td> -->
		                <td class=" ">{{ $v->created_at}}</td>
		                <td class=" ">{{ $v->updated_at}}</td>
		                @if( $v->notice_status == 0)
		                <td class=" ">待审</td>
		                @else
						<td class=" ">发布</td>
		                @endif
		            	 <td>
							<a href="/admin/notice/{{ $v->id }}/edit" class="btn btn-warning">修改</a>
							<form action="/admin/notice/{{ $v->id }}" method="post" style="display:inline;line-height:30px">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<input type="submit" value="删除" class="btn btn-danger" onclick="return confirm('确认要删除吗?')">
							</form>
							<a href="/admin/notice/{{ $v->id }}" class="btn btn-info">详情</a>
							@if( $v->notice_status == 0)
							<a href="/admin/notice/up/{{$v->id}}" class="btn btn-success">发布</a>
							@else
							<a href="/admin/notice/down/{{$v->id}}" class="btn btn-efault" style="background: #ccc">待审</a>
							@endif
						</td>
		            </tr>
		        @endforeach
	        </tbody>
    	</table>
	    <div class="page dataTables_paginate paging_full_numbers">
	        {!! $data->appends($params)->render() !!}
	    </div>
    </div>
</div>

@endsection