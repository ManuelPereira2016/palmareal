import axios from 'axios'

axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content')

window.rateProperties = class rateProperties {
  constructor() {
    this.setup()
    this.runEventListeners();
  }

  setup(){
    let id = window.location.href.split('propiedades/')[1];
    axios.get(`/get-rate-property?id=${id}`)
    .then((res)=>{
      res = res.data;
      if(res.rated){
        $('#mark-property i').removeClass('fa-heart-o').addClass('fa-heart')
      }
    })
    .catch((err)=>{
      console.log(err);
    })
  }

  rate(){
    axios.post('/rate-property', { id: window.location.href.split('propiedades/')[1] })
    .then((res)=>{
      res = res.data;
      if(!res.full){
        if($('#mark-property i').hasClass('fa-heart-o')){
          $('#mark-property i').removeClass('fa-heart-o').addClass('fa-heart')
        } else {
          $('#mark-property i').removeClass('fa-heart').addClass('fa-heart-o')
        }
      } else {
        $('.content-header').prev('.alert').remove()
        $('.content-header').before('<div class="alert alert-danger"> Ya han sido seleccionadas 4 propiedades!.</div>')
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