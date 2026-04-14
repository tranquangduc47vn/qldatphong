<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Booking;

class ApproveRoom extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(protected Booking $booking)
    {

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Thông tin đặt phòng',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $phong = Booking::where('id_booking', $this->booking->id_booking)
                            -> join('phong', 'booking.id_phong', '=', 'phong.id_phong')
                            -> join('co_so', 'phong.id_co_so', '=', 'co_so.id_co_so')
                            -> join('toa_nha', 'phong.id_toa_nha', '=', 'toa_nha.id_toa_nha')
                            -> join('tang', 'phong.id_tang', '=', 'tang.id_tang')
                            -> join('loai_phong', 'phong.id_loai_phong', 'loai_phong.id_loai_phong')
                            -> join('ca_hoc', 'booking.id_ca_hoc', '=', 'ca_hoc.id_ca_hoc')
                            -> join('users', 'booking.id_user', '=', 'users.id_user')
                            -> join('bo_mon', 'booking.id_bo_mon', '=', 'bo_mon.id_bo_mon')
                            -> first();
        return new Content(
            view: 'mail.approveRoom',
            with: [
                'nguoi_dat' => $this->booking->getUser->name,
                'ngay_to_chuc' => $this->booking->ngay_to_chuc,
                'thoi_gian_bat_dau' => $this->booking->thoi_gian_bat_dau,
                'bo_mon' => $phong->ten_bo_mon,
                'co_so' => $phong->ten_co_so,
                'toa' => $phong->ten_toa_nha,
                'tang' => $phong->ten_tang,
                'loai_phong' => $phong->ten_loai_phong,
                'ca_hoc' => $phong->ten_ca_hoc,
                'phong' => $phong->ten_phong,
                'su_kien' => $this->booking->su_kien,
                'trang_thai' => $this->booking->booking_status,
                'ghi_chu_admin' => $this->booking->ghi_chu_admin, 
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
