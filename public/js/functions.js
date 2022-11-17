class Slider {
    constructor (rangeElement, valueElement, options) {
      this.rangeElement = rangeElement
      this.valueElement = valueElement
      this.options = options

      // Attach a listener to "change" event
      this.rangeElement.addEventListener('input', this.updateSlider.bind(this))
    }

    // Initialize the slider
    init() {
      this.rangeElement.setAttribute('min', options.min)
      this.rangeElement.setAttribute('max', options.max)

      this.updateSlider()
    }

    // Format the percentage
    asPercentage(value) {
      return parseFloat(value) + '%'
        .toLocaleString('en-US', { maximumFractionDigits: 2 })
    }

    generateBackground(rangeElement) {
      if (this.rangeElement.value === this.options.min) {
        return
      }

      let percentage =  (this.rangeElement.value - this.options.min) / (this.options.max - this.options.min) * 100
      return 'background: linear-gradient(to right, #144578, #144578 ' + percentage + '%, #eee ' + percentage + '%, #eee 100%)'
    }

    updateSlider (newValue) {
      this.valueElement.innerHTML = this.asPercentage(this.rangeElement.value)
      this.rangeElement.style = this.generateBackground(this.rangeElement.value)
    }
  }

let rangeElement = document.querySelector('.range [type="range"]')
let valueElement = document.querySelector('.range .range__value span')

let options = {
min: 1,
max: 100
}

if (rangeElement) {
let slider = new Slider(rangeElement, valueElement, options)

slider.init()
}

//Checkbox para seleccionar todos los input
$("#checkAll").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
});


