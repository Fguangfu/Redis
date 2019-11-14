<?php

/*
 * 表单验证
 * $param $company_id 公司id
 * $param $id 主键id
 * @auth jackie <2019.10.>
 */
public static function validate($data,$company_id='',$id='')
{
    $messages = [
        'name.required' => __("message.department.name_required"),
        'name.max' => __("message.department.name_max"),
        'name.unique' => __("message.department.name_unique"),
    ];

    return Validator::make($data,[
        'name' => ['required','string','max:30',Rule::unique('table_name','name')->where(function ($query) use($company_id) {
            $query->where('company_id', $company_id);
        })->ignore($id,'id')],
    ],$messages);
}

/**
 * 表单验证(编辑)
 * $param $id 主键id
 * @auth jackie <2019.10.>
 */
public static function validateForUpdate($data,$id='')
{
    $messages = [
        'password.required' => __("message.email.password_required"),
        'password.min' => __("message.email.password_min"),
        'old_password.required' => __("message.email.old_password_required"),
    ];

    return Validator::make($data,[
        'password' => 'required|string|min:6',
        'old_password' => 'required',
    ],$messages);
}

/**
 * 表单验证(新增)
 * $param $company_id 公司id
 * $param $id 主键id
 * @auth jackie <2019.10.>
 */
public static function validateForCreate($data,$company_id='',$id='')
{
    $messages = [
        'email.required' => __("message.email.email_required"),
        'email.email' => __("message.email.email_email"),
        'email.unique' => __("message.email.email_unique"),
        'password.required' => __("message.email.password_required"),
        'password.min' => __("message.email.password_min"),
    ];

    return Validator::make($data,[
        'email' => ['required','string','email','max:255', Rule::unique('recruit_email','email')->where(function ($query) use($company_id) {
            $query->where('company_id', $company_id);
        })->ignore($id,"id")],
        'password' => 'required|string|min:6',
    ],$messages);
}