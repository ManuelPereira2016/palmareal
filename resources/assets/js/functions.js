const showLoading = (elem)=>{
    let height = $(elem).height() + 'px'

    $(elem).html(`
      <div class="parent" style="position:absolute;height:${height};width:100%;">
        <div id="loader">
        </div>
      </div>
    `);
}

const quitLoading = (elem)=>{
  $(elem).find('.parent').remove()
}

window.showLoading = showLoading
window.quitLoading = quitLoading