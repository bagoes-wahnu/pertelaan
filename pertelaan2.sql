PGDMP     /                	    z            slf_tabg_pertelaan    10.22    10.22     ?
           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                       false            ?
           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false            ?
           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                       false            ?            1259    66782 	   pertelaan    TABLE     ?  CREATE TABLE public.pertelaan (
    gid integer NOT NULL,
    no_sk_pertelaan character varying(255),
    tgl_pertelaan date,
    jenis_pertelaan character varying(255),
    nama_bangunan character varying(255),
    no_persetujuan_teknis character varying(255),
    tgl_persetujuan_teknis date,
    nama_pemohon_pertelaan character varying(255),
    permohonan_bangunan_pertelaan character varying(255),
    kelurahan character varying(255),
    kecamatan character varying(255),
    no_imb character varying(255),
    tgl_imb date,
    atas_nama character varying(255),
    nama_pemohon_imb character varying(255),
    alamat_persil_imb character varying(255),
    penggunaan_bangunan character varying(255),
    luas_bangunan character varying(255),
    jumlah_lantai character varying(255),
    file_sk_pertelaan character varying(255),
    file_perstek character varying(255),
    file_gambar_pertelaan character varying(255),
    file_gambar_as_build character varying(255)
);
    DROP TABLE public.pertelaan;
       public         postgres    false            ?
          0    66782 	   pertelaan 
   TABLE DATA               ?  COPY public.pertelaan (gid, no_sk_pertelaan, tgl_pertelaan, jenis_pertelaan, nama_bangunan, no_persetujuan_teknis, tgl_persetujuan_teknis, nama_pemohon_pertelaan, permohonan_bangunan_pertelaan, kelurahan, kecamatan, no_imb, tgl_imb, atas_nama, nama_pemohon_imb, alamat_persil_imb, penggunaan_bangunan, luas_bangunan, jumlah_lantai, file_sk_pertelaan, file_perstek, file_gambar_pertelaan, file_gambar_as_build) FROM stdin;
    public       postgres    false    198   ?	       u
           2606    66789    pertelaan pertelaan_pkey 
   CONSTRAINT     W   ALTER TABLE ONLY public.pertelaan
    ADD CONSTRAINT pertelaan_pkey PRIMARY KEY (gid);
 B   ALTER TABLE ONLY public.pertelaan DROP CONSTRAINT pertelaan_pkey;
       public         postgres    false    198            ?
   1   x?3?,I-?4202?54?50sa?0??P?W???Bg??h?=... Wm%?     