@extends('admin.layout.index')

@section('content')
<!-- 显示错误信息 -->
@if (count($errors) > 0)
    <div class="mws-form-message error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>公告修改</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="/admin/notice/{{$data->id}}" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">公告标题</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name="notice_title" value="{{ $data->notice_title }}">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">公告内容</label>
                    <div class="mws-form-item">
                        <textarea rows="" cols="" class="large" name="notice_content" value="">{{ $data->notice_content }}</textarea>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">状态</label>
                    <div class="mws-form-item clearfix">
                        <ul class="mws-form-list inline">
                            <li><input name="notice_status" type="radio" value="0" @if($data->notice_status == '0') checked @endif> <label>待审</label></li>
                            <li><input name="notice_status" type="radio" value="1" @if($data->notice_status == '1') checked @endif> <label>发布</label></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="mws-button-row">
                <input type="submit" value="提交" class="btn btn-danger">
                <input type="reset" value="重置" class="btn ">
            </div>
        </form>
    </div>      
</div>

@endsection