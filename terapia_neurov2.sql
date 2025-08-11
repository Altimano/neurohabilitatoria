create table estado_paciente
(
    clave_estado_paciente       int(10)     not null
        primary key,
    descripcion_estado_paciente varchar(20) not null
)
    engine = InnoDB
    charset = utf8;

create table estado_personal
(
    clave_estado_personal       int unsigned auto_increment
        primary key,
    descripcion_estado_personal varchar(20) not null
)
    engine = InnoDB
    charset = utf8;

create table hitos_mf
(
    id_hito_motor_fino int         not null
        primary key,
    campo              varchar(50) null
)
    comment 'Tabla de catalogo hitos mf' engine = InnoDB
                                         charset = utf8;

create table hitos_mg
(
    id_hito_motor_grueso int         not null
        primary key,
    campos               varchar(50) null
)
    comment 'Tabla de catalogo de los hitos de mg' engine = InnoDB
                                                   charset = utf8;

create table maniobras_Katona
(
    id_katona  int          not null
        primary key,
    evaluacion varchar(100) not null
)
    engine = InnoDB
    charset = utf8;

create table paciente
(
    clave_paciente                 int unsigned auto_increment
        primary key,
    clave_estado_paciente          int(10)      not null,
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
    motivo_baja                    varchar(100) null,
    constraint paciente_estado_paciente_clave_estado_paciente_fk
        foreign key (clave_estado_paciente) references estado_paciente (clave_estado_paciente)
)
    engine = InnoDB
    charset = utf8;

create index paciente_FKIndex1
    on paciente (clave_estado_paciente);

create table postura
(
    id_postura int         not null
        primary key,
    campo      varchar(60) null
)
    comment 'Tabla de catalogo de postura' engine = InnoDB
                                           charset = utf8;

create table puesto
(
    clave_puesto       int unsigned auto_increment
        primary key,
    descripcion_puesto varchar(30) not null,
    comentario_puesto  mediumtext  null
)
    engine = InnoDB
    charset = utf8;

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
    engine = InnoDB
    charset = utf8;

create table signos_alarma
(
    id_signos_alarma int         not null
        primary key,
    campo            varchar(50) null
)
    comment 'Tabla de catalogo de signos de alarma' engine = InnoDB
                                                    charset = utf8;

create table subescalas_lenguaje
(
    id_sub_leng int          not null
        primary key,
    subescala   varchar(100) null
)
    comment 'Tabla catalogo para las subescalas de lenguaje' engine = InnoDB
                                                             charset = utf8;

create table subescalas_mf
(
    id_sub_fino int          not null
        primary key,
    subescala   varchar(100) null
)
    comment 'Tabla de catalogo para subescalas de motor fino' engine = InnoDB
                                                              charset = utf8;

create table subescalas_mg
(
    id_sub_grueso int         not null
        primary key,
    subescala     varchar(80) not null
)
    comment 'Tabla catalogo subescalas motor grueso' engine = InnoDB
                                                     charset = utf8;


create table terapia_neurov2
(
    id_terapia_neurohabilitatoriav2 int auto_increment
        primary key,
    clave_paciente                  int unsigned not null,
    clave_personal                  int unsigned not null,
    fecha_inicio_terapia            date         not null,
    fecha_terapia                   date         not null,
    edad_corregida                  varchar(20)  not null,
    edad_cronologica                varchar(20)  not null,
    dat_ter_fech_nac_edad_correg    date         not null,
    edad_cronologica_al_ingr_sem    varchar(4)   null,
    edad_correg_al_ingr_sem         varchar(4)   null,
    peso                            int          null,
    talla                           int          null,
    pc                              varchar(10)  null,
    num_evaluacion                  int(2)       not null comment 'Campo para saber cronologicamente cual es el orden de las evaluaciones',
    factores_riesgo                 varchar(100) null,
    motor_grueso_puntaje_total      int(3)       not null comment 'El total de puntos del area de motor grueso hasta el momento de la evaluacion del paciente',
    motor_grueso_porcentaje         float        not null comment 'Porcentaje correspondiente de el puntaje total del area de motor grueso',
    motor_fino_puntaje_total        int(3)       not null comment 'Total de puntos de las evaluaciones de motor fino hasta el momento de esta evaluacion',
    motor_fino_porcentaje           float        null comment 'Porcentaje correspondiente de el puntaje total del area de motor fino',
    lenguaje_puntaje_total          int          not null comment 'Total de puntos de las evaluaciones de motor fino hasta el momento de esta evaluacion',
    lenguaje_porcentaje             float        not null comment 'Porcentaje correspondiente de el puntaje total del area de lenguaje',
    observaciones                   longtext     null comment 'Observaciones de la evaluacion',
    fecha_registro                  varchar(18)  null,
    constraint terapia_neurov2_paciente_clave_paciente_fk
        foreign key (clave_paciente) references paciente (clave_paciente),
    constraint terapia_neurov2_personal_clave_personal_fk
        foreign key (clave_personal) references personal (clave_personal)
)
    comment 'Tabla principal de terapia neurohabilitatoria version 2' engine = InnoDB
                                                                      charset = utf8;

