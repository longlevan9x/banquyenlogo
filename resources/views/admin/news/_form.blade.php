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
            @include('admin.layouts.title_form', ['title' => __('admin/menu.add_news')])
            <div class="x_content">
                {{ Form::model(isset($model) ? $model : null, [
                    'url' => \App\Http\Controllers\Admin\NewsController::getUrlAdmin(isset($model) ? $model->id : ''),
                    'files' => true,
                    'class' => 'form-horizontal form-label-left',
                    'id' => 'demo-form2',
                    'data-parsley-validate',
                    'method' => action_method_push_post($model)
                ]) }}

                <div class="col-md-9 row">
                    <div class="form-group">
                        <label class="col-md-12 col-sm-12 col-xs-12" for="title">@lang('admin/news.title')<span class="required">*</span></label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            {!! Form::text('title', $value = null,['required' => "required", 'class' => 'form-control col-md-7 col-xs-12', 'id' => 'title']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class=" col-md-12 col-sm-12 col-xs-12" for="editor">@lang('admin/news.content')</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            {!! Form::textarea('content', $value = null,['class' => 'form-control col-md-7 col-xs-12', 'id' => 'editor1']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class=" col-md-12 col-sm-12 col-xs-12" for="overview">@lang('admin/common.overview')</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            {!! Form::textarea('overview', $value = null,['rows' => 4, 'class' => 'form-control col-md-7 col-xs-12', 'id' => 'overview']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12 col-sm-12 col-xs-12" for="slug">@lang('admin/category.slug')</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            {!! Form::text('slug', $value = null,['class' => 'form-control col-md-7 col-xs-12', 'id' => 'slug']) !!}
                            <p class="help-block">@lang('admin/category.will be automatically generated from your title, if left empty.')</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12">@lang('admin/common.is_active')</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <div class="">
                                <label>
                                    {!! Form::hidden('is_active', $value = 0) !!}
                                    {!! Form::checkbox('is_active', $value = 1,$value = null, ['class' => 'js-switch']) !!}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12 col-sm-12 col-xs-12" for="post_time"> {{__('admin/news.publish date')}}</label>
                        <div class='input-group date' id='datetimepicker1'>
                            <div class="col-md-12" style="padding-right: 0">
                                {!! Form::text('post_time', $value = null,['class' => 'form-control col-md-7 col-xs-12', 'default' => '', 'id' => 'post_time']) !!}
                            </div>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>

                    @include('admin.layouts.widget.form.image-full', ['model' => $model ?? null])

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;@lang('admin.saveButton')</button>
                            <button class="btn btn-primary" type="reset"><i class="fa fa-refresh"></i>&nbsp;@lang('admin.resetButton')</button>
                            @include('admin.layouts.widget.button.button_link.button', ['text' => __('admin.backButton'), 'icon' => 'fa-mail-reply', 'btn_type' => 'default', 'url' => url('news'), 'btn_size' => 'md'])
                        </div>
                    </div>
                    {{--Seo--}}
                    <br>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">@lang('admin.seo')</h3>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 col-sm-12 col-xs-12" for="seo_title">@lang('admin/common.seo_title')</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            {!! Form::textarea('seo_title', $value = null,['class' => 'form-control col-md-7 col-xs-12', 'rows' => 2, 'id' => 'seo_title']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 col-sm-12 col-xs-12" for="seo_keyword">@lang('admin/common.seo_keyword')</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            {!! Form::textarea('seo_keyword', $value = null,['class' => 'form-control col-md-7 col-xs-12', 'rows' => 2, 'id' => 'seo_keyword']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 col-sm-12 col-xs-12" for="seo_description">@lang('admin/common.seo_description')</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            {!! Form::textarea('seo_description', $value = null,['class' => 'form-control col-md-7 col-xs-12', 'id' => 'seo_description']) !!}
                        </div>
                    </div>
                    {{--Seo--}}
                </div>

                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
