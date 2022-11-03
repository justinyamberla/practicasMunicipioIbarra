--
-- PostgreSQL database dump
--

-- Dumped from database version 14.5
-- Dumped by pg_dump version 14.5

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: ciudadano; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ciudadano (
    id integer NOT NULL,
    cedula character varying(10) NOT NULL,
    nombres character varying(100) NOT NULL,
    apellidos character varying(100) NOT NULL
);


ALTER TABLE public.ciudadano OWNER TO postgres;

--
-- Name: ciudadano_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.ciudadano_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ciudadano_id_seq OWNER TO postgres;

--
-- Name: ciudadano_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.ciudadano_id_seq OWNED BY public.ciudadano.id;


--
-- Name: direcciones_tramites; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.direcciones_tramites (
    id_direccion numeric(100,0) NOT NULL,
    nombre_direccion character varying(255) NOT NULL
);


ALTER TABLE public.direcciones_tramites OWNER TO postgres;

--
-- Name: estado_tramite; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.estado_tramite (
    id_tramite character varying(100) NOT NULL,
    asunto text NOT NULL,
    fecha_registro date NOT NULL,
    hora_registro time without time zone NOT NULL,
    solicitante character varying(255) NOT NULL,
    usuario_actual character varying(255) NOT NULL,
    dependencia_actual text NOT NULL,
    estado character varying(100) NOT NULL
);


ALTER TABLE public.estado_tramite OWNER TO postgres;

--
-- Name: estado_tramite_historial; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.estado_tramite_historial (
    id_tramite character varying(100) NOT NULL,
    fecha date NOT NULL,
    hora time without time zone NOT NULL,
    dependencia_origen text NOT NULL,
    dependencia_destino text NOT NULL,
    usuario_origen character varying(255) NOT NULL,
    usuario_destino character varying(255) NOT NULL,
    accion text NOT NULL,
    observacion text NOT NULL,
    id_historial integer NOT NULL
);


ALTER TABLE public.estado_tramite_historial OWNER TO postgres;

--
-- Name: estado_tramite_historial_id_historial_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.estado_tramite_historial_id_historial_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.estado_tramite_historial_id_historial_seq OWNER TO postgres;

--
-- Name: estado_tramite_historial_id_historial_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.estado_tramite_historial_id_historial_seq OWNED BY public.estado_tramite_historial.id_historial;


--
-- Name: impuestos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.impuestos (
    cedula_ciudadano character varying(10) NOT NULL,
    id_impuesto numeric NOT NULL,
    fecha_ingreso date NOT NULL,
    fecha_vencimiento date NOT NULL,
    comentario text,
    total money NOT NULL,
    direccion character varying(255)
);


ALTER TABLE public.impuestos OWNER TO postgres;

--
-- Name: modulo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.modulo (
    id numeric(255,0) NOT NULL,
    nombre character varying(255),
    descripcion character varying(255),
    imagen1 character varying(255),
    imagen2 character varying(255),
    estado character varying(255),
    enlace character varying(255)
);


ALTER TABLE public.modulo OWNER TO postgres;

--
-- Name: sismert; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.sismert (
    id_multa numeric NOT NULL,
    placa character varying NOT NULL,
    calles_multa text NOT NULL,
    fecha date NOT NULL,
    hora time without time zone NOT NULL,
    valor numeric NOT NULL,
    estado character varying NOT NULL
);


ALTER TABLE public.sismert OWNER TO postgres;

--
-- Name: tramites; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tramites (
    id_tramite numeric(255,0) NOT NULL,
    id_direccion numeric(255,0) NOT NULL,
    tipo character varying(100) NOT NULL,
    nombre character varying(255) NOT NULL,
    requisitos text NOT NULL,
    tiempo_entrega character varying(255) NOT NULL
);


ALTER TABLE public.tramites OWNER TO postgres;

--
-- Name: ciudadano id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ciudadano ALTER COLUMN id SET DEFAULT nextval('public.ciudadano_id_seq'::regclass);


