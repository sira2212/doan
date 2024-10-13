@extends('index')
@section('content_wrapper')
<div class="row">
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
    <div class="col-md-6" style="padding-top: 20px; margin: 0 auto;">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Cập nhật thiết bị</h5>
                <small class="text-muted float-end">Default label</small>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin-equipment-update', ['id' => $equipments->id]) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="equipment_name">Tên thiết bị</label>
                        <input type="text" class="form-control" id="equipment_name" value="{{ $equipments->equipment_name }}" name="equipment_name" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="room_id">Mã phòng</label>
                        <select class="form-control" name="room_id" required>
                            <option value="">-- Chọn phòng --</option>
                            @foreach ($rooms as $room)
                                <option value="{{ $room->id }}" {{ $equipments->room_id == $room->id ? 'selected' : '' }}>
                                    {{ $room->room_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="status">Trạng thái</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="1" {{ $equipments->status == 1 ? 'selected' : '' }}>Đang có sẵn</option>
                            <option value="0" {{ $equipments->status == 0 ? 'selected' : '' }}>Đang bảo trì</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="description">Mô tả</label>
                        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Nhập chi tiết">{{ $equipments->description }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                    <a style="margin-left: 20px;" class="btn btn-secondary" href="{{ route('admin-equipment') }}">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
