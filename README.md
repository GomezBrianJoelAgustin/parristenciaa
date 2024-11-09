# Parristencia

***

Parristencia es un **sistema de asistencia simple** diseñado específicamente para **profesores**, que permite gestionar la asistencia, las notas y el estado académico de los alumnos. Con este sistema, los docentes pueden llevar un control eficiente y organizado de sus clases.

## Información General

El sistema permite a los profesores realizar las siguientes funciones:

- **Toma de asistencia**: Registro fácil y rápido de la presencia de los alumnos.
- **Gestión de alumnos**: Organización de la información académica y personal de cada estudiante.
- **Asignación de notas**: Registro y seguimiento del rendimiento académico.
- **Visualización del estado académico**: Clasificación del estado del alumno como **promocionado**, **regular** o **libre**, lo que proporciona una visión clara del progreso académico.

### Acceso al Sistema

Para acceder al sistema, utiliza las siguientes credenciales:

- **Usuario**: javier
- **Contraseña**: 123

### Carga de la Base de Datos

Es necesario ejecutar un script llamado `dataTables.sql` para cargar la base de datos en Laragon utilizando HeidiSQL. Para hacerlo, sigue estos pasos:

1. **Descarga y Extracción del Archivo**:
   - Asegúrate de que el archivo del sistema Parristencia (por ejemplo, un archivo ZIP) esté descargado en tu computadora.
   - Extrae este archivo en la carpeta `www` de Laragon. Esta carpeta normalmente se encuentra en el directorio donde instalaste Laragon (por defecto, suele ser `C:\laragon\www`). Esto es crucial ya que Laragon utiliza esta carpeta como su raíz de documentos para servir aplicaciones web.

2. **Carga de la Base de Datos**:
   - Una vez que hayas extraído el archivo, necesitarás cargar la base de datos utilizando HeidiSQL. Para ello:
     1. Abre HeidiSQL y conecta a tu servidor MySQL.
     2. Selecciona la base de datos donde deseas cargar el script.
     3. Ve a "Archivo" y selecciona "Ejecutar archivo SQL".
     4. Busca el archivo `dataTables.sql` que se encuentra dentro de la carpeta extraída y ejecútalo.

3. **Acceso al Sistema**:
   - Después de configurar la base de datos, puedes acceder al sistema utilizando las siguientes credenciales:
     - **Usuario**: javier
     - **Contraseña**: 123

## Tecnologías Utilizadas

Parristencia está construido con las siguientes tecnologías:

- **PHP**: Versión 8.0
- **MySQL**: Versión 5.7
- **Laragon**: Herramienta que proporciona un entorno de desarrollo local eficiente y fácil de usar.
