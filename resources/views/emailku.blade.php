@component('mail::message')
# {{ $data['title'] }}

Terima Kasih Anda Sudah Berhasil Melakukan Permohonan Pengajuan Pengujian. <br>
Informasi Akun : <br>
    Email : {{ $data['email'] }} <br>
    Password : {{ $data['password'] }} <br>
    Kode Permohonan : {{ $data['kode'] }} <br><br><br>

Terimakasih,<br>
Dinas Kelautan Dan Perikanan Provinsi Sulawesi Selatan
@endcomponent