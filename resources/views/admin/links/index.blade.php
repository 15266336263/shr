@extends('admin.layout.index')

@section('content')
<!-- 后台首页显示的页面 -->
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i>{{ $title }}</span>
    </div>
    <div class="mws-panel-body no-padding">
        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
            <form action="/admin/links" method="get">
            <div id="DataTables_Table_1_length" class="dataTables_length">
                <label>显示
                    <select size="1" name="count" aria-controls="DataTables_Table_1">
                        <option value="5"  @if(isset($params) && !empty($params['count']) && $params['count'] == 5) selected @endif>5</option>
                        <option value="10" @if(isset($params) && !empty($params['count']) && $params['count'] == 10) selected @endif>10</option>
                        <option value="15" @if(isset($params) && !empty($params['count']) && $params['count'] == 15) selected @endif>15</option>
                        <option value="20" @if(isset($params) && !empty($params['count']) && $params['count'] == 20) selected @endif>20</option>
                    </select>
                    项
                </label>
            </div>
            <div class="dataTables_filter" id="DataTables_Table_1_filter">
                <label>搜索:
                    <input type="text" aria-controls="DataTables_Table_1" name="links_name">
                    <input type="submit" value="搜索"></label>
                </label>
            </div>
            </form>
            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 30px;">ID</th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 334px;">站点名称</th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 307px;">站点URL</th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 226px;">是否显示</th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 200px;">操作</th>
                    </tr>
                </thead>

                <tbody role="alert" aria-live="polite" aria-relevant="all">
                    @foreach($data as $k=>$v)
                    <tr class="odd" style="text-align: center;">
                        <td class="  sorting_1" style="width:30px">{{ $v->id }}</td>
                        <td class=" ">{{ $v->links_name }}</td>
                        <td class=" ">{{ $v->links_url }}</td>
                        @if($v->links_status == 1 )
                        <td class=" ">显示</td>
                        @elseif($v->links_status == 2)
                        <td class=" ">不显示</td>
                        @elseif($v->links_status == 3)
                        <td class=" ">待审核</td>
                        @endif
                       <td>
                        <a href="/admin/links/{{ $v->id }}/edit" class="btn btn-warning">修改</a>
                        <form action="/admin/links/{{ $v->id }}" method="post" style="display:inline;line-height:30px">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                          <input type="submit" value="删除" class="btn btn-danger" onclick="return confirm('确认要删除吗?')">
                        </form>
                        @if( $v->links_status == 1)
                        <a href="/admin/links/display/{{ $v->id }}" class="btn btn-info">取消显示</a>
                        @elseif( $v->links_status == 2)
                        <a href="/admin/links/blank/{{$v->id}}" class="btn btn-success">开始显示</a>
                        @elseif( $v->links_status == 3)
                        <a href="/admin/links/check/{{$v->id}}" class="btn btn-efault" style="background: #00BFFF">通过审核</a>
                        @endif
                      </td>
                    </tr> 
                    @endforeach             
                </tbody>
            </table>
            <div class="page">
            {!! $data->appends($params)->render() !!}
            </div>
        </div>
    </div>
</div>
@endsection