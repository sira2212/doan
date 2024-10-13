@extends('layout')
@section('content_wrapper')
<div class="container-xxl flex-grow-1 container-p-y">
    <div style="display: flex; justify-content: space-between;">
        @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
        <h4 class="py-3 mb-4">Quản lý thiết bị</h4>
        <div style="margin: 10px;">
            <a class="btn btn-primary" href="{{ route('admin-equipment-create') }}">
                <i class="bx bx-plus me-1"></i> Thêm mới thiết bị
            </a>
        </div>
    </div>

    <div class="card">
        <h5 class="card-header"></h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên thiết bị</th>
                        <th>Mã phòng</th>
                        <th>Trạng thái</th>
                        <th>Mô tả</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @php
                        $perPage = $equipments->perPage();
                        $currentPage = $equipments->currentPage();
                        $i = ($currentPage - 1) * $perPage + 1;
                    @endphp
                    @foreach ($equipments as $item)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $item->equipment_name }}</td>
                            <td>{{ $item->room->room_name ?? 'N/A' }}</td>
                            <td>
                                @if ($item->status == 1)
                                    <span class="badge bg-label-success">Đang có sẵn</span>
                                @elseif ($item->status == 0)
                                    <span class="badge bg-label-warning">Đang bảo trì</span>
                                @endif
                            </td>
                            <td>{{ $item->description }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('admin-equipment-edit', ['id' => $item->id]) }}">
                                            <i class="bx bx-edit-alt me-1"></i> Sửa
                                        </a>
                                        <a class="dropdown-item" href="{{ route('admin-equipment-delete', ['id' => $item->id]) }}">
                                            <i class="bx bx-trash me-1"></i> Xóa
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $equipments->links('vendor.pagination.admin') }}
    </div>
</div>
@endsection
