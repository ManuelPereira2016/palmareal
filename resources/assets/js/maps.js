import axios from 'axios'

window.mapsSelector = class mapsSelector {
	constructor() {
    this.config = {
      location: {
        latitude: -0.240611,
        longitude: -79.188011
      },
      radius: 200,
      inputBinding: {
        latitudeInput: $('#lat'),
        longitudeInput: $('#lng'),
        radiusInput: $('#ratio'),
        locationNameInput: $('#location-address')
      }
    }

    this.runEventsListener()
	}

  setup(){
    let address = null

    $('#location-box').locationpicker(this.config)

    if($('#ubicacion').val().length){
      address = $('#ubicacion').val()

      $('#location-address').val(address)

    }

    if($('#update-gmaps-config').length){
      let old = JSON.parse($('#update-gmaps-config').val())

      if(old.longitude){
        $('#location-address').val(old.address)
        $('#ratio').val(old.ratio)
        $('#lat').val(old.latitude)
        $('#lng').val(old.longitude)
      }
    }
  }

  saveLocationTemporary(){
    let data = {
      latitude: $('#lat').val(),
      longitude: $('#lng').val(),
      address: $('#location-address').val(),
      ratio: $('#ratio').val()
    }

    if($('#update-gmaps-config').length){
      $('#update-gmaps-config').val(JSON.stringify(data))
    } else {
      $('#gmaps-config').val(JSON.stringify(data))
    }
    $('#google-maps-location').modal('hide')
  }

	// methods
  runEventsListener(){
    $('#map-form').submit((e)=>{
      e.preventDefault()

      this.saveLocationTemporary()
    })

    $('#google-maps-location').on('shown.bs.modal', ()=>{
      this.setup()
    })
  }
}

window.showLocation = class showLocation {
  constructor() {
    let id = window.location.href.split('propiedad/')[1];
    axios.get(`/property-location?id=${id}` )
    .then((res)=>{
      this._location = res.data;

      if(this._location){
        if(this._location.length){
          this.config = {
            location: {
              latitude: this._location[0].latitude,
              longitude: this._location[0].longitude
            },
            radius: this._location[0].ratio
          }

          $('#map-2').locationpicker(this.config)
        }
      }
    })
    .catch((e)=>{
      console.log(e)
    })
  }

  // methods
}