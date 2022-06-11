import 'fast-average-color';
import FastAverageColor from "fast-average-color";

window.addEventListener('load', () => {
    const fac = new FastAverageColor();
    const images = document.getElementsByClassName('img-project')
    for (let image of images) {
        image.parentElement.style.backgroundColor = fac.getColor(image).hex
    }
})