--
-- Name: estado_tramite_historial id_historial; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.estado_tramite_historial ALTER COLUMN id_historial SET DEFAULT nextval('public.estado_tramite_historial_id_historial_seq'::regclass);


--
-- Data for Name: ciudadano; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.ciudadano (id, cedula, nombres, apellidos) FROM stdin;
1	1004438956	Justin Alexis	Yamberla Marcillo
2	1001928165	José Manuel	Yamberla Ipiales
\.


--
-- Data for Name: direcciones_tramites; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.direcciones_tramites (id_direccion, nombre_direccion) FROM stdin;
5	Dirección 5
1	Avalúos y catastros
2	Certificados GADI
3	Colegio de Arquitectos (CAE)
4	Colegio de Ingenieros (CICI)
\.


--
-- Data for Name: estado_tramite; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.estado_tramite (id_tramite, asunto, fecha_registro, hora_registro, solicitante, usuario_actual, dependencia_actual, estado) FROM stdin;
RE-2019-123	Algún asunto	2019-10-19	15:30:00	Justin Alexis Yamberla Marcillo	Usuario 1	Dependecia 1	Archivado
TR-2022-123	SOLICITA CERTIFICACION DE VIA	2022-11-02	15:24:00	Justin Alexis Yamberla Marcillo	Usuario 1	DIRECCIÓN DE PLANIFICACIÓN Y DESARROLLO TERRITORIAL	Archivado
\.


--
-- Data for Name: estado_tramite_historial; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.estado_tramite_historial (id_tramite, fecha, hora, dependencia_origen, dependencia_destino, usuario_origen, usuario_destino, accion, observacion, id_historial) FROM stdin;
TR-2022-123	2022-11-02	15:24:00	DIRECCIÓN DE PLANIFICACIÓN Y DESARROLLO TERRITORIAL	DIRECCIÓN DE PLANIFICACIÓN Y DESARROLLO TERRITORIAL	Usuario 1	Usuario 2	Reasignar	Aquí va alguna observación	1
TR-2022-123	2022-11-30	16:24:00	DIRECCIÓN DE PLANIFICACIÓN Y DESARROLLO TERRITORIAL	DIRECCIÓN DE PLANIFICACIÓN Y DESARROLLO TERRITORIAL	Usuario 2	Usuario 3	Reasignar	Aquí va otra observación	2
RE-2019-123	2019-10-19	15:30:00	DEPARTAMENTO LGG	DEPARTAMENTO JYM	Usuario 1	Usuario 1	Enviar documento electrónico	Aquí va una observación	3
RE-2019-123	2019-11-19	15:30:00	DEPARTAMENTO LGG	DEPARTAMENTO JYM	Usuario 1	Usuario 2	Reasignar	Aquí va cualquier observación	4
\.


--
-- Data for Name: impuestos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.impuestos (cedula_ciudadano, id_impuesto, fecha_ingreso, fecha_vencimiento, comentario, total, direccion) FROM stdin;
1004438956	1	2022-11-02	2022-12-02	Este es un impuesto de prueba	99,99 €	\N
1004438956	2	2022-11-11	2022-12-12	Este es otro impuesto de prueba	0,01 €	\N
\.


--
-- Data for Name: modulo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.modulo (id, nombre, descripcion, imagen1, imagen2, estado, enlace) FROM stdin;
1	Consulta de impuestos	Consulte sus deudas de impuestos	https://info.ibarra.gob.ec/images/portfolio/predio1.png	https://info.ibarra.gob.ec/images/portfolio/predio2.png	activo	impuestos.php
2	Multas de estacionamiento	Consulte sus multas de estacionamiento SISMERT	https://info.ibarra.gob.ec/images/portfolio/sismert1.png	https://info.ibarra.gob.ec/images/portfolio/sismert2.png	activo	sismert.php
3	Estado de trámites	Consulte el estado de su trámite	https://info.ibarra.gob.ec/images/portfolio/estado.png	https://info.ibarra.gob.ec/images/portfolio/estado_blanco.png	activo	estado_tramites.php
4	Requisitos de trámites presenciales	Consulte los requisitos de trámites municipales	https://info.ibarra.gob.ec/images/portfolio/tramite1.png	https://info.ibarra.gob.ec/images/portfolio/tramite2.png	activo	tramites_presenciales.php
5	Requisitos de servicios en línea	Consulte los requisitos de trámites en línea	https://info.ibarra.gob.ec/images/portfolio/linea1.png	https://info.ibarra.gob.ec/images/portfolio/linea2.png	activo	tramites_en_linea.php
\.


