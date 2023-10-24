SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `online_rest` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `online_rest`;

CREATE TABLE IF NOT EXISTS `admin` (
  `adm_id` int(222) NOT NULL AUTO_INCREMENT,
  `username` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `code` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`adm_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

INSERT INTO `admin` (`adm_id`, `username`, `password`, `email`, `code`, `date`) 
VALUES (NULL, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'admin@gmail.com', '', CURRENT_DATE());

CREATE TABLE IF NOT EXISTS `admin_codes` (
  `id` int(222) NOT NULL AUTO_INCREMENT,
  `codes` varchar(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

INSERT INTO `admin_codes` (`id`, `codes`) VALUES
(1, 'QX5ZMN'),
(2, 'QFE6ZM'),
(3, 'QMZR92'),
(4, 'QPGIOV'),
(5, 'QSTE52'),
(6, 'QMTZ2J');

CREATE TABLE IF NOT EXISTS `dishes` (
  `d_id` int(222) NOT NULL AUTO_INCREMENT,
  `rs_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `slogan` varchar(222) NOT NULL,
  `price` varchar(222) NOT NULL,
  `img` varchar(222) NOT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

INSERT INTO `dishes` (`d_id`, `rs_id`, `title`, `slogan`, `price`, `img`) VALUES
(11, 48, 'bakwan', 'Camilan santai dengan rasa gurih dan tekstur renyah ini, memang tak pernah gagal dalam mengambil hati masyarakat Indonesia. ', 15.000, 'bakwan.jpg'),
(12, 48, 'cireng', 'Kudapan ini terbuat dari campuran tepung tapioka, daun bawang, dan bumbu rempah yang kemudian dibentuk bulat dan digoreng garing. Cireng sendiri biasa disajikan dengan bumbu rujak agar lebih enak. ', 15.000, 'cireng.jpg'),
(13, 48, 'batagor','Olahan lezat dengan bumbu kacang yang digunakan tentu membuat cita rasa dari batagor semakin enak. ', 15.000, 'batagor.jpg'),
(18, 48, 'cilok','Sajian ini dibuat dari paduan tepung tapioka, daun bawang, daging, dan beberapa macam rempah. Adonan kemudian dibulatkan, direbus, baru kemudian disajikan. Supaya lebih enak, cilok biasa disajikan bersama bumbu kacang.', 15.000, 'risol.jpg'),
(14, 48, 'risol','Makanan ini berupa potongan sayur yang dibalut kulit, dibalur tepung roti, lalu digoreng kering. Risoles pun banyak dikreasikan dengan aneka isian, seperti ragourt dan mayones ayam ', 15.000, 'cilok.jpg'),
(20, 49, 'Foire Gras','Foire Gras est adalah masakan khas Perancis yang  terbuat dari bahan dasar foie gras yang diolah dengan berbagai cara mulai dari merebus, memanggang', 500.000, 'foire gras.jpg'),
(21, 49, 'Chicken Parmigiana','Chicken Parmigiana adalah hidangan ayam yang disiapkan yang dilapisi dengan remah roti dan disajikan dengan saus Napoli yang terbuat dari keju dan tomat. ', 500.000, 'chicken.jpg'),
(22, 49, 'Lasagna','Lasagna adalah makanan khas dan pertama di Italia, hidangan pasta yang terdiri dari lapisan lasagna yang disajikan dengan saus dan bahan lainnya.', 500.000, 'lasagna.jpg'),
(23, 49, 'Tortellini','Tortellini adalah hidangan khas Italia yang berbentuk seperti pusar, terbuat dari campuran daging panggang dan keju. Makanan Tortellini disajikan dalam kuah kental. ', 500.000, 'Tortellini.jpg'),
(24, 49, 'Pizza','Pizza adalah jenis baguette dengan berbagai isian seperti ayam, daging, dll. dengan saus tomat, keju dan panggang atau panggang selama beberapa menit.', 500.000, 'pizza.jpg'),
(25, 50, 'Vanilla Panna Cotta with Berry Compote','Ini adalah makanan penutup yang sempurna untuk mengakhiri pesta makan malam tanpa stres, baik Anda menambahkan buah segar atau saus berry manis di atasnya.', 100.000, 'Vanilla Panna Cotta with Berry Compote.jpg'),
(26, 50, 'Es Campur','Selesai makan dan ingin yang segar-segar, pilihannya bisa jatuh pada es campur. Yang menjadi utamana adalah buah dan buah yang biasa dicampurkan ke makanan ini adalah pepaya, melon, lychee, kelapa, dan nangka.', 100.000, 'Es Campur.jpg'),
(27, 50, 'Lapis Legit','Kue ini sudah ada sejak zaman kolonial dan sampai sekarang masih ditemukan dan banyak penggemarnya. Di Indonesia, kue lapis biasa dijadikan sebagai hidangan di masa liburan seperti natal, imlek, dan lebaran.', 100.000, 'Lapis-Legit.jpg'),
(28, 50, 'Kue Putu','Kue putu biasanya dijual di gerobak dan penjualnya akan berkeliling di suatu wilayah. Biasanya pedagang kue putu ini baru muncul di sore hingga malam hari. Jadi sangat cocok dijadikan menu penutup.', 100.000, 'kue-putu.jpg'),
(29, 50, 'Pisang Coklat','Pisang diberikan coklat lalu diselimuti dengan tepung lalu digoreng. Ketika masak, jadilah pisang coklat yang bila digigit, coklatnya akan lumer di mulut.', 100.000, 'pisang-coklat.jpg'),
(30, 51, 'Rawon khas Surabaya','identik dengan kuah berwarna gelap karena mengandung kluwek. Berisi potongan daging sapi dan taoge', 150.000, 'rawon.jpg'),
(31, 51, 'Soto betawi khas Jakarta','terbuat dari potongan daging sapi dan jeroan, disajikan dengan kuah kaldu santan. Dilengkapi tomat dan emping', 150.000, 'soto betawi.jpg'),
(32, 51, 'Konro khas Sulawesi Selatan','merupakan olahan iga, dimasak dengan kuah kaldu beraroma dan berempah kuat', 150.000, 'konro.jpg'),
(33, 51, 'Coto makassar','terkenal dengan kuah kental dan gurih. Berisi daging sapi dan jeroan, seperti babat, otak, atau usus. Disajikan dengan nasi atau lontong', 150.000, 'coto mak.jpg'),
(34, 51, 'Soto lamongan','rasanya gurih dan segar. Dilengkapi ayam suwir, mi soun, kol, telur rebus, dan kerupuk', 150.000, 'Soto lamongan.jpg'),
(35, 52, 'Teh Talua, Minuman Tradisional Khas Sumatera Barat','Minuman khas Sumatera Barat ini memiliki banyak khasiat kesehatan karena menggunakan bahan-bahan yang juga kaya nutrisi. Kandungan Protein sedikit vitamin C di dalamnya bisa membantu memiliki daya tahan tubuh tinggi', 80.000, 'Teh_Talua.jpg'),
(36, 52, 'Wedang Uwuh','Kandungan rempah yang kaya membuat wedang uwuh memiliki kadar antioksidan yang tinggi dan dapat membantu mengurangi kadar kolesterol jahat dalam tubuh', 80.000, 'Wedang Uwuh.jpg'),
(37, 52, 'Bajigur','Biasanya minum Bajigur jadi lebih sedap dengan ditemani camilan seperti pisang atau singkong goreng yang renyah. Konon, minuman ini tercipta dari kebiasaan para petani Sunda yang sering membuat minuman dari gula aren.', 80.000, 'bajigur.jpg'),
(38, 52, 'Wedang Ronde','Minuman ini disebut dengan nama tang yuan, atau dongzhi, namun setelah diadaptasi oleh masyarakat Jawa Tengah, namanya kemudian berubah menjadi wedang ronde. ', 80.000, 'wedang ronde.jpg');

CREATE TABLE IF NOT EXISTS `remark` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `frm_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` mediumtext NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=71 ;

INSERT INTO `remark` (`id`, `frm_id`, `status`, `remark`, `remarkDate`) VALUES
(62, 32, 'in process', 'hi', '2018-04-18 17:35:52'),
(63, 32, 'closed', 'cc', '2018-04-18 17:36:46'),
(64, 32, 'in process', 'fff', '2018-04-18 18:01:37'),
(65, 32, 'closed', 'its delv', '2018-04-18 18:08:55'),
(66, 34, 'in process', 'on a way', '2018-04-18 18:56:32'),
(67, 35, 'closed', 'ok', '2018-04-18 18:59:08'),
(68, 37, 'in process', 'on the way!', '2018-04-18 19:50:06'),
(69, 37, 'rejected', 'if admin cancel for any reason this box is for remark only for buter perposes', '2018-04-18 19:51:19'),
(70, 37, 'closed', 'delivered success', '2018-04-18 19:51:50');

CREATE TABLE IF NOT EXISTS `restaurant` (
  `rs_id` int(222) NOT NULL AUTO_INCREMENT,
  `category` varchar(222) NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`rs_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

INSERT INTO `restaurant` (`rs_id`, `category`, `image`) VALUES
(48, 'Appetizer', '2.jpeg'),
(49, 'Main Course','4.jpg'),
(50, 'Dessert', '1.jpg'),
(51, 'Soup', '3.jpeg'),
(52, 'Beverage', '5.jpeg');

CREATE TABLE IF NOT EXISTS `users` (
  `u_id` int(222) NOT NULL AUTO_INCREMENT,
  `username` varchar(222) NOT NULL,
  `f_name` varchar(222) NOT NULL,
  `l_name` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `address` text NOT NULL,
  `status` int(222) NOT NULL DEFAULT '1',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

INSERT INTO `users` (`u_id`, `username`, `f_name`, `l_name`, `email`, `phone`, `password`, `address`, `status`, `date`) 
VALUES ('31', 'tes', 'ayam', 'goreng', 'ayamgoreng@gmail.com', '08111234567', 'tes123', 'Jl. Maju Mundur Jaya', '1', current_timestamp());

CREATE TABLE IF NOT EXISTS `users_orders` (
  `o_id` int(222) NOT NULL AUTO_INCREMENT,
  `u_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `quantity` int(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(222) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`o_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

INSERT INTO `users_orders` (`o_id`, `u_id`, `title`, `quantity`, `price`, `status`, `date`) 
VALUES (NULL, '31', 'Ayam', '5', '17.99', 'closed', CURRENT_DATE());