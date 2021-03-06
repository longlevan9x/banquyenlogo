<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="row">
        <div class="x_panel">
            @include('admin.layouts.title_table', ['text' => __('admin/menu.list expert')])
            <div class="box-header with-border">
                <div style="float: left;">
                    @include('admin.layouts.widget.button.button_link.create', ['text' => __('admin/menu.add expert'), 'btn_size' => 'md', 'icon' => 'fa-plus', 'options' => ['data-style'=>"zoom-in", 'class' => 'ladda-button'], 'url' => route(\App\Http\Controllers\Admin\ExpertController::getAdminRouteName('create'))])
                </div>
                @include('admin.layouts.widget.button.bulk-delete', ['table' => \App\Models\Post::table(), 'classTable' => \App\Models\Post::class])
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table id="datatable-checkbox" class="table {{\App\Models\Post::table()}} table-striped table-bordered bulk_action">
                        <thead>
                        <tr>
                            <th>
                                <input type="checkbox" id="check-all" class="">
                            </th>
                            <th>@lang('admin/common.image')</th>
                            <th>@lang('admin/common.title')</th>
                            <th>@lang('admin/news.author')</th>
                            <th>@lang('admin/common.is_active')</th>
                            <th>@lang('admin/news.publish date')</th>
                            <th>@lang('admin/common.created date')</th>
                            <th>@lang('admin/common.author update')</th>
                            <th>@lang('admin/common.updated date')</th>
                            <th>@lang('admin/common.action')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @each('admin.expert._table', $models, 'model', 'admin.layouts.widget.list-empty')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
