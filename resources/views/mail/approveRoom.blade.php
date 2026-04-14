<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            table.table {
                border-collapse: collapse;
                width: 100%;
                text-align: center;
            }

            table.table th,
            table.table td {
                border: 1px solid #ddd;
                padding: 8px;
            }

            table.table th {
                background-color: #eee;
            }

            table.table tbody tr:nth-child(even) {
                background-color: #f2f2f2;
            }
        </style>
    </head>

    <body>
        <main>
            <table class="table">
                    <thead>
                        <tr>
                            <th>Tên</th>
                            <th>Bộ Môn</th>
                            <th>Ngày</th>
                            <th>Thời gian</th>
                            <th>Ca/Buổi</th>
                            <th>Cơ Sở</th>
                            <th>Tòa</th>
                            <th>Loại phòng</th>
                            <th>Mã phòng</th>
                            <th>Sự kiện</th>
                            <th>Trạng thái</th>
                            <th>Ghi chú</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr class="text-wrap">
                            <td>{{ $nguoi_dat }}</td>
                            <td>{{ $bo_mon }}</td>
                            <td>{{ date('d-m-Y', strtotime($ngay_to_chuc)) }}</td>
                            <td>{{ date('H:i', strtotime($thoi_gian_bat_dau)) }}</td>
                            <td>{{ $ca_hoc }}</td>
                            <td>{{ $co_so }}</td>
                            <td>{{ $toa }}</td>
                            <td>{{ $loai_phong }}</td>
                            <td>
                                @if ($loai_phong == 'Phòng học')
                                    {{ $toa.$tang.$phong }}
                                @else
                                    {{ $phong }}
                                @endif
                            </td>
                            <td>{{ $su_kien }}</td>
                            <td>
                                @if ($trang_thai == 1)
                                    {{ 'Đã duyệt' }}
                                @else
                                    {{ 'Không duyệt' }}
                                @endif
                            </td>
                            <td>{{ $ghi_chu_admin }}</td>
                        </tr>
                    </tbody>
                    </tbody>
                </table>
        </main>
    </body>
</html>