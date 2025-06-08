create table estado_personal
(
    clave_estado_personal       int unsigned auto_increment
        primary key,
    descripcion_estado_personal varchar(20) not null
)
    engine = InnoDB;

create table hitos_mf
(
    id_hito_motor_fino int         not null
        primary key,
    campo              varchar(50) null
)
    comment 'Tabla de catalogo hitos mf' engine = InnoDB;

create table hitos_mg
(
    id_hito_motor_grueso int         not null
        primary key,
    campos               varchar(50) null
)
    comment 'Tabla de catalogo de los hitos de mg' engine = InnoDB;

create table maniobras_Katona
(
    id_katona  int          not null
        primary key,
    evaluacion varchar(100) not null
)
    engine = InnoDB;

create table paciente
(
    clave_paciente                 int unsigned auto_increment
        primary key,
    clave_estado_paciente          int unsigned not null,
    nombre_paciente                varchar(30)  not null,
    apellido_paterno_paciente      varchar(50)  not null,
    apellido_materno_paciente      varchar(50)  not null,
    fecha_nacimiento_paciente      date         not null,
    nombre_padre_paciente          varchar(50)  null,
    nombre_madre_paciente          varchar(100) null,
    direccion_paciente             varchar(100) null,
    colonia_paciente               varchar(100) null,
    entidad_federativa_paciente    varchar(20)  null,
    municipio_paciente             varchar(25)  null,
    cp_paciente                    varchar(20)  null,
    telefono_paciente              varchar(25)  null,
    instituto_procedencia_paciente varchar(30)  null,
    codigo_paciente                varchar(10)  not null,
    semanas_gestacion              int unsigned not null,
    sexo_paciente                  varchar(1)   null,
    fecha_registro                 date         null,
    fecha_actualizacion            date         null,
    motivo_baja                    varchar(100) null
)
    engine = InnoDB;

create index paciente_FKIndex1
    on paciente (clave_estado_paciente);

create table postura
(
    id_postura int         not null
        primary key,
    campo      varchar(60) null
)
    comment 'Tabla de catalogo de postura' engine = InnoDB;

create table puesto
(
    clave_puesto       int unsigned auto_increment
        primary key,
    descripcion_puesto varchar(30) not null,
    comentario_puesto  mediumtext  null
)
    engine = InnoDB;

create table personal
(
    clave_personal              int unsigned auto_increment
        primary key,
    clave_puesto                int unsigned not null,
    nombre_personal             varchar(30)  not null,
    apellido_paterno_personal   varchar(15)  not null,
    apellido_materno_personal   varchar(15)  null,
    direccion_personal          varchar(100) null,
    colonia_personal            varchar(50)  null,
    entidad_federativa_personal varchar(20)  null,
    municipio_personal          varchar(25)  null,
    cp_personal                 varchar(5)   null,
    telefono_personal           varchar(13)  null,
    correo_electronico_personal varchar(50)  null,
    clave_estado_personal       int unsigned not null,
    comentarios_personal        mediumtext   null,
    nombre_usuario_personal     varchar(15)  not null,
    contraseña_personal         varchar(10)  not null,
    constraint personal_estado_personal_clave_estado_personal_fk
        foreign key (clave_estado_personal) references estado_personal (clave_estado_personal),
    constraint personal_puesto_clave_puesto_fk
        foreign key (clave_puesto) references puesto (clave_puesto)
)
    engine = InnoDB;

create table signos_alarma
(
    id_signos_alarma int         not null
        primary key,
    campo            varchar(50) null
)
    comment 'Tabla de catalogo de signos de alarma' engine = InnoDB;

create table subescalas_lenguaje
(
    id_sub_leng int          not null
        primary key,
    subescala   varchar(100) null
)
    comment 'Tabla catalogo para las subescalas de lenguaje' engine = InnoDB;

create table subescalas_mf
(
    id_sub_fino int          not null
        primary key,
    subescala   varchar(100) null
)
    comment 'Tabla de catalogo para subescalas de motor fino' engine = InnoDB;

create table subescalas_mg
(
    id_sub_grueso int         not null
        primary key,
    subescala     varchar(50) not null
)
    comment 'Tabla catalogo subescalas motor grueso' engine = InnoDB;

