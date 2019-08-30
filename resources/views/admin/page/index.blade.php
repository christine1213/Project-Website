@extends('admin.layouts.app')
@section('main-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Controllers List
            <!--small>it all starts here</small-->
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>            
            <li class="active">Controllers</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box box-danger @if(empty($cname)) {{ "collapsed-box" }} @endif">
            <div class="box-header with-border">
                <h3 class="box-title">Search in controller list's</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                        @if(empty($cname)) 
                        <i class="fa fa-plus"></i>
                        @else
                        <i class="fa fa-minus"></i>
                        @endif

                    </button>                    
                </div>
            </div>
            <div class="box-body" style="@if(empty($cname)) {{ "display: none" }} @endif">
                <div class="row">
                    <form role="form" action="{{ route('page.index') }}" method="get">
                        <div class="col-xs-3">
                            <input type="text" class="form-control" name="cname" placeholder="Controller Name" value="{{ $cname }}">
                        </div>                        
                        <div class="col-xs-3">
                            <button type="submit" class="btn btn-primary">Search</button>
                            <a class='btn btn-warning' href="{{ route('page.index') }}">Reset</a>
                        </div>                        
                    </form>
                </div>
            </div>
            <!-- /.box-body -->
        </div>  
        <!-- Default box -->
        <div class="box box-warning">
            <div class="box-body">
                <div class="box-tools pull-left" style="padding: 10px;">
                    <a class='col-lg-offset-0 btn btn-success' href="{{ route('page.create') }}">Add New</a>
                </div>
                <div class="box-tools pull-right" style="margin-top: -16px;">
                    {{ $pages->links() }}
                </div>
                <table id="example" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Label</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pages as $page)
                        <tr>
                            <td>{{ (($pages->currentPage() - 1) * $pages->perPage()) + $loop->iteration }}</td>
                            <td>{{ $page->name }}</td>
                            <td>{{ $page->label }}</td>
                            <td><a href="{{ route('page.edit',$page->id) }}"><span class="glyphicon glyphicon-edit"></span></a></td>
                            <td>
                                <form id="delete-form-{{ $page->id }}" method="post" action="{{ route('page.destroy',$page->id) }}" style="display: none">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                </form>
                                <a href="" onclick="
                                            if (confirm('Are you sure, You Want to delete this?'))
                                    {
                                    event.preventDefault();
                                    document.getElementById('delete-form-{{ $page->id }}').submit();
                                        }
                                        else{
                                        event.preventDefault();
                                        }" ><span class="glyphicon glyphicon-trash"></span></a>
                            </td>
                        </tr>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Label</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                </table>
                <div class="box-tools pull-right" style="margin-top: -16px;">
                    {{ $pages->links() }}
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection