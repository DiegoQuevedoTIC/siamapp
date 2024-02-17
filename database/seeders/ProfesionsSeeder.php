<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfesionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::insert("
        INSERT INTO profesions (id, nombre) VALUES (1, 'ACUICULTURA');
INSERT INTO profesions (id, nombre) VALUES (2, 'ADMINISTRACIÓN DE EMPRESAS/ING. COMERCIAL');
INSERT INTO profesions (id, nombre) VALUES (3, 'ADMINISTRACIÓN TRIBUTARIA');
INSERT INTO profesions (id, nombre) VALUES (4, 'ADMINISTRACIÓN Y GESTIÓN PUBLICA');
INSERT INTO profesions (id, nombre) VALUES (5, 'ASTRONOMÍA/AGRONEGOCIOS');
INSERT INTO profesions (id, nombre) VALUES (6, 'ANÁLISIS DE SISTEMAS');
INSERT INTO profesions (id, nombre) VALUES (7, 'ANTROPOLOGÍA');
INSERT INTO profesions (id, nombre) VALUES (8, 'ARQUEOLOGÍA');
INSERT INTO profesions (id, nombre) VALUES (9, 'ARQUITECTURA');
INSERT INTO profesions (id, nombre) VALUES (10, 'ARTES/DANZA/MÚSICA/TEATRO');
INSERT INTO profesions (id, nombre) VALUES (11, 'ASTRONOMÍA');
INSERT INTO profesions (id, nombre) VALUES (12, 'AVIACIÓN');
INSERT INTO profesions (id, nombre) VALUES (13, 'BACHILLER');
INSERT INTO profesions (id, nombre) VALUES (14, 'BELLAS ARTES/DANZA/ARTE DRAMÁTICO');
INSERT INTO profesions (id, nombre) VALUES (15, 'BIBLIOTECOLOGÍA/ARCHIVOLOGÍA E HISTORIA');
INSERT INTO profesions (id, nombre) VALUES (16, 'BIOÁNALISIS');
INSERT INTO profesions (id, nombre) VALUES (17, 'CALIDAD');
INSERT INTO profesions (id, nombre) VALUES (18, 'CARTOGRAFÍA');
INSERT INTO profesions (id, nombre) VALUES (19, 'CIENCIAS ACTUARIALES');
INSERT INTO profesions (id, nombre) VALUES (20, 'CIENCIAS BIOLÓGICAS/AMBIENTALES');
INSERT INTO profesions (id, nombre) VALUES (21, 'CIENCIAS FÍSICAS');
INSERT INTO profesions (id, nombre) VALUES (22, 'CIENCIAS ACTUARIALES');
INSERT INTO profesions (id, nombre) VALUES (23, 'CIENCIAS BIOLÓGICAS/AMBIENTALES');
INSERT INTO profesions (id, nombre) VALUES (24, 'CIENCIAS FÍSICAS');
INSERT INTO profesions (id, nombre) VALUES (25, 'CIENCIAS POLICIALES');
INSERT INTO profesions (id, nombre) VALUES (26, 'CIENCIAS POLITICAS');
INSERT INTO profesions (id, nombre) VALUES (27, 'CIENCIAS Y ARTES MILITARES');
INSERT INTO profesions (id, nombre) VALUES (28, 'COMERCIO INTERNACIONAL/EXTERIOR');
INSERT INTO profesions (id, nombre) VALUES (29, 'COMPUTACIÓN');
INSERT INTO profesions (id, nombre) VALUES (30, 'COMUNICACIÓN AUDIOVISUAL');
INSERT INTO profesions (id, nombre) VALUES (31, 'COMUNICACIÓN SOCIAL PERIODISMO');
INSERT INTO profesions (id, nombre) VALUES (32, 'CONSTRUCCIÓN CIVIL');
INSERT INTO profesions (id, nombre) VALUES (33, 'CONTABILIDAD/AUDITORIA');
INSERT INTO profesions (id, nombre) VALUES (34, 'CRIMINALISTICA');
INSERT INTO profesions (id, nombre) VALUES (35, 'DERECHO/LEYES');
INSERT INTO profesions (id, nombre) VALUES (36, 'DIBUJO TÉCNICO');
INSERT INTO profesions (id, nombre) VALUES (37, 'DISEÑO DE VESTUARIO/TEXTIL/MODA');
INSERT INTO profesions (id, nombre) VALUES (38, 'DISEÑO GRÁFICO');
INSERT INTO profesions (id, nombre) VALUES (39, 'DISEÑO INDUSTRIAL');
INSERT INTO profesions (id, nombre) VALUES (40, 'ECONOMÍA');
INSERT INTO profesions (id, nombre) VALUES (41, 'EDUCACIÓN');
INSERT INTO profesions (id, nombre) VALUES (42, 'ELECTRICIDAD');
INSERT INTO profesions (id, nombre) VALUES (43, 'ELECTRONICA');
INSERT INTO profesions (id, nombre) VALUES (44, 'ENFERMERIA');
INSERT INTO profesions (id, nombre) VALUES (45, 'ESTADISTICA');
INSERT INTO profesions (id, nombre) VALUES (46, 'FARMACIA');
INSERT INTO profesions (id, nombre) VALUES (47, 'FILOSOFIA');
INSERT INTO profesions (id, nombre) VALUES (48, 'FINANZAS');
INSERT INTO profesions (id, nombre) VALUES (49, 'FISIOTERAPIA');
INSERT INTO profesions (id, nombre) VALUES (50, 'FONOAUDIOLOGIA');
INSERT INTO profesions (id, nombre) VALUES (51, 'FOTOGRAFIA');
INSERT INTO profesions (id, nombre) VALUES (52, 'GASTRONOMIA/COCINA');
INSERT INTO profesions (id, nombre) VALUES (53, 'GEOLOGIA');
INSERT INTO profesions (id, nombre) VALUES (54, 'GEOMENSURA/TOPOLOGIA');
INSERT INTO profesions (id, nombre) VALUES (55, 'GEOQUIMICA');
INSERT INTO profesions (id, nombre) VALUES (56, 'HIDRAULICA');
INSERT INTO profesions (id, nombre) VALUES (57, 'HIDROMETEREOLOGIA');
INSERT INTO profesions (id, nombre) VALUES (58, 'HISTORIA Y GEOGRAFIA');
INSERT INTO profesions (id, nombre) VALUES (59, 'HOTELERIA');
INSERT INTO profesions (id, nombre) VALUES (60, 'IDIOMAS');
INSERT INTO profesions (id, nombre) VALUES (61, 'INFORMACIÓN Y DOCUMENTACIÓN');
INSERT INTO profesions (id, nombre) VALUES (62, 'INFORMATICA');
INSERT INTO profesions (id, nombre) VALUES (63, 'INGENIERIA AEROESPACIAL');
INSERT INTO profesions (id, nombre) VALUES (64, 'INGENIERIA DE ALIMENTOS');
INSERT INTO profesions (id, nombre) VALUES (65, 'INGENIERIA AMBIENTAL');
INSERT INTO profesions (id, nombre) VALUES (66, 'INGENIERIA COMPUTACIÓN');
INSERT INTO profesions (id, nombre) VALUES (67, 'INGENIERIA CONSTRUCIÓN/CIVIL');
INSERT INTO profesions (id, nombre) VALUES (68, 'INGENIERIA DE MANTENIMIENTO');
INSERT INTO profesions (id, nombre) VALUES (69, 'PRODUCCIÓN');
INSERT INTO profesions (id, nombre) VALUES (70, 'INGENIERIA ELECTRICA');
INSERT INTO profesions (id, nombre) VALUES (71, 'INGENIERIA ELECTRONICA');
INSERT INTO profesions (id, nombre) VALUES (72, 'INGENIERIA FORESTAL');
INSERT INTO profesions (id, nombre) VALUES (73, 'INGENIERIA HIDRAULICA');
INSERT INTO profesions (id, nombre) VALUES (74, 'INGENIERIA INDUSTRIAL');
INSERT INTO profesions (id, nombre) VALUES (75, 'INGENIERIA MATEMATICA');
INSERT INTO profesions (id, nombre) VALUES (76, 'INGENIERIA MATERIALES');
INSERT INTO profesions (id, nombre) VALUES (77, 'INGENIERIA MECANICA/METALURGICA');
INSERT INTO profesions (id, nombre) VALUES (78, 'INGENIERIA MINAS');
INSERT INTO profesions (id, nombre) VALUES (79, 'INGENIERIA NAVAL');
INSERT INTO profesions (id, nombre) VALUES (80, 'INGENIERIA PESQUERA/CULTIVOS MARINOS');
INSERT INTO profesions (id, nombre) VALUES (81, 'INGENIERIA PETROLEO');
INSERT INTO profesions (id, nombre) VALUES (82, 'INGENIERIA QUIMICA');
INSERT INTO profesions (id, nombre) VALUES (83, 'INGENIERIA SISTEMAS');
INSERT INTO profesions (id, nombre) VALUES (84, 'INGENIARIA SONIDO');
INSERT INTO profesions (id, nombre) VALUES (85, 'INGENIAERIA TELECOMUNICACIONES');
INSERT INTO profesions (id, nombre) VALUES (86, 'INGENIERIA DE TRANSPORTE');
INSERT INTO profesions (id, nombre) VALUES (87, 'INSTRUMENTACIÓM');
INSERT INTO profesions (id, nombre) VALUES (88, 'LABORATORIO/MECANICA DENTAL');
INSERT INTO profesions (id, nombre) VALUES (89, 'LITERATURA/LETRAS');
INSERT INTO profesions (id, nombre) VALUES (90, 'MAESTRO MAYOR DE OBRAS');
INSERT INTO profesions (id, nombre) VALUES (91, 'MARKETING/MERCADOTECNIA');
INSERT INTO profesions (id, nombre) VALUES (92, 'MATEMÁTICA');
INSERT INTO profesions (id, nombre) VALUES (93, 'MECANICA');
INSERT INTO profesions (id, nombre) VALUES (94, 'MEDICINA');
INSERT INTO profesions (id, nombre) VALUES (95, 'METALURGIA');
INSERT INTO profesions (id, nombre) VALUES (96, 'MINERÍA/PETROLEO/GAS');
INSERT INTO profesions (id, nombre) VALUES (97, 'MÚSICA');
INSERT INTO profesions (id, nombre) VALUES (98, 'NUTRICIÓN Y DIETETICA');
INSERT INTO profesions (id, nombre) VALUES (99, 'OCEANOGRAFIA');
INSERT INTO profesions (id, nombre) VALUES (100, 'ODONTOLOGIA');
INSERT INTO profesions (id, nombre) VALUES (101, 'ORFEBRERIA/JOYERIA');
INSERT INTO profesions (id, nombre) VALUES (102, 'ORGANIZACIÓN Y METODOS');
INSERT INTO profesions (id, nombre) VALUES (103, 'PAISAJISMO');
INSERT INTO profesions (id, nombre) VALUES (104, 'PERITO MERCANTIL');
INSERT INTO profesions (id, nombre) VALUES (105, 'PSICOLOGIA');
INSERT INTO profesions (id, nombre) VALUES (106, 'PSICOPEDAGOGÍA');
INSERT INTO profesions (id, nombre) VALUES (107, 'PUBLICIDAD');
INSERT INTO profesions (id, nombre) VALUES (108, 'QUÍMICA');
INSERT INTO profesions (id, nombre) VALUES (109, 'RADIOLOGÍA');
INSERT INTO profesions (id, nombre) VALUES (110, 'RECURSOS HUMANOS/RELACIONES INDUSTRIALES');
INSERT INTO profesions (id, nombre) VALUES (111, 'RELACIONES INTERNACIONALES');
INSERT INTO profesions (id, nombre) VALUES (112, 'RELACIONES PÚBLICAS');
INSERT INTO profesions (id, nombre) VALUES (113, 'SECRETARIADO');
INSERT INTO profesions (id, nombre) VALUES (114, 'SEGURIDAD INDUSTRIAL');
INSERT INTO profesions (id, nombre) VALUES (115, 'SOCIOLOGÍA');
INSERT INTO profesions (id, nombre) VALUES (116, 'TECNOLOGÍA AUTOMOTRIZ');
INSERT INTO profesions (id, nombre) VALUES (117, 'TECNOLOGÍA AUTOMOTRIZ');
INSERT INTO profesions (id, nombre) VALUES (118, 'TECNOLOGIA DE ALIMENTOS');
INSERT INTO profesions (id, nombre) VALUES (119, 'TECNOLOGIA MÉDICA/LABORATORIO');
INSERT INTO profesions (id, nombre) VALUES (120, 'TECNOLOGIA TEXTIL');
INSERT INTO profesions (id, nombre) VALUES (121, 'TEOLOGIA');
INSERT INTO profesions (id, nombre) VALUES (122, 'TERAPIA OCUPACIONAL');
INSERT INTO profesions (id, nombre) VALUES (123, 'TRABAJO SOCIAL');
INSERT INTO profesions (id, nombre) VALUES (124, 'TRADUCCIÓN INTERPRETE');
INSERT INTO profesions (id, nombre) VALUES (125, 'TRANSPORTE');
INSERT INTO profesions (id, nombre) VALUES (126, 'TURISMO');
INSERT INTO profesions (id, nombre) VALUES (127, 'URBANISMO');
INSERT INTO profesions (id, nombre) VALUES (128, 'VETERINARIA');
INSERT INTO profesions (id, nombre) VALUES (129, 'OTRA ESPECIFIQUE');
        ");
    }
}
