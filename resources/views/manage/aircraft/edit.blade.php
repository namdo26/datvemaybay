@extends('manage.layout.app')

@section('title', 'Edit airlines')

@section('content')

@if(session('message'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong> {{session('message')}}</strong>
        </div>
@endif


<div class="row justify-content-center">
    <div class="card">
        <div class="card-header">Chỉnh sửa thông tin hãng hàng không</div>
            <div class="form-group row">                
                <div class="card-body justify-content-center">
                    <form method="POST" action="{{ route('aircrafts.update',$aircraft->id) }}"  enctype="multipart/form-data" >
                    @csrf
                    @method('put')
                        <div class="form-group row">
                            <label for="airline_ID" class="col-md-2 col-form-label text-md-right">{{ __('Thuộc hãng hàng không') }}</label>

                            <div class="col-md-4">
                                <select id="airline_ID" class="form-control @error('airline_ID') is-invalid @enderror" name="airline_ID">
                                        @foreach($airlines as $item)
                                            <option {{ $aircraft->airline_ID == $item->id ? 'selected' : '' }} value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>

                                @error('airlines')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                            
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Cập nhật') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
