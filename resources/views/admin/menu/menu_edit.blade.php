@extends('admin.layout')
@section('admin.content')
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Menu</a>
        </li>
        <li class="breadcrumb-item active">Menu List</li>
        </ol>
        <div class="row">
            <div class="col-lg-12">
                <!-- Example Bar Chart Card-->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-list"></i> Update menu details for <strong>{{ $details->title }}</strong>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @include('layouts.messages')
                            <form method="POST" action="{{ route('update_menu', ['menuId' => $details->id]) }}">
                            @csrf
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <tbody>
                                <tr>
                                    <td>
                                        <strong>Title</strong>
                                    </td>
                                    <td>
                                        <input type="text" name="title" class="form-control" value="{{ $details->title }}" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Location</strong>
                                    </td>
                                    <td>
                                        <select name="location" required>
                                            <option value=""></option>
                                            @foreach($locations AS $lc)
                                            <option value="{{ $lc }}" {{ ($details->location==$lc?"selected":"") }}>{{ $lc }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Path</strong>
                                    </td>
                                    <td>
                                        <input type="text" name="path" class="form-control" value="{{ $details->path }}" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Parents</strong>
                                    </td>
                                    <td>
                                        <select name="parent">
                                            <option value="">- No Parent -</option>
                                            @foreach($parents AS $key=>$value)
                                            <option value="{{ $key }}" {{ ($details->parent==$key?"selected":"") }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Language</strong>
                                    </td>
                                    <td>
                                        <select name="language" required>
                                            <option value="">- @lang('None') -</option>
                                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                            <option value="{{ $localeCode }}" {{ $details->language == $localeCode ? "selected" : "" }}>{{ $properties['native'] }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Weight</strong>
                                    </td>
                                    <td>
                                        <input type="text" name="weight" class="form-control" value="{{ $details->weight }}" required>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <input class="btn btn-outline-dark" type="submit" value="Update">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid-->
<!-- /.content-wrapper-->
@push('scripts')
    <script src="{{ asset('js/ddl.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('#country').trigger('change');
        });
    </script> 
@endpush
@endsection