@extends('admin.layout.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span
                class="text-muted fw-light">@lang('admin.home') / @lang('admin.cities') / </span>@lang('admin.editcities')
        </h4>

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.cities.update',$city->id) }}" method="POST"
                          class="row g-3" data-parsley-validate="" data-massage="{{__('admin.updated')}}"
                          data-url="{{ route('admin.cities.index') }}" id="editForm">
                        @csrf
                        @method('put')

                        <div class="col-md-6">
                            <div class="form-floating form-floating-outline">
                                <input id="formValidationName" type="text" class="form-control" name="title_en"
                                       value="{{$city->title_en}}"
                                       placeholder="@lang('admin.en.title')" required/>
                                <label for="formValidationName">@lang('admin.en.title')</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating form-floating-outline">
                                <input id="formValidationEmail" type="text" name="title_ar" value="{{$city->title_ar}}"
                                       class="form-control"
                                       placeholder="@lang('admin.ar.title')" required/>
                                <label for="formValidationEmail">@lang('admin.ar.title')</label>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button type="reset" class="btn btn-outline-secondary">{{ __('admin.reset') }}</button>
                            <button type="submit" class="btn btn-primary">@lang('admin.save')</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
