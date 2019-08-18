-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3333
-- Gegenereerd op: 18 aug 2019 om 13:38
-- Serverversie: 10.1.32-MariaDB
-- PHP-versie: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tuneshop`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `category`
--

CREATE TABLE `category` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(35) NOT NULL,
  `MainCategoryID` int(3) NOT NULL,
  `CategoryOrder` int(3) NOT NULL,
  `Disabled` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `category`
--

INSERT INTO `category` (`CategoryID`, `CategoryName`, `MainCategoryID`, `CategoryOrder`, `Disabled`) VALUES
(1, 'Accesoires voor Drums en Percussie', 4, 4, 0),
(2, 'Accesoires voor Gitaar en Bas', 2, 7, 0),
(3, 'Accesoires voor Piano\'s', 1, 9, 0),
(4, 'Accesoires voor Strijkinstrumenten', 5, 4, 0),
(5, 'Accordeons', 1, 8, 0),
(6, 'Akoustische Drums', 4, 1, 0),
(7, 'Akoustische Gitaren', 2, 2, 0),
(8, 'Basgitaren', 2, 4, 0),
(9, 'Blokfluiten', 3, 2, 0),
(10, 'Cello\'s', 5, 2, 0),
(11, 'Contrabassen', 5, 3, 0),
(12, 'Digitale Drums', 4, 3, 0),
(13, 'Digitale Piano\'s', 1, 3, 0),
(14, 'Dwarsfluiten', 3, 3, 0),
(15, 'Elektrische Gitaren', 2, 1, 0),
(16, 'Elektronische Orgels', 1, 7, 0),
(17, 'Keyboards', 1, 4, 0),
(18, 'Klarinetten', 3, 6, 0),
(19, 'Klassieke Gitaren', 2, 3, 0),
(20, 'Mondharmonica\'s', 3, 1, 0),
(21, 'Percussie', 4, 2, 0),
(22, 'Piano\'s', 1, 1, 0),
(23, 'Piccolo\'s', 3, 5, 0),
(24, 'Saxofoon\'s', 3, 7, 0),
(25, 'Stage Piano\'s', 1, 2, 0),
(26, 'Synthesizers', 1, 6, 0),
(27, 'Traditionele Snaainstrumenten', 2, 5, 0),
(28, 'Trombone', 3, 8, 0),
(29, 'Trompetten', 3, 4, 0),
(30, 'Versterkers', 2, 6, 0),
(31, 'Violen', 5, 1, 0),
(32, 'Vleugels', 1, 5, 0),
(33, 'Accesoires voor Blaasinstrumenten', 3, 9, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `maincategory`
--

CREATE TABLE `maincategory` (
  `MainCategoryID` int(3) NOT NULL,
  `CategoryName` varchar(35) NOT NULL,
  `CategoryOrder` int(3) NOT NULL,
  `Disabled` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `maincategory`
--

INSERT INTO `maincategory` (`MainCategoryID`, `CategoryName`, `CategoryOrder`, `Disabled`) VALUES
(1, 'Toetsinstrumenten', 1, 0),
(2, 'Tokkelinstrumenten', 2, 0),
(3, 'Blaasinstrumenten', 3, 0),
(4, 'Slaginstrumenten', 4, 0),
(5, 'Strijkinstrumenten', 5, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product`
--

