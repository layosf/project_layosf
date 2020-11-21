<style>
    #content{
        font-size : 12px;
        text-align : left;
        border-spacing: 5px;
    }
    #content2{
        font-size : 12px;
        /* text-align : center; */
    }
</style>

<div style="text-align:center">
    <h4>PT. LAYO SENG FONG </h4></b>
    <h5>Jl. Prof. Dr. Nurcholish Madjid No 173 Tunggorono, Jombang</b> <br>
    <b>Phone : +62 321 874886</b> </h5>
    <hr>
    <h5>PERJANJIAN JUAL BELI KAYU OLAHAN <br>
        No. {{ $agreement->code }} </h5>
</div>

<div id="content">
    <?php 
        $d = $agreement['startcontract'];
        $date = new DateTime($d);
        $dates = $date->format('d-m-Y');
        
        $expired = $agreement['expiredcontract'];
        $date_expired = new DateTime($expired);
        $dateExpired = $date_expired->format('d-m-Y');
    ?>

<p> Pada tanggal, {{ $dates }} kami yang bertanda tangan dibawah ini : </p>

<table id="content" width=100%>
    @foreach($pihak as $p)
    <tr>
        <td> <b> {{ $p->supplier_cp }} </b> </td>
        <td> : </td>
        <td> Atas nama {{ $p->suppliername }} dalam hal ini bertindak untuk dan atas nama perusahaan tersebut yang beralamat di {{ $p->supplier_address}} selanjutnya dalam perjanjian ini disebut sebagai PIHAK PERTAMA atau PENJUAL</td>
    </tr>
    <tr>
        <td> <b> {{ $p->beneficiary_cp }}</b> </td>
        <td> : </td>
        <td> Atas nama {{ $p->beneficiaryname }}, yang berkedudukan di {{ $p->beneficiaryaddress }}, untuk selanjutnya disebut PIHAK KEDUA atau PEMBELI </td>
    </tr>
    @endforeach
</table>
<p> Kedua belah pihak telah sepakat untuk mengadakan Perjanjian Jual Beli Kayu Olahan, dengan ketentuan yang telah disetujui bersama seperti dibawah ini : </p>