create table pacientes_regulares_no_regulares
(
    id_pacientes_regulares      int auto_increment
        primary key,
    id_terapia_neuro            int          not null comment 'llave foranea asociada al id de la tabla principal de terapia neuro',
    clave_paciente              int unsigned not null comment 'Claves de pacientes unicas como llave foranea de pacientes',
    fecha_consolidacion_regular date         null comment 'si un paciente es regular se guarda la fecha cuando se convirtio a regular',
    regular_no_regular          varchar(3)   null,
    constraint pacientes_regulares_no_regulares_paciente_clave_paciente_fk
        foreign key (clave_paciente) references paciente (clave_paciente),
    constraint pacientes_regulares_terapia_neurov2_neurohabilitatoriav2_fk
        foreign key (id_terapia_neuro) references terapia_neurov2 (id_terapia_neurohabilitatoriav2)
            on delete cascade
)
    comment 'Tabla donde se verifica si un paciente es regular o no' engine = InnoDB
                                                                     charset = utf8;

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
    comment 'Tabla de resultados para los hitos motor fino' engine = InnoDB
                                                            charset = utf8;

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
    comment 'Tabla con las fechas de consolidacion de los hitos' engine = InnoDB
                                                                 charset = utf8;

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
    engine = InnoDB
    charset = utf8;

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
    comment 'Tabla de resultados postura' engine = InnoDB
                                          charset = utf8;

create table resultados_signos_alarma
(
    id_resultados_signos_alarma int auto_increment
        primary key,
    id_terapia_neuro            int not null,
    id_signos_alarma            int not null,
    constraint res_alarma_terapia_neurov2_id_terapia_neurohabilitatoriav2_fk
        foreign key (id_terapia_neuro) references terapia_neurov2 (id_terapia_neurohabilitatoriav2)
            on delete cascade,
    constraint resultados_signos_alarma_signos_alarma_id_signos_alarma_fk
        foreign key (id_signos_alarma) references signos_alarma (id_signos_alarma)
)
    comment 'Tabla de resultados para signos de alarma' engine = InnoDB
                                                        charset = utf8;

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
    comment 'Tabla de resultados de subescalas de lenguaje' engine = InnoDB
                                                            charset = utf8;

create definer = root@`%` trigger delete_puntaje_porcentaje_lenguaje
    after delete
    on resultados_sub_leng
    for each row
begin
    DECLARE id_terapia int(11);
    DECLARE sum_lenguaje int(3);
    DECLARE total_lenguaje int(3);
    DECLARE sum_porcentaje float;
    SET id_terapia = OLD.id_terapia_neuro;
    SELECT COUNT(*)*4 into total_lenguaje
    FROM resultados_sub_leng
    WHERE id_terapia_neuro = id_terapia;
    IF OLD.id_terapia_neuro is not NULL THEN
        SELECT SUM(resultado) into sum_lenguaje
        FROM resultados_sub_leng
        WHERE id_terapia_neuro = id_terapia;
        SET sum_porcentaje = (sum_lenguaje / total_lenguaje) * 100;
        UPDATE terapia_neurov2
            SET lenguaje_puntaje_total = sum_lenguaje,
                lenguaje_porcentaje = sum_porcentaje
        WHERE id_terapia_neurohabilitatoriav2 = id_terapia;
    end if;
end;

create definer = root@`%` trigger insert_puntaje_porcentaje_lenguaje
    after insert
    on resultados_sub_leng
    for each row
