<style>
    h1 {
        font-size: 16px;
    }

    th {
        font-weight: 500;
    }

    textarea {
        width: 100%;
        height: 150px;
        padding: 12px 20px;
        box-sizing: border-box;
        border: 2px solid #ccc;
        border-radius: 4px;
        background-color: #f8f8f8;
        font-size: 16px;
        resize: none;
    }

    .lydo {
        border: none;
        width: 90px;
        text-align: center;
        text-transform: capitalize;
        height: auto;
        background-color: #DDDDDD;
        border-radius: 5px;
        box-shadow: 2px 2px #F5F5F5;
        -webkit-transition: background-color 2s ease-out;
        -moz-transition: background-color 2s ease-out;
        -o-transition: background-color 2s ease-out;
        transition: background-color 2s ease-out
    }

    .lydo:hover {
        transition: cubic-bezier(0.6, 0.04, 0.98, 0.335);
        background-color: #9c9494;
    }

    /* css qlphong */
    .title-admin {
        button {
            font-size: 10px;
        }

    /* end */

    /* css qlthongtin */
        .tttk>h1 {
            font-size: 16px;
        }

        th {
            font-weight: 500;
        }
    }
</style>
{{-- modal --}}
<div class="modal fade" id="staticReasonNoAccept-{{ $r->id_booking }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticReasonNoAcceptLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                {{-- <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1> --}}
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="card">
                    <div class="card-title">
                        <h2 class="fs-5 fw-bold mt-3 mb-2 text-center text-uppercase">Lí do không duyệt</h2>
                        <hr>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('qldatphong.update', ['qldatphong' => $r->id_booking]) }}" method="POST">
                            @csrf {{method_field('PUT')}}
                            <div class="mb-3">
                                <textarea placeholder="Vui lòng nhập lý do" name="ghi_chu_admin"></textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-secondary" style="width: 100%">Xác nhận</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>