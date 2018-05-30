<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\link;
use App\Http\Requests\LinkInsertRequest;

class LinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 接收分页的条数
        $count = $request -> input('count',5);
        // $count = 1;
        //接收搜索内容
        $search_name = $request -> input('links_name','');
        //以数组的方式接收所有参数
        $params = $request -> all();
        $data = Link::where('links_name','like','%'.$search_name.'%') ->paginate($count);
       
        return view('admin.links.index',['title'=>'友情链接列表','data'=>$data,'params'=>$params]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        //加载添加页面   
        return view('admin.links.create',['title'=>'友情链接添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LinkInsertRequest $request)
    {
        // //自动验证
        // $this->validate($request,[
        //     'links_name'=>'required|regex:/[\W\w]{2,6}/|unique:links',
        //     'links_url'=>'required|active_url'//active_url验证路径是否有效
            // ],[
            // 'links_name.required' => '站点名称必填',
            // 'links_name.unique' => '站点名称已存在',
            // 'links_name.regex' => '站点名称不正确',
            // 'links_url.required' => 'URL地址必填',
            // 'links_url.active_url' => 'URL地址无效',
            // ]);
        //接受数据  处理数据
        $link = new Link;
        $link -> links_name = $request -> input('links_name','');
        $link -> links_url  = $request -> input('links_url','');
        $link -> links_status  = $request -> input('links_status','');
        $res = $link -> save();
        //判断是否添加成功
        if($res){
            //成功
            return redirect('/admin/links')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Link::find($id);
        return view('admin.links.edit',['data'=>$data,'title'=>'友情链接修改']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request;
        $row =Link::find($id);
        $row -> links_name= $data->links_name;
        $row -> links_url = $data->links_url;
        $row -> links_status = $data->links_status;
        $res = $row->save();
     
        if($res){
            return redirect('/admin/links')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $res = Link::destroy($id);
        if($res){
            return redirect('/admin/links')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        } 
    }

    /**
     * 取消显示友情链接
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function display($id)
    {
        $data['links_status'] = '2';
        $res =  Link::where('id',$id)->update($data); 
        return redirect('/admin/links');
    }

    /**
     * 显示友情链接
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function blank($id)
    {
        $data['links_status'] = '1';
        $res =  Link::where('id',$id)->update($data); 
        return redirect('/admin/links');
    }

    /**
     * 审核友情链接
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function check($id)
    {
        $data['links_status'] = '2';
        $res =  Link::where('id',$id)->update($data); 
        return redirect('/admin/links');
    }
}
