class slide {

    constructor() {
        this.slides = document.querySelectorAll('#slides .slide');//On récupère l'id et la class
        this.currentSlide = 0;//On part de 0
        this.slideInterval = setInterval(this.nextSlide.bind(this), 5000); //on crée un setInterval qui va permettre le changement de slide automatique 
    }

    previewSlide() {
        this.slides[this.currentSlide].className = 'slide'; //On donne la class Slide a l'élément courant dans le tableau
        if (this.currentSlide == 0) {
            this.currentSlide = this.slides.length //length renvoie le nombre l'element présent dans le tableau
        }
        this.currentSlide = (this.currentSlide - 1) % this.slides.length; //On change l'element courrant a -1 donc on recule
        this.slides[this.currentSlide].className = 'slide showing'; //On donne la class Slide Showing a l'élement courant du tableau
    }

    //On crée la fonction qui passe a la slide suivante
    nextSlide() {
        this.slides[this.currentSlide].className = 'slide'; //On donne la classe Slide a l'élément courant dans le tableau
        this.currentSlide = (this.currentSlide + 1) % this.slides.length; //On change l'élément courrant a +1 donc on avance
        this.slides[this.currentSlide].className = 'slide showing'; //On donne la class Slide Showing a l'element courant du tableau
    }
    
}

var slider = new slide();

