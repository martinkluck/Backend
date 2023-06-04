<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>

<body class="antialiased">
    <x-markdown>
        # Práctico: Backend PHP

        ---

        Este trabajo práctico tiene como objetivo principal conocer las mejores prácticas del candidato, para ello se
        solicita tomarse el tiempo de leer bien la consigna y entregar el mejor desarrollo posible. Todo componente
        agregado será considerado como un **`Plus`**.

        ### 🤔 **Antes de arrancar, debes tener en cuenta:**

        - Se espera que la persona sea creativa 🎨
        - Programe de forma componentizada y ordenada 🏗️
        - Respete los request que pedimos 🤓
        - Se espera que no sea un trabajo de mas de 8 horas, 12 horas como mucho ⏰

        ## 📝 Consigna

        ---

        <aside>
            💡 **Obligatorio:** Recorda abrir un repositorio público (puede ser Github, Gitlab, Bitbucket…)
            **Nice to Have:** Deseable que el proyecto esté deployado en un server (gratuito)
            **Nice to Have:** Deseable que el proyecto tenga testings

        </aside>

        1. Crear 1 proyecto llamado “**Backend”**.
        2. Este Proyecto debe ser creado con **Laravel**, el cual brindará una **`API REST JSON`**.
        3. Leer y analizar la documentación de la [API de Starwars](https://swapi.dev/)
        4. Realizar llamadas **`GET`** a los siguientes endpoints:
        1. 👤 People
        2. 🌎 Planets
        3. 🚀 Vehicles
        5. Por cada uno de los endpoints, deben realizarse las siguientes llamadas llamadas: `**GET All**` y `**GET by
        iD**`
        1. Tiene que tener un **limit** y un **offset**
        6. Hacer uso de **JWT** o **Auth0** para el proceso de autenticación.
        7. Cada request debe tener validación de token
        8. BBDD: **MySQL**
        9. Subir a un repositorio público
        10. Deployar para ser testeado

        ### 💪 ¡Que la fuerza te acompañe!

        ---

        # Endpoints

        - Register:
        - '/api/register' - Registro de un nuevo usuario y devuelve un token
        ```
        curl -X POST \
        'http://localhost/api/register' \
        --header 'Accept: application/json' \
        --header 'Content-Type: application/json' \
        --data-raw '{
        "name": "Martin",
        "email": "martinkluck05@gmail.com",
        "password": "12345678"
        }'
        ```
        - Login:
        - '/api/login' - Login de un usuario que devuelve un token
        ```
        curl -X POST \
        'http://localhost/api/login' \
        --header 'Accept: application/json' \
        --header 'Content-Type: application/json' \
        --data-raw '{
        "email": "martinkluck05@gmail.com",
        "password": "12345678"
        }'
        ```
        - Logout:
        - '/api/logout' - Elimina todos los tokens generados del usuario
        ```
        curl -X GET \
        'http://localhost/api/logout' \
        --header 'Accept: application/json' \
        --header 'Authorization: Bearer ACCESS_TOKEN'
        ```
        - People:
        - '/api/people' - Obtiene la lista de personajes
        ```
        curl -X GET \
        'http://localhost/api/people?page=2&perPage=5' \
        --header 'Accept: application/json' \
        --header 'Authorization: Bearer ACCESS_TOKEN'
        ```
        - '/api/people/{id}' - Obtiene un personaje por ID
        ```
        curl -X GET \
        'http://localhost/api/people/{id}' \
        --header 'Accept: application/json' \
        --header 'Authorization: Bearer ACCESS_TOKEN'
        ```
        - Planets:
        - '/api/planets' - Obtiene la lista de personajes

        ```
        curl -X GET \
        'http://localhost/api/planets?page=2&perPage=5' \
        --header 'Accept: application/json' \
        --header 'Authorization: Bearer ACCESS_TOKEN'
        ```
        - '/api/planets/{id}' - Obtiene un personaje por ID

        ```
        curl -X GET \
        'http://localhost/api/planets/{id}' \
        --header 'Accept: application/json' \
        --header 'Authorization: Bearer ACCESS_TOKEN'
        ```
        - Vehicles:
        - '/api/vehicles' - Obtiene la lista de personajes

        ```
        curl -X GET \
        'http://localhost/api/vehicles?page=2&perPage=5' \
        --header 'Accept: application/json' \
        --header 'Authorization: Bearer ACCESS_TOKEN'
        ```
        - '/api/vehicles/{id}' - Obtiene un personaje por ID

        ```
        curl -X GET \
        'http://localhost/api/vehicles/{id}' \
        --header 'Accept: application/json' \
        --header 'Authorization: Bearer ACCESS_TOKEN'
        ```

    </x-markdown>
</body>

</html>
