-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 18, 2019 lúc 06:48 PM
-- Phiên bản máy phục vụ: 10.1.39-MariaDB
-- Phiên bản PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shop_web4012`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `slug`, `created_at`, `updated_at`) VALUES
(3, 'Giày Tây', 'banner01.jpg', 'giay-tay', '2019-06-08 13:24:35', '2019-06-08 13:24:35'),
(4, 'Giày Thể Thao', 'banner02.jpg', 'giay-the-thao', '2019-06-08 13:25:08', '2019-06-08 13:25:08'),
(5, 'Giày Lười', 'banner03.jpg', 'giay-luoi', '2019-06-08 13:25:33', '2019-06-08 13:25:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_05_26_133040_create_categories_table', 1),
(4, '2019_05_26_134531_create_sub_categories_table', 1),
(5, '2019_05_28_020620_create_products_table', 1),
(6, '2019_05_28_021247_create_ratings_table', 1),
(7, '2019_05_28_021311_create_orders_table', 1),
(8, '2019_05_28_021419_create_order_details_table', 1),
(9, '2019_06_05_205529_add_image_in_categories', 2),
(10, '2019_06_08_195408_add_slug_to_categories', 3),
(11, '2019_06_08_195606_add_slug_to_sub_categories', 3),
(12, '2019_06_08_195725_add_slug_to_products', 3),
(13, '2019_06_17_141046_add_name_to_orders', 4),
(14, '2019_06_17_141908_add_product_id_to_order_details', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `telephone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `name`, `user_id`, `telephone`, `address`, `total`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Võ Văn Thắng', 4, '0788079036', 'Hòa Phú, Hòa Vang, Đà Nẵng', 1600000, 0, '2019-06-18 16:31:42', '2019-06-18 16:31:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(15, 5, 1, 160000, 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `sale` int(11) NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `category_id`, `sub_category_id`, `name`, `price`, `image`, `description`, `quantity`, `sale`, `slug`, `created_at`, `updated_at`) VALUES
(1, 4, 3, 'Giày thể thao - Pettino P003', 160000, 'ezgif.com-webp-to-jpg.jpg', '<ul>\r\n	<li>Thiết kế trẻ trung</li>\r\n	<li>Dễ d&agrave;ng phối trang phục</li>\r\n	<li>COD Thanh to&aacute;n khi nhận h&agrave;ng</li>\r\n	<li>Giao h&agrave;ng nhanh</li>\r\n	<li>Giao h&agrave;ng tiết kiệm</li>\r\n	<li>Chất liệu cao cấp</li>\r\n	<li>Mũi gi&agrave;y tr&ograve;n</li>\r\n	<li>Đế bằng cao su tổng hợp; xẻ r&atilde;nh chống trơn trượt</li>\r\n</ul>', 12, 0, 'giay-the-thao-pettino-p003', '2019-06-08 21:24:32', '2019-06-08 21:24:32'),
(2, 4, 2, 'Giày Thể Thao - Pettino PS09', 180000, 'ezgif-2-f57caff6aa99.jpg', '<ul>\r\n	<li>Thiết kế trẻ trung</li>\r\n	<li>Dễ d&agrave;ng phối trang phục</li>\r\n	<li>COD Thanh to&aacute;n khi nhận h&agrave;ng</li>\r\n	<li>Giao h&agrave;ng nhanh</li>\r\n	<li>Giao h&agrave;ng tiết kiệm</li>\r\n	<li>Chất liệu cao cấp</li>\r\n	<li>Mũi gi&agrave;y tr&ograve;n</li>\r\n	<li>Đế bằng cao su tổng hợp,xẻ r&atilde;nh chống trơn trượt.</li>\r\n	<li>Sản phẩm ph&ugrave; hợp cho đi phượt, thể thao v&agrave; leo n&uacute;i.</li>\r\n</ul>', 20, 15, 'giay-the-thao-pettino-ps09', '2019-06-08 21:29:56', '2019-06-18 15:51:35'),
(3, 4, 3, 'Giày Thể Thao - Pettino PS18', 150000, 'ezgif-2-2447d9764866.jpg', '<ul>\r\n	<li>Thiết kế trẻ trung</li>\r\n	<li>Dễ d&agrave;ng phối trang phục</li>\r\n	<li>Đồng kiểm: xem h&agrave;ng khi nhận h&agrave;ng</li>\r\n	<li>COD Thanh to&aacute;n khi nhận h&agrave;ng</li>\r\n	<li>Giao h&agrave;ng nhanh</li>\r\n	<li>Giao h&agrave;ng tiết kiệm</li>\r\n	<li>Chất liệu cao cấp</li>\r\n	<li>Mũi gi&agrave;y tr&ograve;n</li>\r\n	<li>Đế bằng cao su tổng hợp; xẻ r&atilde;nh chống trơn trượt</li>\r\n</ul>', 15, 0, 'giay-the-thao-pettino-ps18', '2019-06-08 21:33:40', '2019-06-08 21:33:40'),
(4, 3, 7, 'Giày Tây SunPoLo S217DRN', 420000, 'a7a4e52816a222444849b340b7d7c3c5.jpg_720x720q80.jpg', '<ul>\r\n	<li>Chất liệu da thật</li>\r\n	<li>Thiết kế đơn giản, thời trang</li>\r\n	<li>Kiểu d&aacute;ng xỏ tiện lợi, thoải m&aacute;i</li>\r\n	<li>Đế gi&agrave;y cao 3cm tăng th&ecirc;m nổi bật</li>\r\n	<li>Được xem h&agrave;ng trước khi nhận h&agrave;ng</li>\r\n	<li>COD Thanh to&aacute;n sau khi nhận h&agrave;ng</li>\r\n	<li>Giao h&agrave;ng tiết kiệm v&agrave; giao h&agrave;ng nhanh</li>\r\n	<li>Th&iacute;ch hợp nơi c&ocirc;ng sở, đi chơi, dạo phố</li>\r\n	<li>Dễ d&agrave;ng phối với nhiều loại trang phục kh&aacute;c nhau</li>\r\n	<li>Sản phẩm c&oacute; c&aacute;c size 38 - 39 - 40 - 41 - 42 - 43</li>\r\n	<li>Đổi trả size dễ d&agrave;ng nếu qu&yacute; kh&aacute;ch mang kh&ocirc;ng vừa ch&acirc;n</li>\r\n	<li>Sản phẩm được bảo h&agrave;nh 12 th&aacute;ng tại địa chỉ tr&ecirc;n thẻ bảo h&agrave;nh</li>\r\n</ul>', 15, 10, 'giay-tay-sunpolo-s217drn', '2019-06-08 21:42:20', '2019-06-08 21:42:20'),
(5, 3, 2, 'Giày Công Sở LG006', 159000, '92007b84ebeb619e3d8695660978464d.jpg_720x720q80.jpg', '<ul>\r\n	<li>Đ&ocirc;i gi&agrave;y da cao cấp LG006 l&agrave; đ&ocirc;i gi&agrave;y của sự ho&agrave;n hảo, tinh tế ph&ugrave; hợp với những qu&yacute; &ocirc;ng với phong c&aacute;ch thời trang v&ocirc; c&ugrave;ng đẳng cấp. Việc d&ugrave;ng nguy&ecirc;n miếng da B&ograve; lớn tạo n&ecirc;n bề mặt của đ&ocirc;i gi&agrave;y đ&atilde; n&oacute;i l&ecirc;n gi&aacute; trị ho&agrave;n hảo của n&oacute;.</li>\r\n	<li>Kiểu d&aacute;ng: Gi&agrave;y da Nam c&ocirc;ng sở c&oacute; d&acirc;y buộc. Mặt tr&ecirc;n được dập v&acirc;n họa tiết tinh tế, trẻ trung, năng động. Mũi gi&agrave;y được tạo kiểu v&agrave; c&ocirc;ng nghệ &eacute;p hơi cao cấp.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>', 23, 0, 'giay-cong-so-lg006', '2019-06-08 21:49:01', '2019-06-11 12:52:51'),
(6, 3, 8, 'Giày Công Sở LG076', 390000, '8247e2323565949385217ec01eff26a5.jpg_720x720q80.jpg', '<ul>\r\n	<li>Chất liệu: th&acirc;n gi&agrave;y l&agrave;m bằng chất liệu 100% lớp da b&ograve; miếng. B&ecirc;n trong được l&agrave;m bằng da Heo cao cấp, gi&uacute;p tho&aacute;ng m&aacute;t b&agrave;n ch&acirc;n, kh&ocirc;ng lưu lại m&ugrave;i hồi, rất th&ocirc;ng tho&aacute;ng kh&iacute; v&agrave;o m&ugrave;a H&egrave;. Đế gi&agrave;y l&agrave;m bằng chất liệu cao su tự nhi&ecirc;n, chất lượng cực tốt, cực bền, cực đẹp, chống trơn trượt tuyệt đối.</li>\r\n	<li>V&ocirc; c&ugrave;ng lịch l&atilde;mv&agrave; sang trọng, mẫu gi&agrave;y n&agrave;y lu&ocirc;n ho&agrave;n to&agrave;n dễ d&agrave;ng kết hợp với những trang phục như quần &acirc;u, kaki, vest. Mẫu gi&agrave;y ph&ugrave; hợp trong nhiều ho&agrave;n cảnh kh&aacute;c nhau, như: văn ph&ograve;ng, dự tiệc, sự kiện, thường ng&agrave;y.</li>\r\n</ul>', 25, 0, 'giay-cong-so-lg076', '2019-06-08 21:51:55', '2019-06-08 21:51:55'),
(7, 5, 5, 'Giày Lười CS2219', 450000, '1dab2afc210d3ced4d73b2ab21a3e65d.jpg_720x720q80.jpg', '<ul>\r\n	<li>Da b&ograve; thật 100%, đốt kh&ocirc;ng ch&aacute;y</li>\r\n	<li>L&oacute;t da mềm, khử m&ugrave;i, chống h&ocirc;i</li>\r\n	<li>Đế cao su đ&uacute;c dẻo dai, bền bỉ</li>\r\n	<li>Made in Viet Nam, chuẩn y h&igrave;nh</li>\r\n	<li>Mềm mại, thoải m&aacute;i, &ocirc;m ch&acirc;n</li>\r\n	<li>Tinh tế, tỉ mỉ từng đường n&eacute;t</li>\r\n	<li>Thiết kế hiện đại, thời thượng, đẳng cấp</li>\r\n	<li>L&agrave;m nổi bật l&ecirc;n phong c&aacute;ch của bạn</li>\r\n</ul>', 30, 0, 'giay-luoi-cs2219', '2019-06-08 21:58:26', '2019-06-08 21:58:26'),
(8, 3, 8, 'Giày Công Sở LG006', 150000, '92007b84ebeb619e3d8695660978464d.jpg_720x720q80.jpg', '<ul>\r\n	<li>Đ&ocirc;i gi&agrave;y da cao cấp LG006 l&agrave; đ&ocirc;i gi&agrave;y của sự ho&agrave;n hảo, tinh tế ph&ugrave; hợp với những qu&yacute; &ocirc;ng với phong c&aacute;ch thời trang v&ocirc; c&ugrave;ng đẳng cấp. Việc d&ugrave;ng nguy&ecirc;n miếng da B&ograve; lớn tạo n&ecirc;n bề mặt của đ&ocirc;i gi&agrave;y đ&atilde; n&oacute;i l&ecirc;n gi&aacute; trị ho&agrave;n hảo của n&oacute;.</li>\r\n	<li>Kiểu d&aacute;ng: Gi&agrave;y da Nam c&ocirc;ng sở c&oacute; d&acirc;y buộc. Mặt tr&ecirc;n được dập v&acirc;n họa tiết tinh tế, trẻ trung, năng động. Mũi gi&agrave;y được tạo kiểu v&agrave; c&ocirc;ng nghệ &eacute;p hơi cao cấp.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>', 23, 0, 'giay-cong-so-lg006', '2019-06-09 02:00:06', '2019-06-09 02:00:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ratings`
--

INSERT INTO `ratings` (`id`, `product_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(6, 8, 1, 'dfghghmkjhjfgbd', '2019-06-09 17:00:00', '2019-06-09 17:00:00'),
(7, 2, 1, 'ádassd', '2019-06-13 14:50:47', '2019-06-13 14:50:47'),
(8, 8, 1, 'Sản phẩm đẹp', '2019-06-18 02:15:10', '2019-06-18 02:15:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `sub_name`, `slug`) VALUES
(2, 3, 'Oxford Tomoyo', 'oxford-tomoyo'),
(3, 4, 'Pettino', 'pettino'),
(4, 4, 'ROZALO', 'rozalo'),
(5, 5, 'Ensado', 'ensado'),
(6, 5, 'Antoni Fernando', 'antoni-fernando'),
(7, 3, 'SUNPOLO', 'sunpolo'),
(8, 3, 'LeoLuxury', 'leoluxury');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Van Thang', 'vvthg246@gmail.com', NULL, '$2y$10$tbLj7qTFd/pIwO1OdWIccO16D9Hn0XzrQcD/5pQKHO1bciPL25i.K', NULL, '2019-06-10 14:08:36', '2019-06-10 14:08:36'),
(4, 'Vo Van Thang', 'vvthg240699@gmail.com', NULL, '$2y$10$Dpt5.SnZdfEX/D8ftxFVoeMrSONHg7HCZU41GnBnPEQ0vFFsLMwky', NULL, '2019-06-18 15:45:34', '2019-06-18 15:45:34'),
(5, 'Admin', 'admin1@locallhost.com', NULL, '$2y$10$oJT63GlK4.s4lRvlXyIUieSeW4ow1agciNL5m9Vf/3r2P81vvHNBC', NULL, '2019-06-18 16:33:52', '2019-06-18 16:33:52');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_sub_category_id_foreign` (`sub_category_id`);

--
-- Chỉ mục cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_product_id_foreign` (`product_id`),
  ADD KEY `ratings_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
