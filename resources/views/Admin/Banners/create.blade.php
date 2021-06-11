@extends('Layout.AdminLayout')

@section('AdminStyles')
    
@endsection

@section('AdminContent')
    <div class="container px-4 py-2">
        <div class="row">
            <h2>{{ isset($banner) ? "Edit Banner" : "Add Banner" }}</h2>
        </div>
    </div>
    <div class="container bg-white">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-between align-items-center">
                <div class="py-4">
                    <a href="{{ route('banners.index') }}"  class="btn bg-primary text-white ">
                        <i class="fas fa-arrow-circle-left"></i>
                            Back to list
                    </a>
                </div>
            </div>
            <div class="col-lg-12 p-4">
                <form action="{{ isset($banner) ? route('banners.update' , ['banner'=>$banner->id]) : route('banners.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($banner))
                    @method('PUT')
                @endif
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="title">title</label>
                        <input type="text" name="title" class="@error('title') is-invalid @enderror form-control" id="name" value="{{ old('title' , isset($banner) ? $banner->title : "") }}">
                        @error('title')
                            <div id="title" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="description">Description</label>
                      {{-- <textarea class="form-control" name="description" id="description" rows="3"></textarea> --}}
                    
                      <input id="description" class="@error('description') is-invalid @enderror" type="hidden" name="description" value="{{ old('description' , isset($banner) ? $banner->description : "") }}">
                      <trix-editor input="description"></trix-editor>
                      @error('description')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                          <label for="status">Status</label>
                          <select id="status" name="status" class="@error('status') is-invalid @enderror form-control" value="{{ old('status' , isset($banner) ? $banner->status : "") }}">
                            <option selected>Choose Status ...</option>
                            <option value="1">Active</option>
                            <option value="0">InActive</option>
                          </select>
                        </div>
                        @error('status')
                            <div id="status" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="image">image</label>
                        <div class="input-group ">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="photo">Upload image</span>
                          </div>
                          <div class="custom-file">
                            <input  type="file" name="image" class="custom-file-input" id="image" >
                            <label class="custom-file-label" for="photo">Choose image</label>
                          </div>
                        </div>
                        @if(isset($banner))
                            <div>
                              <img src="{{ Storage::url($banner->image) }}" alt="{{ $banner->title }}" width="400px" height="400px" class="img-thumbnail m-2">
                            </div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-block text-white bg-primary">{{ isset($banner) ? "Update Banner" : "Add Banner"}}</button>
                  </form>
            </div>
        </div>
    </div>
@endsection