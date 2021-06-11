@extends('Layout.AdminLayout')

@section('AdminStyles')
    
@endsection

@section('AdminContent')
    <div class="container px-4 py-2">
        <div class="row">
            <h2>{{ isset($category) ? 'Update Category' : 'Add Category' }}</h2>
        </div>
    </div>
    <div class="container bg-white">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-between align-items-center">
                <div class="py-4">
                    <a href="{{ route('categories.index') }}"  class="btn bg-primary text-white ">
                        <i class="fas fa-arrow-circle-left"></i>
                            Back to list
                    </a>
                </div>
            </div>
            <div class="col-lg-12 p-4">
                <form action="{{ isset($category) ? route('categories.update' , ['category' => $category->id]) :route('categories.store') }}" method="POST">
                @csrf
                @if(isset($category))
                    @method('PUT')
                @endif
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="category">Category</label>
                        <input type="text" name="name" class="@error('name') is-invalid @enderror form-control" id="category" value="{{ old('category' , isset($category) ? $category->name : "") }}">
                        @error('name')
                            <div id="name" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        
                    </div>
                    </div>
                    <button type="submit" class="btn bg-primary"> {{ isset($category) ? 'Update Category' : 'Add Category' }}</button>
                  </form>
            </div>
        </div>
    </div>
@endsection