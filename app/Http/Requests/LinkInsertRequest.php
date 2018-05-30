<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

//友情链接验证
class LinkInsertRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        'links_name'=>'required|regex:/[\W\w]{2,6}/|unique:links',
        'links_url'=>'required|active_url'//active_url验证路径是否有效
        ];
    }

    public function messages()
    {
        return [
            'links_name.required' => '站点名称必填',
            'links_name.unique' => '站点名称已存在',
            'links_name.regex' => '站点名称不正确',
            'links_url.required' => 'URL地址必填',
            'links_url.active_url' => 'URL地址无效',
        ];
    }
}