<table id="content">
@foreach($detail as $d)
    <tr>
        <td width="2%"> 1. </td>
        <td width="7%"> Jenis </td>
        <td  width="0.1%"> : </td>
        <td> {{ $d->categoryname }} {{ $d->speciesname }} </td>
    </tr>
    <tr>
        <td> 2. </td>
        <td> Volume  m3 </td>
        <td> : </td>
        <td> {{ $d->vol_m3}}</td>
    </tr>
    <tr>
        <td> 3. </td>
        <td> Cara Ukur </td>
        <td> : </td>
        <td> {{ $d->measurement}}</td>
    </tr>
    <tr>
        <td> 4. </td>
        <td> Transport </td>
        <td> : </td>
        <td> {{ $d->transport }}</td>
    </tr>
    <tr>
        <td> 5. </td>
        <td> Quality</td>
        <td> : </td>
        <td> {{ $d->qualitynote }}</td>
    </tr>
    <tr>
        <td> 6. </td>
        <td> Harga CNF </td>
        <td> : </td>
        @foreach($sizes as $size)
        <td> {{ $size->cdcurrency }} {{ $size->price }} / M3 <br>
            {{ $size->taxppn }} <br>
            Kurs sesuai tanggal penerbitan.
        </td>
    </tr>
    <tr>
        <td colspan=3> </td>
        <td width="10%"> Cutting/Phisic Size</td>
        <td width="10%"> Invoice Size</td>
        <td width="5%"> Qty Pcs</td>
    </tr>
           
        <tr>
            <td colspan=3> </td>
            <td width="10%"> {{ $size->phiDim }}</td>
            <td width="10%"> {{ $size->invDim }}</td>
            <td width="5%"> {{ $size->qty_pcs }}</td>
        </tr>
        @endforeach
    
    <tr>
        <td> 7. </td>
        <td> Pembayaran</td>
        <td> : </td>
        <td colspan=3> Transfer 100% empat belas hari setelah barang dikirim oleh PIHAK PERTAMA atau PENJUAL dengan ketentuan volume {{ $d->vol_m3 }} diterima oleh PIHAK PEMBELI. </td>
    </tr>
    <tr>
        <td colspan=3> </td>
        <td>Atas nama {{ $d->accountname}} </td>
    </tr>
    <tr>
        <td colspan=3> </td>
        <td>{{ $d->namebank }} {{ $d->accountno }}</td>
    </tr>
    
    <tr> 
        <td> 9. </td>
        <td> Tipe Sertifikat Kayu </td>
        <td> : </td>
        <td colspan=3> ({{ $d->cert_code }}) {{ $d->cert_name }}</td>
    </tr>
    <tr> 
        <td> 10. </td>
        <td> No & Tgl Sertifikat </td>
        <td> : </td>
        <td colspan=3> - </td>
    </tr>
    <tr> 
        <td> 11. </td>
        <td> Dokumen </td>
        <td> : </td>
        <td colspan=3> {{ $d->document }}</td>
    </tr>
    <tr> 
        <td> 12. </td>
        <td> Pemotongan Pajak </td>
        <td> : </td>
        <td colspan=3> Jika PIHAK PERTAMA sebagai Pedagang Pengumpul yang mempunyai NPWP, maka PIHAK KEDUA akan memungut PPh pasal 22 dengan tarif 0.25% dari jumlah pembelian tidak termasuk PPN, tetapi jika tidak mempunyai NPWP maka tarifnya 0.5% dari jumlah pembelian tidak termasuk PPN.</td>
    </tr>
    <tr> 
        <td> 13. </td>
        <td> Legalitas </td>
        <td> : </td>
        <td colspan=3> Jika PIHAK PERTAMA membeli dan atau mengolah dan atau menjual bahan baku ilegal (perolehan bahan baku yang tidak sesuai dengan aturan yang berlaku), maka segala akibat dan sanksi yang timbul sepenuhnya merupakan tanggungjawab PIHAK PERTAMA.</td>
    </tr>
    <tr> 
        <td> 14. </td>
        <td> Jangka Waktu </td>
        <td> : </td>
        <td colspan=3> Perjanjian ini berlaku sejak ditandatangani para pihak dan akan berakhir pada tanggal {{ $dateExpired }} atau saat volume di point nomor 2 terpenuhi sebelum tanggal tersebut.</td>
    </tr>
    <tr> 
        <td> 15. </td>
        <td> Perselisihan </td>
        <td> : </td>
        <td colspan=3> Apabila terjadi perselisihan antara kedua belah pihak, akan diselesaikan secara musyawarah dan apabila dengan cara tersebut tidak bisa diselesaikan, maka kedua belah pihak sepakat untuk menyelesaikan di Pengadilan Negeri Jombang.</td>
    </tr>
    <tr> 
        <td> 16. </td>
        <td> Pemutusan Kontrak </td>
        <td> : </td>
        <td colspan=3> PIHAK KEDUA berhak secara sepihak mengakhiri Perjanjian ini apabila PIHAK PERTAMA melanggar sebagian atau seluruh ketentuan sebagaimana diatur dalam perjanjian ini. Pemutusan atau pengakhiran kontrak akan diberitahukan paling lambat 2 minggu sebelum tanggal pemutusan Perjanjian. </td>
    </tr>
    <tr> 
        <td> 17. </td>
        <td> Adendum </td>
        <td> : </td>
        <td colspan=3> Apabila terjadi perubahan/tambahan yang dikehendaki/disepakati oleh kedua belah pihak, maupun segala sesuatu yang belum diatur dalam kontrak perjanjian jual beli ini, akan diatur dalam adendum yang merupakan satu kesatuan yang tidak terpisahkan dengan kontrak perjanjian ini, serta mempunyai kekuatan hukum yang sama.</td>
    </tr>
</table>
@endforeach
    <p> Demikian Perjanjian Jual Beli Kayu ini dibuat dalam rangkap dua dan masing-masing bermaterai cukup dan mempunyai kekuatan hukum yang sama.</p>
    <br><br>
<table width=100% id="content2">
    <thead>
        <tr>
            <td> <b> PIHAK PERTAMA </b></td>
            <td> <b> PIHAK KEDUA </b></td> 
        </tr>
    </thead>
    <tbody>
        @foreach($pihak as $phk)
        <tr>
            <td> {{ $phk->suppliername}}</td>
            <td> {{ $phk->beneficiaryname }} </td>
            
        </tr>
        <tr height=50> <td height=50> </td></tr>
        <tr>
            <td> {{ $phk->supplier_cp }} </td>
            <td> {{ $phk->beneficiary_cp }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
