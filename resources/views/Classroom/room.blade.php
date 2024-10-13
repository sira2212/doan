@extends('layout')
@section('content_wrapper')
<div class="container-xxl flex-grow-1 container-p-y">
    <div style="display: flex;justify-content: space-between;">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light"> </span> Quản lý phòng</h4>
        <div style="margin: 10px;">
            <a class="btn btn-primary" href="{{ route('admin-room-create') }}"><i class="bx bx-plus me-1"></i> Thêm mới phòng</a>
        </div>

    </div>

  <!-- Basic Bootstrap Table -->
  <div class="card">

    <h5 class="card-header">  </h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên Phòng</th>
                    <th>Loại phòng</th>
                    <th>Sức chứa</th>
                    <th>Trạng thái</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @php
                $perPage = $rooms->perPage();
                $currentPage = $rooms->currentPage();
                $i = ($currentPage - 1) * $perPage + 1;
            @endphp
                @foreach ($rooms as $item)
                    <tr>
                        <td>{{ $i++ }}</td>

                        <td>{{ $item->room_name }}</td>
                        <td>
                            {{ $item->typeRoom->type_name }}
                        </td>
                        <td>{{ $item->capacity}}</td>
                        <td>
                            @if ($item->status == 1)
                                <span class="badge bg-label-success">Đang có sẵn</span>
                            @elseif($item->status == 0)
                                <span class="badge bg-label-warning">Đang bảo trì</span>
                            @endif
                        </td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('admin-room-edit',['id'=>$item->id]) }}">
                                        <i class="bx bx-edit-alt me-1"></i> Sửa
                                    </a>
                                    <a class="dropdown-item" href="{{ route('admin-room-delete',['id'=>$item->id]) }}">
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
    {{ $rooms->links('vendor.pagination.admin') }}
  </div>
  <!--/ Basic Bootstrap Table -->


  <!--/ Responsive Table -->
</div>
<!-- / Content -->

<!-- Footer -->
@endsection
