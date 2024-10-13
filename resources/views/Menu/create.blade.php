@extends('layout')
@section('content_wrapper')
<div class="row">
    <div class="col-md-6" style="padding-top: 20px; margin: 0 auto;">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Thêm Menu</h5>
                <small class="text-muted float-end">Default label</small>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin-menu-store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="menu_name">Tên Menu</label>
                        <input type="text" class="form-control" id="menu_name" placeholder="Nhập tên menu" name="menu_name" required />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="link">Link</label>
                        <input type="text" class="form-control" id="link" placeholder="Nhập link" name="link" required />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="icon">Icon</label>
                        <input type="text" class="form-control" id="icon" placeholder="Nhập icon" name="icon" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="parent_id">Menu Cha</label>
                        <select class="form-select" id="exampleFormControlSelect1" name="parent_id">  {{-- Đảm bảo rằng bạn dùng đúng tên biến --}}
                            <option value="">Chọn Menu Cha</option>
                            @foreach ($menu as $item)
                                <option value="{{ $item->id }}">{{ $item->menu_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="order">Thứ Tự</label>
                        <input type="number" class="form-control" id="order" name="order" value="0" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="IsActive">Kích Hoạt</label>
                        <select class="form-control" name="IsActive" id="IsActive">
                            <option value="1">Có</option>
                            <option value="0">Không</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Thêm Menu</button>
                    <a style="margin-left: 20px;" class="btn btn-secondary" href="{{ route('admin-menu') }}">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-js')
<script src="{{ asset('source/ckeditor5/ckeditor.js') }}"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