--
-- Data for Name: sismert; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.sismert (id_multa, placa, calles_multa, fecha, hora, valor, estado) FROM stdin;
3	ABC-123	Calle 3 y Calle 5	2022-10-02	16:00:00	99.99	Pagado
1	ABC-123	Calle 1 y Calle 2	2022-11-02	15:00:00	99.99	Sin pagar
2	ABC-123	Calle 3 y Calle 4	2022-12-02	16:00:00	99.99	Sin pagar
\.


--
-- Data for Name: tramites; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tramites (id_tramite, id_direccion, tipo, nombre, requisitos, tiempo_entrega) FROM stdin;
1	1	En línea	Trámite 1	Aquí van los requisitos	3 días laborables
2	1	En línea	Trámite 2	Aquí van los requisitos	3 días laborables
3	1	Presencial	Trámite presencial 1	Aquí van los requisitos	3 días laborables
4	1	Presencial	Trámite presencial 2.0	Aquí van los requisitos	3 días laborables
5	2	En línea	Trámite en línea	Aquí van los requisitos	2 días laborables
6	2	En línea	Un trámite en línea	Aquí van los requisitos	4 días laborables
7	2	Presencial	Un trámite presencia	Aquí van los requisitos	4 días laborables
8	2	Presencial	Algún trámite presencial	Aquí van los requisitos	3 días laborables
9	3	En línea	Algún trámite	Aquí van los requisitos	3 días laborables
10	3	Presencial	Algún otro trámite	Aquí van los requisitos	3 días laborables
11	4	En línea	Algún otro trámite	Aquí van los requisitos	3 días laborables
12	4	Presencial	Algún otro trámite 2.0	Aquí van los requisitos	2 días laborables
14	5	En línea	Este es un trámite	Aquí van los requisitos	5 días laborables
15	5	Presencial	Este es un trámite presencial nuevo	Aquí van los requisitos	5 días laborables
\.


--
-- Name: ciudadano_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.ciudadano_id_seq', 1, true);


--
-- Name: estado_tramite_historial_id_historial_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.estado_tramite_historial_id_historial_seq', 1, true);


--
-- Name: ciudadano ciudadano_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ciudadano
    ADD CONSTRAINT ciudadano_pkey PRIMARY KEY (cedula);


--
-- Name: direcciones_tramites direcciones_tramites_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.direcciones_tramites
    ADD CONSTRAINT direcciones_tramites_pkey PRIMARY KEY (id_direccion);


--
-- Name: estado_tramite_historial estado_tramite_historial_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.estado_tramite_historial
    ADD CONSTRAINT estado_tramite_historial_pkey PRIMARY KEY (id_historial);


--
-- Name: estado_tramite estado_tramite_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.estado_tramite
    ADD CONSTRAINT estado_tramite_pkey PRIMARY KEY (id_tramite);


--
-- Name: impuestos impuestos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.impuestos
    ADD CONSTRAINT impuestos_pkey PRIMARY KEY (id_impuesto);


--
-- Name: modulo modulo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.modulo
    ADD CONSTRAINT modulo_pkey PRIMARY KEY (id);


--
-- Name: sismert sismert_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sismert
    ADD CONSTRAINT sismert_pkey PRIMARY KEY (id_multa);


--
-- Name: tramites tramites_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tramites
    ADD CONSTRAINT tramites_pkey PRIMARY KEY (id_tramite);


--
-- PostgreSQL database dump complete
--