begin
    DECLARE id_terapia int(11);
    DECLARE sum_lenguaje int(3);
    DECLARE total_lenguaje int(3);
    DECLARE sum_porcentaje float;
    SET id_terapia = NEW.id_terapia_neuro;
    SELECT COUNT(*)*4 into total_lenguaje
    FROM resultados_sub_leng
    WHERE id_terapia_neuro = id_terapia;
    IF NEW.id_terapia_neuro is not NULL THEN
        SELECT SUM(resultado) into sum_lenguaje
        FROM resultados_sub_leng
        WHERE id_terapia_neuro = id_terapia;
        SET sum_porcentaje = (sum_lenguaje / total_lenguaje) * 100;
        UPDATE terapia_neurov2
            SET lenguaje_puntaje_total = sum_lenguaje,
                lenguaje_porcentaje = sum_porcentaje
        WHERE id_terapia_neurohabilitatoriav2 = id_terapia;
    end if;
end;

create definer = root@`%` trigger update_puntaje_porcentaje_lenguaje
    after update
    on resultados_sub_leng
    for each row
begin
    DECLARE id_terapia int(11);
    DECLARE sum_lenguaje int(3);
    DECLARE total_lenguaje int(3);
    DECLARE sum_porcentaje float;
    SET id_terapia = NEW.id_terapia_neuro;
    SELECT COUNT(*)*4 into total_lenguaje
    FROM resultados_sub_leng
    WHERE id_terapia_neuro = id_terapia;
    IF NEW.id_terapia_neuro is not NULL THEN
        SELECT SUM(resultado) into sum_lenguaje
        FROM resultados_sub_leng
        WHERE id_terapia_neuro = id_terapia;
        SET sum_porcentaje = (sum_lenguaje / total_lenguaje) * 100;
        UPDATE terapia_neurov2
            SET lenguaje_puntaje_total = sum_lenguaje,
                lenguaje_porcentaje = sum_porcentaje
        WHERE id_terapia_neurohabilitatoriav2 = id_terapia;
    end if;
end;

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
    comment 'Tabla de resultados subescalas motor fino' engine = InnoDB
                                                        charset = utf8;

create definer = root@`%` trigger delete_puntaje_porcentaje_fino
    after delete
    on resultados_sub_mf
    for each row
begin
    DECLARE id_terapia int(11);
    DECLARE sum_fino int(3);
    DECLARE total_fino int(3);
    DECLARE sum_porcentaje float;
    SET id_terapia = OLD.id_terapia_neuro;
    SELECT COUNT(*)*4 into total_fino
    FROM resultados_sub_mf
    WHERE id_terapia_neuro = id_terapia;
    IF OLD.id_terapia_neuro is not NULL THEN
        SELECT SUM(resultado) into sum_fino
        FROM resultados_sub_mf
        WHERE id_terapia_neuro = id_terapia;
        SET sum_porcentaje = (sum_fino / total_fino) * 100;
        UPDATE terapia_neurov2
            SET motor_fino_puntaje_total = sum_fino,
                motor_fino_porcentaje = sum_porcentaje
        WHERE id_terapia_neurohabilitatoriav2 = id_terapia;
    end if;
end;

create definer = root@`%` trigger insert_puntaje_porcentaje_fino
    after insert
    on resultados_sub_mf
    for each row
begin
    DECLARE id_terapia int(11);
    DECLARE sum_fino int(3);
    DECLARE total_fino int(3);
    DECLARE sum_porcentaje float;
    SET id_terapia = NEW.id_terapia_neuro;
    SELECT COUNT(*)*4 into total_fino
    FROM resultados_sub_mf
    WHERE id_terapia_neuro = id_terapia;
    IF NEW.id_terapia_neuro is not NULL THEN
        SELECT SUM(resultado) into sum_fino
        FROM resultados_sub_mf
        WHERE id_terapia_neuro = id_terapia;
        SET sum_porcentaje = (sum_fino / total_fino) * 100;
        UPDATE terapia_neurov2
            SET motor_fino_puntaje_total = sum_fino,
                motor_fino_porcentaje = sum_porcentaje
        WHERE id_terapia_neurohabilitatoriav2 = id_terapia;
    end if;
end;

create definer = root@`%` trigger update_puntaje_porcentaje_fino
    after update
    on resultados_sub_mf
    for each row
