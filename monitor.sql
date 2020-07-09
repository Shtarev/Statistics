SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `monitor` (
  `id` int(8) NOT NULL,
  `client` int(8) NOT NULL,
  `client_ip` varchar(255) NOT NULL,
  `clienr_referer` varchar(510) NOT NULL,
  `site` text NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `monitor` (`id`, `client`, `client_ip`, `clienr_referer`, `site`, `date`) VALUES
(0, 33633, '127.0.0.1', 'http://test.php/pass.php', 'Besuche /save_as.php zeit: 14:49:07<br>', '07.09.20'),
(1, 160516, '127.0.0.1', 'http://test.php/pass.php', 'Besuche /save_as.php zeit: 14:49:07<br>', '06.09.20'),
(2, 34645631, '127.0.0.1', 'http://test.php/pass.php', 'Besuche /save_as.php zeit: 14:49:07<br>', '07.09.20'),
(3, 9935, '127.0.0.1', 'http://test.php/pass.php', 'Besuche /save_as.php zeit: 14:49:07<br>', '09.07.20'),
(4, 3333, '127.0.0.1', 'http://test.php/pass.php', 'Besuche /save_as.php zeit: 14:49:07<br>', '07.09.20'),
(5, 1051, '127.0.0.1', 'http://test.php/pass.php', 'Besuche /save_as.php zeit: 14:49:07<br>', '06.09.20'),
(6, 3464531, '127.0.0.1', 'http://test.php/pass.php', 'Besuche /save_as.php zeit: 14:49:07<br>', '07.09.20'),
(7, 8259935, '127.0.0.1', 'http://test.php/pass.php', 'Besuche /save_as.php zeit: 14:49:07<br>', '09.07.20');

ALTER TABLE `monitor`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `monitor`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;