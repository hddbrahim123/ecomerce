@extends('Layout.AdminLayout')

@section('AdminStyles')
    
@endsection

@section('AdminContent')
    <div class="container px-4 py-2">
        <div class="row">
            <h2>Edit Product</h2>
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
                <form action="{{ route('products.store')}}" method="POST">
                @csrf
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="name">name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ old('name' , $product->name)  }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="description">Description</label>
                        <input id="description" type="hidden" name="description" value="{{ old('description' , $product->description)  }}">
                        <trix-editor input="description"></trix-editor>
                      {{-- <textarea class="form-control" name="description" id="description"  rows="3">{{ old('description' , $product->description)  }}</textarea> --}}
                    </div>
                    <div class="form-group">
                      <label for="price">price</label>
                      <input type="number" name="price" class="form-control" id="price" value="{{ old('price' , $product->price)  }}" >
                    </div>
                    <div class="form-group">
                      <label for="quantity">Quantity</label>
                      <input type="number" name="quantity" class="form-control" id="quantity" value="{{ old('quantity' , $product->quantity)  }}" >
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="category">Category</label>
                          <select id="category" name="category_id" value="{{ old('category_id' , $product->category->name)  }}" class="form-control">
                            <option selected>Choose category ...</option>
                            @foreach ($categories as $category)
                              <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="status">Status</label>
                          <select id="status" name="status" value="{{ old('status' , $product->status)  }}" class="form-control">
                            <option selected>Choose Status ...</option>
                            <option value="1">Active</option>
                            <option value="0">InActive</option>
                          </select>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="images">Images</label>
                        <div class="input-group ">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="images">Upload Image</span>
                          </div>
                          <div class="custom-file">
                            <input multiple type="file" name="images" class="custom-file-input" id="images" >
                            <label class="custom-file-label" for="images">Choose Images</label>
                          </div>
                        </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="meta_title">Meta Title</label>
                        <input type="text" name="meta_title" class="form-control" id="meta_title" value="{{ old('meta_title' , $product->meta_title)  }}">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="meta_description">Meta Description</label>
                        <input type="text" name="meta_description" class="form-control" id="meta_description" value="{{ old('meta_description' , $product->meta_description)  }}">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="meta_keywords">Meta Keywords</label>
                        <input type="text" name="meta_keywords" class="form-control" id="meta_keywords" value="{{ old('meta_keywords' , $product->meta_keywords)  }}">
                      </div>
                  </div>
                    <button type="submit" class="btn btn-block text-white bg-primary">Update Product</button>
                  </form>
            </div>
        </div>
    </div>
@endsection