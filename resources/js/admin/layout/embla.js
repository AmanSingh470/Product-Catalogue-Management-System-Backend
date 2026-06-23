import EmblaCarousel from 'embla-carousel';

document.addEventListener('DOMContentLoaded', () => {
    const emblaNode = document.querySelector('.embla');

    if (!emblaNode) return;

    const embla = EmblaCarousel(emblaNode, {
        loop: false,
        align: 'start',
    });

    document.getElementById('embla-prev')?.addEventListener('click', () => {
        embla.scrollPrev();
    });

    document.getElementById('embla-next')?.addEventListener('click', () => {
        embla.scrollNext();
    });
});