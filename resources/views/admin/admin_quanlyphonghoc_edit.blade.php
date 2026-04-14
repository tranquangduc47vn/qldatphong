@extends('admin/layout')
@section('noidung')
    <main>
        @if ($errors->has('ten_phong'))
            <div class="alert alert-danger text-white">{{ $errors->first('ten_phong') }}</div>
        @endif
        <form action="{{ route('quanlyphonghoc.update', $phong->id_phong) }}" method="post"
            class="w-50 mx-auto border border-3 p-3" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Sử dụng method PUT để cập nhật dữ liệu -->
            <h1 class="text-center">Sửa tên phòng</h1>
            <div class="mb-3 d-flex justify-content-center">
                <div class="w-50">
                    <label class="form-label text-primary">Cơ sở</label>
                    {{-- <select name="id_co_so" id="id_co_so" class="form-select">
                            <option value="{{ old('id_co_so', $phong->id_co_so) }}" disabled selected>
                                {{ old('ten_co_so', $phong->ten_co_so) }}
                            </option>
                        </select> --}}
                    <input hidden type="text" name="id_co_so" id="id_co_so" class="form-control"
                        value="{{ old('id_co_so', $phong->id_co_so) }}">
                    <input type="text" class="form-control" value="{{ old('ten_co_so', $phong->ten_co_so) }}" readonly>
                </div>
            </div>
            <div class="mb-3
                            d-flex justify-content-center">
                <div class="w-50">
                    <label class="form-label text-primary">Loại phòng</label>
                    {{-- <select name="id_loai_phong" id="id_loai_phong" class="form-select" id="">
                            <option value="{{ old('id_loai_phong', $phong->id_loai_phong) }}" disabled selected>
                                {{ old('ten_loai_phong', $phong->ten_loai_phong) }}
                            </option>
                        </select> --}}
                    <input hidden type="text" name="id_loai_phong" id="id_loai_phong" class="form-control"
                        value="{{ old('id_loai_phong', $phong->id_loai_phong) }}">
                    <input type="text" class="form-control" value="{{ old('ten_loai_phong', $phong->ten_loai_phong) }}"
                        readonly>
                </div>
            </div>
            <div class="mb-3 d-flex justify-content-center">
                <div class="w-50">
                    <label class="form-label text-primary">Tòa nhà</label>
                    {{-- <select name="id_toa_nha" id="id_toa_nha" class="form-select">
                            <option value="{{ old('id_toa_nha', $phong->id_toa_nha) }}" disabled selected>
                                {{ old('ten_toa_nha', $phong->ten_toa_nha) }}
                            </option>
                        </select> --}}
                    <input hidden type="text" name="id_toa_nha" id="id_toa_nha" class="form-control"
                        value="{{ old('id_toa_nha', $phong->id_toa_nha) }}">
                    <input type="text" class="form-control" value="{{ old('ten_toa_nha', $phong->ten_toa_nha) }}"
                        readonly>
                </div>
            </div>
            <div class="mb-3 d-flex justify-content-center">
                <div class="w-50">
                    <label class="form-label text-primary">Tầng</label>
                    {{-- <select name="id_tang" id="id_tang" class="form-select">
                            <option value="{{ old('id_tang', $phong->id_tang) }}" disabled selected>
                                {{ old('ten_tang', $phong->ten_tang) }}</option>
                        </select> --}}
                    <input hidden type="text" name="id_tang" id="id_tang" class="form-control"
                        value="{{ old('id_tang', $phong->id_tang) }}">
                    <input type="text" class="form-control" value="{{ old('ten_tang', $phong->ten_tang) }}" readonly>
                </div>
            </div>
            <div class="mb-3 d-flex justify-content-center">
                <div class="w-50">
                    <label class="form-label text-primary">Mã phòng
                    </label>
                    <input type="text" name="ten_phong" id="ten_phong" class="form-control"
                        value="{{ old('ten_phong', $phong->ten_phong) }}">
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </main>
@endsection
