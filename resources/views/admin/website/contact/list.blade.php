<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="row">
        <div class="x_panel">
            @include('admin.layouts.title_table', ['text' => __('admin/website.list contact')])
            <div class="box-header with-border">
                <div class="col-md-1">
                    @include('admin.layouts.widget.button.bulk', ['text' => __('admin.contacted'), 'table' => \App\Models\Post::table(), 'classTable' => \App\Models\Post::class, 'key' => 'is_active', 'value' => 0 ])
                </div>
                <div class="col-md-1">
                    @include('admin.layouts.widget.button.bulk-delete', ['table' => \App\Models\Post::table(), 'classTable' => \App\Models\Post::class])
                </div>
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
                            <th>@lang('admin/common.name')</th>
                            <th>@lang('admin/common.phone number')</th>
                            <th>@lang('admin.question')</th>
                            <th>@lang('admin/common.is_active')</th>
                            <th>@lang('admin/common.created date')</th>
                            <th>@lang('admin/common.action')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @each('admin.website.contact._table', $models, 'model', 'admin.layouts.widget.list-empty')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
