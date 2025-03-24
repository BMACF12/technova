document.addEventListener('DOMContentLoaded', () => {
    const items = document.querySelectorAll('.timeline-item');
    const fill = document.getElementById('timelineFill');
    const line = document.querySelector('.timeline-line');
    const timelineSection = document.querySelector('.timeline-section');

    function animateTimeline() {
        if (!items.length) return;

        // El scrollY ayuda a determinar cuánto se ha desplazado el usuario
        const scrollY = window.scrollY + window.innerHeight * 0.6;

        // Encontramos las posiciones de la primera y última tarjeta
        const firstItem = items[0];
        const lastItem = items[items.length - 1];

        // Obtener las posiciones de los primeros y últimos elementos (con respecto a la sección)
        const firstTop = firstItem.getBoundingClientRect().top + window.scrollY;
        const lastTop = lastItem.getBoundingClientRect().top + window.scrollY + lastItem.offsetHeight;

        // Calcular la altura total de la línea (desde el primer hasta el último evento)
        const totalHeight = lastTop - firstTop;

        // Colocar la línea gris en la posición correcta
        line.style.top = `${firstTop - timelineSection.offsetTop}px`; // Posición de inicio
        line.style.height = `${totalHeight}px`; // Altura total de la línea

        // El valor máximo de la altura de la línea azul
        let maxFill = 0;

        // Animamos la línea azul
        items.forEach(item => {
            const itemCenter = item.getBoundingClientRect().top + window.scrollY + item.offsetHeight / 2;

            // Si la posición del scroll es mayor que el centro del ítem, lo activamos
            if (scrollY > itemCenter) {
                item.classList.add('active');
                maxFill = itemCenter;
            }
        });

        // Ajustamos la altura del relleno azul
        fill.style.top = `${firstTop - timelineSection.offsetTop}px`;
        fill.style.height = `${Math.max(0, maxFill - firstTop)}px`;
    }

    // Escuchamos eventos de scroll, carga y resize para recalcular la posición de la línea
    window.addEventListener('scroll', animateTimeline);
    window.addEventListener('load', animateTimeline);
    window.addEventListener('resize', animateTimeline);
});
