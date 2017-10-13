import axios from 'axios'

window.searchPage = class searchPage {
	constructor(){
    this.form = $('#form');
    this.filters = null

    this.properties = (item, img)=> {
      let types = item.types.map((type)=>{
        return `
          <div class="label label-default">${type.name}</div>
        `
      });

      return `
        <div class="col-sm-6 col-md-4 animate-bottom">
            <div class="thumbnail card">
                <a href="/inmobiliaria/propiedad/${item.id}" >
                  <div class="overlay-img"> 
                    <span>Ver más</span>
                    <img src="${img ? '/imgs/properties/' + img.url : '/imgs/propiety-default.jpg'}" alt="Imagen de propiedad">
                  </div>
                </a>
                <div class="caption">
                    <h3 style="height: 45px; overflow: hidden">${item.name}</h3>
                    <div class="price">${ item.price ? item.price : ''}
                    </div>
                    ${types ? types.join('') : ''}
                    <div class="truncate"><p class="text-justify break-words">${item.description.length > 100 ? item.description.substring(0,100) + '...' : item.description}</p></div>
                    <a href="/inmobiliaria/propiedad/${item.id}" class="btn btn-second" role="button">Ver más</a>
                </div>
            </div>
        </div>
      `
    }

    this.runEventsListeners();
  }

  getMedia(media, propertyId){
    if(parseInt(media.item) === propertyId){
      return true;
    } else {
      return false;
    }
  }

  search(){
    let data = this.form.serialize();
    this.filters = data
    
    this.triggerScrollTop()
    window.showLoading('#properties-container')

    axios.post(window.location.href.split('?')[0], data)
    .then((res)=>{
      res = res.data
      let row = $('<div class="row"></div>')
      let length = res.properties.length

      // Check if we need to remove flash message
      !res.message ? $('#message').removeClass('alert-info').text('').hide() : ''

      res.properties.map((prop) =>{
        let img = res.media.filter( (item)=>{
          return this.getMedia(item,prop.id)
        })

        row.append(this.properties(prop, img[0]));

        // if(row.children().length % 3 == 0){
        //   $('#properties-container').append(row);
        //   row = $('<div class="row"></div>')
        // }
      })

      // if(length < 3){
        $('#properties-container').append(row);
      // }

      if(res.message){
        $('#message').addClass('alert-' + res.message[0].level).css('display', 'block')
        $('#message').text(res.message[0].message)
      }

      window.quitLoading('#properties-container')
      $('#properties-container').append(res.paginator)
    })
    .catch((e)=>{
      console.log("Ha ocurrido un error grave: " + e)
    })
  }

  getPages(url){
    window.showLoading('#properties-container')
    this.triggerScrollTop()
    axios.post(url, this.filters)
    .then((res)=>{
      res = res.data
      let row = $('<div class="row"></div>')

      res.properties.map((prop) =>{
        let img = res.media.filter( (item)=>{
          return this.getMedia(item,prop.id)
        })      
        row.append(this.properties(prop, img[0]));

        if(row.children().length % 3 == 0){
          $('#properties-container').append(row);
          row = $('<div class="row"></div>')
        }
      })

      if(length < 3){
        $('#properties-container').append(row);
      }

      window.quitLoading('#properties-container')
      $('#properties-container').append(res.paginator)
    })
    .catch((e)=>{
      console.log("Ha ocurrido un error grave: " + e)
    })
  }

  triggerScrollTop(){
    $('html, body').animate({
        scrollTop: $('#properties-page').offset().top
    }, 1000);
  }

  runEventsListeners(){
    $('#properties-container').on('click', '.pagination a', e => {
      e.preventDefault();
      let url = $(e.target).attr('href')
      window.history.pushState("", "", url);
      this.triggerScrollTop()
      this.getPages(url)
    })

    this.form.submit((e)=>{
      e.preventDefault();

      this.search();
    })

  }
}