create table terapia_neurohabilitatoria
(
    id_terapia_neurohabilitatoria        int unsigned auto_increment
        primary key,
    clave_paciente                       int unsigned not null,
    nombre_pacinete                      varchar(100) not null,
    clave_personal                       int unsigned not null,
    fecha_registro                       date         not null,
    edad_corregida                       varchar(45)  not null,
    edad_cronologica                     varchar(45)  not null,
    dat_ter_tipo_terapia                 varchar(100) not null,
    dat_ter_fec_ini_tratam_terap         date         not null,
    dat_ter_fech_nac_edad_correg         date         not null,
    dat_ter_edad_ini_trat_sem            varchar(100) not null,
    dat_ter_edad_cronologica_al_ingr_sem varchar(100) not null,
    dat_ter_edad_correg_al_ingr_sem      varchar(105) not null,
    dat_ter_peso_                        varchar(105) not null,
    dat_ter_talla                        varchar(105) not null,
    dat_ter_PC                           varchar(105) not null,
    dat_tera_eval_terap                  varchar(105) not null,
    dat_tera_tono_mus_norm               varchar(105) not null,
    dat_tera_ton_mus_hipo                varchar(105) not null,
    dat_tera_ton_mus_hiper               varchar(105) not null,
    dat_tera_ton_mus_mix                 varchar(105) not null,
    dat_tera_ton_mus_fluc                varchar(105) not null,
    dat_tera_post_norm                   varchar(105) not null,
    dat_tera_post_asime                  varchar(105) not null,
    eval_subs                            varchar(105) not null,
    eval_subs_num_eval                   varchar(105) not null,
    eval_subs_fec_eval                   date         not null,
    eval_subs_eda_sem                    varchar(105) not null,
    pat_des_mot_gru_punt_obt             varchar(105) not null,
    pat_des_mot_gru_porcen               varchar(105) not null,
    pat_des_mot_fin_punt_obt             varchar(105) not null,
    pat_des_mot_fin_porc                 varchar(105) not null,
    pat_des_cog_punt_obt                 varchar(105) not null,
    pat_des_cog_porc                     varchar(105) not null,
    pat_des_leng_pun_obt                 varchar(105) not null,
    pat_des_leng_porc                    varchar(105) not null,
    pat_des_per_soc_pun_soc              varchar(105) not null,
    pat_des_per_soc_porc                 varchar(105) not null,
    eval_ini                             varchar(45)  not null,
    eval_ini_ton_musc_norm               varchar(45)  not null,
    eval_ini_ton_musc_hipo               varchar(105) not null,
    eval_ini_ton_musc_hiper              varchar(105) not null,
    eval_ini_ton_musc_mixt               varchar(105) not null,
    eval_ini_ton_musc_fluc               varchar(105) not null,
    eval_ini_post_norm                   varchar(45)  not null,
    eval_ini_post_asim                   varchar(105) not null,
    num_sec_por_mes                      varchar(105) not null,
    sign_alarma                          varchar(105) not null,
    hit_mot_gru_cont_cef_fec_cons        date         null,
    cont_cef_sem_cons                    varchar(105) not null,
    hit_mot_gru_sed_fec_cons             date         null,
    hit_mot_gru_sed_sem_cons             varchar(105) not null,
    hit_mot_gru_rea_pro_fec_cons         date         null,
    hit_mot_gru_rea_pro_sem_cons         varchar(105) not null,
    hit_mot_gru_arra_fec_cons            date         null,
    hit_mot_gru_arra_sem_cons            varchar(105) not null,
    hit_mot_gru_gat_fec_cons             date         null,
    hit_mot_gru_gat_sem_cons             varchar(105) not null,
    hit_mot_gru_movpost_aut_fec_cons     date         null,
    hit_mot_gru_movpost_aut_sem_cons     varchar(105) not null,
    hit_mot_gru_mar_inde_fec_cons        date         null,
    hit_mot_gru_mar_inde_sem_cons        varchar(105) not null,
    hit_mot_fin_fijocu_fec_con           date         null,
    hit_mot_fin_fijocu_sem_con           varchar(105) not null,
    hit_mot_fin_cubpal_fec_con           date         null,
    hit_mot_fin_cubpal_sem_con           varchar(105) not null,
    hit_mot_fin_preras_fec_con           date         null,
    hit_mot_fin_preras_sem_con           varchar(105) not null,
    hit_mot_fin_pininf_fec_con           date         null,
    hit_mot_fin_pininf_sem_con           varchar(105) not null,
    hit_mot_fin_pinfin_fec_con           date         null,
    hit_mot_fin_pinfin_sem_con           varchar(105) not null,
    hit_mot_fin_aflovol_fec_con          date         null,
    hit_mot_fin_aflovol_sem_con          varchar(105) not null,
    hit_mot_fin_coorocu_fec_con          date         null,
    hit_mot_fin_coorocu_sem_con          varchar(105) not null
)
    charset = latin1;

