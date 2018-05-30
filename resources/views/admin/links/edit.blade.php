@extends('admin.layout.index')

@section('content')
<!-- 显示验证的错误信息 -->
@if (count($errors) > 0)
   <div class="mws-form-message error">
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif                             


<!-- 友情链接添加显示页面 -->
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>{{ $title }}</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="/admin/links/{{$data->id}}" method="post">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">站点名称:</label>
                    <div class="mws-form-item">
                        <input type="text" class="links_name" name="links_name" style="width:600px;" value="{{ $data->links_name}}">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">URL地址:</label>
                    <div class="mws-form-item">
                        <input type="text" class="links_url" name="links_url" style="width:600px;" value="{{ $data->links_url}}">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">显示状态</label>
                    <div class="mws-form-item clearfix">
                        <ul class="mws-form-list inline">

                            <li><input type="radio" name="links_status" value="1" @if($data->links_status == '1') checked @endif> <label>显示</label></li>
                            <li><input type="radio" name="links_status" value="2" @if($data->links_status == '2') checked @endif> <label>不显示</label></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="mws-button-row">
                <input type="submit" value="提交" class="btn btn-danger">
                <input type="reset" value="Reset" class="btn ">
            </div>
        </form>
    </div>      
</div>
@endsection

