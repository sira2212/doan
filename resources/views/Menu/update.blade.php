@extends('index')
@section('content_wrapper')
<div class="row">
    <div class="col-md-6" style="padding-top: 20px; margin: 0 auto;">
        <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Update menu</h5>
          <small class="text-muted float-end">Default label</small>
        </div>
        <div class="card-body">
        <form method="POST" action="{{ route('admin-menu-update',['id'=>$menu->id]) }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">Tên menu</label>
              <input type="text" class="form-control" id="basic-default-fullname" value="{{ $menu->menu_name }}" name="menu_name" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default">Link</label>
                <input type="text" class="form-control" id="basic-default" value="{{ $menu->link }}" name="link"/>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default">Menu cha</label>
                <select class="form-control" name="parent_id">
                    <option value="">-- Không có Menu cha --</option>
                    @foreach ($menus as $item)
                        <option value="{{ $item->id }}" {{ $menu->parent_id == $item->id ? 'selected' : '' }}>
                            {{ $item->menu_name }}
                        </option>
                    @endforeach
                </select>
            </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default">Thứ tự</label>
                <input type="number" class="form-control" id="basic-default" value="{{ $menu->order }}" name="order"/>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default">Trạng thái kích hoạt</label>
                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="IsActive">
                    <option value="0" {{ $menu->IsActive == 0 ? 'selected' : '' }}>Không kích hoạt</option>
                    <option value="1" {{ $menu->IsActive == 1 ? 'selected' : '' }}>Kích hoạt</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Edit </button>
            <a style="margin-left: 20px;" class="btn btn-secondary" href="{{ route('admin-menu') }}">Quay lại</a>
        </div>
        </form>
        </div>
      </div>
    </div>

  </div>
@endsection
