@extends('layouts.app')

@section('content')
<div class="bg-dashboard pt-5">

    <div class="container py-5">
        @if ($errors->any())
        <div class="alert alert-danger">
            I dati inseriti non sono validi:
            
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="container-form rounded-5 shadow">
            <h1 class="custom-color mb-3">Create new dishes</h1>
            
            <form action="{{ route('dishes.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                {{-- name-input --}}
                <div class="mb-3">
                    <label class="form-label">Name:</label>
                    <input type="text"
                    class="form-control @error('name') is-invalid @elseif(old('name')) is-valid  @enderror"
                    value="{{ $errors->has('name') ? '' : old('name') }}" name="name">
                    
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                {{-- Description-input --}}
                <div class="mb-3">
                    <label class="form-label">Description:</label>
                    <input type="text"
                    class="form-control @error('description') is-invalid @elseif(old('description')) is-valid  @enderror"
                    value="{{ $errors->has('description') ? '' : old('description') }}" name="description">
                    
                    @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                {{-- Ingredients-input --}}
                <div class="mb-3">
                    <label class="form-label">Ingredients:</label>
                    <input type="text"
                    class="form-control @error('ingredients') is-invalid @elseif(old('ingredients')) is-valid  @enderror"
                    value="{{ $errors->has('ingredients') ? '' : old('ingredients') }}" name="ingredients">
                    
                    @error('ingredients')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                {{-- Price-input --}}
                <div class="mb-3">
                    <label class="form-label">Price:</label>
                    <input type="text"
                    class="form-control @error('price') is-invalid @elseif(old('price')) is-valid  @enderror"
                    value="{{ $errors->has('price') ? '' : old('price') }}" name="price">
                    
                    @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                {{-- Cover-image-input --}}
                <div class="mb-3">
                    <label class="form-label">Image:</label>
                    <input type="file" class="form-control  @error('image') is-invalid @enderror" name="image">
                </div>
                
                {{-- Visibility-input --}}
                <div class="mb-3 form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="switch" name="visibility"
                      {{ old('visibility', 1) ? 'checked' : '' }} value="1">
                    <label class="form-check-label" for="switch">Visibility</label>
                  </div>

                <button type="submite" class="btn btn-primary btn-custom">Save</button>
            </div>
        </div>
    </div>
        @endsection
