 @extends('admin.layoutAdmin.app')

 @section('title', 'Riwayat')

 @section('content')

     @if (!empty($pesanan->jumlah_harga))
         <p class="text-right">
             <strong>
                 Tanggal Pesanan : {{ $pesanan->tanggal }}
             </strong><br>


         </p>
         <p class="text-left">
             <strong>
                 Nama : {{ $user->name }}
             </strong><br>
             <strong>
                 Alamat : {{ $user->alamat }}
             </strong><br>
             <strong>
                 NO HP : {{ $user->no_hp }}
             </strong>
         </p>

         <table class="table table-striped">
             <thead>
                 <tr>
                     <th>No</th>
                     <th>Nama Barang</th>
                     <th>Gambar</th>
                     <th>Jumlah</th>

                     <th>Harga</th>
                     <th>Total Harga</th>

                 </tr>
             </thead>
             <tbody>
                 @php
                     $no = 1;
                 @endphp
                 @foreach ($pesanan_details as $pesanan_detail)
                     <tr>
                         <td>{{ $no++ }}</td>
                         <td>{{ $pesanan_detail->barang->name }}</td>
                         <td>
                             <img src="/imageBarang/{{ $pesanan_detail->barang->gambar }}" style="width: 100px">
                         </td>
                         <td>{{ $pesanan_detail->jumlah }} Kg</td>

                         <td>Rp. {{ number_format($pesanan_detail->barang->harga) }}</td>
                         <td>Rp. {{ number_format($pesanan_detail->jumlah_harga) }}</td>

                     </tr>
                 @endforeach



                 <tr>
                     <td colspan="5" class="text-right"><strong>Harga :</strong></td>
                     <td>
                         <strong>
                             Rp. {{ number_format($pesanan->jumlah_harga) }}
                         </strong>
                     </td>

                 </tr>
                 <tr>
                     <td colspan="5" class="text-right"><strong>Kode Unik :</strong></td>
                     <td>
                         <strong>
                             Rp. {{ number_format($pesanan->kode) }}
                         </strong>
                     </td>

                 </tr>
                 <tr>
                     <td colspan="5" class="text-right"><strong>Total Bayar :</strong></td>
                     <td>
                         <strong>
                             Rp. {{ number_format($pesanan->jumlah_harga + $pesanan->kode) }}
                         </strong>
                     </td>

                 </tr>


             </tbody>
         </table>
     @endif

 @endsection