create table terapia_neurov2
(
    id_terapia_neurohabilitatoriav2 int auto_increment
        primary key,
    clave_paciente                  int unsigned not null,
    clave_personal                  int unsigned not null,
    fecha_inicio_terapia            date         not null,
    fecha_terapia                   date         not null,
    edad_corregida                  varchar(5)   not null,
    edad_cronologica                varchar(20)  not null,
    dat_ter_fech_nac_edad_correg    date         not null,
    edad_cronologica_al_ingr_sem    varchar(4)   null,
    edad_correg_al_ingr_sem         varchar(4)   null,
    peso                            int          null,
    talla                           int          null,
    pc                              varchar(10)  null,
    factores_riesgo                 varchar(100) null,
    constraint terapia_neurov2_paciente_clave_paciente_fk
        foreign key (clave_paciente) references paciente (clave_paciente),
    constraint terapia_neurov2_personal_clave_personal_fk
        foreign key (clave_personal) references personal (clave_personal)
)
    comment 'Tabla principal de terapia neurohabilitatoria version 2' engine = InnoDB;

create table resultados_hitos_mf
(
    id_resultados_hitos_mf      int auto_increment
        primary key,
    id_terapia_neuro            int         not null,
    id_hito_mf                  int         not null,
    fecha_consolidacion         date        null,
    fecha_consolidacion_semanas varchar(10) null,
    constraint res_hitos_mf_hitos_mf_id_hito_motor_fino_fk
        foreign key (id_hito_mf) references hitos_mf (id_hito_motor_fino),
    constraint res_hitos_mf_terapia_neurov2_id_terapia_neurohabilitatoriav2__fk
        foreign key (id_terapia_neuro) references terapia_neurov2 (id_terapia_neurohabilitatoriav2)
            on delete cascade
)
    comment 'Tabla de resultados para los hitos motor fino' engine = InnoDB;

create table resultados_hitos_mg
(
    id_resultados_hitos_mg      int auto_increment
        primary key,
    id_terapia_neuro            int         not null,
    id_hito_motor_grueso        int         not null,
    fecha_consolidacion         date        null,
    fecha_consolidacion_semanas varchar(10) null,
    constraint res_hitos_mg_terapia_neurov2_id_terapia_neurohabilitatoriav2_fk
        foreign key (id_terapia_neuro) references terapia_neurov2 (id_terapia_neurohabilitatoriav2)
            on delete cascade,
    constraint resultados_hitos_mg_hitos_mg_id_hito_motor_grueso_fk
        foreign key (id_hito_motor_grueso) references hitos_mg (id_hito_motor_grueso)
)
    comment 'Tabla con las fechas de consolidacion de los hitos' engine = InnoDB;

create table resultados_maniobras_katona
(
    id_resultados_katona     int auto_increment
        primary key,
    id_terapia_neuro         int         not null,
    id_katona                int         not null,
    tono_muscular_topografia varchar(50) null,
    constraint res_katona_terapia_neurov2_id_terapia_neurohabilitatoriav2_fk
        foreign key (id_terapia_neuro) references terapia_neurov2 (id_terapia_neurohabilitatoriav2)
            on delete cascade,
    constraint resultados_maniobras_katona_maniobras_Katona_id_katona_fk
        foreign key (id_katona) references maniobras_Katona (id_katona)
)
    engine = InnoDB;

