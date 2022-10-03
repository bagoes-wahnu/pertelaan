/*
 Navicat Premium Data Transfer

 Source Server         : new_local
 Source Server Type    : PostgreSQL
 Source Server Version : 100022
 Source Host           : localhost:5433
 Source Catalog        : slf_tabg_pertelaan
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 100022
 File Encoding         : 65001

 Date: 03/10/2022 13:03:44
*/


-- ----------------------------
-- Table structure for pertelaan
-- ----------------------------
DROP TABLE IF EXISTS "public"."pertelaan";
CREATE TABLE "public"."pertelaan" (
  "gid" int4 NOT NULL,
  "no_sk_pertelaan" varchar(255) COLLATE "pg_catalog"."default",
  "tgl_pertelaan" date,
  "jenis_pertelaan" varchar(255) COLLATE "pg_catalog"."default",
  "nama_bangunan" varchar(255) COLLATE "pg_catalog"."default",
  "no_persetujuan_teknis" varchar(255) COLLATE "pg_catalog"."default",
  "tgl_persetujuan_teknis" date,
  "nama_pemohon_pertelaan" varchar(255) COLLATE "pg_catalog"."default",
  "permohonan_bangunan_pertelaan" varchar(255) COLLATE "pg_catalog"."default",
  "kelurahan" varchar(255) COLLATE "pg_catalog"."default",
  "kecamatan" varchar(255) COLLATE "pg_catalog"."default",
  "no_imb" varchar(255) COLLATE "pg_catalog"."default",
  "tgl_imb" date,
  "atas_nama" varchar(255) COLLATE "pg_catalog"."default",
  "nama_pemohon_imb" varchar(255) COLLATE "pg_catalog"."default",
  "alamat_persil_imb" varchar(255) COLLATE "pg_catalog"."default",
  "penggunaan_bangunan" varchar(255) COLLATE "pg_catalog"."default",
  "luas_bangunan" varchar(255) COLLATE "pg_catalog"."default",
  "jumlah_lantai" varchar(255) COLLATE "pg_catalog"."default",
  "file_sk_pertelaan" varchar(255) COLLATE "pg_catalog"."default",
  "file_perstek" varchar(255) COLLATE "pg_catalog"."default",
  "file_gambar_pertelaan" varchar(255) COLLATE "pg_catalog"."default",
  "file_gambar_as_build" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of pertelaan
-- ----------------------------
INSERT INTO "public"."pertelaan" VALUES (1, 'tes', '2022-10-03', 'tes', 'tes', 'tes', '2022-10-03', 'tes', 'tes', 'tes', 'tes', 'tes', '2022-10-03', 'tes', 'tes', 'tes', 'tes', 'tes', 'tes', 'tes.pdf', 'tes.pdf', 'tes.jpg', 'tes.jpg');

-- ----------------------------
-- Primary Key structure for table pertelaan
-- ----------------------------
ALTER TABLE "public"."pertelaan" ADD CONSTRAINT "pertelaan_pkey" PRIMARY KEY ("gid");
