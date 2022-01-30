
# Rock-Paper-Scissors-Lizard-Spock

## Deployment instructions

1. Instalar Docker https://www.docker.com/products/docker-desktop
2. En la raíz del proyecto ejecutar: ``sudo docker-compose up -d``
3. Ejecutar el siguiente comando para instalar dependencias: ``docker-compose exec app composer update``
4. Finalmente para iniciar el juego debe ejecutar el siguiente comando: ``docker-compose exec app php console game [PLAYER NAME]``

## Principios utilizados en el desarrollo

* POO (Programación Orientada a Objetos)
* Código limpio
* Principios SÓLIDOS
* Desacoplamiento
* Patrones de diseño
* Manejo de errores
* Unit Testing
* Arquitectura hexagonal

## Conclusiones

1. El desafío inicial fue implementar la version de la serie **The Big Bang Theory** **Piedra, papel, tijera, lagarto, spock**, después analizar el código para llevar a cabo el desacoplamiento e implementación de los principios de POO y finalmente aplicar Arquitectura hexagonal para poder realizar los Unit test de manera aislada del command principal.
2. La solución que implemente fue crear una clase **Config** donde coloque todas las variables que permiten que el juego sea escalable y extensible a nuevos modos de juegos, reglas, numero de rondas y rondas ganadas.  
Después cree clases de componentes que se repetían en el código como las preguntas de seleccion de opción para el usuario como también para la lógica que realiza la validación para determinar el ganador de cada ronda y finalmente para el componente que gestiona las estadísticas de cada juego.
De esta manera logre que el componente que determina el ganador de cada ronda quedara aislado y pudiese usarse tanto en el **command** principal como en los **unit test**.
3. Decidí implementarlo de esta manera para cumplir con cada uno de los requerimientos y realizar una refactorización del código basada en POO y lo mas mantenible en el tiempo del producto.


