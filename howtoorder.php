<?php
    include 'modul/mainFunction.php';
    connect();
    global $current;
    $current ='How To Order';
    include 'header.php';
    include 'modul/productModule.php';
    
    $about = new setting();
    

?>
        <div class="menu" style="padding-top: 40px; text-align: left;">
                 
                    <p><a href="##" class="current">How To order</a></p>
                </div>
      
        <div class="content">
            <div class="mid-content">
               
                      <div class="mid-content-box">
                        <ol>
                            <li>Registrasikan akun kamu di website <img src="images/hoo.png" height="10" /> (<a href="signup.php" class="content-link">klik disini</a>), harap isi data diri kamu dengan valid dan benar. Kesalahan alamat pengiriman bukan tanggung jawab <img src="images/hoo.png" height="10" />.</li>
                            <li>Pilihlah hoodie yang mau kamu beli di halaman <a href="shop/all-category" class="content-link">shop</a> <img src="images/hoo.png" height="10" />, pilih size yang sesuai dengan kamu(A), kemudian klik "Add To Cart"(B).<br>
                                <img src="images/how1.jpg" width="500">
                            </li>
                             <li>Setelah itu kamu akan dialihkan ke halaman cart, untuk melakukan checkout kamu bisa langsung klik "Proceed to Checkout"(A). Kalau kamu mau menambah hoodie lain kamu bisa memilih menu "Shop"(B). Untuk kembali ke halaman Cart kamu bisa menakan icon cart (C).<br>
                                <img src="images/how2.jpg" width="500">
                            </li>
                             <li>Pada halaman checkout kamu bisa memasukan "Discount Code" terlebih dahulu untuk mendapatkan potongan lalu klik "Apply Code"(A). Cek kembali pesanan kamu dan alamat pengiriman, lalu klik "Confirm Your Order" (B).<br>
                                <img src="images/how3.jpg" width="500">
                            </li>

                             <li>Invoice akan dikirimkan ke email kamu, berisi tentang detail order yang kamu buat serta nomor rekening untuk melakukan pembayaran. Pembayaran <img src="images/hoo.png" height="10" /> Online Store hanya melalui rekening Mandiri 167-000-1511-962 atas nama Taufik Ismail. Jika dalam 3x24 Jam kamu belum melakukan pembayaran, maka order kamu akan dianggap cancel order.
                            </li>
                            <li>Setelah melakukan pembayaran harap melakukan konfirmasi pembayaran di halaman <a href="confirmation.php" class="content-link">Confirmation</a>. Klik "Confirm Payment" pada transaksi/pembelian yang telah dibayar. Konfirmasi akan kami proses maksimal 1x24 jam. 
                            </li>
                             <li>Konfirmasi yang masuk sebelum pukul 15:00 dan akan dikirim pada hari yang sama(Senin-Jumat), konfirmasi yang masuk pada hari sabtu atau minggu akan dikirim hari senin. 
                            </li>
                               <li>Nomor resi pengiriman akan dikirimkan melalui email dan SMS atau bisa di cek pada halaman <a href="history.php" class="content-link">History</a>.
                            </li>




                        </ol>
                      
                    </div>
            </div>
        </div>
<script language="Javascript" src="counter-uniq.php?page=uniq&&halaman=About"><!--
//--></script><script language="Javascript" src="counter-pgload.php?page=pgload&&halaman=About"><!--
//--></script>
<?php
    include 'footer.php';
?>