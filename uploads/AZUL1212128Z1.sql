/*==============================================================*/
/* DBMS name:      ORACLE Version 10gR2                         */
/* Created on:     08/05/2023 05:42:21 p. m.                    */
/*==============================================================*/


alter table "localidades"
   drop constraint fk_localida_1municipi_municipi;

alter table "nactividades_nviviendas"
   drop constraint fk_nactivid_nactivida_activida;

alter table "nactividades_nviviendas"
   drop constraint fk_nactivid_nactivida_vivienda;

alter table "personas"
   drop constraint fk_personas_1_viviend_vivienda;

alter table "viviendas"
   drop constraint fk_vivienda_1localida_localida;

alter table "viviendas"
   drop constraint fk_vivienda_1tipo_nvi_tipo_viv;

drop table "actividad_economica" cascade constraints;

drop index 1municipio_nloclaidades_fk;

drop table "localidades" cascade constraints;

drop table "municipios" cascade constraints;

drop index nactividades_nviviendas2_fk;

drop index nactividades_nviviendas_fk;

drop table "nactividades_nviviendas" cascade constraints;

drop index 1_viviendas_n_personas_fk;

drop table "personas" cascade constraints;

drop table "tipo_vivienda" cascade constraints;

drop index 1tipo_nviviendas_fk;

drop index 1localidad_nviviendas_fk;

drop table "viviendas" cascade constraints;

/*==============================================================*/
/* Table: "actividad_economica"                                 */
/*==============================================================*/
create table "actividad_economica"  (
   "id_actividad"       integer                         not null,
   "descripcion_act"    varchar2(100)                   not null,
   constraint pk_actividad_economica primary key ("id_actividad")
);

/*==============================================================*/
/* Table: "localidades"                                         */
/*==============================================================*/
create table "localidades"  (
   "id_mun"             char(3)                         not null,
   "id_loc"             char(4)                         not null,
   "nom_loc"            varchar2(50)                    not null,
   "d"                  char(20)                        not null,
   "latitud"            char(20)                        not null,
   "categoria"          char(1)                         not null,
   "num_habitantes_2010" integer                         not null,
   constraint pk_localidades primary key ("id_mun", "id_loc")
);

/*==============================================================*/
/* Index: 1municipio_nloclaidades_fk                            */
/*==============================================================*/
create index 1municipio_nloclaidades_fk on "localidades" (
   "id_mun" asc
);

/*==============================================================*/
/* Table: "municipios"                                          */
/*==============================================================*/
create table "municipios"  (
   "id_mun"             char(3)                         not null,
   "nom_mun"            char(25)                        not null,
   constraint pk_municipios primary key ("id_mun")
);

/*==============================================================*/
/* Table: "nactividades_nviviendas"                             */
/*==============================================================*/
create table "nactividades_nviviendas"  (
   "id_actividad"       integer                         not null,
   "id_viv"             integer                         not null,
   constraint pk_nactividades_nviviendas primary key ("id_actividad", "id_viv")
);

/*==============================================================*/
/* Index: nactividades_nviviendas_fk                            */
/*==============================================================*/
create index nactividades_nviviendas_fk on "nactividades_nviviendas" (
   "id_actividad" asc
);

/*==============================================================*/
/* Index: nactividades_nviviendas2_fk                           */
/*==============================================================*/
create index nactividades_nviviendas2_fk on "nactividades_nviviendas" (
   "id_viv" asc
);

/*==============================================================*/
/* Table: "personas"                                            */
/*==============================================================*/
create table "personas"  (
   "curp"               varchar2(18)                    not null,
   "id_viv"             integer,
   "rfc_id"             char(13)                        not null,
   "nombre"             char(20)                        not null,
   "appat"              char(20)                        not null,
   "apmat"              char(20)                        not null,
   "fecha_nac"          date                            not null,
   "genero"             char(1)                         not null,
   constraint pk_personas primary key ("curp")
);

/*==============================================================*/
/* Index: 1_viviendas_n_personas_fk                             */
/*==============================================================*/
create index 1_viviendas_n_personas_fk on "personas" (
   "id_viv" asc
);

/*==============================================================*/
/* Table: "tipo_vivienda"                                       */
/*==============================================================*/
create table "tipo_vivienda"  (
   "id_tipo"            integer                         not null,
   "descripion"         varchar2(50)                    not null,
   constraint pk_tipo_vivienda primary key ("id_tipo")
);

/*==============================================================*/
/* Table: "viviendas"                                           */
/*==============================================================*/
create table "viviendas"  (
   "id_viv"             integer                         not null,
   "id_tipo"            integer,
   "id_mun"             char(3),
   "id_loc"             char(4),
   "domicilio"          varchar2(50)                    not null,
   "colonia"            varchar2(60),
   "numero"             integer,
   "num_int"            char(5),
   "tel"                integer,
   "recamaras"          integer,
   "banos"              integer,
   "m_construccion"     integer                         not null,
   "m_terreno"          integer                         not null,
   constraint pk_viviendas primary key ("id_viv")
);

/*==============================================================*/
/* Index: 1localidad_nviviendas_fk                              */
/*==============================================================*/
create index 1localidad_nviviendas_fk on "viviendas" (
   "id_mun" asc,
   "id_loc" asc
);

/*==============================================================*/
/* Index: 1tipo_nviviendas_fk                                   */
/*==============================================================*/
create index 1tipo_nviviendas_fk on "viviendas" (
   "id_tipo" asc
);

alter table "localidades"
   add constraint fk_localida_1municipi_municipi foreign key ("id_mun")
      references "municipios" ("id_mun");

alter table "nactividades_nviviendas"
   add constraint fk_nactivid_nactivida_activida foreign key ("id_actividad")
      references "actividad_economica" ("id_actividad");

alter table "nactividades_nviviendas"
   add constraint fk_nactivid_nactivida_vivienda foreign key ("id_viv")
      references "viviendas" ("id_viv");

alter table "personas"
   add constraint fk_personas_1_viviend_vivienda foreign key ("id_viv")
      references "viviendas" ("id_viv");

alter table "viviendas"
   add constraint fk_vivienda_1localida_localida foreign key ("id_mun", "id_loc")
      references "localidades" ("id_mun", "id_loc");

alter table "viviendas"
   add constraint fk_vivienda_1tipo_nvi_tipo_viv foreign key ("id_tipo")
      references "tipo_vivienda" ("id_tipo");

