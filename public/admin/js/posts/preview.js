const rootURL = document.querySelector('meta[name="root-url"]').dataset.index
const _token = document.querySelector('input[name="_token"]').value

const dialogBox = document.querySelector('#preview')
const dialogBodyBox = dialogBox.querySelector('.modal-body')
const dialogModal = new bootstrap.Modal(dialogBox, {})

const loadingOverlay = document.createElement('div')
loadingOverlay.setAttribute('class', 'preview-loading-overlay')
loadingOverlay.innerHTML = '<div class="loading-icon"><i class="fa-solid fa-spinner"></i></div>'

const showLoading = () => {
  dialogBodyBox.appendChild(loadingOverlay)
}

// Even on hidden modal, we reset content
dialogBox.addEventListener('hide.bs.modal', function () {
  dialogBodyBox.innerHTML = ''
})

// Show modal preview
const showModalPreview = () => {
  dialogModal.show()
  showLoading()

  const url = `${rootURL}/admin/posts/preview`

  const xhr = new XMLHttpRequest()
  xhr.open('POST', url, true)
  xhr.setRequestHeader('Content-Type', 'application/json')
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      dialogBodyBox.innerHTML = xhr.responseText
      Prism.highlightAll()
    }
  }

  const title = document.getElementById('title').value
  const youtubeId = document.getElementById('youtube-id').value
  const description = tinymce.get('desc-textarea').getContent()
  const languages = Array.from(languageSelect.selectedOptions).map(option => option.value)

  const post = {
    title,
    youtube_id: youtubeId,
    description,
    _token,
    languages,
  }

  xhr.send(JSON.stringify(post))
}
