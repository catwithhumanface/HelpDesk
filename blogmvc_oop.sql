SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: 'helpdesk'
--

-- --------------------------------------------------------

--
-- Table structure for table 'posts'
--

CREATE TABLE IF NOT EXISTS posts (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  title varchar(255) DEFAULT NULL,
  small_desc text NOT NULL,
  content longtext NOT NULL,
  author varchar(255) NOT NULL,
  date timestamp NOT NULL DEFAULT NOW(),
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
/*
CREATE TABLE IF NOT EXISTS users (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  username varchar(255) NOT NULL,
  password char(255) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
*/
--
-- Dumping data for table `users`
--
INSERT INTO users (username, password) VALUES
('admin', '$2y$10$Gxsl/dZSgxKgdMmJjVDpGufd9RJPAi13YbVV.cesdHhtcoOkCOJ8y');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;





CREATE TABLE IF NOT EXISTS ticket (
    id int(10) NOT NULL AUTO_INCREMENT,
    title varchar(255) DEFAULT NULL,
    content text NOT NULL,
    id_user int(10) NOT NULL,
    category varchar(255) DEFAULT "Pédagogique",
    creation_date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ,
    PRIMARY KEY (id),
    KEY fk_id_user(id_user)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS users (
  id_user int(10) NOT NULL AUTO_INCREMENT,
  email varchar(255) NOT NULL,
  name varchar(255) NOT NULL,
  firstrname varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  creation_date timestamp NOT NULL DEFAULT NOW(),
  statut varchar(255) NOT NULL,
  PRIMARY KEY (id_user)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
