import axios from 'axios'

window.mapsSelector = class mapsSelector {
	constructor() {
    this.map = null;
    var self = this;

    this.config = {
      location: {
        latitude: -0.240611,
        longitude: -79.188011
      },
      radius: 200,
      enableAutocomplete: true,
      inputBinding: {
        latitudeInput: $('#lat'),
        longitudeInput: $('#lng'),
        radiusInput: $('#ratio'),
        locationNameInput: $('#location-address')
      },
      oninitialized: function(){
        self.setup()
      }
    }

    this.runEventsListener()
	}

  setup(){
    let address = null

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

        $('#location-box').locationpicker({
          radius: old.ratio,
          enableAutocomplete: true,
          location: {
            longitude: old.longitude,
            latitude: old.latitude
          }
        })
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

    if(data.address){
      $('#ubicacion').val(data.address);
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

    $('#google-maps-location').on('shown.bs.modal', (e)=>{
      $('#location-box').locationpicker(this.config)
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