begin
    DECLARE id_terapia int(11);
    DECLARE sum_fino int(3);
    DECLARE total_fino int(3);
    DECLARE sum_porcentaje float;
    SET id_terapia = NEW.id_terapia_neuro;
    SELECT COUNT(*)*4 into total_fino
    FROM resultados_sub_mf
    WHERE id_terapia_neuro = id_terapia;
    IF NEW.id_terapia_neuro is not NULL THEN
        SELECT SUM(resultado) into sum_fino
        FROM resultados_sub_mf
        WHERE id_terapia_neuro = id_terapia;
        SET sum_porcentaje = (sum_fino / total_fino) * 100;
        UPDATE terapia_neurov2
            SET motor_fino_puntaje_total = sum_fino,
                motor_fino_porcentaje = sum_porcentaje
        WHERE id_terapia_neurohabilitatoriav2 = id_terapia;
    end if;
end;

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
    comment 'Tabla de resultados de las subescalas motor grueso' engine = InnoDB
                                                                 charset = utf8;

create definer = root@`%` trigger delete_puntaje_porcentaje_grueso
    after delete
    on resultados_sub_mg
    for each row
begin
    DECLARE id_terapia int(11);
    DECLARE sum_grueso int(3);
    DECLARE total_grueso int(3);
    DECLARE sum_porcentaje float;
    SET id_terapia = OLD.id_terapia_neuro;
    SELECT COUNT(*)*4 into total_grueso
    FROM resultados_sub_mg
    WHERE id_terapia_neuro = id_terapia;
    IF OLD.id_terapia_neuro is not NULL THEN
        SELECT SUM(resultado) into sum_grueso
        FROM resultados_sub_mg
        WHERE id_terapia_neuro = id_terapia;
        SET sum_porcentaje = (sum_grueso / total_grueso) * 100;
        UPDATE terapia_neurov2
            SET motor_grueso_puntaje_total = sum_grueso,
                motor_grueso_porcentaje = sum_porcentaje
        WHERE id_terapia_neurohabilitatoriav2 = id_terapia;
    end if;
end;

create definer = root@`%` trigger insert_puntaje_porcentaje_grueso
    after insert
    on resultados_sub_mg
    for each row
begin
    DECLARE id_terapia int(11);
    DECLARE sum_grueso int(3);
    DECLARE total_grueso int(3);
    DECLARE sum_porcentaje float;
    SET id_terapia = NEW.id_terapia_neuro;
    SELECT COUNT(*)*4 into total_grueso
    FROM resultados_sub_mg
    WHERE id_terapia_neuro = id_terapia;
    IF NEW.id_terapia_neuro is not NULL THEN
        SELECT SUM(resultado) into sum_grueso
        FROM resultados_sub_mg
        WHERE id_terapia_neuro = id_terapia;
        SET sum_porcentaje = (sum_grueso / total_grueso) * 100;
        UPDATE terapia_neurov2
            SET motor_grueso_puntaje_total = sum_grueso,
                motor_grueso_porcentaje = sum_porcentaje
        WHERE id_terapia_neurohabilitatoriav2 = id_terapia;
    end if;
end;

create definer = root@`%` trigger update_puntaje_porcentaje_grueso
    after update
    on resultados_sub_mg
    for each row
begin
    DECLARE id_terapia int(11);
    DECLARE sum_grueso int(3);
    DECLARE total_grueso int(3);
    DECLARE sum_porcentaje float;
    SET id_terapia = NEW.id_terapia_neuro;
    SELECT COUNT(*)*4 into total_grueso
    FROM resultados_sub_mg
    WHERE id_terapia_neuro = id_terapia;
    IF NEW.id_terapia_neuro is not NULL THEN
        SELECT SUM(resultado) into sum_grueso
        FROM resultados_sub_mg
        WHERE id_terapia_neuro = id_terapia;
        SET sum_porcentaje = (sum_grueso / total_grueso) * 100;
        UPDATE terapia_neurov2
            SET motor_grueso_puntaje_total = sum_grueso,
                motor_grueso_porcentaje = sum_porcentaje
        WHERE id_terapia_neurohabilitatoriav2 = id_terapia;
    end if;
end;

create definer = root@`%` trigger delete_paciente_regular_no_regular
    after delete
    on terapia_neurov2
    for each row
