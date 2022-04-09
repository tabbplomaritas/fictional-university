import "../css/style.scss"

// Our modules / classes
import MobileMenu from "./modules/MobileMenu"
import HeroSlider from "./modules/HeroSlider"
import Search from "./modules/Search"

// Instantiate a new object using our modules/classes
const mobileMenu = new MobileMenu()
const heroSlider = new HeroSlider()
const search = new Search()   



// Allow new JS and CSS to load in browser without a traditional page refresh
if (module.hot) {
  module.hot.accept()
}
