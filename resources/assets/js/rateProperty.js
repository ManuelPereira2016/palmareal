import axios from 'axios'

window.rateProperties = class rateProperties {
  constructor() {
    this.runEventListeners();
  }

  rate(){
    axios.post('/rate-property', { id: window.location.href.split('propiedad/')[1] })
    .then((res)=>{
      if($('#mark-property i').hasClass('fa-heart-o')){
        $('#mark-property i').removeClass('fa-heart-o').addClass('fa-heart')
      } else {
        $('#mark-property i').removeClass('fa-heart').addClass('fa-heart-o')
      }
    })
    .catch((err)=>{
      console.log(err);
    })
  }

  runEventListeners(){
    $('#mark-property').on('click', (e)=>{
      e.preventDefault()
      this.rate();
    })
  }

  // methods
}