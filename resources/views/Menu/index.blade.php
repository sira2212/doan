@extends('layout')
@section('content_wrapper')
<div class="container-xxl flex-grow-1 container-p-y">
    <div style="display: flex;justify-content: space-between;">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light"> </span> Quản lý menu</h4>
        <div style="margin: 10px;">
            <a class="btn btn-primary" href="{{ route('admin-menu-create') }}"><i class="bx bx-plus me-1"></i> Thêm mới menu</a>
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
                    <th>Tên Menu</th>
                    <th>Icon</th>
                    <th>Menu cha</th>
                    {{-- <th>Thứ tự</th> --}}
                    <th>Trạng thái</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @php
                $perPage = $menus->perPage();
                $currentPage = $menus->currentPage();
                $i = ($currentPage - 1) * $perPage + 1;
            @endphp
                @foreach ($menus as $item)
                    <tr>
                        <td>{{ $i++ }}</td>

                        <td>{{ $item->menu_name }}</td>
                        <td>
                            @if ($item->icon)
                                <i class="{{ $item->icon }}"></i>
                            @else
                                <span>No Icon</span>
                            @endif
                        </td>
                        <td>{{ $item->parentMenu ? $item->parentMenu->menu_name : 'Không có' }}</td>
                        {{-- <td>{{ $item->order}}</td> --}}
                        <td>
                            @if ($item->IsActive == 1)
                                <span class="badge bg-label-success">Đã kích hoạt</span>
                            @elseif($item->IsActive == 0)
                                <span class="badge bg-label-warning">Chưa kích hoạt</span>
                            @endif
                        </td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('admin-menu-edit',['id'=>$item->id]) }}">
                                        <i class="bx bx-edit-alt me-1"></i> Sửa
                                    </a>
                                    <a class="dropdown-item" href="{{ route('admin-menu-delete',['id'=>$item->id]) }}">
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
    {{ $menus->links('vendor.pagination.admin') }}
  </div>
  <!--/ Basic Bootstrap Table -->


  <!--/ Responsive Table -->
</div>
<!-- / Content -->

<!-- Footer -->
@endsection
