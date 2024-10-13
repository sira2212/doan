@extends('layout')
@section('content_wrapper')
<div class="row">
    <div class="col-md-6" style="padding-top: 20px; margin: 0 auto;">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Thêm thiết bị</h5>
                <small class="text-muted float-end">Default label</small>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin-equipment-store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="equipment_name">Tên thiết bị</label>
                        <input type="text" class="form-control" id="equipment_name" placeholder="Nhập tên thiết bị" name="equipment_name" required />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="room_id">Mã phòng</label>
                        <input type="number" class="form-control" id="room_id" placeholder="Nhập mã phòng" name="room_id" required />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="status">Trạng thái</label>
                        <select class="form-select" id="status" name="status">
                            <option value="">--Chọn trạng thái--</option>
                            <option value="1">Đang có sẵn</option>
                            <option value="0">Đang bảo trì</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="Description">Mô tả</label>
                        <textarea
                            class="form-control"
                            id="Description"
                            name="description"
                            placeholder="Nhập chi tiết"
                            rows="4"
                        ></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Thêm thiết bị</button>
                    <a style="margin-left: 20px;" class="btn btn-secondary" href="{{ route('admin-equipment') }}">Quay lại</a>
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
