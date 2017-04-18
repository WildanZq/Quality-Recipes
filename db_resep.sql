-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12 Des 2016 pada 14.16
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_resep`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_akun`
--

CREATE TABLE `tb_akun` (
  `id_akun` int(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tentang` text NOT NULL,
  `foto` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_akun`
--

INSERT INTO `tb_akun` (`id_akun`, `nama`, `username`, `password`, `tentang`, `foto`) VALUES
(8, 'Wildan', 'wildan', '123456', 'Yang anda baca saat ini adalah penjelasan singkat dari seseorang yang memiliki akun ini.\r\nYang anda baca saat ini adalah penjelasan singkat dari seseorang yang memiliki akun ini.', 'Koala.jpg'),
(10, 'Rofi', 'rofi', '123456', 'Yang anda baca saat ini adalah penjelasan singkat dari seseorang yang memiliki akun ini.\r\nYang anda baca saat ini adalah penjelasan singkat dari seseorang yang memiliki akun ini.', 'mi.PNG'),
(11, 'Zafira', 'zaf', '123456', 'Yang anda baca saat ini adalah penjelasan singkat dari seseorang yang memiliki akun ini.\r\nYang anda baca saat ini adalah penjelasan singkat dari seseorang yang memiliki akun ini.', '2958-200.PNG'),
(18, 'Dummy', 'dummy', '123456', '', ''),
(19, 'Koki Coy', 'koki', '123456', '', ''),
(20, 'Arek Kos', 'kos', '123456', '', ''),
(21, 'Someone', 'someone', '123456', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_artikel`
--

CREATE TABLE `tb_artikel` (
  `id_artikel` int(255) NOT NULL,
  `id_akun` int(255) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `konten` text NOT NULL,
  `foto` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_artikel`
--

INSERT INTO `tb_artikel` (`id_artikel`, `id_akun`, `judul`, `konten`, `foto`) VALUES
(1, 11, 'Ragam Manfaat Rosella Yang Menyehatkan', 'Bunga rosella dapat dibuat menjadi teh yang dimanfaatkan untuk mengobati beberapa kondisi kesehatan. Selain sebagai teh kesehatan, manfaat rosella juga dapat ditemui dalam bentuk makanan yang lain.\r\nManfaat rosella ditemukan pada beberapa bagian dari tumbuhan rosella. Daun rosella adalah sumber yang baik dari senyawa polifenol. Sedangkan bunganya kaya akan asam protokatekuat dan antosianin. Biji rosella sendiri sarat dengan antioksidan yang larut dalam lemak, terutama gamma-tocopherol.\r\nDari kandungan tersebut, diketahui manfaat rosella terutama dalam bentuk teh sebagai bahan dasar pengobatan herba di berbagai belahan dunia. Orang Mesir menggunakan teh rosella untuk menurunkan suhu tubuh. Di benua Afrika, teh rosella digunakan untuk mengobati konstipasi, kanker, penyakit hati, dan gejala pilek. Hasil olahan dari daunnya juga dapat digunakan pada kulit untuk menyembuhkan luka.\r\nSelain dijadikan teh yang bermanfaat bagi kesehatan, rosella juga dapat diolah menjadi beberapa makanan yang lezat dan menyegarkan. Manfaat rosella pada masakan ditujukan menambah rasa, aroma, serta tampilan yang unik.\r\nManfaat rosella yang diketahui secara luas selama ini berkaitan dengan khasiat rosella dalam hal penyembuhan penyakit. Namun sudah sejak lama, bangsa-bangsa di Afrika, Asia, bahkan Eropa untuk memakai rosella sebagai makanan atau minuman untuk dikonsumsi sehari-hari.', 'art4.JPG'),
(2, 18, 'Mengontrol Asupan Karbohidrat Demi Hidup Lebih Sehat', 'Orang Indonesia terbiasa mengonsumsi nasi sebagai karbohidrat. Bahkan ada anggapan di masyarakat bahwa jika belum makan nasi berarti belum makan. Padahal, di balik nikmatnya nasi tersimpan karbohidrat tinggi yang apabila dikonsumsi berlebihan dapat menyebabkan kelebihan kadar gula darah yang berujung pada berbagai penyakit, salah satunya adalah diabetes.\r\nKetika dikonsumsi, tubuh mengubah karbohidrat menjadi gula. Gula inilah yang akan digunakan sebagai tambahan energi bagi otak dan otot dalam beraktivitas sehari-hari. Ada tiga jenis karbohidrat, yaitu gula, pati, dan serat. Dengan kata lain, tidak semua karbohidrat adalah gula, tetapi semua gula berasal dari karbohidrat.\r\nKetika karbohidrat yang masuk ke tubuh dinilai terlalu banyak, maka hormon insulin berisiko tidak mampu lagi membantu glukosa terserap sel-sel tubuh. Sebagai akibatnya, kadar glukosa atau gula di dalam darah meningkat, menjadikan Anda berisiko mengalami diabetes.\r\nUntuk mengendalikan nafsu makan, cobalah mengonsumsi kedelai atau makanan yang mengandung kedelai 2 jam sebelum waktu makan. Kedelai merupakan sumber protein lengkap dengan adanya semua jenis asam amino esensial di dalamnya. Makanan yang satu ini juga mengandung isoflavon, yaitu senyawa alami estrogenik yang mampu membantu mencegah penyakit kanker, osteoporosis, dan penyakit-penyakit kardiovaskular, seperti penyakit jantung. Isoflavon juga bersifat membantu menyembuhkan gejala menopause.\r\nTerlepas dari itu, satu hal yang terpenting adalah bagaimana tubuh bisa mendapatkan gizi yang sesuai dengan kebutuhan sehari-hari. Anda tidak perlu mengurangi atau meningkatkan asupan makanan. Begitu pun dengan karbohidrat yang dalam hal ini adalah nasi. Membatasi karbohidrat adalah cara utama dalam menjadikan hidup lebih sehat.', 'art3.JPG'),
(4, 10, 'Gula Batu Tidak Lebih Sehat Dibanding Gula Pasir', 'Menikmati secangkir kopi atau teh merupakan salah satu budaya orang Indonesia yang sudah mendarah daging. Agar kian nikmat, biasanya ditambahkan pemanis ke dalam minuman tersebut. Untuk saat ini, gula batu sering digunakan karena dianggap lebih nikmat, bahkan ada yang  beranggapan lebih sehat daripada gula pasir.\r\nPerhitungan banyaknya asupan karbohidrat harian menjadi penting pada penderita diabetes karena karbohidrat mempengaruhi gula darah Anda lebih dari nutrisi lainnya. Sebenarnya, banyak tipe karbohidrat yang terkandung dalam makanan dan minuman. Gula adalah salah satunya. Gula itu sendiri banyak sekali jenisnya. Contoh yang paling sering dikonsumsi adalah gula pasir.\r\nPenelitian menunjukkan bahwa baik jumlah dan jenis karbohidrat dalam makanan mempengaruhi kadar gula darah. Melihat kedua fakta mengenai gula pasir dan gula batu di atas, maka faktor kunci sehat tidaknya kedua jenis gula di atas adalah jumlah yang dikonsumsi. Sebagaimana yang disarankan WHO, konsumsi gula yang aman bagi kesehatan tubuh yaitu maksimal 50 gram, atau setara dengan 4 sendok makan setiap harinya. Jika ingin mendapat manfaat tambahan, maka jumlah yang harus dibatasi adalah setengahnya atau 25 gram saja setiap hari.\r\nPenting diingat, selain menjalani gaya hidup sehat dengan menu makanan seimbang, Anda perlu berolahraga setidaknya 30 menit per hari yang dilakukan sebanyak lima kali seminggu untuk menurunkan risiko Anda terkena diabetes tipe 2. Hal ini juga berlaku pada penderita diabetes tentu saja dengan tertib mengonsumsi obat-obatan antidiabetes atau insulin sesuai petunjuk dokter.', 'art2.JPG'),
(5, 8, 'TIPS DIET MELALUI MAKANAN DAN OLAHRAGA', 'Tubuh gemuk mendorong seseorang untuk melakukan diet. Tapi sayangnya, tidak banyak yang tahu bagaimana tips diet yang sehat dan aman.\r\nMengurangi porsi makan bahkan tidak makan sama sekali, tak jarang ditempuh sebagian orang untuk menurunkan berat badannya. Alih-alih mendapatkan berat badan yang ideal, Anda justru jatuh sakit.\r\nDiet yang sehat bukanlah diet yang membuat Anda sakit, melainkan diet yang meningkatkan kesehatan tubuh. Oleh karena itu, jika ingin menurunkan berat badan ada baiknya mengetahui makanan apa yang baik dikonsumsi dan tidak. Anda juga perlu menyeimbangkannya dengan melakukan olahraga yang dapat meningkatkan metabolisme tubuh.', 'art1.JPG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_resep`
--

CREATE TABLE `tb_resep` (
  `id_resep` int(255) NOT NULL,
  `id_akun` int(255) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `bahan` text NOT NULL,
  `cara` text NOT NULL,
  `foto` varchar(300) NOT NULL,
  `jenis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_resep`
--

INSERT INTO `tb_resep` (`id_resep`, `id_akun`, `judul`, `bahan`, `cara`, `foto`, `jenis`) VALUES
(1, 19, 'COLA SALMON STEAK', 'Salmon\r\nCuka apel\r\nAir lemon\r\nGaram\r\nLada\r\nKecap asin\r\nBawang bombay\r\nMinyak wijen\r\nKonjac', 'Siapkan daging ikan salmon\r\nBeri cuka apel secukupnya, tambahkan juga air lemon,garam, dan lada secukupnya\r\nkemudian siapkan mangkuk lain, dan isi mangkuk tersebut dengan kecap asin 1/4 cup,\r\ntambahkan bawang bombay 1/2 buah, minyak wijen 1 sdm, lada, dan aduk hingga merata\r\npanaskan minyak goreng di atas wajan, Kemudian goreng ikan salmon tadi dengan hati-hati\r\nTumis konjac dengan saus marinasi secukupnya yang kita buat tadi, aduk. Kemudian tambahkan ikan salmon tadi\r\nDan bawang bombay 1/2 buah, kemudian Tuangkan sisa saus marinasi, jahe 1/2 ruas\r\nAduk hingga merata\r\nTuangkan cola ke dalam tumisan tadi\r\nTunggu hingga mendidih\r\nJika sudah matang, hidangkan di atas Piring dan hias semenarik mungkin', 'm1.PNG', 'makan'),
(2, 21, 'Khanom Chin', 'Daging Sapi\r\nLada\r\nGaram\r\nMinyak goreng\r\nDaun Bawang 1/2 batang\r\nBawang Putih 2 siung (sudah di haluskan)\r\nBubuk cabai\r\nGula 1sdm\r\nCuka 1sdm\r\nKecap ikan 1sdm\r\nSantan\r\nBihun\r\nAir', 'Taburi daging sapi dengan lada, garam secukupnya. Tambahkan juga air jahe\r\nPanaskan wajan dan beri minyak goreng secukupnya.\r\nTumis daun bawang, bawang putih yang sudah dihaluskan, dan cabai sesuai selera anda\r\nKemudian masukkan daging sapi yang sudah dibumbui tadi kedalam wajan\r\nSaat setengah matang, tambahkan gula 1 sdm, dan cuka 1 sdm, dan kecap ikan 1sdm, dan cabai bubuk 2sdm, dan air secukupnya\r\nAduk hingga merata\r\nSaat mendidih, tambahkan santan 1 cup, garam, dan lada\r\nAduk hingga merata\r\nBuatlah bihun\r\nDidihkan air di dalam panci\r\nRebus bihun ke dalam air yang sudah mendidih hingga matang\r\nLetakkan bihun diatas piring\r\nTuangkan daging di atas bihun yang sudah disiapkan tadi\r\nHias dengan daun seledri\r\nHidangan siap disantap', 'm2.PNG', 'makan'),
(3, 19, 'PHAT THAI', 'Minyak zaitun\r\nBawang merah\r\nWortel\r\nCabai\r\nUdang\r\nGaram\r\nMerica\r\nTelur dadar', 'Panaskan minyak zaitun di atas wajan, tumis bawang putih cincang, bawang bombay yang sudah dipotong kecil kecil, wortel yang sudah dipotong tipis tipis, masukkan juga cabai kering, udang yang sudah dibersihkan\r\nAduk hingga rata, kemudian tambahkan garam secukupnya, merica secukupnya\r\nMasukkan telur dadar, orak arik telur\r\nBeri sedikit minyak goreng, kemudian masukkan mie yang berbahan dasar dari nasi\r\nAduk hingga merata\r\nBeri air secukupnya, dan tambahkan juga saus phat thai, kemudian aduk hingga merata\r\nTambahkan kecambah, dan daun bawang secukupnya aduk hingga merata\r\nKemudian tambahkan sedikit minyak ikan, aduk hingga tercampur rata\r\nPhat thai siap dihidangkan', 'm3.PNG', 'makan'),
(6, 11, 'Ratatouille', 'Minyak zaitun\r\nSaus tomat\r\nTomat\r\nLabu\r\nTerong\r\nPaprika\r\nSalami\r\nGaram\r\nLada\r\nKeju parmesan', 'Oleskan panci dengan minyak zaitun\r\nMasukkan saus tomat, tomat, labu, terong, Paprika, salami, garam, dan lada ke dalam panci\r\nTutup panci, lalu nyalakan api\r\nTunggu hingga matang, taburi keju parmesan\r\nSajian siap dihidangkan', 'm4.PNG', 'makan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_temp_artikel`
--

CREATE TABLE `tb_temp_artikel` (
  `id_temp_artikel` int(255) NOT NULL,
  `id_akun` int(255) NOT NULL,
  `temp_judul` varchar(100) NOT NULL,
  `temp_konten` text NOT NULL,
  `temp_foto` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_temp_artikel`
--

INSERT INTO `tb_temp_artikel` (`id_temp_artikel`, `id_akun`, `temp_judul`, `temp_konten`, `temp_foto`) VALUES
(6, 11, 'Ini judul dari Artikel', 'ini kontennya artikel saya yang baru\r\nwadiajodaiwjdoiawjdoiawhdoi awjdakw doiawjdoaiw doaiwmd aowidawoidwmdoaiwj kdawd aw\r\ndawd wd adawda wda wda wda dawd awd wa daawdadwa', 'art4.jpg'),
(8, 20, 'Ini judawdawdawdawdawdwad', 'konten dapwoidaw odjawopdja wopdjawopdj awodijwaoihoewhfh dapwoidaw odjawopdja wopdjawopdj awodijwaoihoewhfh dapwoidaw odjawopdja wopdjawopdj awodijwaoihoewhfh dapwoidaw odjawopdja wopdjawopdj awodijwaoihoewhfh dapwoidaw odjawopdja wopdjawopdj awodijwaoihoewhfh dapwoidaw odjawopdja wopdjawopdj awodijwaoihoewhfh dapwoidaw odjawopdja wopdjawopdj awodijwaoihoewhfh dapwoidaw odjawopdja wopdjawopdj awodijwaoihoewhfh dapwoidaw odjawopdja wopdjawopdj awodijwaoihoewhfh \r\ndapwoidaw odjawopdja wopdjawopdj awodijwaoihoewhfh dapwoidaw odjawopdja wopdjawopdj awodijwaoihoewhfh dapwoidaw odjawopdja wopdjawopdj awodijwaoihoewhfh dapwoidaw odjawopdja wopdjawopdj awodijwaoihoewhfh dapwoidaw odjawopdja wopdjawopdj awodijwaoihoewhfh dapwoidaw odjawopdja wopdjawopdj awodijwaoihoewhfh dapwoidaw odjawopdja wopdjawopdj awodijwaoihoewhfh \r\ndapwoidaw odjawopdja wopdjawopdj awodijwaoihoewhfh dapwoidaw odjawopdja wopdjawopdj awodijwaoihoewhfh dapwoidaw odjawopdja wopdjawopdj awodijwaoihoewhfh dapwoidaw odjawopdja wopdjawopdj awodijwaoihoewhfh dapwoidaw odjawopdja wopdjawopdj awodijwaoihoewhfh dapwoidaw odjawopdja wopdjawopdj awodijwaoihoewhfh', 'art2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_temp_resep`
--

CREATE TABLE `tb_temp_resep` (
  `id_temp_resep` int(255) NOT NULL,
  `id_akun` int(255) NOT NULL,
  `temp_judul` varchar(100) NOT NULL,
  `temp_bahan` text NOT NULL,
  `temp_cara` text NOT NULL,
  `temp_foto` varchar(300) NOT NULL,
  `temp_jenis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_temp_resep`
--

INSERT INTO `tb_temp_resep` (`id_temp_resep`, `id_akun`, `temp_judul`, `temp_bahan`, `temp_cara`, `temp_foto`, `temp_jenis`) VALUES
(1, 8, 'Ini judul minuman', 'Air\r\nLemon\r\nEs', 'Masukkan air\r\nMasukkan Lemon\r\nMasukkan Es', 'm4.PNG', 'makan'),
(2, 11, 'Ini judul Snack yang enak', 'Jajan\r\nMeja\r\nKursi\r\nTangan', 'Buka bungkus jajan\r\nAmbil satu buah porsi\r\nPerlahan masukkan ke mulut anda', 'm2.PNG', 'snack'),
(3, 11, 'Ini judul makanan yang baru', 'Piring\r\nSendok\r\nGarpu\r\nNasi', 'Makan seperti biasa\r\nDengan sendok', 'm3.PNG', 'makan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `tb_artikel`
--
ALTER TABLE `tb_artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `tb_resep`
--
ALTER TABLE `tb_resep`
  ADD PRIMARY KEY (`id_resep`);

--
-- Indexes for table `tb_temp_artikel`
--
ALTER TABLE `tb_temp_artikel`
  ADD PRIMARY KEY (`id_temp_artikel`);

--
-- Indexes for table `tb_temp_resep`
--
ALTER TABLE `tb_temp_resep`
  ADD PRIMARY KEY (`id_temp_resep`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_akun`
--
ALTER TABLE `tb_akun`
  MODIFY `id_akun` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tb_artikel`
--
ALTER TABLE `tb_artikel`
  MODIFY `id_artikel` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_resep`
--
ALTER TABLE `tb_resep`
  MODIFY `id_resep` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_temp_artikel`
--
ALTER TABLE `tb_temp_artikel`
  MODIFY `id_temp_artikel` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_temp_resep`
--
ALTER TABLE `tb_temp_resep`
  MODIFY `id_temp_resep` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
