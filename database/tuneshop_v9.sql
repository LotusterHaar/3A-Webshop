-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3333
-- Generation Time: Jun 25, 2019 at 09:27 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

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
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ID` int(11) NOT NULL,
  `SKU` varchar(20) DEFAULT NULL,
  `ProductName` varchar(100) DEFAULT NULL,
  `Description` longtext DEFAULT NULL,
  `FullDescription` longtext DEFAULT NULL,
  `Category` varchar(15) DEFAULT NULL,
  `Price` decimal(8,2) DEFAULT NULL,
  `Stock` int(11) DEFAULT NULL,
  `Picture_Big` varchar(1024) DEFAULT NULL,
  `Picture_Small` varchar(1024) DEFAULT NULL,
  `Disabled` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ID`, `SKU`, `ProductName`, `Description`, `FullDescription`, `Category`, `Price`, `Stock`, `Picture_Big`, `Picture_Small`, `Disabled`) VALUES
(1, 'FazleyDR-28', 'Fazley DR-28 blokfluit, Barokboring', 'Deze blokfluit is een uitstekend instrument voor de echte beginner. Gemaakt van kunststof, dus makkelijk in onderhoud en ongevoelig voor vocht. Deze blokfluit heeft een barokboring. Een leuk instrument voor jong en oud!\r\n', 'Algemeen\r\nDe Fazley DR-28 blokfluit is een uitstekend instrument voor de echte beginner. Gemaakt van kunststof, dus makkelijk in onderhoud en ongevoelig voor vocht. Het instrument bestaat uit drie delen; het mondstuk, het middendeel en het onderste deel. In het middendeel zitten 6 vingergaten en een duimgat. In het onderste deel zit het zevende gat. Deze blokfluit heeft een barokboring. De barokboring is geschikt voor beginners, net als blokfluiten met een Duitse boring. Vaak stappen blokfluitisten die op een fluit met Duitse boring begonnen zijn later over naar een instrument met barokboring. Je kunt dus net zo goed gelijk op een blokfluit met de meer populaire barokboring beginnen. Een leuk instrument voor jong en oud! \r\n\r\nBlokfluit\r\nDe blokfluit is een ideaal instrument om de eerste beginselen van muziek mee te ontdekken. Kunststof blokfluiten hebben een aantal voordelen ten opzichte van houten blokfluiten. Het instrument is ongevoelig voor vocht en kunststof blokfluiten hoeven bijn', '9', '4.95', 5, 'FazleyDR-28_01.jpg', 'FazleyDR-28_04.jpg', 0),
(3, 'Yamaha_YRA314BIII', 'Yamaha YRA314BIII altblokfluit barokboring, ebbenhoutlook', 'Met de Yamaha YRA-314BIII haal je een prettig geprijsde kunststof altblokfluit in huis met een barokboring en een mooie ebbenhoutlook. Wordt geleverd met hoes en accessoires.\r\n', 'Algemeen\r\n\r\nMet de Yamaha YRA-314BIII haal je een prettig geprijsde kunststof altblokfluit in huis die goed in de smaak zal vallen bij beginners, maar waar meer ervaren fluitisten ook zeker veel plezier aan zullen beleven. Het onderhoudsarme kunststof is uitgevoerd in mooie ebbenhoutlook met contrasterende ivookleurige accenten. De YRA-314BIII heeft een barokboring en het zesde en zevende gat zijn dubbelgeboord. Je ontvangt bij deze fraaie alt een handig etui, een iwsserstaaf en blokfluitvet.\r\nTips of opmerkingen over dit product\r\nLet op:\r\n\r\n- Muziekscholen werken standaard met blokfluiten met een Duitse boring in C.\r\n- Op de afbeelding ziet u een bruin-witte uitvoering. De werkelijke kleur kan eventueel iets afwijken.\r\n\r\nSpecificaties\r\nProductkenmerken\r\nMateriaal fluit         kunststof\r\nDuitse of Barokke boring         Barok\r\nEnkele of dubbele boring         dubbel\r\nGewicht en afmetingen inclusief verpakking\r\nGewicht (incl. verpakking):         260 gr\r\nAfmeting (incl. verpakking):   ', '9', '45.00', 10, 'Yamaha_YRA314BIII_01.jpg', 'Yamaha_YRA314BIII_04.jpg', 0),
(5, 'YA-YRB302BII', 'Yamaha YRB302BII basblokfluit, barokboring ', 'Basblokfluit YRB302BII van Yamaha is een prettig geprijsde bas blokfluit in de toonsoort F met barokboring. Deze blokfluit is vierdelig, vervaardigd uit kunststof en is voorzien van een handige duimsteun.\r\n', 'Algemeen\r\n\r\nBasblokfluit YRB302BII van Yamaha is een prettig geprijsde bas blokfluit in de toonsoort F met barokboring. Deze blokfluit is vierdelig, vervaardigd uit kunststof en is voorzien van een handige duimsteun. De fluit heeft een rijk en vol geluid en doet niet onder voor een houten blokfluit. Deze blokfluit wordt compleet geleverd inclusief beschermhoes, poetsdoekstaaf en blokfluitvet.\r\n\r\nSpecificaties\r\nProductkenmerken\r\nDuitse of Barokke boring 	Barok\r\nMateriaal fluit 	kunststof\r\nGewicht en afmetingen inclusief verpakking\r\nGewicht (incl. verpakking): 	1,5 kg\r\nAfmeting (incl. verpakking): 	8,0 x 15,0 x 62,0 cm\r\nProductspecificaties\r\n\r\n    Yamaha YRB302BII\r\n    basblokfluit\r\n    vierdelig\r\n    stemming: F\r\n    F/F# hulpkleppen\r\n    barokboring\r\n    inclusief duimsteun\r\n    vervaardigd van kunststof\r\n    inclusief beschermhoes, poetsdoekstaaf en blokfluitvet\r\n\r\n', '9', '313.00', 7, 'YA-YRB302BII_01.jpg', 'YA-YRB302BII_02.jpg', 0),
(6, 'roland_fp_30_black', 'Roland FP-30 digitale piano (zwart)', 'Een digitale piano die met zijn lichte gewicht en compacte behuizing gemakkelijk een plek te geven is. De moderne Roland FP-30 (zwart) speelt en klinkt bovendien erg overtuigend, en is voorzien van onder andere Bluetooth.\r\n', 'Algemeen\r\n\r\nRoland weet precies hoe het een eenvoudige maar heel complete digitale piano moet bouwen. De handzame FP-30 - hier in het zwart - bevat precies de mogelijkheden waar de moderne pianist naar op zoek is: een overtuigend pianogeluid, het speelgevoel van een vleugelklavier en diverse handige extra\'s, waaronder een opnamefunctie, diverse drumritmes en Bluetooth. Omdat de behuizing zo licht en compact mogelijk gehouden is, zult u weinig moeite hebben een plekje te vinden voor deze elektrische piano. Een sustainpedaal wordt meegeleverd; een onderstel en een pedaal-unit met 3 pedalen zijn los verkrijgbaar.\r\n\r\nRoland FP 30: PHA-4-klavier en SuperNATURAL\r\n\r\nDe Roland FP-30 bezit een volledig klavier van 88 toetsen. Het gaat om het heel prettig spelende PHA-4-klavier, dat de verbeterde opvolger is van Ivory Feel G. Daarnaast is het voorzien van een \'escapement\'-mechanisme, net als een vleugel, waardoor snelle toonherhalingen mogelijk zijn. Het ivoor-achtige oppervlak van de toetsen ma', '1', '659.00', 21, 'roland_fp_30_black_09.jpg', 'roland_fp_30_black_01.jpg', 0),
(8, 'Studiologic_Numa_MG_', 'Studiologic Numa Compact 2 digitale piano ', 'Er zijn weinig digitale piano\'s die zo compact zijn als de Numa Compact 2, en toch zó compleet: 88 semi-gewogen toetsen, 88 klanken, interne speakers en een gewicht van slechts 7.1 kg. Ook heel geschikt als MIDI-keyboard.\r\n', '\r\n', '1', '510.00', 34, 'Studiologic_Numa_MG_9979_06.jpg', 'Studiologic_Numa_MG_9979_01.jpg', 0),
(10, 'casio_cdp_130_bk', 'Casio CDP-130 BK Black digitale piano', 'We kunnen bijna geen betere instap-piano bedenken dan de Casio CDP-130 BK (Black). Deze zwarte piano heeft, voor een zeer schappelijke prijs, alle belangrijke features aan boord die u van een digitale piano verwacht.\r\n', '\"Algemeen\r\n\r\nWe kunnen bijna geen betere instap-piano bedenken dan de Casio CDP-130 BK (Black). Deze zwarte piano heeft, voor een zeer schappelijke prijs, alle belangrijke features aan boord die u van een digitale piano verwacht. Allereerst natuurlijk een natuurgetrouwe pianoklank, samen met diverse andere sounds, waaronder orgel, elektrische piano, clavecimbel en strijkers. Het pianobrede, 88 toetsen tellende klavier is een zogenaamd Scaled Hammer Action Keyboard, ofwel: de hamer-achtige aanslag is vergelijkbaar met die van een akoestische piano en de lage toetsen voelen zwaarder aan dan de hoge.\r\n\r\nDe mogelijkheden van de CDP-130\r\n\r\nOm de gebruiker meteen in staat te stellen stukken te spelen die speciaal voor piano zijn gemaakt, wordt er een sustainpedaal meegeleverd. Met dit zo goed als onmisbare accessoire kunt u tonen vasthouden, zodat u uw handen vrij hebt om andere toetsen aan te slaan. Verder kunt u deze compacte en toch heel complete digitale piano gemakkelijk kwijt in uw hui', '1', '507.00', 17, 'casio_cdp_130_bk_01.jpg', 'casio_cdp_130_bk_02.jpg', 0),
(11, 'Fazley_FLP300SB_Sunb', 'Fazley FLP318SB elektrische gitaar sunburst', 'Voor iedereen die wil beginnen met elektrisch gitaarspelen, of een solide back-up zoekt, is de Fazley FLP318SB in Sunburst een interessante optie. Iconische looks met een breed inzetbare sound voor een scherpe prijs!', '\"Algemeen\r\n\r\nWie op zoek is naar een single cut-stijl elektrische gitaar komt er vaak al snel achter dat er aan deze gitaren een behoorlijk prijskaartje hangt. Fazley brengt daar met de FLP318SB verandering in. Deze single cut is namelijk bijzonder scherp geprijsd. Opvallend is de top van gevlamd esdoorn in de Sunburst-afwerking. In combinatie met de verchroomde hardware en ivoorkleurige onderdelen krijgt u een gitaar met een iconische uitstraling. Wanneer u deze Fazley vastpakt dan denkt u onmiddellijk: “sweet child o\' mine!”\r\n\r\nFLP318SB: stabiele constructie\r\n\r\nDe in het oog springende esdoornhouten top is niet alleen een lust van het, maar het heeft ook een functie. Er zit namelijk een welving in. Hierdoor komt uw rechterarm op een comfortabele manier op de body te liggen, waardoor u minder snel last zal krijgen van last in uw pols. Saillant detail is ook de gelijmde (set-neck) constructie. Daardoor krijgt de gitaar een flinke extra dosis sustain en resonantie. Bovendien zijn de hogere frets ook makkelijker bereikbaar waardoor het speelplezier wordt verhoogd.\r\n\r\nHoog speelgemak en een veelzijdige klank\r\n\r\nZoals het een echte single cut betaamt heeft de Fazley FLP318SB een korte mensuur van 24.75 inch (628 mm). Hierdoor is de spanning op de snaren iets lager, waardoor het opdrukken een stukje makkelijker wordt. Dankzij de TOM-stijl brug met stopbar is deze gitaar makkelijk te stemmen en ook bijzonder stabiel. Met de klank kunt u alle kanten op. U krijgt namelijk de beschikking over twee humbuckers. Deze zijn naar eigen smaak af te stellen middels de uitgebreide toonregeling.\r\nTips of opmerkingen over dit product\r\n\r\n    Let op:\r\n        De modellen met 00 in het typenummer hebben een toets gemaakt van palissander (rosewood)\r\n        De modellen met 18 in het typenummer hebben een toets gemaakt van brown blackwood.\r\n\r\nSpecificaties\r\nProductkenmerken\r\nModel body 	single cut\r\nAantal snaren 	6\r\nElementtype 	humbucker (passief)\r\nKleur 	burst\r\nBrugtype 	tunomatic + staartstuk\r\nElementconfiguratie 	HH\r\nAantal frets 	22\r\nMateriaal body 	linde (basswood)\r\nLinkshandig 	nee\r\nLand van herkomst 	China\r\nMensuur gitaar 	24.75 inch (629 mm)\r\nHalsverbinding 	gelijmd (set neck)\r\nHoutsoort toets 	blackwood\r\nSet 	nee\r\nInclusief koffer 	nee\r\nInclusief hoes 	nee\r\nGewicht en afmetingen inclusief verpakking\r\nGewicht (incl. verpakking): 	4,1 kg\r\nAfmeting (incl. verpakking): 	101,0 x 46,0 x 11,0 cm\r\n\"\r\n', '9', '179.00', 5, 'Fazley_FLP300SB_Sunburst_01.jpg', 'Fazley_FLP300SB_Sunburst_03.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
