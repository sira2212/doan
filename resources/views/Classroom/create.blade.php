@extends('layout')
@section('content_wrapper')
<div class="row">
    <div class="col-md-6" style="padding-top: 20px; margin: 0 auto;">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Thêm phòng</h5>
                <small class="text-muted float-end">Default label</small>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin-room-store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="room_name">Tên phòng</label>
                        <input type="text" class="form-control" id="room_name" placeholder="Nhập tên phòng" name="room_name" required />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="capacity">Sức chứa</label>
                        <input type="number" class="form-control" id="capacity" placeholder="Nhập sức chứa" name="capacity" required />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="status">Trạng thái</label>
                        <select class="form-select" id="exampleFormControlSelect1" name="status">
                            <option value="">--Chọn trạng thái--</option>
                                <option value="1">Đang có sẵn</option>
                                <option value="2">Đang bảo trì</option>

                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="room_type_id">Chọn kiểu phòng</label>
                        <select class="form-select" id="exampleFormControlSelect1" name="room_type_id">
                            <option value="">--Chọn kiểu phòng--</option>
                            @foreach ($type as $item)
                                <option value="{{ $item->id }}">{{ $item->type_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="Description">Mô tả</label>
                        <textarea
                            class="form-control"
                            id="Description"
                            name="Description"
                            placeholder="Nhập chi tiết"
                            rows="4"
                        ></textarea>
                    </div>



                    <button type="submit" class="btn btn-primary">Thêm phòng</button>
                    <a style="margin-left: 20px;" class="btn btn-secondary" href="{{ route('admin-room') }}">Quay lại</a>
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
