@extends('admin.layout.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">@lang('admin.home') / </span>@lang('admin.cities')</h4>

        <div class="row g-4 mb-4">
            <div class="col-sm-6 col-xl-4">
            </div>

            <div class="col-sm-6 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="avatar">
                                <div class="avatar-initial bg-label-primary rounded">
                                    <div class="mdi mdi-city"></div>
                                </div>
                            </div>
                            <div class="ms-3">
                                <div class="d-flex align-items-center">
                                    <h5 class="mb-0">{{ citiesCount()['cities_count'] }}</h5>
                                </div>
                                <small class="text-muted">@lang('admin.cities')</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-4">
            </div>
        </div>
        <!-- Users List Table -->
        <div class="card">
            <div class="card-header">
                @if(Auth::guard('admin')->user()->hasPermission('cities-create'))
                    <button style="float: right" data-bs-target="#modal-add" data-bs-toggle="modal"
                            class="btn btn-primary mb-3 text-nowrap add-new-city">
                        @lang('admin.addcities')
                    </button>
                @else
                    <button class="dt-button create-new btn btn-primary waves-effect waves-float waves-light disabled"
                            type="button">
                        <span style="font-size: 15px;">@lang('admin.addcities')</span>
                    </button>
                @endif

            </div>
            <div class="card-datatable text-nowrap" style="margin-top: -25px;">
                {{ $dataTable->table([
                    'class'=> 'datatables-ajax table table-bordered admin-main-table'
                ],true) }}
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modal-add" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalCenterTitle">@lang('admin.addcities')</h4>
                </div>
                <form action="{{ route('admin.cities.store') }}" method="POST"
                class="row g-3" data-parsley-validate="" data-massage = "{{__('admin.added')}}" data-url="{{ route('admin.cities.index') }}"  id="addForm">
                @csrf
                @method('post')
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-4 mt-2">
                            <div class="form-floating form-floating-outline">
                                <input id="nameWithTitle" type="text" class="form-control" name="title_en" value="{{old('title_en')}}"
                                       placeholder="@lang('admin.en.title')" parsley-trigger="change"
                                           data-parsley-maxlength="30" required/>
                                <label for="nameWithTitle">@lang('admin.en.title')</label>
                            </div>
                        </div>

                        <div class="col mb-4 mt-2">
                            <div class="form-floating form-floating-outline">
                                <input id="nameWithTitle" type="text" class="form-control" name="title_ar" value="{{old('title_ar')}}"
                                       placeholder="@lang('admin.ar.title')"parsley-trigger="change"
                                           data-parsley-maxlength="30" required   data-parsley-arabic />
                                <label for="nameWithTitle">@lang('admin.ar.title')</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                        @lang('admin.cancel')
                    </button>
                    <button type="submit" class="btn btn-primary">@lang('admin.save')</button>
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('js')
    {{ $dataTable->scripts() }}
    <script src="{{ asset('adminStyle/customJs/loans-actions.js')}}"></script>
@endpush
