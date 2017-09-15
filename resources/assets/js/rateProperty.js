import axios from 'axios'

axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content')

window.rateProperties = class rateProperties {
  constructor() {
    this.setup()
    this.runEventListeners();
  }

  setup(){
    let id = window.location.href.split('propiedad/')[1];
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
    if($('#mark-property i').hasClass('fa-heart-o')){
      axios.post('/rate-property', { id: window.location.href.split('propiedad/')[1] })
      .then((res)=>{
        $('#mark-property i').removeClass('fa-heart-o').addClass('fa-heart')
      })
      .catch((err)=>{
        console.log(err);
      })
    } /* else {
      $('#mark-property i').removeClass('fa-heart').addClass('fa-heart-o')
    }*/
  }

  runEventListeners(){
    $('#mark-property').on('click', (e)=>{
      e.preventDefault()
      this.rate();
    })
  }

  // methods
}