-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2024 at 08:18 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_proj`
--

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `artist_name` varchar(50) NOT NULL,
  `artist_id` varchar(50) NOT NULL,
  `artist_email` varchar(50) NOT NULL,
  `artist_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`artist_name`, `artist_id`, `artist_email`, `artist_password`) VALUES
('Vincent van Gogh', 'LetsVanGogh', 'vincent@gmail.com', 'cutEar123'),
('Michelangelo di Lodovico Buonarroti Simoni', 'Michelangelo', 'michael@itali.com', 'TMNTpainter22'),
('Monis Yasilad', 'MonisPaints', 'monis@art.edu.ph', 'MonisMonis123');

-- --------------------------------------------------------

--
-- Table structure for table `arts`
--

CREATE TABLE `arts` (
  `art_name` varchar(50) NOT NULL,
  `art_date` date NOT NULL,
  `art_posted` date NOT NULL,
  `artist_id` varchar(50) NOT NULL,
  `art_description` varchar(1000) NOT NULL,
  `art_id` varchar(11) NOT NULL,
  `art_format` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `arts`
--

INSERT INTO `arts` (`art_name`, `art_date`, `art_posted`, `artist_id`, `art_description`, `art_id`, `art_format`) VALUES
('The Starry Night', '2024-07-10', '2024-07-10', 'LetsVanGogh', '', '00000000001', 'jpg'),
('Sunflower', '1886-05-10', '2024-07-10', 'LetsVanGogh', '', '00000000002', 'jpg'),
('The Creation of Adam', '1512-01-01', '2024-07-10', 'Michelangelo', 'The Creation of Adam represents the moment in which humanity was created through the hands of God.', '00000000003', 'jpg'),
('The Torment of Saint Anthony', '1700-01-01', '2024-07-10', 'Michelangelo', 'The Torment of Saint Anthony is attributed to Michelangelo, who painted a close copy of the famous engraving by Martin Schongauer when he was only 12 or 13 years old. Whether the painting is actually by Michelangelo is disputed. This painting is now in the Kimbell Art Museum in Fort Worth, Texas', '00000000004', 'jpg'),
('The Potato Eaters', '1885-01-01', '2024-07-10', 'LetsVanGogh', 'Potato Eater Sketch These subtle aspects create the illusion that the building is an actual residence for the five figures. This portrayal of ordinary peasant life did not come in a burst of creativity; Van Gogh had planned out the painting of The Potato Eaters far in advance, and had inspiration to create a multiple figure painting as far back as 1883. After completing various sketches and trial paintings of the piece, Van Gogh sent reversed lithograph prints to two art dealers of the time and one of his fellow colleagues, while still planning to create a final draft of the sketch in paint. Van Gogh soon developed a sense of confidence that his finished painting would become an accurate interpretation of what he saw it as. Gogh began to advertise his finished painting before he had even begun it.', '00000000005', 'jpg');

-- --------------------------------------------------------

--
-- Table structure for table `art_comments`
--

CREATE TABLE `art_comments` (
  `art_comment_id` varchar(11) NOT NULL,
  `art_id` varchar(11) NOT NULL,
  `art_comment` varchar(500) NOT NULL,
  `art_comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `art_comments`
--

INSERT INTO `art_comments` (`art_comment_id`, `art_id`, `art_comment`, `art_comment_date`) VALUES
('00000000001', '00000000001', 'This is one of my most favorite artworks. ', '2024-07-10'),
('00000000002', '00000000002', 'I love this work especially since it is color yellow. I just love that color!', '2024-07-10'),
('00000000003', '00000000001', 'Nice art!', '2024-07-10'),
('00000000004', '00000000002', 'Nice art!\r\n', '2024-07-10'),
('00000000005', '00000000001', 'I love this art!', '2024-07-10'),
('00000000006', '00000000005', 'Wow. I love the expressions.', '2024-07-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`artist_id`);

--
-- Indexes for table `arts`
--
ALTER TABLE `arts`
  ADD PRIMARY KEY (`art_id`);

--
-- Indexes for table `art_comments`
--
ALTER TABLE `art_comments`
  ADD PRIMARY KEY (`art_comment_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
