document.addEventListener('DOMContentLoaded', function () {
    Livewire.emit('played')
    var audio = document.getElementById("audio");
    if (audio) {
        audio.play()
    }
})