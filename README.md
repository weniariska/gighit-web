<img width="100%" alt="image" src="https://user-images.githubusercontent.com/96558726/184819741-5e3ee0c1-b58d-46c5-a000-9c827fb09304.png">

<nav>
  <a href="#deskripsi">Deskripsi</a> |
  <a href="#latar-belakang">Latar Belakang</a> |
  <a href="#uml">Desain Sistem</a> |
  <a href="#ssaplikasi">Screen Shoot Aplikasi</a> |
</nav>

<div id="deskripsi">
  <hr>
  <h3>Deskripsi Singkat Website</h3>
  Link Website : http://gighitpizza.000webhostapp.com/ <br>
  Gighit Web adalah sebuah aplikasi berbasis website 2in1 kasir + pelanggan dengan inovasi hemat kertas.
  Gighit Web ini adalah versi website dari aplikasi gighit yang dibuat dengan bahasa pemrograman Java sebelumnya.
  Framework utama yang digunakan untuk mengembangkan website ini adalah Laravel dan Livewire.
</div>

<div id="latar-belakang">
  <hr>
  <h3>Latar Belakang Pembuatan Aplikasi</h3>
  Restoran pizza di Indonesia mayoritas menggunakan 2 aplikasi pendukung yaitu 
  aplikasi kasir dan aplikasi pelanggan. Pada aplikasi kasir yang digunakan pastinya 
  akan mencetak bukti pembayaran dalam bentuk kertas (struk). Oleh karna itu 
  terdapat 2 permasalahan yang dihadapi. Pertama banyak nya modal pemeliharaan 
  aplikasi yang diperlukan.Hal ini memerlukan biaya atau modal yang berbeda – beda 
  tergantung dari macam aplikasinya seperti apa. Selain itu, untuk menarik perhatian 
  pelanggan biasanya aplikasi akan terus dilakukan update, sehingga membutuhkan 
  modal yang tidak sedikit dalam pemeliharaannya.
  <br><br>
  Kedua, penggunaan bukti pembayaran dalam bentuk kertas (struk) yang tidak 
  efektif. Karena setelah melihat struknya, rata-rata pelanggan akan membuangnya. 
  Selain itu, tulisan pada kertas struk juga tidak bertahan lama alias akan menghilang 
  nantinya. Jika melihat dari segi lingkungan, penggunaan bukti pembayaran dalam 
  bentuk kertas (struk) juga termasuk dalam penggunaan kertas yang berlebih. Hal 
  tersebut menyababkan peningkatan permintaan produksi kertas sehingga jumlah 
  pohon yang akan ditebang juga semakin meningkat. Hal ini menyebabkan hutan 
  semakin menipis dan daerah penyerapan akan berkurang. Selain itu, ekosistem akan 
  terganggu dan dapat menyebabkan global warming.
  <br><br>
  Gighit hadir sebagai solusi untuk permasalahan diatas. Aplikasi ini memiliki potensi atau 
  kemampuan sebagai berikut :
  <ol>
    <li>Satu website dapat digunakan oleh kasir dan pelanggan sekaligus.</li>
    <li>Meringankan modal pengembangan web yang tadinya digunakan untuk 2 website, dipersingkat menjadi 1 website saja.</li>
    <li>Memudahkan perawatan website restoran (fokus pada 1 website saja).</li>
    <li>Menawarkan 2 cara dalam pemberian struknya kepada pelanggan. Yaitu melalui email dan cetak menggunakan kertas.</li>
    <li>Hemat Kertas.</li>
    <li>Mengikuti era Revolusi Industri 4.0 serba elektronik.</li>
    <li>Memudahkan pelanggan dalam menyimpan struk.</li>
  <ol>
  <br><br>
  Terdapat 3 roles akses pada website, yaitau : <br>
  Guest : dapat melihat-lihat halaman home dan menu tapi tidak dapat melakukan pemesanan
  Pelanggan : dapat melihat dan melakukan pemesanan, dapat mengisi saldo dan mengirim saldo ke pelanggan lain
  Admin : dapat melakukan CRUD terhadap menu dan isi saldo pelanggan
</div>

