<!-- //report log -->
<style>
    #content{
        font-size : 12px;
        text-align : left;
        border-spacing: 5px;
    }
    #content2{
        font-size : 12px;
        text-align : center;
    }

</style>

<div style="text-align:center">
    <h4>PT. SENG FONG MOULDING PERKASA </h4></b>
    <h5>Jl. Prof. Dr. Nurcholish Madjid No 173 Tunggorono, Jombang</b> <br>
    <b>Phone : +62 321 867 222    Fax : +62 321 867 111</b> </h5>
    

    <h6>PERJANJIAN JUAL BELI KAYU OLAHAN <br>
    No. {{ $po_code->code }} </h6>
    
</div>

<div id="content">
    <?php 
    $d = $po_code['startcontract'];
    $date = new DateTime($d);
    $dates = $date->format('d-m-Y');
    
    $expired = $po_code['expiredcontract'];
    $date_expired = new DateTime($expired);
    $dateExpired = $date_expired->format('d-m-Y');
    
    
    ?>
<p> Pada tanggal, {{ $dates}} kami yang bertanda tangan dibawah ini : </p>

<table id="content" width=100%>
    @foreach($po as $p)
        
    <tr>
        <td> <b> {{ $p->contact}} </b> </td>
        <td> : </td>
        <td> Atas nama {{ $p->name_vendor}} dalam hal ini bertindak untuk dan atas nama perusahaan tersebut yang beralamat di {{ $p->address}} selanjutnya dalam perjanjian ini disebut sebagai PIHAK PERTAMA atau PENJUAL</td>
    </tr>
    <tr>
        <td> <b> {{ $p->contactperson_beneficiary }}</b> </td>
        <td> : </td>
        <td> Atas nama {{ $p->companyname }}, yang berkedudukan di {{ $p->companyaddress }}, untuk selanjutnya disebut PIHAK KEDUA atau PEMBELI </td>
    </tr>
    @endforeach
</table>
<p> Kedua belah pihak telah sepakat untuk mengadakan Perjanjian Jual Beli Kayu Olahan, dengan ketentuan yang telah disetujui bersama seperti dibawah ini :</p>