begin
    DECLARE fecha_inicial date;
    DECLARE fecha_final date;
    DECLARE conteo int;
    DECLARE id_terapia int(11);
    DECLARE clave_pacientes int(10) unsigned;
    SET id_terapia = OLD.id_terapia_neurohabilitatoriav2;
    SET clave_pacientes = OLD.clave_paciente;
    SELECT fecha_inicio_terapia into fecha_inicial
    FROM terapia_neurov2
    WHERE id_terapia_neurohabilitatoriav2 = id_terapia;
    SELECT DATE_ADD(fecha_inicio_terapia, INTERVAL 1 YEAR) into fecha_final
    FROM terapia_neurov2
    WHERE id_terapia_neurohabilitatoriav2 = id_terapia;
    SELECT COUNT(*) INTO conteo
    FROM terapia_neurov2
    WHERE clave_paciente = clave_pacientes AND
    fecha_terapia BETWEEN fecha_inicial AND fecha_final;
    IF conteo >= 8 THEN
    IF NOT EXISTS(SELECT 1 FROM pacientes_regulares_no_regulares
    WHERE pacientes_regulares_no_regulares.clave_paciente = clave_pacientes) THEN
    INSERT INTO pacientes_regulares_no_regulares(id_terapia_neuro, clave_paciente, fecha_consolidacion_regular, regular_no_regular)
    VALUES (id_terapia, clave_pacientes, OLD.fecha_terapia, 'Si');
    end if;
    end if;
end;

create definer = root@`%` trigger insert_paciente_regular_no_regular
    after insert
    on terapia_neurov2
    for each row
begin
    DECLARE fecha_inicial date;
    DECLARE fecha_final date;
    DECLARE conteo int;
    DECLARE id_terapia int(11);
    DECLARE clave_pacientes int(10) unsigned;
    SET id_terapia = NEW.id_terapia_neurohabilitatoriav2;
    SET clave_pacientes = NEW.clave_paciente;
    SELECT fecha_inicio_terapia into fecha_inicial
    FROM terapia_neurov2
    WHERE id_terapia_neurohabilitatoriav2 = id_terapia;
    SELECT DATE_ADD(fecha_inicio_terapia, INTERVAL 1 YEAR) into fecha_final
    FROM terapia_neurov2
    WHERE id_terapia_neurohabilitatoriav2 = id_terapia;
    SELECT COUNT(*) INTO conteo
    FROM terapia_neurov2
    WHERE clave_paciente = clave_pacientes AND
    fecha_terapia BETWEEN fecha_inicial AND fecha_final;
    IF conteo >= 8 THEN
    IF NOT EXISTS(SELECT 1 FROM pacientes_regulares_no_regulares
    WHERE pacientes_regulares_no_regulares.clave_paciente = clave_pacientes) THEN
    INSERT INTO pacientes_regulares_no_regulares(id_terapia_neuro, clave_paciente, fecha_consolidacion_regular, regular_no_regular)
    VALUES (id_terapia, clave_pacientes, NEW.fecha_terapia, 'Si');
    end if;
    end if;
end;

create definer = root@`%` trigger update_paciente_regular_no_regular
    after update
    on terapia_neurov2
    for each row
begin
    DECLARE fecha_inicial date;
    DECLARE fecha_final date;
    DECLARE conteo int;
    DECLARE id_terapia int(11);
    DECLARE clave_pacientes int(10) unsigned;
    SET id_terapia = NEW.id_terapia_neurohabilitatoriav2;
    SET clave_pacientes = NEW.clave_paciente;
    SELECT fecha_inicio_terapia into fecha_inicial
    FROM terapia_neurov2
    WHERE id_terapia_neurohabilitatoriav2 = id_terapia;
    SELECT DATE_ADD(fecha_inicio_terapia, INTERVAL 1 YEAR) into fecha_final
    FROM terapia_neurov2
    WHERE id_terapia_neurohabilitatoriav2 = id_terapia;
    SELECT COUNT(*) INTO conteo
    FROM terapia_neurov2
    WHERE clave_paciente = clave_pacientes AND
    fecha_terapia BETWEEN fecha_inicial AND fecha_final;
    IF conteo >= 8 THEN
    IF NOT EXISTS(SELECT 1 FROM pacientes_regulares_no_regulares
    WHERE pacientes_regulares_no_regulares.clave_paciente = clave_pacientes) THEN
    INSERT INTO pacientes_regulares_no_regulares(id_terapia_neuro, clave_paciente, fecha_consolidacion_regular, regular_no_regular)
    VALUES (id_terapia, clave_pacientes, NEW.fecha_terapia, 'Si');
    end if;
    end if;
end;

create table tono_muscular_ubicacion
(
    id_tono_muscular_ubicacion int         not null
        primary key,
    campos                     varchar(50) not null
)
    comment 'Tabla de catalogo tono muscular y ubicacion' engine = InnoDB
                                                          charset = utf8;

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
    comment 'Tabla de resultados de tono muscular y ubicacion' engine = InnoDB
                                                               charset = utf8;


