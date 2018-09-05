<?php
    include 'modul/mainFunction.php';
    connect();
    global $current;
    $current ='About';
    include 'header.php';
    include 'modul/productModule.php';
    
    $about = new setting();
    

?>
        <div class="menu" style="padding-top: 40px; text-align: left;">
                 
                    <p><a href="##" class="current">About Us</a></p>
                </div>
      
        <div class="content">
            <div class="mid-content">
               
                      <div class="mid-content-box">
                        <p><img src="images/hoo.png" height="10" /> merupakan toko spesialis hoodie, sweater dan jaket. <img src="images/hoo.png" height="10" /> awalnya berdiri pada tahun 2012 di Kuningan, Jakarta Selatan . <img src="images/hoo.png" height="10" /> pada awalnya hanya menjual produknya di daerah Jakarta Selatan dan hanya dengan metode Cash On Delivery. Penyebaran produk <img src="images/hoo.png" height="10" /> masih sangat kecil dan traditional. Alat penjualan online hanya melalui facebook page.</p><br>

                        <p>Pada awal 2014 <img src="images/hoo.png" height="10" /> memutuskan untuk memperbanyak jenis produk mencakup kaos, jaket kulit, dan jenis pakaian lainnya. Akhirnya <img src="images/hoo.png" height="10" /> berubah nama menjadi Dbora Collection. Namun Dbora tidak berakhir baik :(, akhirnya dengan terpaksa kami memutuskan untuk menghentikan brand Dbora pada akhir tahun 2015. </p><br>

                        <p>Pada akhir tahun 2016, akhirnya ada secercah harapan untuk melahirkan kembali <img src="images/hoo.png" height="10" /> :V. Awal tahun 2017 website <img src="images/hoo.png" height="10" /> mulai dibangun. <img src="images/hoo.png" height="10" /> mulai aktif berjalan kembali pada bulan Juni 2017. Mulai Juni 2017 <img src="images/hoo.png" height="10" /> berkomitmen untuk memberikan yang terbaik kepada <i>hoodiezer</i> (<img src="images/hoo.png" height="10" /> customer) dengan menyediakan produk yang terbaik dan pelayanan yang terbaik.</p> 


                        <br><br>

                        <p>Best Regard :V</p><br>
                        <p><img src="images/hoo.png" height="10" /></p>

                    </div>
            </div>
        </div>
<script language="Javascript" src="counter-uniq.php?page=uniq&&halaman=About"><!--
//--></script><script language="Javascript" src="counter-pgload.php?page=pgload&&halaman=About"><!--
//--></script>
<?php
    include 'footer.php';
?>