<table id="content">
    <tr>
        <td> 1. </td>
        <td> Jenis </td>
        <td> : </td>
        <td> {{ $p->speciesname}} {{ $p->spec1name }} </td>
    </tr>
    <tr>
        <td> 2. </td>
        <td> Volume  m3 </td>
        <td> : </td>
        <td> {{ $p->volumenote}}</td>
    </tr>
    <tr>
        <td> 3. </td>
        <td> Cara Ukur </td>
        <td> : </td>
        <td> {{ $p->measurement}}</td>
    </tr>
    <tr>
        <td> 4. </td>
        <td> Transport </td>
        <td> : </td>
        <td> Tanggung jawab PIHAK PERTAMA (Penjual)</td>
    </tr>
    <tr>
        <td> 5. </td>
        <td> Quality</td>
        <td> : </td>
        <td> {{ $p->qualitynote }}</td>
    </tr>
    <tr>
        <td> 6. </td>
        <td> Harga CNF </td>
        <td> : </td>
   
        
        <td length=20> Diameter Invoice</td>
        <td> Panjang Invoice </td>
    </tr>
            @foreach($detail_po as $det)
            <tr>
                <td colspan=3> </td>
                <td> {{ $det->invdia_min }} - {{ $det->invdia_max }}</td>
                <td> {{ $det->invlength_max }}</td>
            </tr>
            @endforeach
        
    
    <tr>
        <td> 7. </td>
        <td> Pembayaran</td>
        <td> : </td>
        <td colspan=2> Sesuai hasil grade Pihak Kedua, setelah terima, dokumen lengkap dan benar.
        Pembayaran dilakukan dengan cara transfer ke rekening, sebagai berikut : </td>
    </tr>
    <tr>
        <td colspan=3> </td>
        <td>a/n {{ $p->accountname}} </td>
    </tr>
    <tr>
        <td colspan=3> </td>
        <td>{{ $p->accountno }}</td>
    </tr>
    <tr> 
        <td> 8. </td>
        <td> Asal Kayu </td>
        <td> : </td>
        <td colspan=2>  {{ $p->cityname }} {{ $p->provname }}</td>
    </tr>
    <tr> 
        <td> 9. </td>
        <td> Tipe Sertifikat Kayu </td>
        <td> : </td>
        <td colspan=2> ({{ $p->cert_code }}) {{ $p->cert_name }}</td>
    </tr>
    <tr> 
        <td> 10. </td>
        <td> No & Tgl Sertifikat </td>
        <td> : </td>
        <td colspan=2> - </td>
    </tr>
    <tr> 
        <td> 11. </td>
        <td> Dokumen </td>
        <td> : </td>
        <td colspan=2> {{ $p->document }}</td>
    </tr>
    <tr> 
        <td> 12. </td>
        <td> Pemotongan Pajak </td>
        <td> : </td>
        <td colspan=2> Jika PIHAK PERTAMA sebagai Pedagang Pengumpul yang mempunyai NPWP, maka PIHAK KEDUA akan memungut PPh pasal 22 dengan tarif 0.25% dari jumlah pembelian tidak termasuk PPN, tetapi jika tidak mempunyai NPWP maka tarifnya 0.5% dari jumlah pembelian tidak termasuk PPN.</td>
    </tr>
    <tr> 
        <td> 13. </td>
        <td> Legalitas </td>
        <td> : </td>
        <td colspan=2> Jika PIHAK PERTAMA membeli dan atau mengolah dan atau menjual bahan baku ilegal (perolehan bahan baku yang tidak sesuai dengan aturan yang berlaku), maka segala akibat dan sanksi yang timbul sepenuhnya merupakan tanggungjawab PIHAK PERTAMA.</td>
    </tr>
    <tr> 
        <td> 14. </td>
        <td> Jangka Waktu </td>
        <td> : </td>
        <td colspan=2> Perjanjian ini berlaku sejak ditandatangani para pihak dan akan berakhir pada tanggal {{ $dateExpired}} atau saat volume di point nomor 2 terpenuhi sebelum tanggal tersebut.</td>
    </tr>
    <tr> 
        <td> 15. </td>
        <td> Perselisihan </td>
        <td> : </td>
        <td colspan=2> Apabila terjadi perselisihan antara kedua belah pihak, akan diselesaikan secara musyawarah dan apabila dengan cara tersebut tidak bisa diselesaikan, maka kedua belah pihak sepakat untuk menyelesaikan di Pengadilan Negeri Jombang.</td>
    </tr>
    <tr> 
        <td> 16. </td>
        <td> Pemutusan Kontrak </td>
        <td> : </td>
        <td colspan=2> PIHAK KEDUA berhak secara sepihak mengakhiri Perjanjian ini apabila PIHAK PERTAMA melanggar sebagian atau seluruh ketentuan sebagaimana diatur dalam perjanjian ini. Pemutusan atau pengakhiran kontrak akan diberitahukan paling lambat 2 minggu sebelum tanggal pemutusan Perjanjian.</td>
    </tr>
    <tr> 
        <td> 17. </td>
        <td> Adendum </td>
        <td> : </td>
        <td colspan=2> Apabila terjadi perubahan/tambahan yang dikehendaki/disepakati oleh kedua belah pihak, maupun segala sesuatu yang belum diatur dalam kontrak perjanjian jual beli ini, akan diatur dalam adendum yang merupakan satu kesatuan yang tidak terpisahkan dengan kontrak perjanjian ini, serta mempunyai kekuatan hukum yang sama.</td>
    </tr>
</table>
    <p> Demikian Perjanjian Jual Beli Kayu ini dibuat dalam rangkap dua dan masing-masing bermaterai cukup dan mempunyai kekuatan hukum yang sama.</p>
    <br>
<table width=100% id="content2">
    <thead>
        <tr>
            <td> <b> PIHAK PERTAMA </b></td>
            <td> <b> PIHAK KEDUA </b></td> 
        </tr>
    </thead>
    <tbody>
        
        <tr>
            @foreach($company as $c)
                <td> {{ $c->name_vendor}}</td>
                <td> PT. {{ $c->companyname}} </td>
            
        </tr>
        <tr height=50> <td height=50> </td></tr>
        <tr>
               
                <td> {{ $c->contact }}</td>
                
                <td> {{ $c->contactperson_beneficiary }}</td>
            @endforeach
                
        </tr>

       
    </tbody>
</table>
</div>
