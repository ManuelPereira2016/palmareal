-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.2.3-MariaDB-log - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.4.0.5174
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura para tabla palmareal.admins
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usercode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `role` int(10) unsigned NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`),
  UNIQUE KEY `admins_username_unique` (`username`),
  UNIQUE KEY `admins_usercode_unique` (`usercode`),
  KEY `admins_role_foreign` (`role`),
  CONSTRAINT `admins_role_foreign` FOREIGN KEY (`role`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla palmareal.admins: ~32 rows (aproximadamente)
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` (`id`, `first_name`, `last_name`, `email`, `username`, `usercode`, `password`, `phone`, `image`, `location`, `address`, `description`, `gender`, `status`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Super', 'Administrador', 'super@admin.com', 'sudoadmin', '0', '$2y$10$f3XvwGCN2t7BFnSSvONQgOYZMQQfr1HYTTgXLdS8xwtkPNN4AkGei', '0', NULL, NULL, NULL, 'Usuario super administrador', 0, 1, 1, 'TmS6almA4Q', '2017-06-22 02:06:39', '2017-06-22 02:06:39'),
	(2, 'Christian', 'Aguilar', 'chrisjeam@gmail.com', 'chrisjeam', '1', '$2y$10$wEgMnjtcWzDo5TbjQBcXuuXUdLK5T.vSgz6kLXcZ1JG3sE4LSz082', '04143617522', NULL, 'Caracas, Venezuela', NULL, 'Usuario de prueba para el sistema', 0, 1, 3, 'cvlSrdsRFM', '2017-06-22 02:06:40', '2017-06-22 02:06:40'),
	(3, 'Lucio', 'Wehner', 'owiegand@example.net', 'Lucioz4D', '99198738', '$2y$10$viQXH4Vrj4HvYrcg/o6HQOe9uW49XbK1MFEWg2dTURPSfa0NL.2eK', '+2624662565873', NULL, 'Suriname', '28955 Claude Key\nPort Lucinda, AR 28541', 'Est sapiente quo necessitatibus iusto. Tenetur laborum error et. Similique molestiae ipsa impedit tempora ut voluptas.', 0, 1, 4, 'ABqe088o5u', '2017-06-22 02:06:41', '2017-06-22 02:06:41'),
	(4, 'Georgiana', 'Gutmann', 'lambert.vonrueden@example.com', 'GeorgianabId', '6301569', '$2y$10$MtGShetcwAspdBMnL12N8e67pkUTGaWwaqXFHF6SFWCIecOtNxfLe', '+1064539183110', NULL, 'Andorra', '30169 Jacobson Isle\nBorershire, FL 61721-1026', 'Consequatur perferendis ea veritatis sed ipsa. Omnis dolor modi facere ab et rerum possimus mollitia.', 0, 1, 1, 'nWt6Bz1gqh', '2017-06-22 02:06:42', '2017-06-22 02:06:42'),
	(5, 'Ransom', 'Durgan', 'ykilback@example.com', 'Ransom2NO', '53381470', '$2y$10$gFokO5T2Ex6Cqyw9MCy5S.NFjkFQNtqaaRaD81cLRhA63eAxx1/fO', '+2132770005770', NULL, 'Iceland', '7467 Donald Wells Apt. 610\nLake Shakiramouth, MT 92053', 'A vitae eius vero fugit. Magni culpa sint voluptatum earum odit debitis aut. Autem magni est qui dolore modi aut. Quasi blanditiis vel sed aut eius.', 0, 0, 1, 'bP9rth4A5T', '2017-06-22 02:06:42', '2017-06-22 02:06:42'),
	(6, 'Velva', 'Trantow', 'fbechtelar@example.org', 'VelvaihW', '17666259', '$2y$10$PWh00KRcAxCM6Ujct1QWqu9NqopKkJyC9wOI3uoxcBk.pKFOtjF/y', '+8079351915164', NULL, 'Ethiopia', '85040 Fay Via\nWest Seamusburgh, AL 64654', 'Et provident eligendi molestiae rerum voluptatem. Adipisci nobis et esse ipsam. Dolorem earum in delectus omnis.', 0, 1, 3, 'BzuZM32ywm', '2017-06-22 02:06:42', '2017-06-22 02:06:42'),
	(7, 'Katrine', 'Price', 'scarlett26@example.net', 'KatrineeRZ', '71214487', '$2y$10$rcphAYEc6ZH501OE0UsKaeiXdhf42qzf8L.OGe1YShVmSuDlz5Epa', '+5579812071442', NULL, 'Zambia', '44163 Hattie Street\nSouth Darby, GA 99378-4410', 'Sequi ipsum est ex nesciunt. Expedita illo consequatur quaerat sed voluptas quam. Repellat ut et aut quia et deleniti corrupti.', 1, 1, 1, 'dCXXzRmwQN', '2017-06-22 02:06:42', '2017-06-22 02:06:42'),
	(8, 'Baby', 'Connelly', 'kshlerin.leanne@example.com', 'Baby47M', '16884625', '$2y$10$dD5RUvs6k.GQKgfqVl/NO.PpvXfn5eYCumIakAuUa2BrXK//x///K', '+3053377852412', NULL, 'Lesotho', '832 Agustin Ranch Suite 439\nEstellafurt, NH 93475', 'Quia delectus ex aut ullam sit possimus aut sunt. Minus explicabo error amet sit quia. Id id asperiores ut quae.', 1, 0, 1, 'FVm4LcNqzW', '2017-06-22 02:06:42', '2017-06-22 02:06:42'),
	(9, 'Lou', 'Jast', 'ckovacek@example.com', 'LouvQP', '42128228', '$2y$10$34o2PIRwiJqQN4JoowIa8ef.0we19qeqrgGImHBbCGB14VO.vu.nW', '+0327570728721', NULL, 'Cuba', '8696 Ankunding Forges Suite 343\nEast Jose, IN 29479-2045', 'Nulla dolore a debitis esse. Voluptate voluptate est quia dolores. Qui dolore dolor ex corrupti enim neque aut.', 0, 1, 2, 'UEFV4PZfw1', '2017-06-22 02:06:42', '2017-06-22 02:06:42'),
	(10, 'Everardo', 'Abbott', 'zhoppe@example.com', 'EverardoOND', '28224828', '$2y$10$fBXRGNep1ewb5y1Jwotkfu/RmHJFHABh86waz2Ti4L5o/EeBWfEHO', '+8878310863455', NULL, 'Papua New Guinea', '96693 Bode Expressway\nSchultzview, WY 32285-0501', 'Et et placeat quos quam dignissimos quam. In adipisci sint architecto dolores corporis dolor. Est perspiciatis nulla repudiandae in ducimus modi.', 1, 0, 4, 'zV2O6CyQJJ', '2017-06-22 02:06:43', '2017-06-22 02:06:43'),
	(11, 'Rebeca', 'Hodkiewicz', 'vtrantow@example.org', 'RebecaOG4', '84673768', '$2y$10$gp5s52cBT3J6sdINhs2DI.5OBy/dxTcQvVpPGNZc9WnapnVs/jKgm', '+5273405011177', NULL, 'Pitcairn Islands', '5903 Corene Fields Apt. 216\nReichertmouth, LA 15589-5823', 'Qui nobis nesciunt iure est enim. Reprehenderit itaque id explicabo aut quibusdam nostrum aut.', 0, 0, 3, 'KDQ0cNEZ04', '2017-06-22 02:06:43', '2017-06-22 02:06:43'),
	(12, 'Myrtis', 'Kulas', 'nelle.herzog@example.net', 'MyrtisCth', '97348748', '$2y$10$ggsMDaAKM8E2Uv1vtNwA6uwm/B7bBgj8yyJZDTyxN9OHQkjovqk7e', '+3057238480437', NULL, 'Montserrat', '79054 Noemie Valleys\nPort Maiya, VA 05592-3048', 'Enim qui sint quod est tempora ut. Dolorem voluptatem eos quia occaecati esse exercitationem vel. Occaecati ab aut praesentium dolor omnis libero.', 1, 0, 2, 'WcsxmZdEPV', '2017-06-22 02:06:43', '2017-06-22 02:06:43'),
	(13, 'Ismael', 'Hills', 'sydni.kutch@example.org', 'IsmaelnE9', '81559568', '$2y$10$qwZbO6psa/gIQALvncu1/uK/uviXB6iG/B2ityudu4X8jGxIjAk3q', '+4364930795612', NULL, 'Saint Pierre and Miquelon', '4390 Harber Mountains\nWintheiserstad, WI 13183-5931', 'Nihil facilis libero in. Occaecati omnis molestiae molestias eos ratione quasi a.', 0, 0, 2, 'fFIzlLwT7z', '2017-06-22 02:06:43', '2017-06-22 02:06:43'),
	(14, 'Lisette', 'Rodriguez', 'rstark@example.com', 'LisetteWVo', '64006260', '$2y$10$FMA68HyYr6OdNAiP4nUcMeSAHwRuqcXuGafI.4eX7vHoV0OLZx4qm', '+7077394002976', NULL, 'Ethiopia', '1327 Wilderman Pike Suite 915\nPort Tommie, RI 23901', 'Quae numquam itaque officiis vel et sed consequatur. Accusantium suscipit est quia officia.', 0, 0, 1, 'YUTctR33nB', '2017-06-22 02:06:43', '2017-06-22 02:06:43'),
	(15, 'Audra', 'Connelly', 'cmayer@example.com', 'Audra7HI', '50025377', '$2y$10$4vlw1/K5mhtMa0St4HrKz.FFGPVbsjjLs5ujKzemhXaXJXTnfEnCq', '+7623181907140', NULL, 'Tuvalu', '33064 Williamson Key Suite 118\nEulahview, OK 03522-2981', 'Voluptatem animi ratione ipsa et. Veritatis possimus facilis iusto sed quae dicta. Amet natus velit nisi dolor repellat animi quas.', 1, 1, 3, 'BvY0vVA9Nq', '2017-06-22 02:06:43', '2017-06-22 02:06:43'),
	(16, 'Calista', 'Reichel', 'kolby.will@example.com', 'CalistaGbP', '61050447', '$2y$10$wimCga.Pphlu6Yxob.Nn7uM69zefC3IQvAMM9jSZb.BB7noQIDFfO', '+8686154453916', NULL, 'Equatorial Guinea', '6633 Crawford Village\nGaetanotown, IN 89221', 'Quae ea repellat aperiam eum et. Commodi accusantium non in est. Dignissimos repudiandae quia est.', 1, 0, 1, '2GItDClcaG', '2017-06-22 02:06:43', '2017-06-22 02:06:43'),
	(17, 'Javonte', 'Cole', 'carlo40@example.org', 'JavonteiH5', '55692887', '$2y$10$AGCYxXpL3YdK5sVFCAJtleyLz7/L.a4Rz3JqRB3ntyriHDTVBuUCK', '+8126336621899', NULL, 'Bolivia', '13020 Bahringer Knoll\nConnburgh, MN 68239-7101', 'Quia et et sed in sed omnis. Sunt non consequatur minus et accusamus tempore. Quaerat ab harum ipsam voluptate ut iste.', 1, 0, 3, '0AtoytBBP2', '2017-06-22 02:06:43', '2017-06-22 02:06:43'),
	(18, 'Rachelle', 'Hirthe', 'orath@example.com', 'RachelleNId', '24450719', '$2y$10$NzqQJfVAB719DEeJKbiJAe.ZN4of8in9dRduBosQREM.bA/3pAbgW', '+6584865506848', NULL, 'Czech Republic', '29690 Monahan Bypass Suite 243\nJarrellport, HI 73925-9593', 'Consequatur reiciendis ullam rerum maiores ut. Asperiores voluptatem porro nostrum quae dolorem sint itaque aliquam.', 0, 1, 3, '36wZwjMZWz', '2017-06-22 02:06:43', '2017-06-22 02:06:43'),
	(19, 'Westley', 'Sawayn', 'itzel35@example.org', 'WestleyEP9', '18771608', '$2y$10$uykYwPD9kIS5w8cfdNm.KO8A5DNcx8Lm28h5H.w4Mc9zgAN0an05a', '+3142185514679', NULL, 'Armenia', '35101 Doyle Flat Suite 429\nCordieview, CA 45581', 'Recusandae enim sed omnis deserunt. Incidunt voluptatum maiores quos sequi labore.', 1, 0, 2, 'sD9hcWoC3l', '2017-06-22 02:06:43', '2017-06-22 02:06:43'),
	(20, 'Clarabelle', 'Renner', 'xschuppe@example.net', 'ClarabelleMFk', '60836377', '$2y$10$oLZtMtp/orBuepFiWVmHo./ljHT2XLogwLFDu6cwUEFk3q1Kg1obG', '+2277856237542', NULL, 'Tokelau', '847 Merritt Knolls\nEast Arleneton, NJ 70284', 'Et voluptas iusto molestiae molestias sequi. Qui beatae a et. Aut tenetur commodi qui at repudiandae. Numquam neque autem illum ut.', 0, 0, 4, '48TBz2egGQ', '2017-06-22 02:06:44', '2017-06-22 02:06:44'),
	(21, 'Laila', 'Thiel', 'rogahn.derick@example.com', 'Laila6uk', '98748667', '$2y$10$SxW4jOwn9xAsRUuFgKMgf.h1movmV8EcyVNmtFM7Oq9TfNVOx71iu', '+6231881195727', NULL, 'Jamaica', '150 Greenfelder Plains Apt. 285\nPort Grahamton, MA 57894', 'Accusamus molestias aliquam explicabo itaque aut quia. Veniam pariatur quasi molestias earum eligendi.', 1, 1, 3, 'r1XUNiKXAg', '2017-06-22 02:06:44', '2017-06-22 02:06:44'),
	(22, 'Isac', 'Metz', 'keagan.torp@example.org', 'IsaczQm', '56775971', '$2y$10$FjlJRQ3wK1jM4lWJgk./muXAk9lLcwvJVAXFc4YObbp6UGtr4Gx7C', '+7243096687279', NULL, 'Tanzania', '3633 Carmen Trail\nDonnellytown, SD 71995', 'Quis ad nam consequatur et odit ab tempora labore. Soluta omnis consectetur dignissimos labore aut. Omnis sint debitis tempore qui ducimus aliquam.', 1, 0, 1, '7VN3cnbQrq', '2017-06-22 02:06:44', '2017-06-22 02:06:44'),
	(23, 'Kaylin', 'Bartoletti', 'tiara.gutmann@example.org', 'KaylinY7m', '68905815', '$2y$10$.L6cUmrTnnkdfwPyhj7Cze2nKA4ZjSC1xPW3WSDrPfxl3ryMH1qY6', '+3456599447008', NULL, 'Vanuatu', '58598 Danielle Knolls\nPort Hillary, IN 80052-0757', 'Ut voluptates neque velit ipsa. Sit fugit dolorum recusandae mollitia enim maiores. Adipisci debitis sed aut necessitatibus voluptatibus.', 0, 1, 1, 'ZX7Z7uPjgY', '2017-06-22 02:06:44', '2017-06-22 02:06:44'),
	(24, 'Jerome', 'Prosacco', 'hermiston.johnnie@example.net', 'JeromepoC', '78860968', '$2y$10$GxHqBVmvyjV3f9ZLV78sWuxGayXK2wykoJfLPXMSZX3m6zupjJLP.', '+9512610991436', NULL, 'Pakistan', '99837 Reinger Corner Suite 947\nWeimanntown, AR 40149-5043', 'Minima eum minus aut ullam est assumenda. Praesentium ea non unde in et sit. Odit suscipit doloremque voluptatum ullam est.', 0, 1, 3, 'uZpwGcDC2x', '2017-06-22 02:06:44', '2017-06-22 02:06:44'),
	(25, 'Kara', 'Hansen', 'jamie27@example.com', 'Kara7G2', '2670918', '$2y$10$hgvcT1Jx85imyGFgKfxwd.njU2F2YSx7mQBOQwD/IZ06uEyJMVkri', '+4582636841845', NULL, 'Macedonia', '24026 Bradly Loop\nKuphalberg, MN 28814', 'Quis cupiditate reprehenderit eos. Libero alias beatae aliquid facere blanditiis. Dolorem minima sit nihil rem.', 1, 1, 3, 'UW3uBiZBBl', '2017-06-22 02:06:44', '2017-06-22 02:06:44'),
	(26, 'Araceli', 'Cruickshank', 'alfredo73@example.org', 'AraceliOnY', '86750143', '$2y$10$9eOyU47L70PL/YGnIdAUretdn5gzwchB1.2jtmlPf8isA5Da4U18.', '+1953710096932', NULL, 'Guinea-Bissau', '6890 Boehm Oval\nEast Chase, RI 37247-3430', 'Totam harum at itaque vel. Autem explicabo et vitae. Rem ratione sit accusamus incidunt sequi rerum similique porro.', 0, 1, 3, 'eMuxdPzcO4', '2017-06-22 02:06:44', '2017-06-22 02:06:44'),
	(27, 'Erica', 'Schaden', 'giovani.lynch@example.net', 'Erica0bM', '51027054', '$2y$10$1CDPRq.4ngdBmvQ0k6dJieKB9q4C7XxV1E0BHotZxWgbN.B3eiFl6', '+7350755931210', NULL, 'Cambodia', '244 Meaghan Cape\nGladycefurt, NJ 45093-0532', 'Doloremque ut nesciunt quas molestias. Sequi repellendus neque temporibus velit.', 0, 0, 3, 'NS2BFbNna6', '2017-06-22 02:06:44', '2017-06-22 02:06:44'),
	(28, 'Eleonore', 'Gutmann', 'raphael.conroy@example.org', 'EleonorePUi', '97617243', '$2y$10$qun0A9n/EvhhlqbWhgTR3.l8Ph0OkAE1mghGqM51hTjsZZaa4s8oy', '+6476349797675', NULL, 'Jersey', '5066 Ferry Mountain Suite 776\nWest Verda, MN 96111', 'Aperiam et et necessitatibus aut. Distinctio nihil quis placeat nesciunt.', 0, 1, 4, 'VBH9LioxO9', '2017-06-22 02:06:44', '2017-06-22 02:06:44'),
	(29, 'Ben', 'Kuphal', 'shaun.kerluke@example.com', 'Ben1yP', '69154650', '$2y$10$9JjeumRP7qirlCMT5ks/0.boT6aCwWFacVxmRHjplsiXf9RnmkPqG', '+1097773255255', NULL, 'Ethiopia', '258 Deckow Common\nSouth Collinbury, MD 06152-3029', 'Dignissimos maiores ex totam aut minus. Doloremque nulla facilis hic iusto non ducimus non. Quae facere natus id qui sed fugit.', 1, 1, 3, '12Xy2Ih7j6', '2017-06-22 02:06:44', '2017-06-22 02:06:44'),
	(30, 'Adriana', 'Ebert', 'abdul.runolfsson@example.com', 'Adriana7GM', '75599608', '$2y$10$KHmO3CsD4RCShpEIOBYcaueHSzmovH3o/LMJ3tHqRP5PkrJsmJJje', '+8073437174148', NULL, 'Serbia', '358 Braun Squares Suite 513\nRunolfssonland, AR 05991', 'Incidunt omnis eos dolor explicabo sunt. Et a sunt neque aut atque.', 0, 0, 3, 'f4IWVIL7h5', '2017-06-22 02:06:45', '2017-06-22 02:06:45'),
	(31, 'Paolo', 'Stoltenberg', 'srunolfsdottir@example.net', 'PaolovsM', '77948843', '$2y$10$..fxTSZgPwDSCzB7ZDP1m.eKQ.R.kjjhoMHTINjulcmO3NZLAnN7W', '+3726406954341', NULL, 'Nicaragua', '799 Batz Route Apt. 872\nSouth Audiebury, NH 22687-3868', 'Consequatur dolores quibusdam dignissimos provident modi optio. Ut pariatur exercitationem ut. Non iusto a nam dolorum veniam est veritatis.', 1, 1, 1, 'tmMApLW5nk', '2017-06-22 02:06:45', '2017-06-22 02:06:45'),
	(32, 'Marlon', 'Dicki', 'estella.ankunding@example.org', 'Marlon9Ae', '32637033', '$2y$10$hSlI7RqNF9OZiw/3htxSEuKtw1sLgpxDxJSx9VD9tjXRJ44AYxP7i', '+9241513581839', NULL, 'Hong Kong', '6615 Hettinger Lock\nDarrionborough, MN 54180-4448', 'Labore et quaerat aliquid autem. Voluptatem totam magnam assumenda animi. Earum aut at doloremque et et.', 0, 0, 1, 'y8M4qDwV4B', '2017-06-22 02:06:45', '2017-06-22 02:06:45');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;

-- Volcando estructura para tabla palmareal.characteristics
CREATE TABLE IF NOT EXISTS `characteristics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `characteristics_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla palmareal.characteristics: ~16 rows (aproximadamente)
/*!40000 ALTER TABLE `characteristics` DISABLE KEYS */;
INSERT INTO `characteristics` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Vigilancia Privada', '2017-06-22 02:06:37', '2017-06-22 02:06:37'),
	(2, 'Lobby', '2017-06-22 02:06:37', '2017-06-22 02:06:37'),
	(3, 'Parque infantil', '2017-06-22 02:06:37', '2017-06-22 02:06:37'),
	(4, 'Cancha deportiva', '2017-06-22 02:06:37', '2017-06-22 02:06:37'),
	(5, 'Piscina', '2017-06-22 02:06:37', '2017-06-22 02:06:37'),
	(6, 'Sauna', '2017-06-22 02:06:37', '2017-06-22 02:06:37'),
	(7, 'Terraza', '2017-06-22 02:06:37', '2017-06-22 02:06:37'),
	(8, 'Salón de Fiestas', '2017-06-22 02:06:37', '2017-06-22 02:06:37'),
	(9, 'Camineria', '2017-06-22 02:06:37', '2017-06-22 02:06:37'),
	(10, 'Parrillera', '2017-06-22 02:06:37', '2017-06-22 02:06:37'),
	(11, 'Lavanderia', '2017-06-22 02:06:37', '2017-06-22 02:06:37'),
	(12, 'Ascensor', '2017-06-22 02:06:37', '2017-06-22 02:06:37'),
	(13, 'Cerca electrica', '2017-06-22 02:06:37', '2017-06-22 02:06:37'),
	(14, 'Jardines', '2017-06-22 02:06:37', '2017-06-22 02:06:37'),
	(15, 'Internet / Wifi', '2017-06-22 02:06:37', '2017-06-22 02:06:37'),
	(16, 'Patio', '2017-06-22 02:06:37', '2017-06-22 02:06:37');
/*!40000 ALTER TABLE `characteristics` ENABLE KEYS */;

-- Volcando estructura para tabla palmareal.emails
CREATE TABLE IF NOT EXISTS `emails` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8_unicode_ci NOT NULL,
  `to` int(10) unsigned NOT NULL,
  `from` int(10) unsigned NOT NULL,
  `phone` int(10) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla palmareal.emails: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `emails` DISABLE KEYS */;
/*!40000 ALTER TABLE `emails` ENABLE KEYS */;

-- Volcando estructura para tabla palmareal.historical
CREATE TABLE IF NOT EXISTS `historical` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `transaction` int(10) unsigned NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `user` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `historical_user_foreign` (`user`),
  CONSTRAINT `historical_user_foreign` FOREIGN KEY (`user`) REFERENCES `admins` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla palmareal.historical: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `historical` DISABLE KEYS */;
/*!40000 ALTER TABLE `historical` ENABLE KEYS */;

-- Volcando estructura para tabla palmareal.media
CREATE TABLE IF NOT EXISTS `media` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `table` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item` int(10) unsigned NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla palmareal.media: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
/*!40000 ALTER TABLE `media` ENABLE KEYS */;

-- Volcando estructura para tabla palmareal.messages
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user_to` int(10) unsigned NOT NULL,
  `user_from` int(10) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla palmareal.messages: ~40 rows (aproximadamente)
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` (`id`, `subject`, `message`, `user_to`, `user_from`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Facilis est quas sed ut quis repudiandae velit.', 'HE taught us Drawling, Stretching, and Fainting in Coils.\' \'What was THAT like?\' said Alice. \'Come on, then!\' roared the Queen, stamping on the second time round, she found her way out. \'I shall sit here,\' the Footman remarked, \'till tomorrow--\' At this moment Five, who had been jumping about like.', 17, 9, 0, '2017-06-22 02:06:52', '2017-06-22 02:06:52'),
	(2, 'Quam autem inventore blanditiis sunt aut a.', 'Mock Turtle. \'No, no! The adventures first,\' said the cook. The King turned pale, and shut his eyes.--\'Tell her about the right distance--but then I wonder what I get" is the driest thing I know. Silence all round, if you please! "William the Conqueror, whose cause was favoured by the hand, it.', 12, 8, 1, '2017-06-22 02:06:52', '2017-06-22 02:06:52'),
	(3, 'Repellendus itaque ut hic debitis possimus.', 'Alice noticed, had powdered hair that curled all over their heads. She felt very glad that it was too much overcome to do such a thing. After a minute or two she walked up towards it rather timidly, as she did not venture to go nearer till she got back to finish his story. CHAPTER IV. The Rabbit.', 20, 15, 1, '2017-06-22 02:06:52', '2017-06-22 02:06:52'),
	(4, 'Ea accusantium voluptas unde ratione eos aut corrupti.', 'Alice could speak again. In a little animal (she couldn\'t guess of what work it would not join the dance. Will you, won\'t you, will you, old fellow?\' The Mock Turtle yawned and shut his note-book hastily. \'Consider your verdict,\' the King hastily said, and went stamping about, and make out what it.', 13, 20, 0, '2017-06-22 02:06:52', '2017-06-22 02:06:52'),
	(5, 'Consequatur velit ex qui eum similique. Non et est perferendis voluptatibus.', 'THEIR eyes bright and eager with many a strange tale, perhaps even with the next verse,\' the Gryphon replied very politely, \'if I had to fall upon Alice, as the rest of my own. I\'m a deal faster than it does.\' \'Which would NOT be an old crab, HE was.\' \'I never was so much about a foot high: then.', 1, 19, 1, '2017-06-22 02:06:52', '2017-06-22 02:06:52'),
	(6, 'Voluptates dolorem expedita voluptatem minus inventore.', 'RED rose-tree, and we won\'t talk about her any more if you\'d rather not.\' \'We indeed!\' cried the Mouse, turning to Alice severely. \'What are you getting on now, my dear?\' it continued, turning to Alice: he had a vague sort of life! I do so like that curious song about the twentieth time that day..', 8, 2, 0, '2017-06-22 02:06:52', '2017-06-22 02:06:52'),
	(7, 'Id aut perspiciatis sint. Esse harum dolore nobis itaque.', 'I\'m on the same thing,\' said the Duchess: \'and the moral of THAT is--"Take care of the accident, all except the Lizard, who seemed too much overcome to do it.\' (And, as you go to law: I will tell you my history, and you\'ll understand why it is I hate cats and dogs.\' It was the King; and the poor.', 7, 3, 0, '2017-06-22 02:06:52', '2017-06-22 02:06:52'),
	(8, 'At quo sequi incidunt et minus doloremque perferendis dolorem.', 'The Gryphon lifted up both its paws in surprise. \'What! Never heard of "Uglification,"\' Alice ventured to remark. \'Tut, tut, child!\' said the Dodo. Then they all crowded round it, panting, and asking, \'But who has won?\' This question the Dodo suddenly called out as loud as she spoke; \'either you.', 11, 20, 1, '2017-06-22 02:06:52', '2017-06-22 02:06:52'),
	(9, 'Maiores architecto corporis quia alias doloremque.', 'This time there were ten of them, and it\'ll sit up and walking off to the beginning of the shelves as she could have been was not much larger than a pig, and she said to herself, \'the way all the jurors were writing down \'stupid things!\' on their slates, \'SHE doesn\'t believe there\'s an atom of.', 16, 18, 0, '2017-06-22 02:06:52', '2017-06-22 02:06:52'),
	(10, 'Tempore et reiciendis et asperiores. Rem est quo magnam facere.', 'Duchess sneezed occasionally; and as it happens; and if I fell off the subjects on his spectacles. \'Where shall I begin, please your Majesty,\' said Alice very humbly: \'you had got burnt, and eaten up by a very difficult question. However, at last the Gryphon replied very gravely. \'What else had.', 3, 14, 1, '2017-06-22 02:06:52', '2017-06-22 02:06:52'),
	(11, 'Vel voluptatibus reiciendis sint totam quia in.', 'I beg your acceptance of this remark, and thought it over afterwards, it occurred to her to begin.\' He looked at them with large eyes like a Jack-in-the-box, and up the fan and gloves, and, as the Caterpillar angrily, rearing itself upright as it happens; and if the Queen said to herself. \'I dare.', 12, 6, 1, '2017-06-22 02:06:52', '2017-06-22 02:06:52'),
	(12, 'Consequatur est voluptate sed quia enim repellendus nam magnam.', 'VERY wide, but she stopped hastily, for the next verse,\' the Gryphon answered, very nearly getting up and to wonder what you\'re at!" You know the meaning of it at all; and I\'m I, and--oh dear, how puzzling it all seemed quite natural); but when the Rabbit hastily interrupted. \'There\'s a great deal.', 19, 16, 0, '2017-06-22 02:06:52', '2017-06-22 02:06:52'),
	(13, 'Est laborum vel corrupti pariatur necessitatibus sit.', 'Alice went on, \'I must be a grin, and she went out, but it is.\' \'I quite agree with you,\' said the cook. The King laid his hand upon her knee, and the poor little thing grunted in reply (it had left off writing on his knee, and the fan, and skurried away into the air. This time there were ten of.', 20, 16, 1, '2017-06-22 02:06:52', '2017-06-22 02:06:52'),
	(14, 'Repellendus et alias hic quo voluptatem odio.', 'They were just beginning to think to herself, as usual. \'Come, there\'s half my plan done now! How puzzling all these strange Adventures of hers that you think you\'re changed, do you?\' \'I\'m afraid I\'ve offended it again!\' For the Mouse to Alice as it was sneezing on the stairs. Alice knew it was an.', 10, 9, 0, '2017-06-22 02:06:52', '2017-06-22 02:06:52'),
	(15, 'Rem exercitationem voluptatem vel explicabo.', 'CHORUS. (In which the cook took the place where it had fallen into a pig, and she trembled till she fancied she heard the Queen in front of the trees upon her arm, and timidly said \'Consider, my dear: she is only a pack of cards: the Knave \'Turn them over!\' The Knave of Hearts, and I don\'t care.', 12, 3, 1, '2017-06-22 02:06:52', '2017-06-22 02:06:52'),
	(16, 'Laudantium labore recusandae illo harum soluta hic soluta.', 'ARE you doing out here? Run home this moment, and fetch me a pair of gloves and a piece of it had finished this short speech, they all spoke at once, she found she could not think of nothing better to say it any longer than that,\' said the Duchess; \'and that\'s a fact.\' Alice did not dare to.', 3, 12, 1, '2017-06-22 02:06:52', '2017-06-22 02:06:52'),
	(17, 'Excepturi voluptatibus inventore maiores reiciendis.', 'Alice took up the fan and a crash of broken glass. \'What a number of cucumber-frames there must be!\' thought Alice. \'I\'ve tried the effect of lying down with wonder at the March Hare said--\' \'I didn\'t!\' the March Hare interrupted, yawning. \'I\'m getting tired of being upset, and their curls got.', 6, 8, 1, '2017-06-22 02:06:52', '2017-06-22 02:06:52'),
	(18, 'Id natus asperiores provident esse enim. Rerum rerum est in ea aut ducimus.', 'Alice as he could go. Alice took up the little crocodile Improve his shining tail, And pour the waters of the water, and seemed to follow, except a little scream, half of fright and half believed herself in a dreamy sort of meaning in it,\' but none of them can explain it,\' said Alice doubtfully:.', 5, 9, 1, '2017-06-22 02:06:52', '2017-06-22 02:06:52'),
	(19, 'Non explicabo adipisci eaque dicta numquam eum.', 'Alice. \'Come on, then,\' said the Dormouse. \'Write that down,\' the King said to live. \'I\'ve seen hatters before,\' she said aloud. \'I shall be punished for it was done. They had not as yet had any sense, they\'d take the place where it had made. \'He took me for asking! No, it\'ll never do to ask:.', 18, 1, 0, '2017-06-22 02:06:52', '2017-06-22 02:06:52'),
	(20, 'Sapiente saepe quas aut quae. Dolorum earum eos sunt modi nemo.', 'I think I can guess that,\' she added aloud. \'Do you mean that you never tasted an egg!\' \'I HAVE tasted eggs, certainly,\' said Alice, feeling very glad that it ought to be otherwise than what you were never even introduced to a mouse, you know. So you see, so many different sizes in a hurry that.', 15, 7, 1, '2017-06-22 02:06:52', '2017-06-22 02:06:52'),
	(21, 'At cumque non et doloremque magni in dolor. Ad eos recusandae reiciendis et.', 'Mock Turtle went on, \'What HAVE you been doing here?\' \'May it please your Majesty,\' said the Dodo, pointing to the door. \'Call the next witness would be so easily offended!\' \'You\'ll get used up.\' \'But what am I to get through was more hopeless than ever: she sat on, with closed eyes, and half.', 3, 16, 1, '2017-06-22 02:06:52', '2017-06-22 02:06:52'),
	(22, 'Facere ratione iste provident dignissimos.', 'Alice started to her that she hardly knew what she did, she picked her way out. \'I shall sit here,\' the Footman went on planning to herself how she would catch a bad cold if she were looking up into the sky. Twinkle, twinkle--"\' Here the Queen jumped up and down, and nobody spoke for some time.', 15, 8, 1, '2017-06-22 02:06:52', '2017-06-22 02:06:52'),
	(23, 'Nostrum temporibus pariatur minus suscipit nihil aut consequatur.', 'M, such as mouse-traps, and the poor child, \'for I never understood what it was: at first was moderate. But the snail replied "Too far, too far!" and gave a little bottle on it, and found that it was too slippery; and when she went round the refreshments!\' But there seemed to think that proved it.', 14, 20, 0, '2017-06-22 02:06:52', '2017-06-22 02:06:52'),
	(24, 'Facilis aut ea quia aut. Sapiente quia et est sed.', 'All this time with the game,\' the Queen to-day?\' \'I should like to be rude, so she turned away. \'Come back!\' the Caterpillar contemptuously. \'Who are YOU?\' said the Gryphon. \'We can do no more, whatever happens. What WILL become of me?\' Luckily for Alice, the little glass box that was lying on.', 12, 19, 1, '2017-06-22 02:06:52', '2017-06-22 02:06:52'),
	(25, 'Repellendus neque quae quia incidunt minima corporis dolorem.', 'Alice had no pictures or conversations?\' So she stood looking at the end.\' \'If you knew Time as well say,\' added the Hatter, \'when the Queen in front of them, with her head down to nine inches high. CHAPTER VI. Pig and Pepper For a minute or two, it was very provoking to find her way out. \'I shall.', 9, 16, 1, '2017-06-22 02:06:52', '2017-06-22 02:06:52'),
	(26, 'Et consequatur alias quos omnis est.', 'White Rabbit as he shook both his shoes off. \'Give your evidence,\' said the Duchess; \'and that\'s a fact.\' Alice did not dare to disobey, though she knew she had been would have appeared to them she heard a little three-legged table, all made a dreadfully ugly child: but it was written to nobody,.', 8, 1, 1, '2017-06-22 02:06:52', '2017-06-22 02:06:52'),
	(27, 'Ut est voluptas enim maiores minus et magni.', 'Gryphon went on in these words: \'Yes, we went to school every day--\' \'I\'VE been to her, And mentioned me to sell you a present of everything I\'ve said as yet.\' \'A cheap sort of way, \'Do cats eat bats? Do cats eat bats?\' and sometimes, \'Do bats eat cats?\' for, you see, as they used to it as far as.', 10, 7, 0, '2017-06-22 02:06:52', '2017-06-22 02:06:52'),
	(28, 'Eveniet tempora alias sed quo sed blanditiis suscipit.', 'After these came the guests, mostly Kings and Queens, and among them Alice recognised the White Rabbit was still in existence; \'and now for the garden!\' and she dropped it hastily, just in time to see it pop down a very interesting dance to watch,\' said Alice, in a louder tone. \'ARE you to sit.', 10, 9, 0, '2017-06-22 02:06:52', '2017-06-22 02:06:52'),
	(29, 'Consequuntur soluta deleniti voluptatum magni eligendi.', 'Queen, and Alice, were in custody and under sentence of execution.\' \'What for?\' said the King. The White Rabbit as he shook his head sadly. \'Do I look like it?\' he said, turning to Alice with one finger pressed upon its nose. The Dormouse slowly opened his eyes very wide on hearing this; but all.', 16, 10, 1, '2017-06-22 02:06:52', '2017-06-22 02:06:52'),
	(30, 'Est ipsum sit magni eligendi numquam ut.', 'But at any rate, the Dormouse sulkily remarked, \'If you didn\'t like cats.\' \'Not like cats!\' cried the Mouse, in a sulky tone, as it spoke (it was Bill, I fancy--Who\'s to go from here?\' \'That depends a good opportunity for showing off her knowledge, as there was generally a ridge or furrow in the.', 7, 1, 1, '2017-06-22 02:06:52', '2017-06-22 02:06:52'),
	(31, 'Et cupiditate omnis quo nisi doloribus ipsam.', 'Do cats eat bats? Do cats eat bats, I wonder?\' And here poor Alice in a hoarse, feeble voice: \'I heard every word you fellows were saying.\' \'Tell us a story!\' said the Cat: \'we\'re all mad here. I\'m mad. You\'re mad.\' \'How do you know I\'m mad?\' said Alice. \'Call it what you would have this cat.', 10, 13, 0, '2017-06-22 02:06:52', '2017-06-22 02:06:52'),
	(32, 'In sit accusantium similique dolorem non quia eligendi.', 'Soup," will you, won\'t you, will you, won\'t you, will you, won\'t you, will you, won\'t you, won\'t you, will you, won\'t you, won\'t you, will you, won\'t you, will you, won\'t you, will you, won\'t you, will you, won\'t you join the dance. Would not, could not, would not, could not swim. He sent them.', 19, 7, 1, '2017-06-22 02:06:52', '2017-06-22 02:06:52'),
	(33, 'Alias laudantium nisi culpa rem.', 'Was kindly permitted to pocket the spoon: While the Owl and the second time round, she found that it ought to be no use in saying anything more till the Pigeon in a more subdued tone, and everybody else. \'Leave off that!\' screamed the Gryphon. \'How the creatures argue. It\'s enough to get out at.', 5, 20, 1, '2017-06-22 02:06:52', '2017-06-22 02:06:52'),
	(34, 'Corporis aliquid quidem et tempora qui enim. Qui sit fugit est ut.', 'VERY deeply with a T!\' said the Hatter. \'I told you that.\' \'If I\'d been the whiting,\' said Alice, whose thoughts were still running on the Duchess\'s cook. She carried the pepper-box in her own children. \'How should I know?\' said Alice, \'it\'s very easy to take out of this remark, and thought to.', 13, 10, 0, '2017-06-22 02:06:52', '2017-06-22 02:06:52'),
	(35, 'Mollitia molestias ratione et eveniet ut sit dolorem.', 'Don\'t let me help to undo it!\' \'I shall sit here,\' the Footman remarked, \'till tomorrow--\' At this the whole she thought to herself. \'Shy, they seem to come out among the people that walk with their heads!\' and the other guinea-pig cheered, and was delighted to find her in a loud, indignant voice,.', 16, 17, 0, '2017-06-22 02:06:52', '2017-06-22 02:06:52'),
	(36, 'Dicta cupiditate dolores illum fuga dolor labore.', 'Dormouse\'s place, and Alice guessed who it was, and, as the Dormouse shook itself, and was going a journey, I should say what you mean,\' said Alice. \'Come, let\'s hear some of the jury asked. \'That I can\'t put it right; \'not that it might be hungry, in which you usually see Shakespeare, in the.', 8, 17, 1, '2017-06-22 02:06:52', '2017-06-22 02:06:52'),
	(37, 'Nulla necessitatibus repellat ut dolor. Quae quo eum culpa consequatur.', 'Alice quietly said, just as if it likes.\' \'I\'d rather finish my tea,\' said the Cat. \'I said pig,\' replied Alice; \'and I wish I hadn\'t quite finished my tea when I breathe"!\' \'It IS a long breath, and said \'What else had you to leave off being arches to do such a wretched height to be.\' \'It is a.', 5, 16, 1, '2017-06-22 02:06:52', '2017-06-22 02:06:52'),
	(38, 'Ut corrupti aut doloribus sapiente veritatis et voluptatem.', 'Alice put down yet, before the trial\'s over!\' thought Alice. \'I\'m glad they\'ve begun asking riddles.--I believe I can go back and see what was going to happen next. First, she dreamed of little Alice herself, and once again the tiny hands were clasped upon her arm, and timidly said \'Consider, my.', 11, 13, 1, '2017-06-22 02:06:52', '2017-06-22 02:06:52'),
	(39, 'Voluptas atque aliquid delectus molestiae quaerat.', 'CHORUS. (In which the March Hare. \'Exactly so,\' said the Hatter. \'Nor I,\' said the March Hare. Alice sighed wearily. \'I think you might do something better with the glass table as before, \'and things are worse than ever,\' thought the poor animal\'s feelings. \'I quite agree with you,\' said the.', 19, 7, 1, '2017-06-22 02:06:52', '2017-06-22 02:06:52'),
	(40, 'Qui dignissimos voluptatibus in debitis quaerat quis qui.', 'PLEASE mind what you\'re doing!\' cried Alice, jumping up and saying, \'Thank you, sir, for your interesting story,\' but she remembered having seen such a very deep well. Either the well was very like having a game of croquet she was walking by the Hatter, \'when the Queen was in a frightened tone..', 19, 9, 0, '2017-06-22 02:06:52', '2017-06-22 02:06:52');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;

-- Volcando estructura para tabla palmareal.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla palmareal.migrations: ~15 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(31, '2014_10_12_000000_create_users_table', 1),
	(32, '2014_10_12_100000_create_password_resets_table', 1),
	(33, '2017_03_05_202952_create_emails_table', 1),
	(34, '2017_05_14_193630_create_characteristics_table', 1),
	(35, '2017_05_14_232330_create_types_table', 1),
	(36, '2017_05_14_233615_create_messages_table', 1),
	(37, '2017_05_14_312352_create_proximities_table', 1),
	(38, '2017_05_16_014008_create_media_table', 1),
	(39, '2017_06_19_162719_create_roles_table', 1),
	(40, '2017_06_19_162820_create_modules_table', 1),
	(41, '2017_06_19_162846_create_role_modules_table', 1),
	(42, '2017_06_19_243107_create_admis_table', 1),
	(43, '2017_06_19_254440_create_pages_table', 1),
	(44, '2017_06_19_312448_create_properties_table', 1),
	(45, '2017_06_19_321638_create_historical_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla palmareal.modules
CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla palmareal.modules: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `modules` DISABLE KEYS */;
INSERT INTO `modules` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'logs', 'Logs del sistema', '2017-06-22 02:06:38', '2017-06-22 02:06:38'),
	(2, 'historicos', 'Modulo de historial de acciones en el sistema administrativo', '2017-06-22 02:06:38', '2017-06-22 02:06:38'),
	(3, 'usuarios', 'Modulo de gestion de usuarios administradores', '2017-06-22 02:06:38', '2017-06-22 02:06:38'),
	(4, 'paginas', 'Modulo de gestion de paginas del sitio web', '2017-06-22 02:06:38', '2017-06-22 02:06:38'),
	(5, 'propiedades', 'Modulo para la gestion de propiedades inmobiliarias', '2017-06-22 02:06:38', '2017-06-22 02:06:38');
/*!40000 ALTER TABLE `modules` ENABLE KEYS */;

-- Volcando estructura para tabla palmareal.pages
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_title_unique` (`title`),
  KEY `pages_author_foreign` (`author`),
  CONSTRAINT `pages_author_foreign` FOREIGN KEY (`author`) REFERENCES `admins` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla palmareal.pages: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` (`id`, `title`, `subtitle`, `content`, `description`, `author`, `created_at`, `updated_at`) VALUES
	(1, 'inicio', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit', 'Contenido', 'Texto de pagina de inicio', 1, '2017-06-22 02:06:40', '2017-06-22 02:06:40'),
	(2, 'construccion', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit', 'Contenido', 'Pagina para mostrar la descripcion de nuestras construcciones', 1, '2017-06-22 02:06:40', '2017-06-22 02:06:40'),
	(3, 'venta', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit', 'Contenido', 'Pagina para mostrar la descripcion de  venta', 1, '2017-06-22 02:06:40', '2017-06-22 02:06:40'),
	(4, 'renta', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit', 'Contenido', 'Pagina para mostrar la descripcion de renta', 1, '2017-06-22 02:06:40', '2017-06-22 02:06:40'),
	(5, 'corretaje', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit', 'Contenido', 'Pagina para mostrar la descripcion de  corretaje', 1, '2017-06-22 02:06:40', '2017-06-22 02:06:40'),
	(6, 'contacto', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit', 'Contenido', 'Pagina para mostrar la descripcion de contacto', 1, '2017-06-22 02:06:40', '2017-06-22 02:06:40');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;

-- Volcando estructura para tabla palmareal.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla palmareal.password_resets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando estructura para tabla palmareal.properties
CREATE TABLE IF NOT EXISTS `properties` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `proximities` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `characteristics` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `modality` int(10) unsigned NOT NULL,
  `admin` int(10) unsigned NOT NULL,
  `size` int(10) unsigned NOT NULL DEFAULT 0,
  `rooms` int(10) unsigned NOT NULL DEFAULT 0,
  `bathrooms` int(10) unsigned NOT NULL DEFAULT 0,
  `garages` int(10) unsigned NOT NULL DEFAULT 0,
  `antiquity` int(10) unsigned DEFAULT NULL,
  `price` int(10) unsigned NOT NULL DEFAULT 0,
  `views` int(10) unsigned DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `properties_admin_foreign` (`admin`),
  CONSTRAINT `properties_admin_foreign` FOREIGN KEY (`admin`) REFERENCES `admins` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla palmareal.properties: ~20 rows (aproximadamente)
/*!40000 ALTER TABLE `properties` DISABLE KEYS */;
INSERT INTO `properties` (`id`, `name`, `description`, `location`, `code`, `type`, `proximities`, `characteristics`, `modality`, `admin`, `size`, `rooms`, `bathrooms`, `garages`, `antiquity`, `price`, `views`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Veritatis velit consectetur recusandae quia quia.', 'So she went on so long that they couldn\'t get them out of the day; and this Alice thought decidedly uncivil. \'But perhaps it was perfectly round, she found a little pattering of feet on the door that led into the garden, and I never understood what it was: she was going to leave it behind?\' She.', '386 Kyla Mission\nPort Reaganshire, UT 61592', '55782674', '1', '8', '1', 2, 2, 4082, 7, 3, 0, 1, 1906690, 7, 0, '2017-06-22 02:29:48', '2017-06-22 02:29:48'),
	(2, 'Asperiores est reprehenderit qui nobis.', 'Alice very meekly: \'I\'m growing.\' \'You\'ve no right to grow here,\' said the Queen, and in his note-book, cackled out \'Silence!\' and read out from his book, \'Rule Forty-two. ALL PERSONS MORE THAN A MILE HIGH TO LEAVE THE COURT.\' Everybody looked at Alice, and her eyes to see a little shaking among.', '1908 Feil Fort Suite 506\nWest Caleport, NM 93360-8023', '71980290', '1', '11', '6', 2, 11, 7059137, 6, 9, 6, 6, 4441789, 4, 1, '2017-06-22 02:29:49', '2017-06-22 02:29:49'),
	(3, 'Ut in nihil earum eos sunt rerum.', 'She soon got it out into the court, by the time they had a door leading right into a graceful zigzag, and was in confusion, getting the Dormouse said--\' the Hatter replied. \'Of course not,\' Alice replied eagerly, for she felt that she ran out of their hearing her; and the words all coming.', '95493 Crona Isle Apt. 741\nNicktown, OK 84315', '41620133', '2', '23', '13', 2, 2, 964670783, 5, 6, 6, 3, 9933801, 9, 1, '2017-06-22 02:29:49', '2017-06-22 02:29:49'),
	(4, 'Molestiae enim et autem rerum.', 'Drawling, Stretching, and Fainting in Coils.\' \'What was that?\' inquired Alice. \'Reeling and Writhing, of course, to begin again, it was labelled \'ORANGE MARMALADE\', but to get out again. That\'s all.\' \'Thank you,\' said the Rabbit came up to the heads of the busy farm-yard--while the lowing of the.', '200 Schaefer Glen Suite 357\nNorth Rickeytown, WI 43313', '56942344', '2', '13', '3', 1, 3, 313, 1, 4, 8, 1, 48521201, 8, 1, '2017-06-22 02:29:49', '2017-06-22 02:29:49'),
	(5, 'Ea ut aspernatur provident iusto sint.', 'King, \'that only makes the matter worse. You MUST have meant some mischief, or else you\'d have signed your name like an arrow. The Cat\'s head with great emphasis, looking hard at Alice for some way of keeping up the chimney, has he?\' said Alice to herself, \'Why, they\'re only a pack of cards: the.', '2540 Art Ridge\nEast Kirstinburgh, WY 76765-6298', '90846367', '1', '3', '11', 2, 9, 983840, 9, 1, 2, 5, 5540308, 2, 1, '2017-06-22 02:29:49', '2017-06-22 02:29:49'),
	(6, 'Iste tenetur voluptas facere et et.', 'CAN all that green stuff be?\' said Alice. \'Why not?\' said the Mouse, frowning, but very glad she had not a regular rule: you invented it just grazed his nose, and broke to pieces against one of them.\' In another moment down went Alice after it, and found in it a violent blow underneath her chin:.', '820 Lind Ports Suite 104\nPort Wallaceside, NJ 52300', '2968709', '1', '11', '5', 1, 2, 513322, 0, 4, 5, 6, 7528507, 1, 1, '2017-06-22 02:29:50', '2017-06-22 02:29:50'),
	(7, 'Mollitia odio quis blanditiis nisi ipsa sed.', 'This did not see anything that looked like the tone of this was his first speech. \'You should learn not to be no sort of way, \'Do cats eat bats?\' and sometimes, \'Do bats eat cats?\' for, you see, Alice had begun to repeat it, but her head on her spectacles, and began bowing to the confused clamour.', '947 Martin Crossroad Suite 147\nLueilwitzville, AK 76709', '56761886', '2', '1', '13', 2, 17, 366, 2, 2, 6, 7, 7861247, 3, 0, '2017-06-22 02:29:50', '2017-06-22 02:29:50'),
	(8, 'Temporibus dicta magni aut voluptatem.', 'Gryphon, with a sigh. \'I only took the hookah out of the reeds--the rattling teacups would change (she knew) to the other was sitting on the floor, as it was very hot, she kept tossing the baby at her with large round eyes, and half of anger, and tried to speak, and no room to open it; but, as the.', '924 Elfrieda Courts Apt. 186\nNicholasborough, OH 58602-8104', '35544194', '1', '6', '11', 2, 13, 931495, 5, 6, 7, 1, 1596763, 8, 0, '2017-06-22 02:29:50', '2017-06-22 02:29:50'),
	(9, 'At non omnis ea enim est id.', 'Hatter went on, spreading out the answer to it?\' said the Mock Turtle, who looked at Two. Two began in a tone of great curiosity. \'It\'s a pun!\' the King replied. Here the Dormouse indignantly. However, he consented to go among mad people,\' Alice remarked. \'Right, as usual,\' said the Hatter: \'as.', '2067 Ziemann Street\nNorth Malachi, KS 00759-8665', '78384757', '2', '22', '8', 1, 10, 323819, 0, 1, 2, 1, 24313228, 6, 0, '2017-06-22 02:29:50', '2017-06-22 02:29:50'),
	(10, 'Sit assumenda consequuntur a exercitationem ad.', 'Alice\'s shoulder, and it put more simply--"Never imagine yourself not to be beheaded!\' said Alice, swallowing down her flamingo, and began to tremble. Alice looked at it uneasily, shaking it every now and then; such as, \'Sure, I don\'t care which happens!\' She ate a little of her voice. Nobody.', '156 Elsie Isle Apt. 488\nNorth Kyraburgh, NV 63606', '62074211', '2', '21', '15', 2, 18, 27656, 2, 8, 8, 9, 9249449, 1, 1, '2017-06-22 02:29:50', '2017-06-22 02:29:50'),
	(11, 'Reiciendis accusantium quia iste neque.', 'Eaglet. \'I don\'t know what it was: at first was in confusion, getting the Dormouse go on till you come to the jury, of course--"I GAVE HER ONE, THEY GAVE HIM TWO--" why, that must be kind to them,\' thought Alice, \'to speak to this mouse? Everything is so out-of-the-way down here, that I should be.', '184 Kris Fords\nWest Diamond, LA 18373-0134', '4336895', '1', '13', '8', 1, 21, 7, 5, 4, 2, 1, 7136730, 2, 1, '2017-06-22 02:29:50', '2017-06-22 02:29:50'),
	(12, 'Ducimus debitis quia qui consequatur impedit.', 'M--\' \'Why with an M, such as mouse-traps, and the words have got altered.\' \'It is wrong from beginning to grow up again! Let me see--how IS it to half-past one as long as there was the Rabbit was no one else seemed inclined to say than his first speech. \'You should learn not to lie down on their.', '2318 Jarret Burgs Suite 258\nNorth Carole, DC 24338', '5247609', '1', '22', '1', 1, 10, 18148, 9, 7, 4, 0, 1005995, 5, 0, '2017-06-22 02:29:51', '2017-06-22 02:29:51'),
	(13, 'Maiores dolores rerum molestiae velit ut.', 'Alice. \'I don\'t see,\' said the Duchess; \'and most things twinkled after that--only the March Hare: she thought it would be very likely it can be,\' said the Gryphon, with a lobster as a drawing of a candle is blown out, for she felt a violent blow underneath her chin: it had been. But her sister.', '151 Green Run Apt. 479\nKuhlmanmouth, TX 65285', '63313852', '2', '9', '9', 1, 3, 247, 6, 2, 9, 3, 12019604, 6, 0, '2017-06-22 02:29:51', '2017-06-22 02:29:51'),
	(14, 'Non tempore adipisci delectus asperiores et quis.', 'March Hare was said to the tarts on the breeze that followed them, the melancholy words:-- \'Soo--oop of the shelves as she went on in these words: \'Yes, we went to school in the distance, and she felt that she ran with all their simple sorrows, and find a thing,\' said the Cat. \'Do you play croquet.', '476 Alberto Green\nKuvaliston, WY 31882-7910', '85422895', '1', '13', '13', 2, 8, 9, 5, 6, 7, 2, 9848306, 7, 0, '2017-06-22 02:29:51', '2017-06-22 02:29:51'),
	(15, 'Culpa et id dignissimos doloribus.', 'Twinkle, twinkle--"\' Here the other paw, \'lives a Hatter: and in THAT direction,\' the Cat in a helpless sort of present!\' thought Alice. \'I\'m glad I\'ve seen that done,\' thought Alice. The King laid his hand upon her face. \'Very,\' said Alice: \'she\'s so extremely--\' Just then she heard the Rabbit.', '38451 Domenica Cliff Suite 195\nCaspershire, VT 68652-4571', '41827736', '1', '7', '3', 2, 24, 60154, 0, 6, 4, 5, 3053074, 6, 0, '2017-06-22 02:29:51', '2017-06-22 02:29:51'),
	(16, 'Fuga neque eligendi dolor eligendi.', 'The Antipathies, I think--\' (she was obliged to write with one finger for the moment how large she had never before seen a good deal until she made it out loud. \'Thinking again?\' the Duchess said after a pause: \'the reason is, that I\'m perfectly sure I don\'t know the meaning of it altogether; but.', '4732 Kub Plains Apt. 535\nMikelfurt, AZ 04621', '75588313', '1', '17', '8', 1, 13, 8, 4, 7, 5, 4, 6871640, 0, 0, '2017-06-22 02:29:51', '2017-06-22 02:29:51'),
	(17, 'Consequatur non unde et quod minima.', 'It doesn\'t look like one, but the Mouse was bristling all over, and both footmen, Alice noticed, had powdered hair that curled all over with diamonds, and walked a little snappishly. \'You\'re enough to look over their heads. She felt very curious sensation, which puzzled her very earnestly, \'Now,.', '160 Hane Loop Apt. 179\nNorth Jeraldtown, NY 70475-1218', '48327648', '1', '22', '3', 1, 17, 299357848, 7, 5, 2, 1, 9477637, 3, 0, '2017-06-22 02:29:52', '2017-06-22 02:29:52'),
	(18, 'Dolor non quo itaque sed sit.', 'Allow me to introduce some other subject of conversation. \'Are you--are you fond--of--of dogs?\' The Mouse looked at them with the glass table and the baby--the fire-irons came first; then followed a shower of little birds and animals that had a wink of sleep these three little sisters--they were.', '5853 Jaylen Ridges Apt. 547\nDickensshire, UT 26755-1040', '39768098', '1', '9', '1', 2, 24, 557074, 6, 3, 4, 7, 5841818, 3, 1, '2017-06-22 02:29:52', '2017-06-22 02:29:52'),
	(19, 'Facere minus et excepturi nihil.', 'Pray how did you ever eat a bat?\' when suddenly, thump! thump! down she came up to the Classics master, though. He was an uncomfortably sharp chin. However, she did not get hold of its mouth again, and that\'s very like a snout than a real nose; also its eyes by this very sudden change, but she.', '616 Walker Lights\nNolanfurt, RI 01601-6359', '16448440', '2', '16', '8', 1, 24, 3, 8, 2, 2, 8, 3636191, 2, 1, '2017-06-22 02:29:52', '2017-06-22 02:29:52'),
	(20, 'Magnam est ratione minima et.', 'The Dormouse slowly opened his eyes. He looked at the Hatter, who turned pale and fidgeted. \'Give your evidence,\' the King said to herself, \'Which way? Which way?\', holding her hand on the top of the words came very queer to ME.\' \'You!\' said the March Hare. Alice was very hot, she kept fanning.', '8121 Olson Club\nHalvorsonchester, ME 32481-7713', '38057631', '1', '1', '8', 2, 22, 3, 8, 3, 1, 5, 7015345, 3, 0, '2017-06-22 02:29:52', '2017-06-22 02:29:52');
/*!40000 ALTER TABLE `properties` ENABLE KEYS */;

-- Volcando estructura para tabla palmareal.proximities
CREATE TABLE IF NOT EXISTS `proximities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `proximities_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla palmareal.proximities: ~24 rows (aproximadamente)
/*!40000 ALTER TABLE `proximities` DISABLE KEYS */;
INSERT INTO `proximities` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Hospital', '2017-06-22 02:06:38', '2017-06-22 02:06:38'),
	(2, 'Clínica', '2017-06-22 02:06:38', '2017-06-22 02:06:38'),
	(3, 'Transp. Puliblico', '2017-06-22 02:06:38', '2017-06-22 02:06:38'),
	(4, 'Colegio', '2017-06-22 02:06:38', '2017-06-22 02:06:38'),
	(5, 'Farmacia', '2017-06-22 02:06:38', '2017-06-22 02:06:38'),
	(6, 'Licoreria', '2017-06-22 02:06:38', '2017-06-22 02:06:38'),
	(7, 'Floristeria', '2017-06-22 02:06:38', '2017-06-22 02:06:38'),
	(8, 'Supemercado', '2017-06-22 02:06:38', '2017-06-22 02:06:38'),
	(9, 'Bodegón', '2017-06-22 02:06:38', '2017-06-22 02:06:38'),
	(10, 'Almacen', '2017-06-22 02:06:38', '2017-06-22 02:06:38'),
	(11, 'Metro', '2017-06-22 02:06:38', '2017-06-22 02:06:38'),
	(12, 'Centro Comercial', '2017-06-22 02:06:38', '2017-06-22 02:06:38'),
	(13, 'Tienda', '2017-06-22 02:06:38', '2017-06-22 02:06:38'),
	(14, 'Universidad', '2017-06-22 02:06:38', '2017-06-22 02:06:38'),
	(15, 'Plaza', '2017-06-22 02:06:38', '2017-06-22 02:06:38'),
	(16, 'Parque', '2017-06-22 02:06:38', '2017-06-22 02:06:38'),
	(17, 'Museo', '2017-06-22 02:06:38', '2017-06-22 02:06:38'),
	(18, 'Cafeteria', '2017-06-22 02:06:38', '2017-06-22 02:06:38'),
	(19, 'Terminal', '2017-06-22 02:06:38', '2017-06-22 02:06:38'),
	(20, 'Aereopuerto', '2017-06-22 02:06:38', '2017-06-22 02:06:38'),
	(21, 'Embajada', '2017-06-22 02:06:38', '2017-06-22 02:06:38'),
	(22, 'Linea de Taxi', '2017-06-22 02:06:38', '2017-06-22 02:06:38'),
	(23, 'Banco', '2017-06-22 02:06:38', '2017-06-22 02:06:38'),
	(24, 'Panaderia', '2017-06-22 02:06:38', '2017-06-22 02:06:38');
/*!40000 ALTER TABLE `proximities` ENABLE KEYS */;

-- Volcando estructura para tabla palmareal.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla palmareal.roles: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'super admnistrador', 'Rol con maximo nivel de privilegios a nivel de sistema', '2017-06-22 02:06:38', '2017-06-22 02:06:38'),
	(2, 'web master', 'Encargado de la gestion de los usuarios, los e informacion del website', '2017-06-22 02:06:38', '2017-06-22 02:06:38'),
	(3, 'moderador', 'Encargado de la gestion de contenido de las propiedades y de las paginas del website', '2017-06-22 02:06:38', '2017-06-22 02:06:38'),
	(4, 'editor', 'Encargado de crear y editar las propiedades dentro del sistema', '2017-06-22 02:06:38', '2017-06-22 02:06:38');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Volcando estructura para tabla palmareal.roles_modules
CREATE TABLE IF NOT EXISTS `roles_modules` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fk_id_role` int(10) unsigned NOT NULL,
  `fk_id_module` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `roles_modules_fk_id_role_foreign` (`fk_id_role`),
  KEY `roles_modules_fk_id_module_foreign` (`fk_id_module`),
  CONSTRAINT `roles_modules_fk_id_module_foreign` FOREIGN KEY (`fk_id_module`) REFERENCES `modules` (`id`),
  CONSTRAINT `roles_modules_fk_id_role_foreign` FOREIGN KEY (`fk_id_role`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla palmareal.roles_modules: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `roles_modules` DISABLE KEYS */;
INSERT INTO `roles_modules` (`id`, `fk_id_role`, `fk_id_module`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, '2017-06-22 02:06:38', '2017-06-22 02:06:38'),
	(2, 1, 2, '2017-06-22 02:06:38', '2017-06-22 02:06:38'),
	(3, 1, 3, '2017-06-22 02:06:38', '2017-06-22 02:06:38'),
	(4, 1, 4, '2017-06-22 02:06:38', '2017-06-22 02:06:38'),
	(5, 1, 5, '2017-06-22 02:06:38', '2017-06-22 02:06:38'),
	(6, 2, 2, '2017-06-22 02:06:38', '2017-06-22 02:06:38'),
	(7, 2, 3, '2017-06-22 02:06:38', '2017-06-22 02:06:38'),
	(8, 2, 4, '2017-06-22 02:06:38', '2017-06-22 02:06:38'),
	(9, 2, 5, '2017-06-22 02:06:38', '2017-06-22 02:06:38'),
	(10, 3, 4, '2017-06-22 02:06:38', '2017-06-22 02:06:38'),
	(11, 3, 5, '2017-06-22 02:06:38', '2017-06-22 02:06:38'),
	(12, 4, 5, '2017-06-22 02:06:38', '2017-06-22 02:06:38');
/*!40000 ALTER TABLE `roles_modules` ENABLE KEYS */;

-- Volcando estructura para tabla palmareal.types
CREATE TABLE IF NOT EXISTS `types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `types_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla palmareal.types: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `types` DISABLE KEYS */;
INSERT INTO `types` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Casa', '2017-06-22 02:06:37', '2017-06-22 02:06:37'),
	(2, 'Apartamento', '2017-06-22 02:06:37', '2017-06-22 02:06:37');
/*!40000 ALTER TABLE `types` ENABLE KEYS */;

-- Volcando estructura para tabla palmareal.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usercode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` tinyint(1) NOT NULL,
  `kind` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `birthday` date NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_usercode_unique` (`usercode`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla palmareal.users: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `username`, `usercode`, `password`, `phone`, `image`, `location`, `address`, `description`, `gender`, `kind`, `status`, `birthday`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Christian', 'Aguilar', 'chrisjeam@gmail.com', 'chrisjeam', '77275141', '$2y$10$8.K0p21QJA73UXq3MzINk.VSI3RYMuB3WdGfbWUCwFlVcd//9R5xq', '04143617522', NULL, 'Venezuela', 'Sin direccion', 'Sin descripcion', 0, 0, 1, '1991-11-27', NULL, '2017-06-22 02:06:39', '2017-06-22 02:06:39'),
	(2, 'Empresa', '', 'empresa@gmail.com', 'empresa', '92064498', '$2y$10$NIaQTog/ZwM1aYgOmMjmTeX.iYU7xooPGXIcyXJ8nS4cPL4Ybxykq', '123456789', NULL, 'Venezuela', 'Sin direccion', 'Sin descripcion', 0, 1, 1, '1990-01-01', NULL, '2017-06-22 02:06:39', '2017-06-22 02:06:39');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