CREATE TABLE `product` (
  `ID` int(11) NOT NULL,
  `SKU` varchar(20) DEFAULT NULL,
  `ProductName` varchar(100) DEFAULT NULL,
  `Description` longtext,
  `FullDescription` longtext,
  `Category` varchar(15) DEFAULT NULL,
  `Price` decimal(8,2) DEFAULT NULL,
  `Stock` int(11) DEFAULT NULL,
  `Picture_Big` varchar(1024) DEFAULT NULL,
  `Picture_Small` varchar(1024) DEFAULT NULL,
  `Disabled` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `product`
--

INSERT INTO `product` (`ID`, `SKU`, `ProductName`, `Description`, `FullDescription`, `Category`, `Price`, `Stock`, `Picture_Big`, `Picture_Small`, `Disabled`) VALUES
(1, 'FazleyDR-28', 'Fazley DR-28 blokfluit, Barokboring', 'Deze blokfluit is een uitstekend instrument voor de echte beginner. Gemaakt van kunststof, dus makkelijk in onderhoud en ongevoelig voor vocht. Deze blokfluit heeft een barokboring. Een leuk instrument voor jong en oud!\r\n', 'Algemeen\r\nDe Fazley DR-28 blokfluit is een uitstekend instrument voor de echte beginner. Gemaakt van kunststof, dus makkelijk in onderhoud en ongevoelig voor vocht. Het instrument bestaat uit drie delen; het mondstuk, het middendeel en het onderste deel. In het middendeel zitten 6 vingergaten en een duimgat. In het onderste deel zit het zevende gat. Deze blokfluit heeft een barokboring. De barokboring is geschikt voor beginners, net als blokfluiten met een Duitse boring. Vaak stappen blokfluitisten die op een fluit met Duitse boring begonnen zijn later over naar een instrument met barokboring. Je kunt dus net zo goed gelijk op een blokfluit met de meer populaire barokboring beginnen. Een leuk instrument voor jong en oud! \r\n\r\nBlokfluit\r\nDe blokfluit is een ideaal instrument om de eerste beginselen van muziek mee te ontdekken. Kunststof blokfluiten hebben een aantal voordelen ten opzichte van houten blokfluiten. Het instrument is ongevoelig voor vocht en kunststof blokfluiten hoeven bijn', '9', '4.95', 5, 'FazleyDR-28_01.jpg', 'FazleyDR-28_04.jpg', 0),
(3, 'Yamaha_YRA314BIII', 'Yamaha YRA314BIII altblokfluit barokboring, ebbenhoutlook', 'Met de Yamaha YRA-314BIII haal je een prettig geprijsde kunststof altblokfluit in huis met een barokboring en een mooie ebbenhoutlook. Wordt geleverd met hoes en accessoires.\r\n', 'Algemeen\r\n\r\nMet de Yamaha YRA-314BIII haal je een prettig geprijsde kunststof altblokfluit in huis die goed in de smaak zal vallen bij beginners, maar waar meer ervaren fluitisten ook zeker veel plezier aan zullen beleven. Het onderhoudsarme kunststof is uitgevoerd in mooie ebbenhoutlook met contrasterende ivookleurige accenten. De YRA-314BIII heeft een barokboring en het zesde en zevende gat zijn dubbelgeboord. Je ontvangt bij deze fraaie alt een handig etui, een iwsserstaaf en blokfluitvet.\r\nTips of opmerkingen over dit product\r\nLet op:\r\n\r\n- Muziekscholen werken standaard met blokfluiten met een Duitse boring in C.\r\n- Op de afbeelding ziet u een bruin-witte uitvoering. De werkelijke kleur kan eventueel iets afwijken.\r\n\r\nSpecificaties\r\nProductkenmerken\r\nMateriaal fluit         kunststof\r\nDuitse of Barokke boring         Barok\r\nEnkele of dubbele boring         dubbel\r\nGewicht en afmetingen inclusief verpakking\r\nGewicht (incl. verpakking):         260 gr\r\nAfmeting (incl. verpakking):   ', '9', '45.00', 10, 'Yamaha_YRA314BIII_01.jpg', 'Yamaha_YRA314BIII_04.jpg', 0),
(5, 'YA-YRB302BII', 'Yamaha YRB302BII basblokfluit, barokboring ', 'Basblokfluit YRB302BII van Yamaha is een prettig geprijsde bas blokfluit in de toonsoort F met barokboring. Deze blokfluit is vierdelig, vervaardigd uit kunststof en is voorzien van een handige duimsteun.\r\n', 'Algemeen\r\n\r\nBasblokfluit YRB302BII van Yamaha is een prettig geprijsde bas blokfluit in de toonsoort F met barokboring. Deze blokfluit is vierdelig, vervaardigd uit kunststof en is voorzien van een handige duimsteun. De fluit heeft een rijk en vol geluid en doet niet onder voor een houten blokfluit. Deze blokfluit wordt compleet geleverd inclusief beschermhoes, poetsdoekstaaf en blokfluitvet.\r\n\r\nSpecificaties\r\nProductkenmerken\r\nDuitse of Barokke boring 	Barok\r\nMateriaal fluit 	kunststof\r\nGewicht en afmetingen inclusief verpakking\r\nGewicht (incl. verpakking): 	1,5 kg\r\nAfmeting (incl. verpakking): 	8,0 x 15,0 x 62,0 cm\r\nProductspecificaties\r\n\r\n    Yamaha YRB302BII\r\n    basblokfluit\r\n    vierdelig\r\n    stemming: F\r\n    F/F# hulpkleppen\r\n    barokboring\r\n    inclusief duimsteun\r\n    vervaardigd van kunststof\r\n    inclusief beschermhoes, poetsdoekstaaf en blokfluitvet\r\n\r\n', '9', '313.00', 7, 'YA-YRB302BII_01.jpg', 'YA-YRB302BII_02.jpg', 0),
(6, 'roland_fp_30_black', 'Roland FP-30 digitale piano (zwart)', 'Een digitale piano die met zijn lichte gewicht en compacte behuizing gemakkelijk een plek te geven is. De moderne Roland FP-30 (zwart) speelt en klinkt bovendien erg overtuigend, en is voorzien van onder andere Bluetooth.\r\n', 'Algemeen\r\n\r\nRoland weet precies hoe het een eenvoudige maar heel complete digitale piano moet bouwen. De handzame FP-30 - hier in het zwart - bevat precies de mogelijkheden waar de moderne pianist naar op zoek is: een overtuigend pianogeluid, het speelgevoel van een vleugelklavier en diverse handige extra\'s, waaronder een opnamefunctie, diverse drumritmes en Bluetooth. Omdat de behuizing zo licht en compact mogelijk gehouden is, zult u weinig moeite hebben een plekje te vinden voor deze elektrische piano. Een sustainpedaal wordt meegeleverd; een onderstel en een pedaal-unit met 3 pedalen zijn los verkrijgbaar.\r\n\r\nRoland FP 30: PHA-4-klavier en SuperNATURAL\r\n\r\nDe Roland FP-30 bezit een volledig klavier van 88 toetsen. Het gaat om het heel prettig spelende PHA-4-klavier, dat de verbeterde opvolger is van Ivory Feel G. Daarnaast is het voorzien van een \'escapement\'-mechanisme, net als een vleugel, waardoor snelle toonherhalingen mogelijk zijn. Het ivoor-achtige oppervlak van de toetsen ma', '13', '659.00', 0, 'roland_fp_30_black_09.jpg', 'roland_fp_30_black_01.jpg', 0),
(8, 'Studiologic_Numa_MG_', 'Studiologic Numa Compact 2 digitale piano ', 'Er zijn weinig digitale piano\'s die zo compact zijn als de Numa Compact 2, en toch zó compleet: 88 semi-gewogen toetsen, 88 klanken, interne speakers en een gewicht van slechts 7.1 kg. Ook heel geschikt als MIDI-keyboard.\r\n', 'Algemeen\r\nEr zijn weinig digitale piano\'s die zo compact zijn als de Studiologic Numa Compact 2, en toch zó compleet. Dit instrument heeft de volledige 88 toetsen zoals we die ook aantreffen op een akoestische piano. En Studiologic heeft dit weten te combineren met een gewicht van slechts 7.1 kilo. Deze vederlichte piano is daardoor bijzonder makkelijk mee te nemen naar een band-repetitie, een optreden of een opnamesessie. Over opnames gesproken: de Numa Compact 2 is tegelijk een aanwinst voor iedere home studio. Als volwaardige MIDI-controller is hij namelijk ook heel goed gebruiken voor het aansturen van klanken op je computer.\r\n\r\nKlanken en ingebouwde speakers\r\nJe zult meteen merken dat de Numa Compact 2, met zijn semi-gewogen klavier, tussen de toetsaanslag van een keyboard en piano in zit. Niet te licht voor pianopartijen, maar ook niet te zwaar voor orgel- en synth-sessies. Uit zijn ingebouwde luidsprekers komt overigens een verrassend vol geluid, voor een goede weergave van de 88 overtuigende klanken, waaronder diverse akoestische en elektrische piano\'s, orgels, gitaren en orkestinstrumenten. Natuurlijk kun je het geluid ook naar een koptelefoon of PA-systeem laten gaan. Liever je eigen sounds gebruiken? Sluit hem aan op je computer en de mogelijkheden zijn - in combinatie met je virtuele instrumenten - onbegrensd', '13', '510.00', 34, 'Studiologic_Numa_MG_9979_06.jpg', 'Studiologic_Numa_MG_9979_01.jpg', 0),
(10, 'casio_cdp_130_bk', 'Casio CDP-130 BK Black digitale piano', 'We kunnen bijna geen betere instap-piano bedenken dan de Casio CDP-130 BK (Black). Deze zwarte piano heeft, voor een zeer schappelijke prijs, alle belangrijke features aan boord die u van een digitale piano verwacht.\r\n', 'Algemeen\r\n\r\nWe kunnen bijna geen betere instap-piano bedenken dan de Casio CDP-130 BK (Black). Deze zwarte piano heeft, voor een zeer schappelijke prijs, alle belangrijke features aan boord die u van een digitale piano verwacht. Allereerst natuurlijk een natuurgetrouwe pianoklank, samen met diverse andere sounds, waaronder orgel, elektrische piano, clavecimbel en strijkers. Het pianobrede, 88 toetsen tellende klavier is een zogenaamd Scaled Hammer Action Keyboard, ofwel: de hamer-achtige aanslag is vergelijkbaar met die van een akoestische piano en de lage toetsen voelen zwaarder aan dan de hoge.\r\n\r\nDe mogelijkheden van de CDP-130\r\n\r\nOm de gebruiker meteen in staat te stellen stukken te spelen die speciaal voor piano zijn gemaakt, wordt er een sustainpedaal meegeleverd. Met dit zo goed als onmisbare accessoire kunt u tonen vasthouden, zodat u uw handen vrij hebt om andere toetsen aan te slaan. Verder kunt u deze compacte en toch heel complete digitale piano gemakkelijk kwijt in uw huis.', '13', '507.00', 17, 'casio_cdp_130_bk_01.jpg', 'casio_cdp_130_bk_02.jpg', 0),
(11, 'Fazley_FLP300SB_Sunb', 'Fazley FLP318SB elektrische gitaar sunburst', 'Voor iedereen die wil beginnen met elektrisch gitaarspelen, of een solide back-up zoekt, is de Fazley FLP318SB in Sunburst een interessante optie. Iconische looks met een breed inzetbare sound voor een scherpe prijs!', 'Algemeen\r\n\r\nWie op zoek is naar een single cut-stijl elektrische gitaar komt er vaak al snel achter dat er aan deze gitaren een behoorlijk prijskaartje hangt. Fazley brengt daar met de FLP318SB verandering in. Deze single cut is namelijk bijzonder scherp geprijsd. Opvallend is de top van gevlamd esdoorn in de Sunburst-afwerking. In combinatie met de verchroomde hardware en ivoorkleurige onderdelen krijgt u een gitaar met een iconische uitstraling. Wanneer u deze Fazley vastpakt dan denkt u onmiddellijk: “sweet child o\' mine!”\r\n\r\nFLP318SB: stabiele constructie\r\n\r\nDe in het oog springende esdoornhouten top is niet alleen een lust van het, maar het heeft ook een functie. Er zit namelijk een welving in. Hierdoor komt uw rechterarm op een comfortabele manier op de body te liggen, waardoor u minder snel last zal krijgen van last in uw pols. Saillant detail is ook de gelijmde (set-neck) constructie. Daardoor krijgt de gitaar een flinke extra dosis sustain en resonantie. Bovendien zijn de hogere frets ook makkelijker bereikbaar waardoor het speelplezier wordt verhoogd.\r\n\r\nHoog speelgemak en een veelzijdige klank\r\n\r\nZoals het een echte single cut betaamt heeft de Fazley FLP318SB een korte mensuur van 24.75 inch (628 mm). Hierdoor is de spanning op de snaren iets lager, waardoor het opdrukken een stukje makkelijker wordt. Dankzij de TOM-stijl brug met stopbar is deze gitaar makkelijk te stemmen en ook bijzonder stabiel. Met de klank kunt u alle kanten op. U krijgt namelijk de beschikking over twee humbuckers. Deze zijn naar eigen smaak af te stellen middels de uitgebreide toonregeling.\r\nTips of opmerkingen over dit product\r\n\r\n    Let op:\r\n        De modellen met 00 in het typenummer hebben een toets gemaakt van palissander (rosewood)\r\n        De modellen met 18 in het typenummer hebben een toets gemaakt van brown blackwood.\r\n\r\nSpecificaties\r\nProductkenmerken\r\nModel body 	single cut\r\nAantal snaren 	6\r\nElementtype 	humbucker (passief)\r\nKleur 	burst\r\nBrugtype 	tunomatic + staartstuk\r\nElementconfiguratie 	HH\r\nAantal frets 	22\r\nMateriaal body 	linde (basswood)\r\nLinkshandig 	nee\r\nLand van herkomst 	China\r\nMensuur gitaar 	24.75 inch (629 mm)\r\nHalsverbinding 	gelijmd (set neck)\r\nHoutsoort toets 	blackwood\r\nSet 	nee\r\nInclusief koffer 	nee\r\nInclusief hoes 	nee\r\nGewicht en afmetingen inclusief verpakking\r\nGewicht (incl. verpakking): 	4,1 kg\r\nAfmeting (incl. verpakking): 	101,0 x 46,0 x 11,0 cm\r\n', '15', '179.00', 5, 'Fazley_FLP300SB_Sunburst_01.jpg', 'Fazley_FLP300SB_Sunburst_03.jpg', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product_related_product`
--

CREATE TABLE `product_related_product` (
  `ProductID` int(11) DEFAULT NULL,
  `ProductID_Related_Product` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `product_related_product`
--

INSERT INTO `product_related_product` (`ProductID`, `ProductID_Related_Product`) VALUES
(1, 3),
(1, 5),
(3, 1),
(3, 5),
(5, 1),
(5, 3),
(11, 12),
(11, 13),
(12, 11),
(12, 13),
(13, 11),
(13, 12);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `review`
--

CREATE TABLE `review` (
  `ReviewID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `BeoordelingsCijfer` int(11) NOT NULL,
  `BeoordelingsTekst` text NOT NULL,
  `Datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `review`
--

INSERT INTO `review` (`ReviewID`, `ProductID`, `UserID`, `BeoordelingsCijfer`, `BeoordelingsTekst`, `Datum`) VALUES
(1, 6, 1, 4, 'Beste in zijn prijsklasse, al ruim een jaar veel plezier van! Toetsen voelen goed aan, het geluid is top. Echter speelt de piano soms zomaar een noot heel erg luid af, wat me al een paar keer flink heeft laten schrikken. Dit gebeurt misschien 1 keer per 10 uur. Geen idee of ik dit als enigste heb.', '2019-05-12'),
(2, 6, 2, 5, 'Zeer goede prijs/kwaliteit. De toetsen voelen aan als echt ivoor, en hij ziet er sober en elegant uit, zoals het een piano betaamt. Heel handig in het gebruik en een goede klank voor een digitale piano. \r\n', '2019-03-24');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `UserName` varchar(15) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `Prefix` varchar(15) DEFAULT NULL,
  `Surname` varchar(100) NOT NULL,
  `Address` varchar(125) NOT NULL,
  `HouseNumber` int(11) NOT NULL,
  `ZipCode` varchar(6) NOT NULL,
  `City` varchar(125) NOT NULL,
  `PhoneNumber` varchar(15) NOT NULL,
  `EMail` varchar(50) NOT NULL,
  `Gender` varchar(1) NOT NULL,
  `Avatar` varchar(15) NOT NULL,
  `Password` varchar(60) NOT NULL,
  `Token` varchar(32) DEFAULT NULL,
  `RecoveryDate` varchar(123) DEFAULT NULL,
  `Deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`ID`, `UserName`, `FirstName`, `Prefix`, `Surname`, `Address`, `HouseNumber`, `ZipCode`, `City`, `PhoneNumber`, `EMail`, `Gender`, `Avatar`, `Password`, `Token`, `RecoveryDate`, `Deleted`) VALUES
(1, 'janwil', 'Jan Willem', '', 'Lenting', 'Spaaksingel', 30, '6716KG', 'EDE', '06-123456', 'tuneshop@janwil.nl', 'M', 'janwil.png', '$2y$10$nkXLfvvEwsX5y/YoYOJcVeM7Tc3y/KD9ExrIqGYgGpmXrpIyOroZe', '9a396c19667ec38b29a452efbf007f5d', '1561442253', 0),
(2, 'lotus', 'Lotus', 'ter', 'Haar', 'Straatnaam', 123, '1234AA', 'PLAATS', '06-1234567', 'lotus.ter.haar@gmail.com', 'F', '', '$2y$10$Ygs4c9mUXO.yWB5h1h2cNev7G1KHKMfNQDHwHL2qMWTUofZmtu00K', NULL, NULL, 0),
(3, 'lotuss', 'sdffsdsfdsdfjkkjlfsdsfd', NULL, 'sfsfddsf', 'aafafshjkhklh', 0, 'jklhjk', 'jklhjklhljkh', 'lkhjklh', 'sdfsfdsdffsd@aaadsds.asdads', 'M', 'lotuss', '$2y$10$8U6NttZSFcxofGKkbYykn.QMe36L/zxG72Xu8br93tH9oQ/Jts23e', 'f19097d7675a2ab10dcd608dd9184f78', '1561442839', 0),
(4, 'lotusss', 'Lotus', 'ter', 'Haar', 'Lotusstraat', 1234, '1234AA', 'Lotusbloem', '123-456789', 'lotus@terhaar.com', 'F', 'lotusss', '$2y$10$iPZPQ./BPyTM7ybIOB3u2eNwluFv1wrEd7hTpTF9GQcFlFcUer.iC', NULL, NULL, 0),
(5, 'lotussss', 'JW', NULL, 'Lenting', 'Spaaksingel 30', 0, '6716KG', 'Ede', '0640857459', 'pmc-emmen@janwil.nl', 'M', 'lotussss.png', '$2y$10$Vh.97n.A1.nyjCtBgcqeOuY/kgLnwB1L91TbyMGKUAC8mhLzIS7B6', NULL, NULL, 0),
(6, 'testjw', 'Jan', 'ter', 'Lenting', 'Spaaksingel 30', 0, '6716KG', 'Ede', '640857459', 'tuneshop2@janwil.nl', 'M', 'testjw.png', '$2y$10$n5GlqouSyF0XrzfXl7D9Fubj1Dk0YdK0pzn66ZhVKpjD2lPcpFNOm', NULL, NULL, 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`),
  ADD UNIQUE KEY `CategoryName` (`CategoryName`),
  ADD UNIQUE KEY `CategorieID` (`CategoryID`),
  ADD KEY `CategorieID_2` (`CategoryID`);

--
-- Indexen voor tabel `maincategory`
--
ALTER TABLE `maincategory`
  ADD UNIQUE KEY `MainCategoryID` (`MainCategoryID`);

--
-- Indexen voor tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`ReviewID`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD UNIQUE KEY `UserName` (`UserName`),
  ADD UNIQUE KEY `EMail` (`EMail`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT voor een tabel `review`
--
ALTER TABLE `review`
  MODIFY `ReviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
