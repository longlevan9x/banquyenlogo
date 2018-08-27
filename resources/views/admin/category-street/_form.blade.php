<?php
/**
 * Created by PhpStorm.
 * User: LongPC
 * Date: 5/7/2018
 * Time: 10:56 PM
 */
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            @include('admin.layouts.title_form', ['title' => "Form Depertment"])
            <div class="x_content">
                {{ Form::model(isset($model) ? $model : null, [
                    'url' => \App\Http\Controllers\Admin\CategoryStreetController::getUrlAdmin(isset($model) ? $model->id : ''),
                    'files' => true,
                    'class' => 'form-horizontal form-label-left',
                    'id' => 'demo-form2',
                    'data-parsley-validate',
                    'method' => action_method_push_post($model)
                ]) }}
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="area_id"> {{__('Area')}}</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::select('area_id', \App\Models\Category::pluckWithType('name', 'id', \App\Models\Category::TYPE_AREA), $value = null,['onchange' => "getCategory(this, '#city_id', '" . url_admin('category/get-category') . "', '" .\App\Models\Category::TYPE_CITY. "')", 'class' => 'form-control col-md-7 col-xs-12', 'id' => 'area_id']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="city_id"> {{__('City')}}</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::select('city_id', \App\Models\Category::pluckWithType('name', 'id', \App\Models\Category::TYPE_CITY), $value = null,['onchange' => "getCategory(this, '#parent_id', '" . url_admin('category/get-category') . "', '" .\App\Models\Category::TYPE_DISTRICT. "')", 'class' => 'form-control col-md-7 col-xs-12', 'id' => 'city_id']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="parent_id"> {{__('District')}}</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::select('parent_id', \App\Models\Category::pluckWithType('name', 'id', \App\Models\Category::TYPE_DISTRICT), $value = null,['class' => 'form-control col-md-7 col-xs-12', 'id' => 'parent_id']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text('name', $value = null,['required' => "required", 'class' => 'form-control col-md-7 col-xs-12', 'id' => 'name']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Is active</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class="">
                            <label>
                                {!! Form::hidden('is_active', $value = 0) !!}
                                {!! Form::checkbox('is_active', $value = 1,$value = null, ['class' => 'js-switch']) !!}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;@lang('admin.saveButton')</button>
                        <button class="btn btn-primary" type="reset"><i class="fa fa-refresh"></i>&nbsp;@lang('admin.resetButton')</button>
                        @include('admin.layouts.widget.button.button_link.button', ['text' => __('admin.backButton'), 'icon' => 'fa-mail-reply', 'btn_type' => 'default', 'url' => url('category-street'), 'btn_size' => 'md'])
                    </div>
                </div>

                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