create table resultados_postura
(
    id_resultado_postura int auto_increment
        primary key,
    id_terapia_neuro     int          not null,
    id_postura           int          not null,
    resultado            varchar(100) null,
    constraint res_postura_terapia_neurov2_id_terapia_neurohabilitatoriav2_fk
        foreign key (id_terapia_neuro) references terapia_neurov2 (id_terapia_neurohabilitatoriav2)
            on delete cascade,
    constraint resultados_postura_postura_id_postura_fk
        foreign key (id_postura) references postura (id_postura)
)
    comment 'Tabla de resultados postura' engine = InnoDB;

create table resultados_signos_alarma
(
    id_resultados_signos_alarma int auto_increment
        primary key,
    id_terapia_neuro            int not null,
    id_signos_alarma            int not null,
    constraint res_alarma_terapia_neurov2_id_terapia_neurohabilitatoriav2_fk
        foreign key (id_terapia_neuro) references terapia_neurov2 (id_terapia_neurohabilitatoriav2),
    constraint resultados_signos_alarma_signos_alarma_id_signos_alarma_fk
        foreign key (id_signos_alarma) references signos_alarma (id_signos_alarma)
)
    comment 'Tabla de resultados para signos de alarma' engine = InnoDB;

create table resultados_sub_leng
(
    id_resultados_leng int auto_increment
        primary key,
    id_terapia_neuro   int not null,
    id_sub_leng        int not null,
    resultado          int null,
    constraint res_sub_leng_terapia_neurov2_id_terapia_neurohabilitatoriav2_fk
        foreign key (id_terapia_neuro) references terapia_neurov2 (id_terapia_neurohabilitatoriav2)
            on delete cascade,
    constraint resultados_sub_leng_subescalas_lenguaje_id_sub_leng_fk
        foreign key (id_sub_leng) references subescalas_lenguaje (id_sub_leng)
)
    comment 'Tabla de resultados de subescalas de lenguaje' engine = InnoDB;

create table resultados_sub_mf
(
    id_resultados_sub_mf int auto_increment
        primary key,
    id_terapia_neuro     int not null,
    id_sub_fino          int not null,
    resultado            int null,
    constraint res_sub_mf_terapia_neurov2_id_terapia_neurohabilitatoriav2_fk
        foreign key (id_terapia_neuro) references terapia_neurov2 (id_terapia_neurohabilitatoriav2)
            on delete cascade,
    constraint resultados_sub_mf_subescalas_mf_id_sub_fino_fk
        foreign key (id_sub_fino) references subescalas_mf (id_sub_fino)
)
    comment 'Tabla de resultados subescalas motor fino' engine = InnoDB;

create table resultados_sub_mg
(
    id_resultados_sub_mg int auto_increment
        primary key,
    id_terapia_neuro     int not null,
    id_sub_grueso        int not null,
    resultado            int null,
    constraint res_sub_mg_terapia_neurov2_id_terapia_neurohabilitatoriav2_fk
        foreign key (id_terapia_neuro) references terapia_neurov2 (id_terapia_neurohabilitatoriav2)
            on delete cascade,
    constraint resultados_sub_mg_subescalas_mg_id_sub_grueso_fk
        foreign key (id_sub_grueso) references subescalas_mg (id_sub_grueso)
)
    comment 'Tabla de resultados de las subescalas motor grueso' engine = InnoDB;

create table tono_muscular_ubicacion
(
    id_tono_muscular_ubicacion int         not null
        primary key,
    campos                     varchar(50) not null
)
    comment 'Tabla de catalogo tono muscular y ubicacion' engine = InnoDB;

create table resultados_tono_muscular
(
    id_resultados_tono_muscular int auto_increment
        primary key,
    id_terapia_neuro            int         not null,
    id_tono_muscular_ubicacion  int         not null,
    resultado                   varchar(50) null,
    constraint res_muscular_muscular_ubicacion_id_tono_muscular_ubicacion_fk
        foreign key (id_tono_muscular_ubicacion) references tono_muscular_ubicacion (id_tono_muscular_ubicacion),
    constraint res_muscular_terapia_neurov2_id_terapia_neurohabilitatoriav2_fk
        foreign key (id_terapia_neuro) references terapia_neurov2 (id_terapia_neurohabilitatoriav2)
            on delete cascade
)
    comment 'Tabla de resultados de tono muscular y ubicacion' engine = InnoDB;