<div id="uml">
  <hr>
  <h3>Desain Sistem</h3>
  Berikut adalah desain sistem website Gighit :
  <ul>
    <li>
      Use Case diagram <br>
      <img width="50%" alt="image" src="https://user-images.githubusercontent.com/96558726/178757639-a74340c3-d08b-4f4b-bb2b-39f8c87cd942.png">
    </li>
    <li>
      Activity Diagram <br>
      <img width="50%" alt="image" src="https://user-images.githubusercontent.com/96558726/184820776-1bfed7ae-de41-4c7a-baea-e653d4b7af55.png">
    </li>
  </ul>
<div>

<div id="ssaplikasi">
  <hr>
  <h3>Screen Shoot Aplikasi Gighit saat Dijalankan</h3>
  <ul>
    <li>
      Halaman Login <br>
      <img width="50%" alt="image" src="https://user-images.githubusercontent.com/96558726/184822837-223f15aa-7f0f-4bce-bd6a-66fe0dac67aa.png"> <br>
    </li>
    <li>
      Halaman Sign Up <br>
      <img width="50%" alt="image" src="https://user-images.githubusercontent.com/96558726/184823115-b8837b85-2ca8-4a3c-8d45-e462194c6927.png"><br><br>
    </li>
    <li>
      Halaman Home <br>
      <img width="50%" alt="image" src="https://user-images.githubusercontent.com/96558726/184823738-1402e120-05c4-43b7-8f87-3526a5b03ec0.png"><br><br>
    </li>
    <li>
      Halaman Menu Pizza <br>
      <img width="50%" alt="image" src="https://user-images.githubusercontent.com/96558726/184824003-14725ffa-f5c8-40f3-a4a6-608325a38f95.png"> <br><br>
    </li>
    <li>
      Halaman Menu Drinks <br>
      <img width="50%" alt="image" src="https://user-images.githubusercontent.com/96558726/184824261-6afae8fe-84c5-41fd-b620-be26dba13c07.png"><br><br>
    </li>
    <li>
      Halaman Menu Starters <br>
      <img width="50%" alt="image" src="https://user-images.githubusercontent.com/96558726/184824564-c1fb7e72-ca19-4313-b5fb-e1e5fd48e88e.png"><br><br>
    </li>
    <li>
      Menu Cart (Pelanggan) <br>
      <img width="50%" alt="image" src="https://user-images.githubusercontent.com/96558726/184826108-9f188b12-899f-427a-99bf-0ac47cc3a1f3.png"><br>
      Menu Cart (Guest) <br>
      <img width="50%" alt="image" src="https://user-images.githubusercontent.com/96558726/184827084-3b24bd8a-eed8-42ec-a3e2-704923df9de8.png"><br><br>
    </li>
    <li>
      Halaman Customer account <br>
      <img width="50%" alt="image" src="https://user-images.githubusercontent.com/96558726/184827595-550bb194-6024-44b5-9a52-50e117fda21f.png"><br>
      Halaman Menu Riwayat Order Pelanggan <br>
      <img width="50%" alt="image" src="https://user-images.githubusercontent.com/96558726/184827845-c79453b3-c649-47d3-bc22-13ff552bff65.png"><br><br>
    </li>
    <li>
      Struk yang dihasilkan mode pelanggan memiliki kode <br>
      <img width="50%" alt="image" src="https://user-images.githubusercontent.com/96558726/184828025-6a5686ca-cb5a-4270-84d6-2f950b11adc3.png"><br><br>
    </li>
    <li>
      Menu Order pada role Admin <br>
      <img width="50%" alt="image" src="https://user-images.githubusercontent.com/96558726/184828509-6b79c537-fc5e-40fc-add5-e20efdcef714.png"><br>
      Membuat orderan <br>
      <img width="50%" alt="image" src="https://user-images.githubusercontent.com/96558726/184828975-73c70dfb-5b78-452c-8cc9-5efdbd8c7958.png"><br>
      Halaman Topup <br>
      <img width="50%" alt="image" src="https://user-images.githubusercontent.com/96558726/184829222-c1d3da3b-39b8-4576-84d4-bd6650594cff.png">
    </li>
  </ul>
  Untuk lebih lengkap, dapat kunjungi web http://gighit.000webhostapp.com/
</div>

