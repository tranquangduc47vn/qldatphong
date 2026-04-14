<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApproveRoom;
use App\Models\Phong;
use App\Models\Booking;

class BookedRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookedRoom = Booking::where('booking_status', 0)
                                -> join('phong', 'booking.id_phong', '=', 'phong.id_phong')
                                -> join('co_so', 'phong.id_co_so', '=', 'co_so.id_co_so')
                                -> join('toa_nha', 'phong.id_toa_nha', '=', 'toa_nha.id_toa_nha')
                                -> join('tang', 'phong.id_tang', '=', 'tang.id_tang')
                                -> join('loai_phong', 'phong.id_loai_phong', 'loai_phong.id_loai_phong')
                                -> join('ca_hoc', 'booking.id_ca_hoc', '=', 'ca_hoc.id_ca_hoc')
                                -> join('users', 'booking.id_user', '=', 'users.id_user')
                                -> join('bo_mon', 'booking.id_bo_mon', '=', 'bo_mon.id_bo_mon')
                                -> orderBy('booking.created_at', 'desc')
                                -> get();
        return view('admin/qldatphong', compact('bookedRoom'));
    }

    public function progressedRoom() {
        $acceptedRoom = Booking::where('booking_status', 1)
                                -> join('phong', 'booking.id_phong', '=', 'phong.id_phong')
                                -> join('co_so', 'phong.id_co_so', '=', 'co_so.id_co_so')
                                -> join('toa_nha', 'phong.id_toa_nha', '=', 'toa_nha.id_toa_nha')
                                -> join('tang', 'phong.id_tang', '=', 'tang.id_tang')
                                -> join('loai_phong', 'phong.id_loai_phong', 'loai_phong.id_loai_phong')
                                -> join('ca_hoc', 'booking.id_ca_hoc', '=', 'ca_hoc.id_ca_hoc')
                                -> join('users', 'booking.id_user', '=', 'users.id_user')
                                -> join('bo_mon', 'booking.id_bo_mon', '=', 'bo_mon.id_bo_mon')
                                -> orderBy('booking.created_at', 'desc')
                                -> get();

        $notAcceptedRoom = Booking::where('booking_status', 3)
                                    -> join('phong', 'booking.id_phong', '=', 'phong.id_phong')
                                    -> join('co_so', 'phong.id_co_so', '=', 'co_so.id_co_so')
                                    -> join('toa_nha', 'phong.id_toa_nha', '=', 'toa_nha.id_toa_nha')
                                    -> join('tang', 'phong.id_tang', '=', 'tang.id_tang')
                                    -> join('loai_phong', 'phong.id_loai_phong', 'loai_phong.id_loai_phong')
                                    -> join('ca_hoc', 'booking.id_ca_hoc', '=', 'ca_hoc.id_ca_hoc')
                                    -> join('users', 'booking.id_user', '=', 'users.id_user')
                                    -> join('bo_mon', 'booking.id_bo_mon', '=', 'bo_mon.id_bo_mon')
                                    -> orderBy('booking.created_at', 'desc')
                                    -> get();
                                    
        $canceledRoom = Booking::where('booking_status', 2)
                                    -> join('phong', 'booking.id_phong', '=', 'phong.id_phong')
                                    -> join('co_so', 'phong.id_co_so', '=', 'co_so.id_co_so')
                                    -> join('toa_nha', 'phong.id_toa_nha', '=', 'toa_nha.id_toa_nha')
                                    -> join('tang', 'phong.id_tang', '=', 'tang.id_tang')
                                    -> join('loai_phong', 'phong.id_loai_phong', 'loai_phong.id_loai_phong')
                                    -> join('ca_hoc', 'booking.id_ca_hoc', '=', 'ca_hoc.id_ca_hoc')
                                    -> join('users', 'booking.id_user', '=', 'users.id_user')
                                    -> join('bo_mon', 'booking.id_bo_mon', '=', 'bo_mon.id_bo_mon')
                                    -> orderBy('booking.created_at', 'desc')
                                    -> get();
        return view('admin/phongProgressed', compact('acceptedRoom', 'notAcceptedRoom', 'canceledRoom'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Accept booking room
     */
    public function acceptRoom($idBooking) {
        $booking = Booking::find($idBooking);
        $booking->booking_status = 1;
        $booking->save();
        $bookingUpdated = Booking::find($idBooking);
        Mail::to($booking->getUser->email)->send(new ApproveRoom($bookingUpdated));
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($idBooking)
    {
        $booking = Booking::find($idBooking);
        return view('admin/huyAdmin', compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $idBooking)
    {
        $input = $request->post();
        $booking = Booking::find($idBooking);
        $ghi_chu_admin = ($request->has('ghi_chu_admin'))? ucfirst($input['ghi_chu_admin']):"";
        $booking->ghi_chu_admin = $ghi_chu_admin;
        $booking->booking_status = 3;
        $booking->save();
        $bookingUpdated = Booking::find($idBooking);
        Mail::to($booking->getUser->email)->send(new ApproveRoom($bookingUpdated));
        return redirect(route('qldatphong.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
