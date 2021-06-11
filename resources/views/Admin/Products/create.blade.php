@extends('Layout.AdminLayout')

@section('AdminStyles')
    
@endsection

@section('AdminContent')
    <div class="container px-4 py-2">
        <div class="row">
            <h2>{{ isset($product) ? "Edit Product" : "Add Products" }}</h2>
        </div>
    </div>
    <div class="container bg-white">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-between align-items-center">
                <div class="py-4">
                    <a href="{{ route('products.index') }}"  class="btn bg-primary text-white ">
                        <i class="fas fa-arrow-circle-left"></i>
                            Back to list
                    </a>
                </div>
            </div>
            <div class="col-lg-12 p-4">
                <form action="{{ isset($product) ? route('products.update' , ['product'=>$product->id]) : route('products.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($product))
                    @method('PUT')
                @endif
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="name">name</label>
                        <input type="text" name="name" class="@error('name') is-invalid @enderror form-control" id="name" value="{{ old('name' , isset($product) ? $product->name : "") }}">
                        @error('name')
                            <div id="name" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="description">Description</label>
                      {{-- <textarea class="form-control" name="description" id="description" rows="3"></textarea> --}}
                    
                      <input id="description" class="@error('description') is-invalid @enderror" type="hidden" name="description" value="{{ old('description' , isset($product) ? $product->description : "") }}">
                      <trix-editor input="description"></trix-editor>
                      @error('description')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror

                    </div>
                    <div class="form-group">
                      <label for="price">price</label>
                      <input type="number" name="price" class=" @error('price') is-invalid @enderror form-control" id="price" value="{{ old('price' , isset($product) ? $product->price : "") }}" >
                      @error('price')
                          <div class="invalid-feedback">
                                {{ $message }}
                          </div>
                      @enderror
                      
                    </div>
                    <div class="form-group">
                      <label for="quantity">Quantity</label>
                      <input type="number" name="quantity" class="@error('quantity') is-invalid @enderror form-control" id="quantity" value="{{ old('quantity' , isset($product) ? $product->quantity : "") }}">
                      @error('quantity')
                          <div class="invalid-feedback">
                                {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="category">Category</label>
                          <select id="category" name="category_id" class="form-control">
                            <option selected>Choose category ...</option>
                            @foreach ($categories as $category)
                              <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="status">Status</label>
                          <select id="status" name="status" class="form-control" value="{{ old('status' , isset($product) ? $product->status : "") }}">
                            <option selected>Choose Status ...</option>
                            <option value="1">Active</option>
                            <option value="0">InActive</option>
                          </select>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="photo">Photo</label>
                        <div class="input-group ">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="photo">Upload photo</span>
                          </div>
                          <div class="custom-file">
                            <input  type="file" name="photo" class="custom-file-input" id="photo" >
                            <label class="custom-file-label" for="photo">Choose photo</label>
                          </div>
                        </div>
                        @if(isset($product))
                            <div>
                              <img src="{{ Storage::url($product->photo->path) }}" alt="{{ $product->name }}" width="400px" height="400px" class="img-thumbnail m-2">
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                      <label for="images">Images</label>
                        <div class="input-group ">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="images">Upload Image</span>
                          </div>
                          <div class="custom-file">
                            <input multiple type="file" name="images[]" class="custom-file-input" id="images" >
                            <label class="custom-file-label" for="images">Choose Images</label>
                          </div>
                        </div>
                        @if(isset($product))
                              <div class="d-flex">
                                  @foreach ($product->images as $image)
                                    <img src="{{ Storage::url($image->path) }}" alt="{{ $product->name }}" width="100px" height="200px" class="img-thumbnail m-2">
                                  @endforeach
                              </div>
                        @endif
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="meta_title">Meta Title</label>
                        <input type="text" name="meta_title" class="@error('meta_title') is-invalid @enderror form-control" id="meta_title" value="{{ old('meta_title' , isset($product) ? $product->meta_title : "") }}">
                        @error('meta_title')
                          <div class="invalid-feedback">
                                {{ $message }}
                          </div>
                      @enderror
                      </div>
                      <div class="form-group col-md-4">
                        <label for="meta_description">Meta Description</label>
                        <input type="text" name="meta_description" class="@error('meta_description') is-invalid @enderror form-control" id="meta_description" value="{{ old('meta_description' , isset($product) ? $product->meta_description : "") }}">
                        @error('meta_description')
                          <div class="invalid-feedback">
                                {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="form-group col-md-4">
                        <label for="meta_keywords">Meta Keywords</label>
                        <input type="text" name="meta_keywords" class="@error('meta_keywords') is-invalid @enderror form-control" id="meta_keywords" value="{{ old('meta_keywords' , isset($product) ? $product->meta_keywords : "") }}">
                        @error('meta_keywords')
                          <div class="invalid-feedback">
                                {{ $message }}
                          </div>
                        @enderror
                      </div>
                  </div>
                    <button type="submit" class="btn btn-block text-white bg-primary">{{ isset($product) ? "Update Product" : "Add Product"}}</button>
                  </form>
            </div>
        </div>
    </div>
@endsection